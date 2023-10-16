  <!-- main-footer -->
  <footer class="main-footer">
      <div class="footer-top" style="background-image: url({{ $footer->image_url }});">
          <div class="auto-container">
              <div class="widget-section">
                  <div class="row clearfix">
                      <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                          <div class="footer-widget logo-widget">
                              <figure class="footer-logo"><a href="{{ route('home') }}"><img src="{{ $logo->image_url }}"
                                          alt=""></a>
                              </figure>
                              <div class="text">
                                  <p>{{ $footerData->introduction }}</p>
                              </div>
                              <ul class="social-links clearfix">
                                  <li><a href="{{ $footerData->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                                  </li>
                                  <li><a href="{{ $footerData->twitter_link }}"><i class="fab fa-twitter"></i></a></li>
                                  {{-- <li><a href="index.html"><i class="fab fa-instagram"></i></a></li> --}}
                                  {{-- <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li> --}}
                                  <li><a href="{{ $footerData->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                          <div class="footer-widget links-widget ml-70">
                              <div class="widget-title">
                                  <h3>Services</h3>
                              </div>
                              <div class="widget-content">
                                  <ul class="links-list clearfix">
                                      <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                      <li><a href="{{ route('about') }}">About Us</a></li>
                                      <li><a href="{{ route('programs') }}">Programs</a></li>
                                      <li><a href="{{ route('subscriptions') }}">Subscription</a></li>
                                      <li><a href="{{ route('allCourses') }}">All Courses</a></li>
                                      {{-- <li><a href="index.html">Our Blog</a></li> --}}
                                      {{-- <li><a href="index.html">Contact Us</a></li> --}}
                                  </ul>
                              </div>
                          </div>
                      </div>
                      {{-- <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                          <div class="footer-widget post-widget">
                              <div class="widget-title">
                                  <h3>Top News</h3>
                              </div>
                              <div class="post-inner">
                                  <div class="post">
                                      <figure class="post-thumb">
                                          <img src="{{ $footer->image_url }}" alt="">
                                          <a href="{{ route('blogs') }}"><i class="fas fa-link"></i></a>
                                      </figure>
                                      <h5><a href="{{ route('blogs') }}">The Added Value Social Worker</a></h5>
                                      <p>Mar 25, 2020</p>
                                  </div>
                                  <div class="post">
                                      <figure class="post-thumb">
                                          <img src="{{ $footer->image_url }}" alt="">
                                          <a href="{{ route('blogs') }}"><i class="fas fa-link"></i></a>
                                      </figure>
                                      <h5><a href="{{ route('blogs') }}">Ways to Increase Trust</a></h5>
                                      <p>Mar 24, 2020</p>
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                      <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                          <div class="footer-widget contact-widget">
                              <div class="widget-title">
                                  <h3>Contacts</h3>
                              </div>
                              <div class="widget-content">
                                  <ul class="info-list clearfix">
                                      <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          {{ $footerData->address }}
                                      </li>
                                      <li>
                                          <i class="fas fa-microphone"></i>
                                          <a href="tel:23055873407">{{ $footerData->mobile_1 }}</a>
                                      </li>
                                      <li>
                                          <i class="fas fa-envelope"></i>
                                          <a href="mailto:info@example.com">{{ $footerData->mobile_2 }}</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <div class="auto-container">
              <div class="footer-inner clearfix">
                  <div class="copyright pull-left">
                      <p><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a> &copy;
                          {{ $footerData->copy_right }}</p>
                  </div>
                  <ul class="footer-nav pull-right clearfix">
                      <li><a href="{{ route('about') }}">About Us</a></li>
                      <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <!-- main-footer end -->
