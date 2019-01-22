
<header>
    <div class="gt_top3_wrap default_width">
        <div class="container">
            <div class="gt_top3_scl_icon">
                <ul class="gt_hdr3_scl_icon">
                    <li><a href="{{ $social->facebook }}"><i class="fab fa-facebook fa-2x"></i></a></li>
                    <li><a href="{{ $social->twitter }}"><i class="fab fa-twitter fa-2x"></i></a></li>
                    <li><a href="{{ $social->google_plus }}"><i class="fab fa-google-plus fa-2x"></i></a></li>
                    <li><a href="{{ $social->linkedin }}"><i class="fab fa-linkedin fa-2x"></i></a></li>
                    <li><a href="{{ $social->youtube }}"><i class="fab fa-youtube fa-2x"></i></a></li>
                </ul>
            </div>
            <div class="gt_hdr_3_ui_element">
                <ul>
                    <li><i class="fa fa-phone"></i>{{ $contact->number }}</li>
                    <li><i class="far fa-envelope"></i>{{ $contact->email }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="gt_top3_menu default_width">
        <div class="container">
            <div class="gt-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('images') }}/{{ $logo->name }}" alt=""></a>
            </div>
            <nav class="gt_hdr3_navigation">
                <!-- Responsive Buttun -->
                <a class="navbar-btn collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!-- Responsive Buttun -->
                <ul class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ Request::is('about-us') ? "active" : "" }}"><a href="{{ route('about_us') }}">About Us</a></li>
                    <li><a href="{{ route('exam') }}">Survey Category</a>
                        <ul>
                            @foreach($category as $c)
                                <li><a href="{{ route('exam_id',$c->id) }}">{{ $c->name }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="{{ Request::is('contact-us') ? "active" : "" }}"><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    @if( Session::get('user') != "user" )
                    <li><a href="{{ route('userlogin') }}"><i class="fas fa-sign-in-alt"></i>&nbsp; Log In</a></li>
                    <li><a href="{{ route('userregistration') }}"><i class="fa fa-user-plus"></i>&nbsp; Registration</a></li>
                    @else
                        <li><a href="#">Hi. {{ Auth::guard('user')->user()->name }}</a>
                            <ul>
                                <li><a href="{{ route('add_fund') }}">BALANCE [ {{ Auth::guard('user')->user()->balance }} USD ]</a></li>
                                <li><a href="{{ route('my_exams') }}">My Survey</a></li>
                                <li><a href="{{ route('edit-profile') }}">Edit Profile</a></li>
                                <li><a href="{{ route('change-password') }}">Change Password</a></li>
                                <li><a href="{{ route('user-logout') }}">Log Out</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>