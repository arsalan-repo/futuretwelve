@extends('layouts.home')

@section('title', 'Exam Start')

@section('content')

        <!--Sub Banner Wrap Start -->
<div class="gt_sub_banner_bg default_width">
    <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
            <h3>My Result</h3>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">My Result</a></li>
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



{{ $result->subcat->name }}


                <table class="table-border table-bordered table-hover table-responsive text-center"
                       style="font-size: 24px;">
                    <thead>
                    <tr style="font-weight: bold;">
                        <td>Exam Name</td>
                        <td> Date </td>
                        <td> Action </td>
                    </tr>
                    </thead>
                    <tbody>


                

                    </tbody>
                </table>
            </div>
         


        </div>
    </section>
    <!--About Us Wrap End-->

</div>
<!--Main Content Wrap End-->


@endsection
