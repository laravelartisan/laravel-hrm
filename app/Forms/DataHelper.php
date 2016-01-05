<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/26/15
 * Time: 5:01 PM
 */

namespace Erp\Forms;

use Erp\Models\Gender\Gender;
use Erp\Models\Department\Department;
use Erp\Models\Permission\Permission;
use Erp\Models\Religion\Religion;
use Erp\Models\Role\Role;
use Erp\Models\User\User;


trait DataHelper
{

    /**
     * @param $role
     * @return mixed
     */
    public function role($role)
    {
        $roles = new Role();
        $role=$roles->whereName($role)->first();
        $roleEmployee = $roles->whereName('employee')->first()->id;
        if($role){
            return $role->id;
        }

        return $roleEmployee;
    }

    /**
     * @return array
     */
    public function permissionsList()
    {
        $permissions = new Permission();
        $permissionList = ['select'];
        foreach($permissions->all() as $permission){
            $permissionList[$permission->id] = $permission->name;
        }
        return $permissionList;
    }

    /**
     * @return string
     */
    public function permissionKeys()
    {
        $permissionKeys = implode(',',array_except(array_keys($this->permissionsList()),[0]));
        return $permissionKeys;
    }

    /**
     * @return array
     */
    public function rolesList()
    {
        $roles = new Role();
        $roleList = ['select'];
        foreach($roles->all() as $role){
            $roleList[$role->id] = $role->name;
        }

        return $roleList;
    }

    public function roleKeys()
    {
        $roleKeys = implode(',',array_except(array_keys($this->rolesList()),[0]));

        return $roleKeys;
    }

    /**
     * @return array
     */
    public function usersList()
    {
        $users = new User();

        $userList = ['select'];
        foreach($users->all() as $user){
//            dd($user->translate('bn'));
            $userList[$user->id] = $user->translate('en')->first_name.' '.$user->translate('en')->last_name;
        }

        return $userList;
    }

    /**
     * @return string
     */
    public function userKeys()
    {
        $userKeys = implode(',',array_except(array_keys($this->usersList()),[0]));

        return $userKeys;
    }

    /**
     * @return array
     */
    public function genderList()
    {
        $genders = new Gender();
        $genderList = ['select'];

        foreach($genders->all() as $gender){
            $genderList[$gender->id] = $gender->translate('en')->gender_name ;
        }
        return $genderList;
    }

    /**
     * @return string
     */
    public function genderKeys()
    {
        $genKeys = implode(',',array_except(array_keys($this->genderList()),[0]));

        return $genKeys;
    }

    /**
     * @return array
     */
    public function multiGenderList()
    {
        $gender = new Gender();
        $locales = config('app.locales');
        $multiGenderList = [];
        foreach($locales as $locale=>$language){
            $gen = ['select'];
            foreach($gender->all() as $genList){
                app()->setLocale($locale);
                if($genList->gender_name)
                    $gen[$genList->id] = $genList->gender_name;
            }
            $multiGenderList[$locale]= $gen;
        }

        return $multiGenderList;
    }



    /**
     * @return array
     */
    public function relegionList()
    {
        $religion = new Religion();
        $rel = ['select'];
        foreach($religion->all() as $reliList){
            $rel[$reliList->id] = $reliList->name;
        }

        return $rel;
    }

    /**
     * @return string
     */
    public function relegionKeys()
    {
        $relKeys = implode(',',array_except(array_keys($this->relegionList()),[0]));

        return $relKeys;
    }

    /**
     * @return array
     */
    public function departmentList()
    {
        $department = new Department();
        $dept = ['select'];
        foreach($department->all() as $deptList){
            $dept[$deptList->id] = $deptList->name;
        }

        return $dept;
    }

    /**
     * @return string
     */
    public function departmentKeys()
    {
        $deptKeys = implode(',',array_except(array_keys($this->departmentList()),[0]));

        return $deptKeys;
    }


}