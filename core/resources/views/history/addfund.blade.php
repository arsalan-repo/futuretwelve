@extends('layouts.layout')

@section('title', 'Add Fund History')

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
                    <span>Add Fund History</span>
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
                            <i class="fa fa-dollar"></i> Add Fund History
                        </div>
                   </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-responsive" id="sample_2">
                            <thead>
                            <tr>
                                <th> USER </th>
                                <th> TRXID </th>
                                <th> AMOUNT </th>
                                <th> Method </th>
                                <th> Time </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($about as $fund)
                                <tr>
                                    <td>{{ $fund->usr->name}}</td>
                                    <td>{{ $fund->trx }}</td>
                                    <td>{{ $fund->amount}} USD</td>
                                    <td>{{ $fund->method}}</td>
                                    <td>{{ date("Y-m-d h:i:s A" , $fund->tm) }}</td>
                                    <td>
                                      
                                    </td>
                                    
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                        </div>
                    </div>

                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->

    <script type="text/javascript">

    </script>

@endsection