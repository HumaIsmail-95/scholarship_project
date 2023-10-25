 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                         aria-expanded="false">
                         {{-- <img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user-img"
                             class="img-circle"> --}}
                         <span class="hide-menu">{{ Auth::user()->name }}</span></a>
                     <ul aria-expanded="false" class="collapse">
                         @if (Auth::user()->type == 'admin' || Auth::user()->type == 'super-admin')
                             <li><a href="{{ route('admin.profile') }}"><i class="ti-user"></i> My Profile</a></li>
                         @else
                             <li><a href="{{ route('profile') }}"><i class="ti-user"></i> My Profile</a></li>
                         @endif
                         <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                     </ul>
                 </li>
                 {{-- <li class="nav-small-cap">--- PERSONAL</li> --}}
                 {{-- <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.permissions.index') }}"
                         aria-expanded="false"><i class="fa fa-bars"></i><span
                             class="hide-menu">Permissions123</span></a>
                 </li> --}}
                 @can('list-role')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.roles.index') }}"><i
                                 class=" fas fa-users"></i><span class="hide-menu">Roles</span></a>
                     </li>
                 @endcan
                 @can('list-permission')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.permissions.index') }}"><i
                                 class=" fas fa-key"></i><span class="hide-menu">Permissions</span></a>
                     </li>
                 @endcan
                 @can('list-user')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.users.index') }}"><i
                                 class="fas fa-user-plus"></i><span class="hide-menu">Users</span></a>
                     </li>
                 @endcan
                 @can('list-degree')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.degrees.index') }}"><i
                                 class=" fas fa-newspaper"></i><span class="hide-menu">Degrees</span></a>
                     </li>
                 @endcan
                 @can('list-discipline')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.disciplines.index') }}"><i
                                 class=" fas fa-address-book"></i><span class="hide-menu">Disciplines</span></a>
                     </li>
                 @endcan
                 @can('list-study-model')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.study-models.index') }}"><i
                                 class=" fas fa-graduation-cap"></i><span class="hide-menu">Study Models</span></a>
                     </li>
                 @endcan
                 {{-- @can('list-users')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.users.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                     </li>
                 @endcan --}}
                 @can('list-university')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" fas fa-building"></i><span class="hide-menu">Univeristies</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="{{ route('admin.universities.index') }}">List</a></li>
                             <li><a href="{{ route('admin.universities.create') }}">Create</a></li>
                         </ul>
                     </li>
                 @endcan
                 @can('list-course')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" fas fa-book"></i><span class="hide-menu">Courses</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="{{ route('admin.courses.index') }}">List</a></li>
                             <li><a href="{{ route('admin.courses.create') }}">Create</a></li>
                         </ul>
                     </li>
                 @endcan
                 @can('list-subscription')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" fas fa-star"></i><span class="hide-menu"> Packages</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="{{ route('admin.subscription-packages.index') }}">List</a></li>
                             <li><a href="{{ route('admin.subscription-packages.create') }}">Create</a></li>
                         </ul>
                     </li>
                 @endcan
                 @can('list-students')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" fas fa-graduation-cap"></i><span class="hide-menu"> Students</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="{{ route('admin.students.index') }}">List</a></li>
                             {{-- <li><a href="{{ route('admin.students.create') }}">Create</a></li> --}}
                         </ul>
                     </li>
                 @endcan
                 @can('list-setting')
                     {{-- stripe --}}
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" far fa-sun"></i><span class="hide-menu"> Settings</span></a>
                         <ul aria-expanded="false" class="collapse">
                             @can('view-stripe')
                                 <li><a href="{{ route('admin.stripe.setting.index') }}">Set Stripe Key</a></li>
                             @endcan
                             @can('view-privacy-policy')
                                 <li><a href="{{ route('admin.settings.privacy') }}">Set Privacy Policy</a></li>
                             @endcan
                             @can('view-about-us')
                                 <li><a href="{{ route('admin.settings.abouUs') }}">Set About Us</a></li>
                             @endcan
                             @can('view-contact-us')
                                 <li><a href="{{ route('admin.settings.contact') }}">Set Contact Us</a></li>
                             @endcan
                             {{-- change permission --}}
                             @can('view-contact-us')
                                 {{-- <li><a href="#">Footer Details</a></li> --}}
                             @endcan
                         </ul>
                     </li>
                 @endcan
                 {{-- Bogs --}}
                 @can('list-blog')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" fab fa-blogger"></i><span class="hide-menu"> Blogs</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="{{ route('admin.blogs.index') }}">List</a></li>
                             @can('create-Blogs')
                                 <li><a href="{{ route('admin.blogs.create') }}">Create</a></li>
                             @endcan
                         </ul>
                     </li>
                 @endcan
                 {{-- Banners --}}
                 @can('list-banner')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class=" fas fa-images"></i><span class="hide-menu"> Banners and logo</span></a>
                         @can('update-banner')
                             <ul aria-expanded="false" class="collapse">
                                 <li><a href="{{ route('admin.banners') }}">Set banners and logo</a></li>
                             </ul>
                         @endcan
                     </li>
                 @endcan
                 {{-- admin dashboard --}}
                 @can('admin-dashboard')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Home</span></a>
                     </li>
                 @endcan
                 {{-- dashboard --}}
                 @can('website-dashboard')
                     <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}"><i
                                 class=" fas fa-home"></i><span class="hide-menu">Home</span></a>
                     </li>
                 @endcan

                 {{-- my uni app --}}
                 @can('my-uni-app')
                     <li> <a class="waves-effect waves-dark" href="{{ route('myUniApp') }}"><i
                                 class="fab fa-medapps"></i><span class="hide-menu">My Uni App</span></a>
                     </li>
                 @endcan

                 {{-- My Subscriptions --}}
                 {{-- @can('my-subscriptons') --}}
                 {{-- <li> <a class="waves-effect waves-dark" href="{{ route('mySubscription') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">My Subscriptions</span></a>
                     </li> --}}
                 {{-- @endcan --}}

                 {{-- My Applicatoins --}}
                 @can('my-appications')
                     <li> <a class="waves-effect waves-dark" href="{{ route('myApplications') }}"><i
                                 class=" fas fa-user-md"></i><span class="hide-menu">My Applications</span></a>
                     </li>
                 @endcan

                 {{-- Over View --}}
                 @can('my-appications')
                     <li> <a class="waves-effect waves-dark" href="{{ route('overviews') }}"><i
                                 class=" fas fa-clipboard-list"></i><span class="hide-menu">Overviews</span></a>
                     </li>
                 @endcan
                 @if (Auth::user()->type == 'super-admin')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.subscription.testing') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu"> Testing</span></a>
                     </li>
                 @endif

             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
