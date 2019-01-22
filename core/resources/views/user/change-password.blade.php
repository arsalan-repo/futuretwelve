@extends('layouts.home')

@section('title', 'User Login')

@section('content')

    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
        <div class="container">
            <div class="gt_sub_banner_hdg  default_width">
                <h3>Change Password</h3>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="#">Change Password</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--Sub Banner Wrap End -->

    <!--Main Content Wrap Start-->
    <div class="gt_main_content_wrap">
        <!--About Us Wrap Start-->
        <section class="gt_about_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if (session()->has('message'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Success ..! </strong> {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Error ..! </strong> {{ Session::get('error') }}
                            </div>
                        @elseif(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4 class="text-center"><strong>Error ..! </strong> You have Something Error.</h4>
                                <ul class="text-center">
                                    @foreach($errors->all() as $error)
                                        <li><p style="color: red">{!! $error !!}</p></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <div class="gt_about_wrap">
                            <h4 class="title text-center">Change Password</h4>
                            {!! Form::open() !!}
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <h5>Current Password : </h5>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" value="" name="c_password" placeholder="Current Password" id="" class="form-control" style="border: 1px solid greenyellow" required>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 5px">
                                <div class="col-md-3 text-right">
                                    <h5> New Password : </h5>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" value="" name="password" placeholder="New Password" id="" class="form-control" style="border: 1px solid greenyellow" required>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 5px">
                                <div class="col-md-3 text-right">
                                    <h5> Confirm Password : </h5>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" value="" name="password_confirmation" placeholder="Confirm Password" id="" class="form-control" style="border: 1px solid greenyellow" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <input type="submit" value="Update Password" class="btn btn-success btn-block" style="margin-top: 10px">
                                </div>

                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Us Wrap End-->

    </div>
    <!--Main Content Wrap End-->


@endsection