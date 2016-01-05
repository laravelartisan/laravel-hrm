<?php

namespace Erp\Http\Controllers\Admin;

use Erp\Models\Email\Email;
use Erp\Models\Password\Password;
use Erp\Models\Role\Role;
use Illuminate\Http\Request;
use Erp\Http\Requests;
use Erp\Http\Controllers\Controller;
use Erp\Models\User\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Application;
use Erp\Http\Requests\Validator;


class AdminController extends Controller
{

    private $user;
    private $locales;

    public function __construct(User $user)
    {
//        $this->middleware('login');
        $this->middleware('auth');
        $this->middleware('role:Admin');
        $this->user = $user;
        $this->locales = config('app.locales');
    }


    public function index()
    {

    }

    public function createAdminForm(Request  $request)
    {
        $viewType = $request->segment(1);
        return view('default.admin.admins.create')->with('viewType',$viewType);
    }

    public function createAdmin(Email $email, Password $password, Validator $validatedRequest, Role $role)
    {
        $this->user->username = $validatedRequest->get('username');
        $this->user->gender_id = $validatedRequest->get('gender_id');
        $this->user->religion_id = $validatedRequest->get('religion_id');
        $this->user->company_id = $validatedRequest->get('company_id');
        $this->user->department_id = $validatedRequest->get('department_id');
        $this->user->phone = $validatedRequest->get('phone');
        $this->user->password = bcrypt($validatedRequest->get('password'));
        $this->user->email = $validatedRequest->get('email');

        if( $this->user->save()){
            foreach ($this->user->translatedAttributes as $field) {
                foreach($this->locales as $locale => $value){
                    if($validatedRequest->get($field.'_'.$locale)){
                        $this->user->translateOrNew($locale)->{$field} =$validatedRequest->get($field.'_'.$locale);
                    }
                }
            }

            if($this->user->save()){
                $lastUser = $this->user->all()->last();
                $email->email = $validatedRequest->get('email');
                $password->password = $this->user->password;/*$validatedRequest->get('password');*/
                $password->user_id = $lastUser->id;
                $roleId = $validatedRequest->role;
                $lastUser->roles()->attach($roleId);
                $lastUser->emails()->save($email);
                $lastUser->passwords()->save($password);
            }
        }

        return back();
    }

    public function accessAdmin()
    {
        return view('default.admin.index');
    }

}
