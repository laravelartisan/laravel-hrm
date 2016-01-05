<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/29/15
 * Time: 11:48 AM
 */

namespace Erp\Forms;

use Erp\Models\Role\Role;
use Erp\Forms\FormInterface;


class AssignRole extends Role implements FormInterface
{
    use FormControll, DataHelper;

    public function formInputFields($id = null,$mode=null)
    {
        return [
            [
                'type'=>'select',
                'name'=>'user_id',
                'label' => 'Employee Name',
                'others'=>['class'=>'form-control'],
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',
                'options'=>$this->usersList(),
                'value'=>0,
                'validation'=>"required|in:".$this->userKeys()
            ],
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