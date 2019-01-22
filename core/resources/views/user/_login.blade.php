@extends('layouts.home')

@section('title', 'User Login')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row">

                    <div class="col-md-6 col-md-offset-3">

                        <div class="well well-lg nobottommargin">
                            {!! Form::open(['route'=>'user_login','method'=>'POST']) !!}

                                <h3>Login to your Account</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">

                                        @if(Session::has('success'))
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Success ..! </strong> {{ Session::get('success') }}
                                            </div>
                                        @elseif(Session::has('error'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error ..! </strong> {{ Session::get('error') }}
                                            </div>
                                        @endif

                                        <!--  ==================================SESSION MESSAGES==================================  -->
                                        @if (session()->has('message'))
                                            <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                {!! session()->get('message')  !!}
                                            </div>
                                        @endif
                                    <!--  ==================================SESSION MESSAGES==================================  -->


                                        <!--  ==================================VALIDATION ERRORS==================================  -->
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)

                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    {!!  $error !!}
                                                </div>

                                        @endforeach
                                    @endif
                                    <!--  ==================================SESSION MESSAGES==================================  -->

                                    </div>
                                </div>

                                <div class="col_full">
                                    <label for="login-form-username">Email:</label>
                                    <input id="email" name="email" class="form-control input-lg" type="email">
                                </div>

                                <div class="col_full">
                                    <label for="login-form-password">Password:</label>
                                    <input id="password" name="password" class="form-control input-lg" type="password">
                                </div>

                                {!! csrf_field() !!}

                                <div class="col_full nobottommargin">
                                    <button class="button btn btn-primary btn-block" style="margin-top: 15px;" id="login-form-submit"
                                            name="login-form-submit" value="login"><i class="fa fa-sign-in"></i> Login
                                    </button>
                                </div>
                                <br>
                                <p style="text-align: center;margin-bottom: 10px; font-weight: bold;">
                                    Don't Have An Account? <a style="color: red" href="{{ route('userregistration') }}"> Register Now </a> or
                                    <a style="color: red" href="{{ route('user-forget-password') }}">Forget Password</a>
                                </p>
                                <br>

                            {!! Form::close() !!}
                            <div id="working"></div>
                            <div id="error">
                            </div>


                        </div>

                    </div><!-- row -->

                </div>
            </div>
        </div>
    </section>

@endsection