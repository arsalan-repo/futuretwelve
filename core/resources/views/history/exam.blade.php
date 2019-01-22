@extends('layouts.layout')

@section('title', 'All Survey History')

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
                    <a href="#">History</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>All Survey History</span>
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
            <div class="col-md-12">


                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-glob"></i> Survey History
                        </div>
                   </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-responsive" id="sample_2">
                            <thead>
                            <tr>
                                <th> USER </th>
                                <th> Survey </th>
                                <th> Time </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($survey as $s)
                                <tr>
                                    <td>{{ $s->usr->name}}</td>
                                    <td>{{ $s->subcat->name }}</td>
                                    <td>{{ date("d-F-Y h:i:s A" , strtotime($s->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('survey-view',$s->category_id) }}" class="btn btn-primary">View Survey</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->

@endsection