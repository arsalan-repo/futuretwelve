@extends('layouts.home')

@section('title', 'Survey Confirm')

@section('content')

        <!--Sub Banner Wrap Start -->
<div class="gt_sub_banner_bg default_width">
    <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
            <h3>Survey Start</h3>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Survey Start</a></li>
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
                    <div class="col-md-4">
                        <div class="title text-center">
                            <h4>Number of Question : {{ $num_Q }}</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <h4 class="title text-center">Survey : {{ $singleexam->name }}</h4>
                        </div>
                    </div>
                    <div class="clock" style="margin:2px;overflow: hidden;"></div>
                    <div class="col-md-4">
                        <div class="title text-center">

                        </div>
                    </div>
                </div>
            </div>


            <div class="row" style="margin-top: 40px;">


                <h3 style="text-align: center;">{!! $message !!}</h3>

                <div class="alert alert-info" role="alert">
                    {!! $minfo !!}
                    <meta http-equiv='refresh' content='9;url={{ route('lets_exam',$id) }}'>
                </div>


            </div>


    </section>
    <!--About Us Wrap End-->


</div>
<!--Main Content Wrap End-->

@endsection


@section('scripts')

    <script src="{{ asset('js/jquery.countdown.js') }}"></script>

    <script>

        $(function () {

            var note = $('#note'),

                    ts = (new Date()).getTime() + 10 * 1000;

            $('#countdown').countdown({
                timestamp: ts,
                callback: function (days, hours, minutes, seconds) {

                    var message = "";

                    message += seconds + " SECOND" + ( seconds == 1 ? '' : 'S' ) + " <br />";


                    note.html(message);
                }
            });

        });


    </script>

@endsection

