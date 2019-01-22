@extends('layouts.home')

@section('title', 'Survey Started')

@section('content')




    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
        <div class="container">
            <div class="gt_sub_banner_hdg  default_width">
                <h3>Survey Running</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Survey Running</a></li>
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

                    <div class="col-md-4 col-md-offset-4">
                        <div class="text-center">
                            <h4 class="title text-center">Survey : {{ $singleexam->name }}</h4>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="text-center">
                            <strong style="color: red;"> YOU HAVE TO FINISH SURVEY AND PRESS FINISH SURVEY BUTTON. OTHERWISE
                                YOUR SURVEY WILL NOT BE EVALUATED </strong>
                        </div>
                    </div>
                </div>


                <hr>
                {{ Form::open() }}
                @foreach($question as $q)

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4 class="text-center">Question : {{ $q->question }}</h4>
                            <hr>
                            <div class="question" style="overflow: hidden;margin-top: 10px">
                                <div class="col-md-6 col-md-offset-2">
                                    <label for="exampleInputEmail2"><h5>(a) : {{ $q->first_option }}</h5></label>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio"
                                         style="margin-top: -5px!important; margin-right: 30px!important;">
                                        <label>
                                            <input type="radio" class="form-control" name="{{ $q->id }}" id=""
                                                   value="first" required>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="question" style="overflow: hidden;margin-top: 10px">
                                <div class="col-md-6 col-md-offset-2">
                                    <label for="exampleInputEmail2"><h5>(b) : {{ $q->second_option }}</h5></label>
                                </div>
                                <div class="col-md-2">
                                    <div class="radio"
                                         style="margin-top: -5px!important; margin-right: 30px!important;">
                                        <label>
                                            <input type="radio" class="form-control" name="{{ $q->id }}" id=""
                                                   value="second" required>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if($q->third_option != NULL)
                                <div class="question" style="overflow: hidden;margin-top: 10px">
                                    <div class="col-md-6 col-md-offset-2">
                                        <label for="exampleInputEmail2"><h5>(c) : {{ $q->third_option }}</h5></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"
                                             style="margin-top: -5px!important; margin-right: 30px!important;">
                                            <label>
                                                <input type="radio" class="form-control" name="{{ $q->id }}" id=""
                                                       value="third" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($q->fourth_option != null)
                                <div class="question" style="overflow: hidden;margin-top: 10px">
                                    <div class="col-md-6 col-md-offset-2">
                                        <label for="exampleInputEmail2"><h5>(d) : {{ $q->fourth_option }}</h5></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"
                                             style="margin-top: -5px!important; margin-right: 30px!important;">
                                            <label>
                                                <input type="radio" class="form-control" name="{{ $q->id }}" id=""
                                                       value="fourth" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($q->fifth_option)
                                <div class="question" style="overflow: hidden;margin-top: 10px">
                                    <div class="col-md-6 col-md-offset-2">
                                        <label for="exampleInputEmail2"><h5>(e) : {{ $q->fifth_option }}</h5></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"
                                             style="margin-top: -5px!important; margin-right: 30px!important;">
                                            <label>
                                                <input type="radio" class="form-control" name="{{ $q->id }}" id=""
                                                       value="fifth" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="apply" style="text-align: center; margin-bottom: 10px">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Finish Survey</button>

                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </section>
        <!--About Us Wrap End-->

    </div>
    <!--Main Content Wrap End-->



@endsection





