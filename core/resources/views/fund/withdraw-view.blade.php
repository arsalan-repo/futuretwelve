@extends('layouts.layout')

@section('title', 'All Withdraw')

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
                    <a href="#">Manage Withdraw</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>All Withdraw Request</span>
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
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        <strong>Success : </strong>{{ Session::get('success') }}
                    </div>
            @endif
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-desktop"></i> All Withdraw
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-responsive" id="sample_2">
                            <thead>
                            <tr>
                                <th> SL# </th>
                                <th> Date </th>
                                <th> User Name </th>
                                <th> Balance </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($withdraw as $curr)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ date('d-F-Y',strtotime($curr->created_at)) }}</td>
                                    <td>{{ $curr->user->name}}</td>
                                    <td>{{ $curr->balance}} USD</td>
                                    <td>
                                        @if($curr->status == 0)
                                            <span class="label label-info">Pending</span>
                                        @elseif($curr->status == 1)
                                            <span class="label label-success">Success</span>
                                        @else
                                            <span class="label label-danger">Refunded</span>
                                        @endif
                                    </td>
                                    <td width="">
                                        @if($curr->status == 1 or $curr->status == 2)
                                            <span class="label label-success">No Action</span>
                                        @else
                                            <a href="{{ route('withdraw-submit',$curr->id) }}" class="btn btn-primary"> Submit</a>
                                            <a href="{{ route('withdraw-refund',$curr->id) }}" class="btn btn-danger"> Refunded</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $withdraw->links() }}
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