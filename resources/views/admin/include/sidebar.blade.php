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
                         aria-expanded="false"><img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user-img"
                             class="img-circle"><span class="hide-menu">Prof. Mark</span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                         <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                         <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                         <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                         <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                     </ul>
                 </li>
                 {{-- <li class="nav-small-cap">--- PERSONAL</li> --}}
                 {{-- <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.permissions.index') }}"
                         aria-expanded="false"><i class="fa fa-bars"></i><span
                             class="hide-menu">Permissions123</span></a>
                 </li> --}}
                 @can('list-role')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.roles.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Roles</span></a>
                     </li>
                 @endcan
                 @can('list-permission')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.permissions.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Permissions</span></a>
                     </li>
                 @endcan
                 @can('list-user')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.users.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Users</span></a>
                     </li>
                 @endcan
                 @can('list-degree')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.degrees.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Degrees</span></a>
                     </li>
                 @endcan
                 @can('list-discipline')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.disciplines.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Disciplines</span></a>
                     </li>
                 @endcan
                 @can('list-study-model')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.study-models.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Study Models</span></a>
                     </li>
                 @endcan
                 @can('list-users')
                     <li> <a class="waves-effect waves-dark" href="{{ route('admin.users.index') }}"><i
                                 class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                     </li>
                 @endcan
                 @can('list-university')
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                 class="ti-layout-grid2"></i><span class="hide-menu">Univeristies</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="{{ route('admin.universities.index') }}">List</a></li>
                             <li><a href="{{ route('admin.universities.create') }}">Create</a></li>
                         </ul>
                     </li>
                 @endcan
             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
