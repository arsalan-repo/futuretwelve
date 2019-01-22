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
                    <a href="#">All User</a>
                    <i class="fa fa-circle"></i>
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
                
                @if (session()->has('message'))
                                            <div class="alert alert-success  !!} alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                {!! session()->get('message')  !!}
                                            </div>
                                        @endif


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Register Date</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0;@endphp
                            @foreach($users as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-Y',strtotime($p->created_at))  }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->username }}</td>
                                    <td>{{ $p->dob }}</td>
                                    <td>
                                        @if($p->gender == 1)
                                            <strong>Male</strong>
                                        @else
                                            <strong>Female</strong>
                                        @endif
                                    </td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->balance }} - USD</td>
                                    <td>
                                        @if($p->status == 0)
                                            <button type="button" class="btn btn-danger btn-sm delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{ $p->id }}">
                                                <i class='fa fa-user-times'></i> Block User
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success btn-sm delete_button1"
                                                    data-toggle="modal" data-target="#DelModal1"
                                                    data-id="{{ $p->id }}">
                                                <i class='fa fa-user-plus'></i> Unblock User
                                            </button>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->

        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-user-times'></i> Block !</h4>
                    </div>
                    <form method="post" action="{{ route('block-user') }}" class="form-horizontal">
                        <div class="modal-body">
                            <strong>Are you sure you want to Block This user ?</strong>
                        </div>

                        <div class="modal-footer">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" class="abir_id" value="0">

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Yes. Sure.</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="modal fade" id="DelModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-user-plus'></i> Unblock !</h4>
                    </div>

                    <div class="modal-body">
                        <strong>Are you sure you want to Unblock User ?</strong>
                    </div>

                    <div class="modal-footer">
                        <form method="post" action="{{ route('unblock-user') }}" class="form-inline">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" class="abir_id" value="0">

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Yes. Sure.</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- END CONTENT BODY -->



@endsection
@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button1', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection


