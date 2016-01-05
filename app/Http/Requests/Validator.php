<?php

namespace Erp\Http\Requests;

use Erp\Http\Requests\Request;
use Erp\Forms\FormControll;
use Illuminate\Support\Facades\Config;

class Validator extends Request
{
    use FormControll;

    private $formToValidate;
    private $formToValidateObject;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        $defaultLocale = config('app.fallback_locale');
        $locales = config('app.locales');

        $rules = [];

        if(!is_null($this->fieldName()) && !is_null($this->get($this->fieldName())) ){
            $this->formToValidate = $this->get($this->fieldName());
            $this->formToValidateObject = new $this->formToValidate;
        }

        foreach($this->formToValidateObject->filteredForm($this->id) as $field){

            if(
                isset($field['name']) &&
                isset($field['validation']) &&
                (isset($field['trans']) && ($field['trans']== false) || !isset($field['trans'])  )
            ){
                $rules[$field['name']]= $field['validation'];
            }

            if(isset($field['name']) && isset($field['validation']) && isset($field['trans']) && $field['trans']==true  ){
                foreach($locales as $locale => $value){
                    if($locale == $defaultLocale){
                         $rules[$field['name'].'_'.$locale]= $field['validation'];
                     }else{
                         $fieldValidation = explode('|',$field['validation']);
                         $key = array_search('required',$fieldValidation);
                         unset($fieldValidation[$key]);
                         $rules[$field['name'].'_'.$locale]= implode('|',$fieldValidation);
                     }
                }
            }
        }

//dd($rules);
       return $rules ;
    }
}
