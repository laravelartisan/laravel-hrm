<?php

namespace Erp\Http\Controllers\Common;

use Erp\Models\Permission\Permission;
use Erp\Models\Role\Role;
use Illuminate\Http\Request;

use Erp\Http\Requests;
use Erp\Http\Controllers\Controller;
use Erp\Models\Gender\Gender;
use Erp\Models\Religion\Religion;
use Erp\Models\Company\CompanyGroup;
use Erp\Models\Company\Company;
use Erp\Models\Department\Department;
use Erp\Http\Requests\Validator;
use Illuminate\Support\Facades\Config;
use Erp\Models\User\User;

class CommonController extends Controller
{

    private $request;
    private $gender;
    private $religion;
    private $cgroup;
    private $company;
    private $department;


    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    /**
     * @return $this
     */
    public function createForm()
    {
        $viewType = $this->request->segment(1);

        return view('default.admin.'.$viewType.'.create')
                    ->with('viewType',$viewType);
    }

    /**
     * @param Role $role
     * @param Validator $validatedRequest
     */
    public function createRole(Role $role, Validator $validatedRequest)
    {
        $isCreated = $role->create([
            'name'=>ucwords($validatedRequest->get('name')),
            'label'=>$validatedRequest->get('label')
        ]);

        return $isCreated?back():null;

    }

    /**
     * @param Permission $permission
     * @param Validator $validatedRequest
     */
    public function createPermission(Permission $permission, Validator $validatedRequest)
    {

        $isCreated = $permission->create([
            'name'=>ucwords($validatedRequest->get('name')),
            'label'=>$validatedRequest->get('label')
        ]);

        return $isCreated?back():null;
    }

    /**
     * @return $this
     */
    public function roleAssignForm()
    {
        return view('default.admin.role.assign_role')
                    ->with('viewType','Assign Role');
    }

    /**
     * @param Validator $validatedRequest
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignRole(Validator $validatedRequest, User $user)
    {
        $assignedUser = $user->find($validatedRequest->user_id)->firstOrFail();
        $assignedUser->roles()->attach($validatedRequest->role_id);

        return back();
    }

    /**
     * @return $this
     */
    public function permissionAssignForm()
    {
        return view('default.admin.permission.assign_permission')->with('viewType','Assign Permission');
    }

    /**
     * @param Validator $validatedRequest
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignPermission(Validator $validatedRequest, Role $role)
    {
        $assignedRole = $role->find($validatedRequest->role_id)->firstOrFail();

        if(!is_null($assignedRole))
            $assignedRole->permissions()->attach($validatedRequest->permission_id);

        return back();
    }

    /**
     * @param Gender $gender
     * @param Validator $validatedRequest
     */
    public function createGender(Gender $gender, Validator $validatedRequest)
    {
        foreach ($gender->translatedAttributes as $field) {
            foreach(Config::get('app.locales') as $locale => $value){
                if($validatedRequest->get($field.'_'.$locale)){
                    $gender->translateOrNew($locale)->{$field} =$validatedRequest->get($field.'_'.$locale);
                }
            }
        }
        return $gender->save()?back():null;
    }

    /**
     * @param Religion $religion
     */
    public function createReligion(Religion $religion)
    {
        return $religion->create($this->request->all())? back(): null;
    }

    /**
     * @param CompanyGroup $cgroup
     */
    public function createCgroup(CompanyGroup $cgroup)
    {
       return $cgroup->create($this->request->all())? back(): null;
    }

    /**
     * @param Company $company
     */
    public function createCompany(Company $company)
    {

        dd();
    }

    /**
     * @param Department $department
     */
    public function createDepartment(Department $department)
    {


    }

}
