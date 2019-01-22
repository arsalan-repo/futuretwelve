@extends('layouts.layout')

@section('title', 'Show Question')

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
                    <a href="#">Manage Question</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Question By Exam</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Question
            <small> under Exam Category</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-pencil-square"></i> Show Survey Question</h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <h4>{{ $question->question }}</h4>
                            <hr>
                            <div class="question_option">
                                <div class="row col-sm-4 col-sm-offset-4">
                                    <div class="pull-left">
                                        <h4>a. {{ $question->first_option }}</h4>
                                    </div>
                                </div>
                                <div class="row col-sm-4 col-sm-offset-4">
                                    <div class="pull-left">
                                        <h4>b. {{ $question->second_option }}</h4>
                                    </div>
                                </div>
                                @if($question->third_option != null)
                                    <div class="row col-sm-4 col-sm-offset-4">
                                        <div class="pull-left">
                                            <h4>c. {{ $question->third_option }}</h4>
                                        </div>
                                    </div>
                                @endif
                                @if($question->fourth_option != null)
                                    <div class="row col-sm-4 col-sm-offset-4">
                                        <div class="pull-left">
                                            <h4>d. {{ $question->fourth_option }}</h4>
                                        </div>
                                    </div>
                                @endif
                                @if($question->fifth_option != null)
                                    <div class="row col-sm-4 col-sm-offset-4">
                                        <div class="pull-left">
                                            <h4>e. {{ $question->fifth_option }}</h4>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-5 col-md-offset-1">
                                <a href="{{ route('question.index') }}" class="btn btn-success btn-lg"><i class="fa fa-eye"></i> View Question</a>
                            </div>
                            <div class="col-md-5">
                                <a href="{{ route('question_edit',$question->id) }}" class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i> Edit Question</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- END CONTENT BODY -->

    <script type="text/javascript">

    </script>

@endsection