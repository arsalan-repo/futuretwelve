@extends('layouts.home')

@section('title', 'About Us')

@section('content')

    <!--Main Content Wrap Start-->
        <section>
            <div class="container">
                <div class="row about-sec">
                    <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                        <div class="col-sm-9 col-xl-4 p-b-30 m-lr-auto">
                            <h3>{{ $about->name }}</h3>
                            <hr>
                            <p>{!! $about->description  !!}</p>
                            <br>
                            <p>So, are you ready to join us and begin influencing your world?</p>
                        </div>
                        <span class="col-sm-1 m-lr-auto vl"></span>
                        <div class="col-sm-2 col-xl-4 p-b-30 m-lr-auto">
                            <img src="../images/about/sec1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="container">
                <div class="row about-sec2">
                    <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                        <div class="col-sm-3 col-xl-4 p-b-30 m-lr-auto">
                            <img src="../images/about/sec1.jpg" alt="">
                        </div>
                        <div class="col-sm-9 col-xl-4 p-b-30 m-lr-auto">
                            <div class="vl2"></div>
                            <h3>Who are Axamino Influencers?</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <br>
                            <p>So, are you ready to <a href="#">JOIN US</a> and begin influencing your world ready to <a href="#">JOIN US</a> and begin influencing your world?</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row about-sec3">
                    <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                        <div class="col-sm-3 col-xl-4 p-b-30 m-lr-auto">
                            <img src="../images/about/sec2.jpg" alt="">
                        </div>
                        <div class="col-sm-9 col-xl-4 p-b-30 m-lr-auto">
                            <div class="vl2"></div>
                            <h3>Who are Axamino Influencers?</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <br>
                            <p>So, are you ready to <a href="#">JOIN US</a> and begin influencing your world ready to <a href="#">JOIN US</a> and begin influencing your world?</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row about-sec4">
                    <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                        <div class="col-sm-3 col-xl-4 p-b-30 m-lr-auto">
                            <img src="../images/about/sec3.jpg" alt="">
                        </div>
                        <div class="col-sm-9 col-xl-4 p-b-30 m-lr-auto">
                            <div class="vl2"></div>
                            <h3>Who are Axamino Influencers?</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <br>
                            <p>So, are you ready to <a href="#">JOIN US</a> and begin influencing your world ready to <a href="#">JOIN US</a> and begin influencing your world?</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row about-sec6">
                    <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                        <div class="col-sm-9 col-xl-4 p-b-30 m-lr-auto">
                            <div class="vl3"></div>
                            <h3>Who are Axamino Influencers?</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <br>
                            <p>So, are you ready to join us and begin influencing your world?</p>
                        </div>
                        <div class="col-sm-2 col-xl-4 p-b-30 m-lr-auto">
                            <img src="../images/about/sec4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </section>
        <!--About Us Wrap End-->


        <!--Our Client Wrap Start-->
        <section>
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1">
                    <h3>Our Sponsors</h3>
                <hr>
                </div>
                <!--Main Heading Wrap End-->
                <!--Brand List Wrap Start-->
                <div class="gt_brand_carousel owl-carouse">
                    @foreach($partner as $p)
                        <div class="item">
                            <div class="gt_brand_outer_wrap">
                                <a href="#"><img src="{{ asset('extra-images') }}/{{ $p->image }}" alt="{{ $p->name }}"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Our Client Wrap End-->
    </div>

@endsection