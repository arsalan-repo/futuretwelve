@extends('layouts.layout')

@section('title', 'All Withdraw Method')

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
                    <a href="#">Manage Method</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>All Method</span>
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
                            <i class="fa fa-desktop"></i> All Withdraw Method
                        </div>
                        <a href="{{ route('method-create') }}" class="btn btn-default pull-right" style="margin-top: 5px"><i class="fa fa-plus"></i> Add New Method</a>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-responsive" id="sample_2">
                            <thead>
                            <tr>
                                <th> #SL </th>
                                <th> Method Name </th>
                                <th> Rate </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                            @foreach($method as $curr)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i}}</td>
                                    <td>{{ $curr->name}}</td>
                                    <td>{{ $curr->rate}} USD</td>
                                    <td width="150px">
                                        <a href="{{ route('method-edit',$curr->id) }}" class="btn btn-primary"> Edit</a>

                                        {!! Form::open(['route'=>['method-destroy',$curr->id],'method'=>'DELETE']) !!}

                                        {!! Form::submit('Delete',['class'=>'btn btn-danger pull-right', 'onclick'=>'return confirm("Are You Sure..!");', 'style'=>'margin-top: -35px']) !!}

                                        {!! Form::close() !!}


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

    <script type="text/javascript">

    </script>

@endsection