<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 1/2/16
 * Time: 12:16 PM
 */

namespace Erp\Forms;


use Erp\Models\Permission\Permission;

class AssignPermission extends Permission implements FormInterface
{
    use FormControll, DataHelper;

    public function formInputFields($id = null,$mode=null)
    {
        return [
            [
                'type'=>'select',
                'name'=>'role_id',
                'label' => 'Role Name',
                'others'=>['class'=>'form-control'],
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',
                'options'=>$this->rolesList(),
                'value'=>0,
                'validation'=>"required|in:".$this->roleKeys()
            ],
            [
                'type'=>'select',
                'name'=>'permission_id',
                'label' => 'Permission',
                'others'=>['class'=>'form-control'],
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',
                'options'=>$this->permissionsList(),
                'value'=>0,
                'validation'=>"required|in:".$this->permissionKeys()
            ],
            [
                'type'=>'submit',
                'label' => 'Submit',
                'others'=>[
                    'class'=>'btn btn-success',
                    'readonly'=>'readonly'
                ],
            ]
        ];
    }

}