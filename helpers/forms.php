<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/10/15
 * Time: 3:56 PM
 */


/**
 * @return string
 */

function inputLangControl(){


    $languages =  config('app.locales');
    $lang_def = 'en';
    $formField = '';
    $formField .= '<select class="control_lang">';
    foreach($languages as $key=>$value){
        $formField .= '<option value="'.$key.'">'.$value.'</option>';
    }
    $formField .= '</select>';

    return  $formField;
}


/**
 * @param array $field
 * @return string
 */

function inputField($field=[]){

        $languages = config('app.locales');
        $lang_def = 'en';
        $formField =  '';


        switch (isset($field['type'])?$field['type']:'invalid') {

            case 'label':
               $formField .= function_exists('fieldLabel')?fieldLabel($field):null ;
                break;
            case 'text':
                $formField .= function_exists('fieldText')?fieldText($field,$languages):null;
                break;
            case 'textarea':
                $formField .= function_exists('fieldTextArea')?fieldTextArea($field,$languages):null;
                break;
            case 'select':
               $formField .= function_exists('fieldSelect')?fieldSelect($field,$languages):null;
                break;
            case 'checkbox':
               $formField .= function_exists('fieldCheckBox')?fieldCheckBox($field):null;
                break;
            case 'radio':
                $formField .= function_exists('fieldRadio')?fieldRadio($field):null;
                break;
            case 'email':
                $formField .= function_exists('fieldEmail')?fieldEmail($field):null;
                break;
            case 'password':
                $formField .= function_exists('fieldPassword')?fieldPassword($field):null;
                break;
            case 'number':
               $formField .= function_exists('fieldNumber')?fieldNumber($field):null;
                break;
            case 'date':
                $formField .= function_exists('fieldDate')?fieldDate($field):null;
                break;
            case 'hidden':
                $formField .= function_exists('fieldHidden')?fieldHidden($field):null;
                break;
            case 'submit':
                $formField .= function_exists('formSubmit')?formSubmit($field):null;
                break;
            case 'startrow':
               $formField .= function_exists('startRow')?startRow():null;
                break;
            case 'endrow':
               $formField .= function_exists('endRow')?endRow():null;
                break;
            default:
                return null;
        }

    return $formField;
}

/**
 * @return string
 */

function startRow()
{
    $formField = '' ;

    return  $formField .= '<div class="row">';

}

/**
 * @return string
 */

function endRow()
{
    $formField = '';

    return  $formField .= '</div>';
}

/**
 * @param $field
 * @param $languages
 * @return string
 */

function fieldText($field,$languages)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    if(isset($field['trans']) && $field['trans'] == true ){
        foreach($languages as $key=>$value){
            $formField .= '<div class="translation_wrap trans_'.$key.' col-sm-11 ">';
            $formField .=  Form::text(
                isset($field['name'])?$field['name'].'_'.$key:null,
                isset($field['value'])?$field['value']:null,
                isset($field['others'])?$field['others']:[]
            );

            $formField .= '</div>';
            $formField .= '<div class="translation_wrap trans_'.$key.' ">';
            $formField .= Form::label(
                isset($field['name']) ? $field['name']:null,
                $value,[
                    'class'=>'col-sm-1 text-blue',
                    'style'=>' height:35px;'
                ]
            );
            $formField .= '</div>';
        }
    }else{
            $formField .=  Form::text(
            isset($field['name'])?$field['name']:null,
            isset($field['value'])?$field['value']:null,
            isset($field['others'])?$field['others']:[]
        );
    }
    $formField .= '</div>';

    return $formField;

}

/**
 * @param $field
 * @param $languages
 * @return string
 */

function fieldTextArea($field,$languages)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    if(isset($field['trans']) && $field['trans'] == true){

        foreach($languages as $key=>$value){
            $formField .= '<div class="translation_wrap trans_'.$key.' col-sm-10">';
            $formField .=  Form::textarea(
                isset($field['name'])?$field['name'].'_'.$key:null,
                isset($field['value'])?$field['value']:null,
                isset($field['others'])?$field['others']:[]
            );
            $formField .= '</div>';
            $formField .= '<div class="translation_wrap trans_'.$key.' ">';
            $formField .= Form::label(
                isset($field['name']) ? $field['name']:null,
                $value,[
                    'class'=>'col-sm-1 text-blue',
                    'style'=>' height:35px;'
                ]
            );
            $formField .= '</div>';
        }
    }else{
            $formField .=  Form::textarea(
            isset($field['name'])?$field['name']:null,
            isset($field['value'])?$field['value']:null,
            isset($field['others'])?$field['others']:[]
        );
    }
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @param $languages
 * @return string
 */

function fieldSelect($field,$languages)
{


    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    if(isset($field['trans']) && $field['trans'] == true) {

        foreach ($languages as $key => $value) {
            $formField .= '<div class="translation_wrap trans_' . $key . ' col-sm-10">';
            $formField .= Form::select(
                isset($field['name'])?$field['name'].'_'.$key:null,
                isset($field['options']) ? $field['options'][$key] : [], null,
                isset($field['others'])?$field['others']:[]
            );
            $formField .= '</div>';
            $formField .= '<div class="translation_wrap trans_'.$key.' ">';
            $formField .= Form::label(
                isset($field['name']) ? $field['name']:null,
                $value,[
                    'class'=>'col-sm-1 text-blue',
                    'style'=>' height:35px;'
                ]
            );
            $formField .= '</div>';
        }
    }else{
            $formField .=  Form::select(
            isset($field['name'])?$field['name']:null,
            isset($field['options'])?$field['options']:[], null,
            isset($field['others'])?$field['others']:[]
        ) ;
    }
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldCheckBox($field)
{
    $formField ='';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    if( isset($field['check'])){
        foreach($field['check'] as $name => $value ){
            $formField .=  Form::checkbox($name, $value , $field['bool']);
            $formField .= '<br>';
        }
    }else{
        $formField = '<strong>check</strong> is not defined';
    }
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldRadio($field)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    if(isset($field['radval'])){
        for($rad=0; $rad<count($field['radval']); $rad++){
            $formField .=  Form::radio(
                isset($field['name'])?$field['name']:null,
                isset($field['radval'][$rad])?$field['radval'][$rad]:null,
                isset($field['bool'])?$field['bool']:null
            );
            $formField .= '<br>';
        }
    } else{
        $formField = '<strong>radval</strong> is not defined';
    }
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldEmail($field)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    $formField .=  Form::email(
        isset($field['name'])?$field['name']:null,
        isset($field['value'])?$field['value']:null,
        isset($field['others'])?$field['others']:[]
    );
    $formField .= '</div>';

    return $formField;

}

/**
 * @param $field
 * @return string
 */

function fieldPassword($field)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    $formField .=  Form::password(
        isset($field['name'])?$field['name']:null,
        isset($field['others'])?$field['others']:[]
    );
    $formField .= '<br>';
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldNumber($field)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null,[
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    $formField .=  Form::number(
        isset($field['name'])?$field['name']:null,
        isset($field['value'])?$field['value']:null,
        isset($field['others'])?$field['others']:[]
    );
    $formField .= '<br>';
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldDate($field)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label(
        isset($field['name']) ? $field['name']:null,
        isset($field['label'])?$field['label']:null, [
            'class'=>isset($field['labclass'])?$field['labclass']:null
        ]
    );
    $formField .=  Form::date(
        isset($field['name'])?$field['name']:null,
        \Carbon\Carbon::now(),[
            'class'=>isset($field['class'])?$field['class']:null
        ]
    );
    $formField .= '<br>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldHidden($field)
{
    $formField = '';
    $formField .= Form::hidden(
        isset($field['name'])?$field['name']:null,
        isset($field['value'])?$field['value']:null
    );

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function formSubmit($field)
{
    $formField = '';
    $formField .= '<br>';
    $formField .= '<div class="text-right" >';
    $formField .= Form::submit(
        isset($field['label'])?$field['label']:null,
        isset($field['others'])?$field['others']:[]
    );
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $field
 * @return string
 */

function fieldLabel($field)
{
    $formField = '';
    $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
    $formField .= Form::label($field['name'],$field['value'],['class'=>$field['class']]);
    $formField .= '</div>';

    return $formField;
}

/**
 * @param $formFields
 * @return string
 */

function formFields ($formFields,$mode=null,$id=null)
{
    $id = isset($id)?$id:null;
    $mode = isset($mode)?$mode:null;
//    dd($mode);
    $hiddenField =  inputField(['type'=>'startrow']) ;
    $hiddenField .=    inputField([
        'type'=>'hidden',
        'name'=>$formFields->fieldName(),
        'value'=>$formFields->currentClass()
    ]);
    $hiddenField .= inputField(['type'=>'endrow']) ;

    $inputField = '';

    foreach($formFields->filteredForm($id,$mode) as $field){

        $inputField .= inputField(['type'=>'startrow']) ;
        $inputField .= inputField([
                'type'=>isset($field['type'])?$field['type']:null,
                'name'=>isset($field['name'])?$field['name']:null,
                'label'=>isset($field['label'])?$field['label']:null,
                'value'=>isset($field['value'])?$field['value']:null,
                'labclass'=>isset($field['labclass'])?$field['labclass']:null,
                'wrapclass'=>isset($field['wrapclass'])?$field['wrapclass']:null,
                'trans'=>isset($field['trans'])?$field['trans']:null,
                'options'=>isset($field['options'])?$field['options']:null,
                'bool'=>isset($field['bool'])?$field['bool']:null,
                'radval'=>isset($field['radval'])?$field['radval']:null,
                'check'=>isset($field['check'])?$field['check']:null,
                'validation'=>isset($field['validation'])?$field['validation']:null,
                'others'=>isset($field['others'])?$field['others']:[]

            ]);
        $inputField .= inputField(['type'=>'endrow']) ;
    }

    return $hiddenField.$inputField ;
}