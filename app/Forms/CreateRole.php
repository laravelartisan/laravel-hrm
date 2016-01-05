<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/27/15
 * Time: 10:59 AM
 */

namespace Erp\Forms;


use Erp\Models\Role\Role;

class CreateRole extends Role implements FormInterface
{
    use FormControll;

    public function formInputFields($id = null,$mode=null)
    {
        return
        [
            [
                'type'=>'text',
                'name'=>self::NAME,
                'label' => 'Role',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12 ',
                'trans'=>false,
                'others'=>[
                    'class'=>'form-control',
                ],
                'validation'=>'required|unique:roles,name'
            ],
            [
                'type'=>'text',
                'name'=>self::LABEL,
                'label' => 'Role Description',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12 ',
                'trans'=>false,
                'others'=>[
                    'class'=>'form-control',
                ],
                'validation'=>'required',

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