@extends('default.admin.layouts.master')


@section('head')
    {!! Html::style('css/styles.css') !!}
@endsection



@section('content')
    <div class="container-fluid" style="min-height: 1215px;">
        <div class="row">
            <div class="col-md-12">
                <div class="view-header">
                    <div class="col-md-6">                     
                         <button class="btn btn-warning"><span class="fa fa-print"></span> Print </button>
                         <button class="btn btn-warning"><span class="fa fa-file"></span> PDF Preview </button>
                         <button class="btn btn-warning"><span class="fa fa-file"></span> Edit</button>
                         <button class="btn btn-warning"><span class="fa fa-file"></span> Send Pdf to Mail </button> 
                    </div>
                    <div class="col-md-6 view">
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

        <div class="row margin-top-area">
            <div class="col-md-12 view">
               
               <table class="table table-bordered table-hover table-responsive view-table-holder">
                    <thead>
                       <tr class="th-bg ">
                           <th colspan="4" class="text-center"> 
                               <div class="view-picture">
                                <span class="glyphicon glyphicon-user fa-man img-circle" aria-hidden="true"></span>
                               </div>
                            </th> 
                        </tr>
                         <tr class="th-bg">
                           <th colspan="4" class="text-center">  
                               <div class="view-name">{{ $userProfile->translate($locale)? $userProfile->first_name.' '.$userProfile->last_name:$userProfile->translate($defaultLocale)->first_name.' '.$userProfile->translate($defaultLocale)->last_name }}</div>
                           </th> 
                        </tr>
                        <tr class="th-bg">
                           <th colspan="4" class="text-center">{{ $userProfile->email }}</th> 
                        </tr>
                          
                   </thead>

                   <tbody>
                        <tr>
                           <td colspan="4">
                             <h3 class="nomargin"> Personal Information</h3>
                           </td>                                                  
                       </tr>

                       <tr>
                           <td>Department </td>
                           <td> {{ $userProfile->department->name  }}</td>
                       </tr>
                        <tr>
                           <td> Address</td>
                           <td> {{ $userProfile->address }}</td>
                                                   
                       </tr>
                       <tr>

                           <td> Gender </td>
                           <td> {{ $userProfile->gender->translate($locale)?$userProfile->gender->gender_name:$userProfile->gender->translate($defaultLocale)->gender_name  }}</td>
                                                     
                       </tr>
                       <tr>
                           <td> Religion </td>
                           <td> {{ $userProfile->religion->name }}</td>
                       </tr>
                       <tr>
                           <td> Phone</td>
                           <td> {{ $userProfile->phone }}</td>                         
                                                     
                       </tr>

                       <tr>
                           <td> Username</td>
                           <td>   {{ $userProfile->username }}</td>                         
                                                     
                       </tr>
                       

                   </tbody>
               </table> 
            </div>
            <div class="clearfix"></div>
        </div>

    </div>



@endsection


