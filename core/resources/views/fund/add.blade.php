@extends('layouts.home')

@section('title', 'Withdraw Balance')

@section('content')

    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
        <div class="container">
            <div class="gt_sub_banner_hdg  default_width">
                <h3>Withdraw Balance</h3>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="#">Withdraw Balance</a></li>
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
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-center">Current Balance is : {{ Auth::guard('user')->user()->balance }} USD</h3>
                        <hr>
                        @if(Session::has('success'))
                            <div class="alert alert-info">
                                <strong>Success : </strong>{{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <strong>Warning : </strong>{{ Session::get('error') }}
                            </div>
                        @endif
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <strong>Error: </strong>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route'=>'withdraw-request']) !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Withdraw Method</h4>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="method_id" id="" class="form-control" required>
                                            <option value="">Select One</option>
                                            @foreach($method as $m)
                                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Withdraw Balance</h4>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" required style="border: 1px solid #ddd" name="balance"  class="form-control" placeholder="Enter WithDraw Balance.">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-success btn-block">Withdraw Request</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                                <hr>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdraw as $w)
                                    <tr>
                                        <th>{{ date('d-F-Y',strtotime($w->created_at)) }}</th>
                                        <th>{{ $w->balance }} USD</th>
                                        <th>
                                            @if($w->status == 0)
                                                <span class="label label-info label-lg">Pending</span>
                                            @elseif($w->status == 1)
                                                <span class="label label-success">Success</span>
                                            @else
                                                <span class="label label-danger">Refunded</span>
                                            @endif
                                        </th>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
        </section>
        <!--About Us Wrap End-->

    </div>
    <!--Main Content Wrap End-->


@endsection