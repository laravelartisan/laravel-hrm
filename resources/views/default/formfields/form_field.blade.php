{!!   inputField(['type'=>'startrow'])  !!}


{!!

    inputField([

            'type'=>'hidden',
            'name'=>'form_field',
            'value'=>$formName->currentClass()


    ])

!!}
{!!   inputField(['type'=>'endrow'])  !!}

@foreach($formName->formInputFields() as $field)


    {!!   inputField(['type'=>'startrow'])  !!}
    {{--                                <div class=" {{ isset($field['name'])&& $errors->has($field['name'])? 'has-error':'' }}" >--}}
    {!!

          inputField(
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
                     )

!!}
    {{--                                    {!!  $errors->first(isset($field['name'])?$field['name']:null,'<span class="help-block">:message</span>')   !!}--}}
    {{--</div>--}}
    {!!   inputField(['type'=>'endrow'])  !!}
@endforeach
