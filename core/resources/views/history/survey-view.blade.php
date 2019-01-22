@extends('layouts.layout')

@section('title', 'All Survey')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Survey</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>All Survey</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">

        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">Survey about {{ $category->name }}</h2>
                <hr>
                @foreach($survey as $s)
                    <div class="survey">
                        <h3><b>Question : </b>{{ $s->question->question }}</h3>
                        <h4><b>Answer : </b>
                            @if($s->answer == 'first')
                                <i>{{ $s->question->first_option }}</i>
                            @elseif($s->answer == 'second')
                                <i>{{ $s->question->second_option }}</i>
                            @elseif($s->answer == 'third')
                                <i>{{ $s->question->third_option }}</i>
                            @elseif($s->answer == 'fourth')
                                <i>{{ $s->question->fourth_option }}</i>
                            @else
                                <i>{{ $s->question->fifth_option }}</i>
                            @endif
                        </h4>
                    </div>
                    <hr>
                @endforeach

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->

@endsection