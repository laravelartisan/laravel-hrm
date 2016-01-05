<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/10/15
 * Time: 3:56 PM
 */


function inputLangControl(){


    $languages =  \Illuminate\Support\Facades\Config::get('app.locales');
    $lang_def = 'en';

    $formField = '';
    $formField .= '<select class="control_lang">';
    foreach($languages as $key=>$value){
        $formField .= '<option value="'.$key.'">'.$value.'</option>';
    }
    $formField .= '</select>';
    return  $formField;
}


function inputField($field=[]){

        $languages = \Illuminate\Support\Facades\Config::get('app.locales');
        $lang_def = 'en';



    $formField =  '';


        switch (isset($field['type'])?$field['type']:'invalid') {

            case 'label':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                 $formField .= Form::label($field['name'],$field['value'],['class'=>$field['class']]);
                $formField .= '</div>';
            case 'text':
//                dd($field['name']);
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
               if(isset($field['trans']) && $field['trans'] == true ){

                   foreach($languages as $key=>$value){
                       $formField .= '<div class="translation_wrap trans_'.$key.' col-sm-11 ">';
                        $formField .=  Form::text(
                           isset($field['name'])?$field['name'].'_'.$key:null,
                            isset($field['value'])?$field['value']:null,
                            [
                                'class'=>isset($field['class'])?$field['class']:null,
                                'max-length'=>isset($field['maxlength'])?$field['maxlength']:null,
                                'min-length'=>isset($field['minlength'])?$field['minlength']:null,
                                'required'=>isset($field['required']) && $field['required']==true ? 'required':null
                            ]
                        );

                        $formField .= '</div>';
                        $formField .= '<div class="translation_wrap trans_'.$key.' ">';
                        $formField .= Form::label(
                            isset($field['name']) ? $field['name']:null,
                            $value,
                            [
                                'class'=>'col-sm-1 text-blue',
                                'style'=>' height:35px;'
                            ]
                        );
                        $formField .= '</div>';
                    }




               }else{

//                   $formField .= '<div>';
                       $formField .=  Form::text(
                           isset($field['name'])?$field['name']:null,
                           isset($field['value'])?$field['value']:null,
                           [
                               'class'=>isset($field['class'])?$field['class']:null,
                               'max-length'=>isset($field['maxlength'])?$field['maxlength']:null,
                               'min-length'=>isset($field['minlength'])?$field['minlength']:null,
                               'required'=>isset($field['required']) && $field['required']==true ? 'required':null
                           ]
                       );
//                   $formField .= '</div>';
                }
                $formField .= '</div>';
                break;

            case 'textarea':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
                if(isset($field['trans']) && $field['trans'] == true){


                        foreach($languages as $key=>$value){


                            $formField .= '<div class="translation_wrap trans_'.$key.' col-sm-10">';
                            $formField .=  Form::textarea(
                                isset($field['name'])?$field['name'].'['.$key.']':null,
                                isset($field['value'])?$field['value']:null,
                                [
                                    'class'=>isset($field['class'])?$field['class']:null
                                ]
                            );
                            $formField .= '</div>';
                        }



                    }else{
//                        $formField .= '<div>';
                        $formField .=  Form::textarea(
                            isset($field['name'])?$field['name']:null,
                            isset($field['value'])?$field['value']:null,
                            [
                                'rows'=>isset($field['rows'])?$field['rows']:20,
                                'cols'=>isset($field['cols'])?$field['cols']:20,
                                'class'=>isset($field['class'])?$field['class']:null
                            ]
                        );
//                        $formField .= '</div>';
                    }

                $formField .= '</div>';
                break;

            case 'select':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
                if(isset($field['trans']) && $field['trans'] == true) {

                    foreach ($languages as $key => $value) {

                        $formField .= '<div class="translation_wrap trans_' . $key . ' col-sm-10">';
                        $formField .= Form::select(
                            isset($field['name']) ? $field['name'] : null,
                            isset($field['options']) ? $field['options'] : [], null,
                            ['class' => isset($field['class']) ? $field['class'] : null]
                        );
                        $formField .= '</div>';
                    }
                }else{
//                    $formField .= '<div>';
                    $formField .=  Form::select(
                        isset($field['name'])?$field['name']:null,
                        isset($field['options'])?$field['options']:[], null,
                        ['class'=>isset($field['class'])?$field['class']:null]
                    ) ;
//                    $formField .= '</div>';
                }
                $formField .= '</div>';
                break;


            case 'checkbox':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                    $formField .= Form::label(
                        isset($field['name']) ? $field['name']:null,
                        isset($field['label'])?$field['label']:null,
                        [
                            'class'=>isset($field['labclass'])?$field['labclass']:null
                        ]
                    );
                   if( isset($field['check'])){

//                       $formField .= '<div>';
                            foreach($field['check'] as $name => $value ){

                                $formField .=  Form::checkbox($name, $value , $field['bool']);
                                $formField .= '<br>';

                            }
//                       $formField .= '</div>';
                    }else{
                       $formField = '<strong>check</strong> is not defined';
                    }



                $formField .= '</div>';
                break;

            case 'radio':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
              if(isset($field['radval'])){
//                  $formField .= '<div>';
                  for($rad=0; $rad<count($field['radval']); $rad++){

                      $formField .=  Form::radio(
                          isset($field['name'])?$field['name']:null,
                          isset($field['radval'][$rad])?$field['radval'][$rad]:null,
                          isset($field['bool'])?$field['bool']:null
                      );
                      $formField .= '<br>';

                  }
//                  $formField .= '</div>';
              } else{
                  $formField = '<strong>radval</strong> is not defined';
              }
                $formField .= '</div>';

                break;

            case 'email':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
//                    $formField .= '<div>';
                    $formField .=  Form::email(
                        isset($field['name'])?$field['name']:null,
                        isset($field['value'])?$field['value']:null,
                        [

                            'class'=>isset($field['class'])?$field['class']:null
                        ]
                    );

//                    $formField .= '</div>';
                $formField .= '</div>';

                break;

            case 'password':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
//                $formField .= '<div>';
                $formField .=  Form::password(
                    isset($field['name'])?$field['name']:null,
                    [
                        'class'=>isset($field['class'])?$field['class']:null
                    ]
                );
                $formField .= '<br>';
//                $formField .= '</div>';
                $formField .= '</div>';
                break;

            case 'number':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
//                $formField .= '<div>';
                $formField .=  Form::number(
                    isset($field['name'])?$field['name']:null,
                    isset($field['value'])?$field['value']:null,
                    [
                        'class'=>isset($field['class'])?$field['class']:null
                    ]
                );
                $formField .= '<br>';

//                $formField .= '</div>';
                $formField .= '</div>';
                break;

            case 'date':
                $formField .= '<div class="field_wrap '.(isset($field['wrapclass'])?$field['wrapclass']:null).' ">';
                $formField .= Form::label(
                    isset($field['name']) ? $field['name']:null,
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['labclass'])?$field['labclass']:null
                    ]
                );
//                $formField .= '<div>';
                $formField .=  Form::date(
                    isset($field['name'])?$field['name']:null,
                    \Carbon\Carbon::now(),
                    [
                        'class'=>isset($field['class'])?$field['class']:null
                    ]
                );
                $formField .= '<br>';

//                $formField .= '</div>';
                break;

            case 'hidden':
                $formField .= '<div>';
                $formField .= Form::hidden(
                    isset($field['name'])?$field['name']:null,
                    isset($field['value'])?$field['value']:null
                );
                $formField .= '</div>';
                break;

            case 'submit':
                $formField .= '<div class="text-right" >';
                $formField .= Form::submit(
                    isset($field['label'])?$field['label']:null,
                    [
                        'class'=>isset($field['class'])?$field['class']:null,
                        'readonly'=>'readonly'
                    ]);
                $formField .= '</div>';
                break;
            case 'startrow':
                $formField .= '<div class="row">';
                break;
            case 'endrow':
                $formField .= '</div>';
                break;
            default:
                return 'Sorry !!! Your<strong> Input Type</strong> is Invalid';
        }

    return $formField;




}


function formFields ($formFields)
{



  $a =  inputField(['type'=>'startrow'])  ;




    $a .=    inputField([

            'type'=>'hidden',
            'name'=>$formFields->fieldName(),
            'value'=>$formFields->currentClass()


        ]);


    $a .= inputField(['type'=>'endrow'])  ;


    $b = '';

    foreach($formFields->formInputFields() as $field){

        $b .= inputField(['type'=>'startrow']) ;



        $b .= inputField(
            [
                'type'=>isset($field['type'])?$field['type']:null,
                'name'=>isset($field['name'])?$field['name']:null,
                'label'=>isset($field['label'])?$field['label']:null,
                'value'=>isset($field['value'])?$field['value']:null,
                'class'=>isset($field['class'])?$field['class']:null,
                'labclass'=>isset($field['labclass'])?$field['labclass']:null,
                'wrapclass'=>isset($field['wrapclass'])?$field['wrapclass']:null,
                'trans'=>isset($field['trans'])?$field['trans']:null,
                'options'=>isset($field['options'])?$field['options']:null,
                'bool'=>isset($field['bool'])?$field['bool']:null,
                'radval'=>isset($field['radval'])?$field['radval']:null,
                'check'=>isset($field['check'])?$field['check']:null,
                'rows'=>isset($field['rows'])?$field['rows']:null,
                'cols'=>isset($field['cols'])?$field['cols']:null,
                'validation'=>isset($field['validation'])?$field['validation']:null,
                'maxlength'=>isset($field['maxlength'])?$field['maxlength']:null,
                'minlength'=>isset($field['minlength'])?$field['minlength']:null,
                'required'=>isset($field['required'])?$field['required']:null
            ]
        );




        $b .= inputField(['type'=>'endrow']) ;

    }





    return $a.$b ;
}