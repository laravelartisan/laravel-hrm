@inject('formName','Erp\Forms\LoginForm')

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ERP Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{!! asset('theme_components/form-1/assets/bootstrap/css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('theme_components/form-1/assets/font-awesome/css/font-awesome.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('theme_components/form-1/assets/css/form-elements.css') !!}">
        <link rel="stylesheet" href="{!! asset('theme_components/form-1/assets/css/style.css') !!}">


    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>ERP</strong> {{ trans('login.login') }}</h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Log onto your panel</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {!! Form::open(['url' => 'auth/signin', 'class'=>'login-form']) !!}

                                    {!! formFields($formName)  !!}

			                    {!! Form::close() !!}
		                    </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>

    </body>

</html>