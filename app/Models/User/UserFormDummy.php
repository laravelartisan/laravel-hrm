<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/8/15
 * Time: 4:45 PM
 */

namespace Erp\Models\User;



use Illuminate\Database\Eloquent\Model;
use Erp\Models\User\User;



class UserForm extends User
{
    public function formInputFields()
    {
        return [
            [
                'type'=>'text',
                'name'=>self::USER_NAME,
                'label' => 'User Name',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12 ',
                'trans'=>false,
                'class'=>'form-control',
                'maxlength'=>10,
                'minlength'=>5,

                'required'=>false,
            ],
            [
                'type'=>'text',
                'name'=>self::FIRST_NAME,
                'label' => 'First Name',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12 ',
                'trans'=>true,
                'class'=>'form-control',
                'maxlength'=>10,
                'minlength'=>5,

                'required'=>false,
            ],
            [
                'type'=>'text',
                'name'=>self::LAST_NAME,
                'label' => 'Last Name',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',
                'trans'=>true,
                'class'=>'form-control',

            ],
            [
                'type'=>'text',
                'name'=>self::ADDRESS,
                'label' => 'Address',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',
                'trans'=>true,
                'class'=>'form-control',

            ],
            [
                'type'=>'text',
                'name'=>self::PHONE,
                'label' => 'Phone',
                'value'=>null,
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',

                'class'=>'form-control',
                'bool'=> true,
                'radval'=> ['1','2','3'],
            ],
            [
                'type'=>'select',
                'name'=>self::GENDER,
                'label' => 'Gender',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',

                'options'=>[0=>'select',1=>'Male',2=>'Female',3=>'Common'],
                'value'=>0,
            ],
            [

                'type'=>'select',
                'name'=>self::RELIGION,
                'label' => 'Religion',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',

                'options'=>[0=>'select',1=>'Islam',2=>'Hindu',3=>'Christian'],
                'value'=>0,
            ],
            [
                'type'=>'select',
                'name'=>self::COMPANY,
                'label' => 'Company',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',

                'options'=>[0=>'select',1=>'Linda Group',2=>'Sinha Group',3=>'Innotech Soft'],
                'value'=>0,
            ],
            [
                'type'=>'select',
                'name'=>self::DEPARTMENT,
                'label' => 'Department',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',

                'options'=>[0=>'select',1=>'HR',2=>'Store',3=>'Inventory'],
                'value'=>0,
            ],
            [
                'type'=>'email',
                'name'=>self::EMAIL,
                'label' => 'Email',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-12',
            ],
            [
                'type'=>'password',
                'name'=>self::PASSWORD,
                'label' => 'Password',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-6',
            ],
            [
                'type'=>'password',
                'name'=>'password_confirmation',
                'label' => 'Confirm Password',

                'class'=>'form-control',
                'labclass'=>'col-sm-12',
                'wrapclass'=>'col-sm-6',
            ],
            [

                    'type'=>'submit',

                    'label' => 'Submit',

                    'class'=>'btn btn-success',




            ]
        ];
    }
}