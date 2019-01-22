@extends('layouts.layout')

@section('title', 'Create Exam Question')

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
                    <span>Create Question</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Create Exam Question
            <small> under Sub Category</small>
        </h1>
        <hr>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-pencil-square"></i> Create New Question</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'question.store']) !!}

                        <div class="form-group">
                            <label for="exampleInputName2"><h4>Survey Category: </h4></label>
                            <select name="question_cat_name" id="" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($scat as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2"><h4>Survey Question : </h4></label>
                            <input type="text" class="form-control" id="exampleInputName2" name="question" value="" placeholder="Question" required>
                        </div>

                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="exampleInputEmail2"><h4>First Option :</h4></label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="first_option" value="" placeholder="First Option" required>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="exampleInputEmail2"><h4>Second Option :</h4></label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="second_option" value="" placeholder="Second Option" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="exampleInputEmail2"><h4>Third Option :</h4></label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="third_option" value="" placeholder="Third Option">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="exampleInputEmail2"><h4>Fourth Option :</h4></label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="fourth_option" value="" placeholder="Fourth Option">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="exampleInputEmail2"><h4>Fifth Option :</h4></label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="fifth_option" value="" placeholder="Fifth Option">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 margin-top-20">
                                <a href="{{ route('question.index') }}" class="btn btn-success btn-block btn-lg"><i class="fa fa-eye"></i> View All Question</a>
                            </div>
                            <div class="col-sm-6  margin-top-20">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> Save Question</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->


@endsection