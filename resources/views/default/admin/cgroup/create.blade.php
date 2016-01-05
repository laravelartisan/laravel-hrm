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
                        <span class="glyphicon glyphicon-user " aria-hidden="true"></span>Group
                    </div>
                    <div class="col-md-6 snt">
                        <ul class="breadcrumb text-right">
                            <li>
                                <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
                                <a href="#">Dashboard</a></li>
                            <li class="active">Company Groups</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!--row-->
        <div class="inner-box">
            <div class="row margin-top-area">
                <div class="col-md-8 snt form-horizontal">





                    {!! Form::open(array('url' => 'cgroup/add', 'files' => true, 'id'=>'create-form')) !!}

                    <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                        {!! Form::label('name','Company Group', ['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                            {!!  $errors->first('name','<span class="help-block">:message</span>')   !!}
                        </div>

                    </div>
                    <div class="text-right">
                        {!! Form::submit('Submit',['class'=>'btn btn-success','readonly'=>'readonly']) !!}

                    </div>



                    {!!  Form::close()   !!}

                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')


    @parent
    <script src="{{ asset('jquery-validation/dist/jquery.validate.min.js') }}"></script>
    {{--<script>
        $("#create-form").validate();
    </script>--}}



    {{--<script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>--}}

@endsection