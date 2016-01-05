@inject('gender', 'Erp\Models\Gender\Gender')

{{--@inject('userForm','Erp\Models\User\UserForm')--}}


@extends('default.admin.layouts.master')

@section('style')
    {!! Html::style('css/styles.css') !!}
@endsection

@section('content')

    <div class="container-fluid" style="min-height: 1215px;">
        <div class="row">
            <div class="col-md-12">
                <div class="student-box-header">
                    <div class="col-md-6">
                        <span class="glyphicon glyphicon-user " aria-hidden="true"></span>User
                    </div>
                    <div class="col-md-6 snt">
                        <ul class="breadcrumb text-right">
                            <li>
                                <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
                                <a href="#">Dashboard</a></li>
                            <li class="active">User</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!--row-->
        <div class="inner-box">
            <div class="row margin-top-area">
                <div class="col-md-8 snt form-horizontal">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
{!! inputLangControl() !!}

{-- foreach($gdgjfgdjgf as $xfgdf)
{!!   inputField(['type'=>$xfgdf['type'],'name'=>$xfgdf['name']]);
[/rof] --}


                    {!! Form::open(array('url' => 'user/add', 'files' => true, 'id'=>'create-form','class'=>'form-create')) !!}

                    {!!   inputField(['type'=>'startrow'])  !!}

                         {!!   inputField(['type'=>'text',
                                      'errors'=> $errors->has('first_name')? 'has-error':'',
                                      'name'=>'username',
                                      'label' => 'User Name',
                                      'value'=>null,
                                      'labclass'=>'col-sm-12',
                                      'wrapclass'=>'col-sm-12 ',
                                      'trans'=>false,
                                      'class'=>'form-control',
                                      'maxlength'=>10,
                                      'minlength'=>5,
                                      'required'=>true,
                                      'error_first'=> $errors->first('username','<span class="help-block">:message</span>')
                                  ])
                            !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}

                            {!!   inputField(['type'=>'text',
                                      'errors'=> $errors->has('first_name')? 'has-error':'',
                                      'name'=>'first_name',
                                      'label' => 'First Name',
                                      'value'=>null,
                                      'labclass'=>'col-sm-12',
                                      'wrapclass'=>'col-sm-12',
                                      'trans'=>true,
                                      'class'=>'form-control',
                                      'maxlength'=>10,
                                      'minlength'=>5,
                                      'required'=>false,
                                      'error_first'=> $errors->first('first_name','<span class="help-block">:message</span>')
                                  ])
                            !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'endrow'])  !!}

                    {!!   inputField(['type'=>'startrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                            {!!   inputField(['type'=>'text',
                                         'errors'=> $errors->has('last_name')? 'has-error':'',
                                         'name'=>'last_name',
                                         'label' => 'Last Name',
                                         'value'=>null,
                                         'labclass'=>'col-sm-12',
                                         'wrapclass'=>'col-sm-12',
                                         'trans'=>true,
                                         'class'=>'form-control',

                                         'error_first'=> $errors->first('last_name','<span class="help-block">:message</span>')
                                     ])
                            !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                            {!!   inputField(['type'=>'text',
                                         'errors'=> $errors->has('address')? 'has-error':'',
                                         'name'=>'address',
                                         'label' => 'Address',
                                         'value'=>null,
                                         'labclass'=>'col-sm-12',
                                         'wrapclass'=>'col-sm-12',
                                         'trans'=>true,
                                         'class'=>'form-control',

                                         'error_first'=> $errors->first('address','<span class="help-block">:message</span>')
                                     ])
                            !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                            {!!   inputField(['type'=>'text',
                                        'errors'=> $errors->has('phone')? 'has-error':'',
                                        'name'=>'phone',
                                        'label' => 'Phone',
                                        'value'=>null,
                                        'labclass'=>'col-sm-12',
                                        'wrapclass'=>'col-sm-12',

                                        'class'=>'form-control',
                                        'bool'=> true,
                                        'radval'=> ['1','2','3'],

                                        'error_first'=> $errors->first('phone','<span class="help-block">:message</span>')
                                    ])
                            !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                            {!!   inputField(['type'=>'select',
                                         'errors'=> $errors->has('gender_id')? 'has-error':'',
                                         'name'=>'gender_id',
                                         'label' => 'Gender',

                                         'class'=>'form-control',
                                         'labclass'=>'col-sm-12',
                                         'wrapclass'=>'col-sm-12',

                                         'options'=>[0=>'select',1=>'Male',2=>'Female',3=>'Common'],
                                         'value'=>0,

                                         'error_first'=> $errors->first('gender_id','<span class="help-block">:message</span>')
                                     ])
                            !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                        {!!   inputField(['type'=>'select',
                                     'errors'=> $errors->has('religion_id')? 'has-error':'',
                                     'name'=>'religion_id',
                                     'label' => 'Religion',

                                     'class'=>'form-control',
                                     'labclass'=>'col-sm-12',
                                     'wrapclass'=>'col-sm-12',

                                     'options'=>[0=>'select',1=>'Islam',2=>'Hindu',3=>'Christian'],
                                     'value'=>0,

                                     'error_first'=> $errors->first('religion_id','<span class="help-block">:message</span>')
                                 ])
                        !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                        {!!   inputField(['type'=>'select',
                                     'errors'=> $errors->has('company_id')? 'has-error':'',
                                     'name'=>'company_id',
                                     'label' => 'Company',

                                     'class'=>'form-control',
                                     'labclass'=>'col-sm-12',
                                     'wrapclass'=>'col-sm-12',

                                     'options'=>[0=>'select',1=>'Linda Group',2=>'Sinha Group',3=>'Innotech Soft'],
                                     'value'=>0,

                                     'error_first'=> $errors->first('company_id','<span class="help-block">:message</span>')
                                 ])
                        !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                        {!!   inputField(['type'=>'select',
                                     'errors'=> $errors->has('department_id')? 'has-error':'',
                                     'name'=>'department_id',
                                     'label' => 'Department',

                                     'class'=>'form-control',
                                     'labclass'=>'col-sm-12',
                                     'wrapclass'=>'col-sm-12',

                                     'options'=>[0=>'select',1=>'HR',2=>'Store',3=>'Inventory'],
                                     'value'=>0,

                                     'error_first'=> $errors->first('department_id','<span class="help-block">:message</span>')
                                 ])
                        !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                        {!!   inputField(['type'=>'email',
                                     'errors'=> $errors->has('email')? 'has-error':'',
                                     'name'=>'email',
                                     'label' => 'Email',

                                     'class'=>'form-control',
                                     'labclass'=>'col-sm-12',
                                     'wrapclass'=>'col-sm-12',

                                     'error_first'=> $errors->first('email','<span class="help-block">:message</span>')
                                 ])
                        !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}
                        {!!   inputField(['type'=>'password',
                                     'errors'=> $errors->has('password')? 'has-error':'',
                                     'name'=>'password',
                                     'label' => 'Password',

                                     'class'=>'form-control',
                                     'labclass'=>'col-sm-12',
                                     'wrapclass'=>'col-sm-6',


                                     'error_first'=> $errors->first('password','<span class="help-block">:message</span>')
                                 ])
                        !!}
                    {{--{!!   inputField(['type'=>'endrow'])  !!}--}}
                    {{--{!!   inputField(['type'=>'startrow'])  !!}--}}
                        {!!   inputField(['type'=>'password',
                                     'errors'=> $errors->has('password_confirmation')? 'has-error':'',
                                     'name'=>'password_confirmation',
                                     'label' => 'Confirm Password',

                                     'class'=>'form-control',
                                     'labclass'=>'col-sm-12',
                                     'wrapclass'=>'col-sm-6',



                                     'error_first'=> $errors->first('password_confirmation','<span class="help-block">:message</span>')
                                 ])
                        !!}
                    {!!   inputField(['type'=>'endrow'])  !!}
                    {!!   inputField(['type'=>'startrow'])  !!}

                    {!!   inputField(['type'=>'submit',


                                     'label' => 'Submit',

                                     'class'=>'btn btn-success',



                                 ])
                        !!}
                    {!!   inputField(['type'=>'endrow'])  !!}


                    {!!  Form::close()   !!}

                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')


    @parent




    <script src="{{ asset('jquery-validation/dist/jquery.validate.min.js') }}"></script>


    <script>
//        $("#create-form").validate();
        /*$("#create-form").validate({
            debug: true,
            rules: {
                username: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
//                    minlength: 11,
                    nourl: true
                }
            },
            messages: {
                username: "Required Field",
                email: "Valid Email Required",
                phone: "Required Field + No URL's"
            }
        });*/

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".translation_wrap").hide();
            $(".translation_wrap.trans_en"/*+lang_def*/).show();
            $(".control_lang").on("click",function(){
                var selected_lang = $(this).val();
                $(".translation_wrap").hide();
                $(".translation_wrap.trans_"+selected_lang).show();
                $(".control_lang").val(selected_lang);
            });


            //form validation

//            $( "#create-form" ).submit(function( event ) {
//
//
//
//
//                 return false;
//
//
//
//
//            });



        });
    </script>


{{--<script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>--}}

@endsection