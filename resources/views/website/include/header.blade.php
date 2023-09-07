 <!-- main header -->
 <header class="main-header">

     <!-- header-lower -->
     <div class="header-lower">
         <div class="auto-container">
             <div class="outer-box">
                 <div class="logo-box">
                     <figure class="logo"><a href="index.html"><img src="{{ asset('website/assets/images/logo.png') }}"
                                 alt=""></a></figure>
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
                                 <li class="current dropdown"><a href="index.html">Home</a>
                                     <ul>
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
                                     </ul>
                                 </li>
                                 <li class="dropdown"><a href="index.html">Categories</a>
                                     <ul>
                                         <li><a href="category.html">All Category</a></li>
                                         <li><a href="category-details.html">Category Details</a></li>
                                     </ul>
                                 </li>
                                 <li class="dropdown"><a href="index.html">Browse Ads</a>
                                     <ul>
                                         <li><a href="browse-ads-1.html">Browse Ads Grid</a></li>
                                         <li><a href="browse-ads-2.html">Browse Ads List</a></li>
                                         <li><a href="browse-ads-3.html">Grid Half</a></li>
                                         <li><a href="browse-ads-4.html">List Half</a></li>
                                         <li><a href="browse-ads-details.html">Browse Ads Details</a></li>
                                     </ul>
                                 </li>
                                 <li class="dropdown"><a href="index.html">Pages</a>
                                     <ul>
                                         <li><a href="about.html">About Us</a></li>
                                         <li><a href="stores.html">Our Stores</a></li>
                                         <li><a href="stores-details.html">Stores Details</a></li>
                                         <li><a href="faq.html">Faq'S</a></li>
                                         <li><a href="pricing.html">Pricing Table</a></li>
                                         <li><a href="login.html">Login Page</a></li>
                                         <li><a href="signup.html">Signup Page</a></li>
                                         <li><a href="contact.html">Contact Us</a></li>
                                         <li><a href="error.html">404</a></li>
                                     </ul>
                                 </li>
                                 <li class="dropdown"><a href="index.html">Elements</a>
                                     <div class="megamenu">
                                         <div class="row clearfix">
                                             <div class="col-xl-6 column">
                                                 <ul>
                                                     <li>
                                                         <h4>Elements 1</h4>
                                                     </li>
                                                     <li><a href="about-element.html">About Block</a></li>
                                                     <li><a href="category-element-1.html">Category Block 01</a>
                                                     </li>
                                                     <li><a href="category-element-2.html">Category Block 02</a>
                                                     </li>
                                                     <li><a href="category-element-3.html">Category Block 03</a>
                                                     </li>
                                                     <li><a href="place-element-1.html">Place Block 01</a></li>
                                                     <li><a href="place-element-2.html">Place Block 02</a></li>
                                                     <li><a href="news-element-1.html">News Block 01</a></li>
                                                     <li><a href="news-element-2.html">News Block 02</a></li>
                                                 </ul>
                                             </div>
                                             <div class="col-xl-6 column">
                                                 <ul>
                                                     <li>
                                                         <h4>Elements 2</h4>
                                                     </li>
                                                     <li><a href="feature-element-1.html">Feature Block 01</a>
                                                     </li>
                                                     <li><a href="feature-element-2.html">Feature Block 02</a>
                                                     </li>
                                                     <li><a href="Process-element-1.html">Process Block 01</a>
                                                     </li>
                                                     <li><a href="Process-element-2.html">Process Block 02</a>
                                                     </li>
                                                     <li><a href="testimonial-element.html">Testimonial
                                                             Block</a></li>
                                                     <li><a href="clients-element.html">Clients Block</a></li>
                                                     <li><a href="newsletter-element.html">Newsletter Block</a>
                                                     </li>
                                                     <li><a href="chooseus-element.html">Chooseus Block</a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="dropdown"><a href="index.html">Blog</a>
                                     <ul>
                                         <li><a href="blog.html">Blog Grid</a></li>
                                         <li><a href="blog-2.html">Blog Standard</a></li>
                                         <li><a href="blog-details.html">Blog Details</a></li>
                                     </ul>
                                 </li>
                             </ul>
                         </div>
                     </nav>
                 </div>
                 <div class="btn-box">
                     {{-- <a href="browse-ads-details.html" class="theme-btn-one"><i class="icon-1"></i>Submit
                         Ads</a> --}}
                     <a href="{{ route('login') }}" class="theme-btn-one"><i class="icon-1"></i>Login</a>
                 </div>
             </div>
         </div>
     </div>

     <!--sticky Header-->
     <div class="sticky-header">
         <div class="auto-container">
             <div class="outer-box">
                 <div class="logo-box">
                     <figure class="logo"><a href="index.html"><img
                                 src="{{ asset('website/assets/images/logo.png') }}" alt=""></a></figure>
                 </div>
                 <div class="menu-area">
                     <nav class="main-menu clearfix">
                         <!--Keep This Empty / Menu will come through Javascript-->
                     </nav>
                 </div>
                 <div class="btn-box">
                     <a href="browse-ads-details.html" class="theme-btn-one"><i class="icon-1"></i>Submit
                         Ads</a>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- main-header end -->
