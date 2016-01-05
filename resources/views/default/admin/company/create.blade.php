@inject('cgroup', 'Erp\Models\Company\CompanyGroup')



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
                        <span class="glyphicon glyphicon-user " aria-hidden="true"></span>{{ strtoupper($viewType) }}
                    </div>
                    <div class="col-md-6 snt">
                        <ul class="breadcrumb text-right">
                            <li>
                                <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
                                <a href="#">Dashboard</a></li>
                            <li class="active">{{ strtoupper($viewType) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!--row-->
        <div class="inner-box">
            <div class="row margin-top-area">
                <div class="col-md-8 snt form-horizontal">



                    {!! Form::open(array('url' => 'company/add', 'files' => true, 'id'=>'create-form')) !!}

                    <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                        {!! Form::label('name','Company Name', ['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::text('name',null,['class'=>'form-control','required'=>'required']) !!}
                            {!!  $errors->first('name','<span class="help-block">:message</span>')   !!}
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('main_url')? 'has-error':'' }}">
                        {!! Form::label('main_url','Main URL', ['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::url('main_url',null,['class'=>'form-control']) !!}
                            {!!  $errors->first('main_url','<span class="help-block">:message</span>')   !!}
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('logical_url')? 'has-error':'' }}">
                        {!! Form::label('logical_url','Main URL', ['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::url('logical_url',null,['class'=>'form-control']) !!}
                            {!!  $errors->first('logical_url','<span class="help-block">:message</span>')   !!}
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('physical_url')? 'has-error':'' }}">
                        {!! Form::label('physical_url','Main URL', ['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::url('physical_url',null,['class'=>'form-control']) !!}
                            {!!  $errors->first('physical_url','<span class="help-block">:message</span>')   !!}
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('group_id')? 'has-error':'' }}">
                        {!! Form::label('group_id','Company Group', ['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10 ">

                            @foreach($cgroup->all() as $cgroup)

                                {{-- */$i[]=$cgroup->name;/* --}}


                            @endforeach
                            {!! Form::select('group_id', $i, null, ['class'=>'form-control']) !!}
                            {!!  $errors->first('group_id','<span class="help-block">:message</span>')   !!}
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