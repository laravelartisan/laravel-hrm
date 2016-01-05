<?php

namespace Erp\Http\Controllers\User;


use Erp\Forms\CreateUser;
use Erp\Forms\FormControll;
use Erp\Http\Controllers\Language\Lang;
use Erp\Models\Email\Email;
use Erp\Models\Password\Password;
use Erp\Models\Role\Role;
use Illuminate\Http\Request;
use Erp\Http\Requests;
use Erp\Http\Controllers\Controller;
use Erp\Models\User\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Erp\Http\Requests\Validator;

class UsersController extends Controller
{
    use Lang,FormControll;

    private $user;
    private $locales;
    private $locale;
    private $defaultLocale;

    /**
     * UsersController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
//        $this->middleware('login');
        $this->middleware('auth');
        $this->middleware('role:Admin');
        $this->user = $user;
        $this->locales = config('app.locales');
        $this->locale = $this->chosenLanguage();
        $this->defaultLocale = config('app.fallback_locale');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $locale = $this->locale;
        $defaultLocale = $this->defaultLocale;
        $users = $this->user->all();
        $viewType = 'User List';

        return view('default.admin.users.index',compact('users','locale','defaultLocale','viewType'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function createUserForm(CreateUser $createUser)
    {
        $viewType = 'Create User';
        return view('default.admin.users.create',compact('createUser','viewType'));
    }

    /**
     * @param Email $email
     * @param Password $password
     * @param Validator $validatedRequest
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUser(Email $email, Password $password, Validator $validatedRequest, Role $role)
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewUser($id)
    {
        $locale = $this->locale;
        $defaultLocale = $this->defaultLocale;
        $userProfile = $this->user->findOrFail($id);

        return view('default.admin.users.view',compact('userProfile','locale','defaultLocale'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUserForm($id, CreateUser $createUser)
    {
        $viewType = 'Edit User';
        $userProfile =$this->editFormModel($this->user->findOrFail($id)) ;

        return view('default.admin.users.edit',compact('userProfile','viewType','createUser'));
    }


    public function editUser($id, Validator $validatedRequest)
    {
        $userProfile = $this->user->findOrFail($id);



        dd($userProfile);
    }

}
