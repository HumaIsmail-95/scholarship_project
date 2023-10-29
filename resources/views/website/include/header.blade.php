 <!-- main header -->
 <header class="main-header">

     <!-- header-lower -->
     <div class="header-lower">
         <div class="auto-container">
             <div class="outer-box">
                 <div class="logo-box p-0">
                     <figure class="logo"><a href="{{ route('home') }}"><img style="width:100px;"
                                 src="{{ $logo->image_url }}" alt=""></a></figure>
                 </div>
                 <div class="menu-area">
                     <!--Mobile Navigation Toggler-->
                     <div class="mobile-nav-toggler">
                         <i class="icon-bar"></i>
                         <i class="icon-bar"></i>
                         <i class="icon-bar"></i>
                     </div>
                     <nav class="main-menu navbar-expand-md navbar-light">
                         <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                             <ul class="navigation clearfix">
                                 <li class="@if (Route::currentRouteName() == 'home') current @endif "><a
                                         href="{{ route('home') }}">Home</a>
                                     {{-- <ul>
                                         <li><a href="index.html">Home Page 01</a></li>
                                         <li><a href="index-2.html">Home Page 02</a></li>
                                         <li><a href="index-3.html">Home Page 03</a></li>
                                         <li><a href="index-4.html">Home Page 04</a></li>
                                         <li><a href="index-5.html">Home Page 05</a></li>
                                         <li><a href="index-6.html">Home Page 06</a></li>
                                         <li><a href="index-onepage.html">OnePage Home</a></li>
                                         <li><a href="index-rtl.html">RTL Home</a></li>
                                         <li class="dropdown"><a href="index.html">Header Style</a>
                                             <ul>
                                                 <li><a href="index.html">Header Style 01</a></li>
                                                 <li><a href="index-2.html">Header Style 02</a></li>
                                                 <li><a href="index-3.html">Header Style 03</a></li>
                                                 <li><a href="index-4.html">Header Style 04</a></li>
                                             </ul>
                                         </li>
                                     </ul> --}}
                                 </li>
                                 <li class="dropdown"><a href="{{ route('allCourses') }}">Courses</a>
                                     <ul>
                                         @foreach ($disciplines as $discipline)
                                             <li><a
                                                     href="{{ route('programs', ['discipline_id' => $discipline->id]) }}">{{ $discipline->name }}</a>
                                             </li>
                                         @endforeach
                                     </ul>
                                 </li>
                                 <li class="dropdown"><a href="{{ route('allDegrees') }}">Degrees</a>
                                     <ul>
                                         @foreach ($degrees as $degree)
                                             <li><a
                                                     href="{{ route('programs', ['degree_id' => $degree->id]) }}">{{ $degree->name }}</a>
                                             </li>
                                         @endforeach
                                     </ul>
                                 </li>
                                 <li class=""><a href="{{ route('subscriptions') }}">Subscription</a>
                                 </li>
                                 <li class=""><a href="{{ route('programs') }}">Programs</a>
                                 </li>
                                 <li class=""><a href="{{ route('about') }}">About Us</a>
                                 </li>
                                 <li class=""><a href="{{ route('blogs') }}">Blog</a>
                                 </li>
                             </ul>
                         </div>
                     </nav>
                 </div>
                 <div class="btn-box">
                     @if (Auth::user())
                         <a href="{{ route('dashboard') }}" class="theme-btn-one">Hi
                             {{ Auth::user()->name }}</a>
                     @else
                         <a href="{{ route('login') }}" class="theme-btn-one"><i class="icon-1"></i>Login</a>
                     @endif
                 </div>
             </div>
         </div>
     </div>

     <!--sticky Header-->
     <div class="sticky-header">
         <div class="auto-container">
             <div class="outer-box">
                 <div class="logo-box">
                     <figure class="logo"><a href="{{ route('home') }}"><img style="width:60px"
                                 src="{{ $logo->image_url }}" alt=""></a>
                     </figure>
                 </div>
                 <div class="menu-area">
                     <nav class="main-menu clearfix">
                         <!--Keep This Empty / Menu will come through Javascript-->
                     </nav>
                 </div>
                 <div class="btn-box">
                     @if (Auth::user())
                         <a href="{{ route('dashboard') }}" class="theme-btn-one">Hi
                             {{ Auth::user()->name }}</a>
                     @else
                         <a href="{{ route('login') }}" class="theme-btn-one"><i class="icon-1"></i>Login</a>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- main-header end -->
