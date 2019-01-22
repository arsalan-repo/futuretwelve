@extends('layouts.home')

@section('title', 'Index Page')

@section('content')

    <!--Banner Wrap Start-->
	<div class="container">
    <div class="gt_banner default_width">
        <div class="swiper-container" id="swiper-container">
            <ul class="swiper-wrapper">
                @foreach($sliders as $slider)
					 <li class="swiper-slide">
                    <img src="{{ asset('extra-images') }}/{{ $slider->name }}" alt="">
                    <div class="gt_banner_text gt_slide_1">
                        <h3>{{ $slider->small_text }}</h3>
                        <h2>{{ $slider->bold_text }}</h2>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
    </div>
	</div>
    <!--Banner Wrap End-->
<div col-md-10 col-sm-6 col-xs-4 >
    <div class="gt_main_content_wrap">
        <!--Banner Services Wrap Start-->
        {{-- <div class="gt_servicer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
        </div> --}}
        <!--Banner Services Wrap End-->

        <!--Offer Wrap start-->
        <!--<section class="gt_wht_offer_bg">-->
        <!--    <div class="container">-->
        <!--        <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">-->
        <!--            <h3>{{ $offer->title }}</h3>-->
        <!--            <hr>-->
        <!--            {{-- <span><img src="{{ asset('images/hdg-01.png') }}" alt=""></span> --}}-->
        <!--        </div>-->
                <!--What We Offer 2 Wrap Start-->
        <!--        <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">-->
        <!--            <div class="gt_wht_offer_wrap1">-->
        <!--                <div class="gt_wht_offer_des1">-->
        <!--                    <p class="lead" style="font-size: 18px">{!! $offer->description  !!} </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
                <!--What We Offer 2 Wrap End-->
        <!--    </div>-->
        <!--</section>-->
        
        
        <!--Banner Services Wrap End-->
        <section class="gt_wht_offer_bg">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                    <h2 style="font-family: open sans; text-align:center; font-weight:700;">{{ $offer->title }}</h2>
                    <hr style="margin-bottom:30px;">
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                    <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                    	<p style="margin-bottom:20px; text-align: center; color:#333333"><i class="fas fa-leaf fa-3x"></i></p>
                    	<h3 style="font-family: open sans;">Serves The Best</h3>
                    	<p style="text-align: center; font-family: open sans;">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                    	<p style="margin-bottom:20px; text-align: center; color:#333333"><i class="fas fa-rocket fa-3x"></i></p>
                    	<h3 style="font-family: open sans;">Simplifying Comlexity</h3>
                    	<p style="text-align: center; font-family: open sans;">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                    	<p style="margin-bottom:20px; text-align: center; color:#333333"><i class="fas fa-cog fa-3x"></i></p>
                    	<h3 style="font-family: open sans;">Customer Focusing</h3>
                    	<p style="text-align: center; font-family: open sans;">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
              </div>
            </div>
        </section>
        <!--offer Wrap End-->

        <!--Facts and Figure Wrap End-->
        <section class="fact_figure_bg">
            <div class="container">
                <div class="gt_hdg_1 white_hdg col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                    <h3>Our Company History</h3>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">{{ $subcategory }}</h2>
                            <span>Total Survey Category</span>
                        </div>
                        <span class="facts_border bg_1"></span>
                    </div>
                    <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">{{ $question }}</h2>
                            <span>Total Survey Question</span>
                        </div>
                        <span class="facts_border bg_2"></span>
                    </div>
                    <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">{{ $exam }}</h2>
                            <span>Total Survey</span>
                        </div>
                        <span class="facts_border bg_3"></span>
                    </div>

                </div>
            </div>
        </section>
        <!--Facts and Figure Wrap End-->






        <!--Popular Courses Wrap Start-->
        <section>
            <div class="container">
                <div class="gt_hdg_1">
                    <h3>Popular Survey</h3>
                    <hr>
                    {{-- <span><img src="{{ asset('images/hdg-01.png') }}" alt=""></span> --}}
                </div>
                <!--Popular Courses List Wrap Start-->
                <div id="filterable-item-holder-1">
                   @php
                        $i= 0;
                        @endphp
                        @foreach($category as $c )
                        <?php if($i == 3) break; ?>
                        <div class="col-sm-4 col-xl-4 p-b-30 m-lr-auto">
                            <!-- Block1 -->
                            <div class="block1 wrap-pic-w">
                                <img src="{{ asset('extra-images') }}/{{ $c->image }}" alt="IMG-BANNER">

                                <div class="block1-txt block-text-1 ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                    <div class="block1-txt-child1 flex-col-l">
                                        <span class="block1-name ltext-102 trans-04 p-b-8">
                                            {{ $c->name }}
                                        </span>

                                        <span class="block1-info stext-102 trans-04">
                                            {{ $c->description }}
                                        </span>
                                        <span class="block1-info stext-102 trans-04">
                                            Price: : @if($c->price != 0)
                                            @foreach($currency as $cr)
                                                @if($c->currency  == $cr->id )
                                                    {{ $cr->name }} {{ $c->price }}
                                                @endif
                                            @endforeach
                                        @else
                                            {{ "Free" }}
                                        @endif
                                        </span>
                                    </div>

                                    <div class="block1-txt-child2 p-b-4 trans-05">
                                        <div class="block1-link stext-101 cl0 trans-09">
                                            <a href="{{ route('exam_start',$c->id) }}" style="color: white;">Start Survey</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach

                </div>
                <div style="margin-top: 150px;" class="gt_view_more default_width">
                    <a href="{{ route('exam') }}">Show All</a>
                </div>
                <!--Popular Courses List Wrap End-->
            </div>
        </section>
        <!--Popular Courses Wrap End-->







        <!-- Section End -->
        <section>
            <div class=" main-service">
                <div class="col-sm-12 col-xl-4 p-b-30 m-lr-auto">
                    <div class="row service">
                        <h3>So, are you ready to begin<br> Survey your world?</h3>
                        <p>Click below to get started.</p><br>
                        <div class="button" align="center">
                            <a href="#">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="team" class="section wb">
                <div class="container">
                    <div class="section-title text-center">
                        <h3 style="font-family: Qwigley; font-size: 80px; text-transform: initial; ">Testimonials</h3>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($partner as $p)
                        <div class="col-sm-4 col-sm-6">
                            <div class="our-team">
                                <div class="team_img">
                                    <img src="{{ asset('extra-images') }}/{{ $p->image }}" alt="{{ $p->name }}">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">{{ $p->name }}</h3>
                                    <span class="post"></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>




        <!--Our Client Wrap End-->
    </div>
</div>

@endsection