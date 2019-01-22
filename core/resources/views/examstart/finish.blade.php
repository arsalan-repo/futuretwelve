@extends('layouts.home')

@section('title', 'Survey Finish')

@section('content')

        <!--Sub Banner Wrap Start -->
<div class="gt_sub_banner_bg default_width">
    <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
            <h3>Survey Finish</h3>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Survey Finish</a></li>
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
                <div class="col-md-12">

                    <h3 style="text-align: center;">
                        {!! $message !!}
                    </h3>
                    <hr>
                    <h3 class="text-center">
                        {{$singleexam->price }} USD SuccessFully Added Your Account. <br>
                        Your Current Balance is : {{ $user_balance }} USD
                    </h3>
                </div>
            </div>
            <div class="row" style="margin-top: 15px">
                <div class="col-md-4 col-md-offset-2">
                    <a href="{{ route('home') }}" class="btn btn-lg btn-success btn-block">Go Home</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('exam') }}" class="btn btn-lg btn-primary btn-block">Another Exam</a>
                </div>
            </div>

        </div>
    </section>
    <!--About Us Wrap End-->

</div>
<!--Main Content Wrap End-->


@endsection
