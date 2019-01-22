@extends('layouts.home')

@section('title', 'Survey category')

@section('content')
<div class="cont-col-siz">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-9 col-xs-12">
    			<div class="row main-nav">	
    				<div class="col-sm-12 col-xs-12">
    					<ul class="taks ">
    						<li class="tak-link" data-tab="tak-1"><b><i class="fas fa-poll fa-lg"></i>&nbsp; Poll</b></li>
    						<li class="tak-link" data-tab="tak-2"><b><i class="far fa-comments fa-lg"></i>&nbsp;Topic</b></li>
    						<li class="tak-link" data-tab="tak-3"><b><i class="far fa-thumbs-up fa-lg"></i>&nbsp;Thumb It</b></li>
    						<li class="tak-link" data-tab="tak-4"><b><i class="fas fa-prescription-bottle fa-lg"></i>&nbsp;Battle</b></li>
    					</ul>
    					<div id="tak-1" class="tab-content">
    						<div class="col-sm-12 col-xs-12">
    							<div class="row main-form">
    								<form name="formCreate" id="formCreate" method="post" action="#">
    									<div class="row form-row">
    							        	<div class="col-md-12">
    							            	<input name="msg" id="msg" type="text"  class="form-control" placeholder="Write an Anwer" value="">
    							          	</div>
    							        </div>
    							        <div class="row form-row">
    							        	<div class="col-md-12">
    							            	<input name="msg" id="msg" type="text"  class="form-control" placeholder="Write an Anwer" value="">
    							          </div>
    							        </div>
    							        <div class="row form-row">
    			                        	<div class="col-md-12">
    			                            	<input name="img" id="img" type="file"  class="form-control">
    			                          	</div>
    			                        </div>
    			                        <div class="form-actions">
    						                <button class="btn btn-success btn-cons" type="submit"><i class="fa fa-save"></i>Create </button>
    						            </div>
    								</form>							
    							</div>
    						</div>
    					</div>
    					<div id="tak-2" class="tab-content">
    						<div class="col-sm-12 col-xs-12">
    							<div class="row main-form">
    								<form name="formCreate" id="formCreate" method="post" action="#">
    							        <div class="row form-row">
    			                        	<div class="col-md-12">
    			                            	<input name="img" id="img" type="file" class="form-control">
    			                          	</div>
    			                        </div>
    							        <div class="row form-row">
    							        	<div class="col-md-12">
    							            	<textarea name="message" id="message" rows="8" class="form-control" placeholder="Your own Opinions"></textarea>
    							          </div>
    							        </div>
    			                        <div class="form-actions">
    						                <button class="btn btn-success btn-cons" type="submit"><i class="fa fa-save"></i>Create </button>
    						            </div>
    								</form>
    							</div>
    						</div>		
    					</div>
    					<div id="tak-3" class="tab-content">
    						<div class="col-sm-12 col-xs-12">
    							<div class="row main-form">
    								<form name="formCreate" id="formCreate" method="post" action="#">
    							        <div class="row form-row">
    			                        	<div class="col-md-12">
    			                        		<option value="">Image Upload</option>
    			                            	<input name="img" id="img" type="file" class="form-control">
    			                          	</div>
    			                        </div>
    			                        <div class="form-actions">
    						                <button class="btn btn-success btn-cons" type="submit"><i class="fa fa-save"></i>Create </button>
    						            </div>
    								</form>
    							</div>
    						</div>		
    					</div>
    					<div id="tak-4" class="tab-content">
    						<div class="col-sm-12 col-xs-12">
    							<div class="row main-form">
    								<form name="formCreate" id="formCreate" method="post" action="#">
    							        <div class="row form-row">
    			                        	<div class="col-md-12">
    			                        		<option value="">Image Upload</option>
    			                            	<input name="img" id="img" type="file" class="form-control">
    			                          	</div>
    			                        </div>
    			                        <div class="row form-row">
    			                        	<div class="col-md-12">
    			                        		<option value="">Multiple Image Upload</option>
    			                            	<input name="multifile[]" id="multifile" type="file" multiple class="form-control">
    			                          	</div>
    			                        </div>
    			                        <div class="row form-row">
    			                        	<div class="col-md-12">
    			                        		<option value="">Video Upload</option>
    			                            	<input name="video" id="video" type="file" class="form-control">
    			                          	</div>
    			                        </div>
    			                        <div class="form-actions">
    						                <button class="btn btn-success btn-cons" type="submit"><i class="fa fa-save"></i>Create </button>
    						            </div>
    								</form>
    							</div>
    						</div>		
    					</div>
    				</div>
    			</div>
    			<br>
    			<ul class="tabs">
    				<li class="tab-link current" data-tab="tab-1"><b>Recent</b></li>
    				<li class="tab-link" data-tab="tab-2"><b>Popular</b></li>
    				<li class="tab-link" data-tab="tab-3"><b>Recommended</b></li>
    			</ul>
    			<div id="tab-1" class="tab-content current">
    				<div class="col-sm-12 col-xs-12">
    					<div class="showContent row">
    						<div class="col-sm-2">
    							<a href=""><img src="../images/1.png" alt=""></a>
    							<div class="vl"></div>
    						</div>
    						<div class="col-sm-7">
    							<a href=""><h3>Jamil</h3></a>
    							<span>1 hours ago</span>
    							<h4><a href="">Jamil Jaffar Ali </a></h4>
    							<p><i class="far fa-thumbs-up fa-2x"></i>&nbsp;&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    						</div>
    						<div class="col-sm-3 showContent-img">
    							<img src="../images/comt.jpg" alt="">
    							<a href="#">Post</a>
    							<span>2 opinions</span>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div id="tab-2" class="tab-content">
    				<div class="col-sm-12 col-xs-12">
    					<div class="showContent row">
    						<div class="col-sm-2">
    							<img src="../images/1.png" alt="">
    							<div class="vl"></div>
    						</div>
    						<div class="col-sm-7">
    							<h3>Khurram</h3>
    							<span>3 hours ago</span>
    							<h4>Khurram Bhai </h4>
    							<p><i class="far fa-thumbs-up fa-2x"></i>&nbsp;&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    						</div>
    						<div class="col-sm-3 showContent-img">
    							<img src="../images/comt.jpg" alt="">
    							<a href="#">Vote!</a>
    							<span>2 opinions</span>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div id="tab-3" class="tab-content">
    				<div class="col-sm-12 col-xs-12">
    					<div class="showContent row">
    						<div class="col-sm-2">
    							<img src="../images/1.png" alt="">
    							<div class="vl"></div>
    						</div>
    						<div class="col-sm-7">
    							<h3>Ahsan </h3>
    							<span>5 hours ago</span>
    							<h4>Ahsan Bhai </h4>
    							<p><i class="far fa-thumbs-up fa-2x"></i>&nbsp;&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    						</div>
    						<div class="col-sm-3 showContent-img">
    							<img src="../images/comt.jpg" alt="">
    							<a href="#">Post</a>
    							<span>2 opinions</span>
    						</div>
    					</div>
    				</div>
    				<div class="col-sm-12 col-xs-12">
    					<div class="showContent row">
    						<div class="col-sm-2">
    							<img src="../images/1.png" alt="">
    							<div class="vl"></div>
    						</div>
    						<div class="col-sm-7">
    							<h3>Jamil</h3>
    							<span>1 hours ago</span>
    							<h4>Jamil Jaffar Ali </h4>
    							<p><i class="far fa-thumbs-up fa-2x"></i>&nbsp;&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    						</div>
    						<div class="col-sm-3 showContent-img">
    							<img src="../images/comt.jpg" alt="">
    							<a href="#">Post</a>
    							<span>2 opinions</span>
    						</div>
    					</div>
    				</div>
    			</div>




        <div class="gt_main_content_wrap">
            <!--About Us Wrap Start-->
            <section class="gt_about_bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="title text-center">
                                    <h4>Number Of Question : {{ $numq }}</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h4 class="title text-center">Survey : {{ $singleexam->name }}</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="title text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="filterable-item all ">
                                <div class="gt_latest_course2_wrap default_width">
                                    <figure>
                                        <img src="{{ asset('extra-images') }}/{{ $singleexam->image }}" alt="" style="width: 360px; height: 275px">
                                        <figcaption>
                                            <div class="course_price">
                                                @if($singleexam->price != 0)
                                                    @foreach($currency as $cr)
                                                        @if($singleexam->currency  == $cr->id )
                                                            {{ $cr->name }}{{ $singleexam->price }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{ "Free" }}
                                                @endif
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="gt_latest_course_des default_width">
                                        <h5><a href="#">{{ $singleexam->name }}</a></h5>
                                        <p>{{ $singleexam->description }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="apply" style="text-align: center; margin-bottom: 10px">
                                                <a href="{{ route('exam_confirm',$singleexam->id) }}" onclick="return confirm('Are You Ready For Start This Survey.');" class="btn btn-success btn-block btn-lg">Start Survey</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--About Us Wrap End-->
        </div>






    		</div>



    	<!-- Sidebar Section -->
    		<div class="col-sm-3 col-xs-12">
    			<div class="row sidebar-sec-1">
    				<div class="col-sm-4 col-xs-12">
    					<div class="row sidebar-sec-img">
    						<img src="../images/1.png" alt="">
    					</div>
    				</div>
    				<div class="col-sm-8 col-xs-12">
    					<div class="row items-1">
    						<h3><b>Jamil</b></h3>
    						<div class="col-sm-5 col-xs-12">
    							<div class="row items-sec-1">
    								<p>500 Points</p>
    							</div>
    						</div>
    						<div class="col-sm-7 col-xs-12">
    							<div class="row items-sec-2">
    								<p><i class="fas fa-gift"></i><br> Rewards</p>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-sm-12 col-xs-12">
    					<div class="row">
    						<div class="progress">
    						    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%">
    						      20% Complete (info)
    						    </div>
    						</div>
    					</div>
    				</div>
    				<div class="col-sm-12 col-xs-12">
    					<div class="row items-2">
    						<ul>
    							<li><b> Fill in your <a href="">Region</a>  »</b></li>
    							<li><b> Fill in your <a href="">Are you the primary grocery shopper for your household?</a>  »</b></li>
    							<li><b> Verify your email - <a href="">Resend</a>  »</b></li>
    							<hr>
    						</ul>
    					</div>
    				</div>
    				<div class="col-sm-12 col-xs-12">
    					<div class="row items-3">
    						<h4>Invite a Friend ?</h4><i class="far fa-map-marker-question"></i>
    						<p>https://pk.toluna.com/referral/jameel&nbsp;&nbsp;<span class="glyphicon glyphicon-duplicate"></span></p>
    					    <span>Share on <a href=""><i class="fab fa-facebook-square fa-2x"></i></a>&nbsp;&nbsp;<a href=""><i class="fab fa-twitter-square fa-2x"></i></a></span><br><br>
                        </div>
    				</div>
    			</div>
    			<div class="col-sm-12 col-xs-12">
    				<div class="row">
    					<div class="row sidebar-sec-2">
    						<h5>LATEST NEWS</h5>
    						<hr>
    						<p><b>Did you know we have a Facebook page?</b></p>
    						&nbsp;&nbsp;
    						<p>♣ Follow us on Facebook  to continue engaging with your community and participate in special contests!</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection()