<?php

{!!   inputField(['type'=>'startrow'])  !!}
{!!   inputField(['type'=>'select',
    'errors'=> $errors->has('gender_id')? 'has-error':'',
    'name'=>'gender_id',
    'label' => 'Gender',
    'value'=>null,
    'class'=>'form-control',
    'labclass'=>'col-sm-12',
    'wrapclass'=>'col-sm-12',
    'trans'=>false,
    'options'=>[0=>'select',1=>'Male',2=>'Female',3=>'Common'],
    'bool'=> true,
    'radval'=> ['1','2','3'],
    'check'=>['hello'=>'hello value','world'=>'world value'],
    'rows'=>20,
    'cols'=>25,
    'error_first'=> $errors->first('gender_id','<span class="help-block">:message</span>')
])
                            !!}
{!!   inputField(['type'=>'endrow'])  !!}