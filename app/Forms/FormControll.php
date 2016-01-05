<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 12/21/15
 * Time: 3:43 PM
 */

namespace Erp\Forms;


trait FormControll
{

    private  $fieldname = 'field_name';
    private $model;

    /**
     * @return string
     */
    public function currentClass(){

        return get_class($this);
    }

    /**
     * @return array
     */
    public function hiddenField(){

        return [

            'type'=>'hidden',
            'name'=>$this->fieldname,
            'value'=>$this->currentClass()

        ];
    }

    /**
     * @return string
     */
    public function fieldName(){

        return $this->fieldname;
    }

    /**
     * @param $formFields
     * @param array $fieldName
     * @param $id
     * @return mixed
     */
    public function filteredForm($id=null,$mode=null)
    {
        $id = isset($id)?$id:null;
        $mode = isset($mode)?$mode:null;
        $formFields = $this->formInputFields($id,$mode);
        if($id){
            foreach( $formFields as $key=>$value){
                if(isset($value['name']) && isset($this->nonEditableFields) && in_array($value['name'],$this->nonEditableFields)){
                    unset($formFields[$key]) ;
                }
            }
            return $formFields;
        }
        return $formFields;
    }

    public function editFormModel($model)
    {
        $this->model = $model;
        if(isset($this->model->translatedAttributes)){
            $translatedAttributes = $this->model->translatedAttributes;
        }

        if(isset($translatedAttributes)){
            foreach($this->model->translatedAttributes as $attribute){
                foreach(config('app.locales') as $locale => $language){
                    if(!is_null($this->model->translate($locale)))
                        $this->model->{$attribute.'_'.$locale} = $this->model->translate($locale)->$attribute;
                }
            }
        }

        return $this->model;
    }

}