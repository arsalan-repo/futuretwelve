@extends('layouts.home')

@section('title', 'User Login')

@section('content')
    <section id="content" class="reg-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="msform">
                    {!! Form::open(['route'=>'user_login','method'=>'POST']) !!}
                    {!! csrf_field() !!}


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
                                <!--  ==================================VALIDATION ERRORS=================================  -->
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

                        <ul style="margin-left: 120px;" id="progressbar">
                            <li class="active">Step 1</li>
                            <li>Step 2</li>
                        </ul>
                        <fieldset>
                            <h2 class="fs-title">Sign in</h2>
                            <h3 class="fs-subtitle">to Continue to Survey</h3>
                            <input type="email" id="email" name="email" placeholder="Email"/>

                            <input type="button" id="name" name="next" class="next action-button" value="Next"/>
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Welcome</h2>
                            <h3 class="fs-subtitle">Enter Your Password</h3>
                            <input type="password" id="password" name="password" placeholder="Password" />

                            <button type="submit" class="log-btn" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                        </fieldset>
                    {!! Form::close() !!}

                        <div id="working"></div>
                        <div id="error"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
