

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-y:scroll !important;">
    <!-- Brand Logo -->
    <a href="{{ url('') }}" class="brand-link">
      <img src="{{ asset('front_assets/assets/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="height:45px">
      <span class="brand-text font-weight-light" style="font-size:28px">Nclex</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('admin') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              {{ __('staticword.dashboard')  }}

              </p>
            </a>

          </li>
         

                 

          @can('manage-content')
          <li class="nav-item">
            <a href="#" class="nav-link">

               <i class="nav-icon fas fa-file"></i>
              <p>
              {{ __('staticword.managecontents')  }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
                
            @can('page-index')
            <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                <i class="fas fa-file-alt nav-icon"></i>
                  <p>{{ __('staticword.pages')  }}</p>
                </a>
              </li>
              @endcan

              @can('media-index')
              <li class="nav-item">
                <a href="{{ route('media.index') }}" class="nav-link">
                <i class="fas fa-photo-video nav-icon"></i>
                  <p>{{ __('staticword.media')  }}</p>
                </a>
              </li>
              @endcan



             
               <li class="nav-item">
                <a href="{{ route('people.index') }}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                  <p>{{ __('staticword.people')  }}</p>
                </a>
              </li>
              
              
        
              <li class="nav-item">
                <a href="{{ route('news.index') }}" class="nav-link">
                <i class="far fa-newspaper nav-icon"></i>
                  <p>{{ __('staticword.news & events')  }}</p>
                </a>
              </li>
            

                @can('branch-index')
              <li class="nav-item">
                <a href="{{ route('branch.index') }}" class="nav-link">
                <i class="fas fa-code-branch nav-icon"></i>
                  <p>{{ __('staticword.branch')  }}</p>
                </a>
              </li>
              @endcan
  
                @can('newsletter-index')
               <li class="nav-item">
                <a href="{{ url('admin/all/newsletter') }}" class="nav-link">
                <i class="fas fa-newspaper nav-icon"></i>
                  <p>{{ __('staticword.newsletter')  }}</p>
                </a>
              </li>
              @endcan

           

                  
              @can('generalsetting-index')
                <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                  <p>{{ __('staticword.general settings')  }}</p>
                </a>
              </li>
              @endcan

            </ul>
          </li>
          @endcan
  
               
            @can('blog-section')
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fab fa-blogger nav-icon"></i>
                    <p>
                    {{ __('staticword.blog section')  }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview nav-open">
                    
                @can('blogcategory-index')
                    <li class="nav-item">
                        <a href="{{ route('blogcategory.index') }}" class="nav-link">
                        <i class="fas fa-edit nav-icon"></i>
                        <p>{{ __('staticword.blog category')  }}</p>
                        </a>
                    </li>
                    @endcan
                   
                    @can('blog_tag-index')
                    <li class="nav-item">
                        <a href="{{ route('tag.index') }}" class="nav-link">
                        <i class="fas fa-code-branch nav-icon"></i>
                        <p>{{ __('staticword.blog tag')  }}</p>
                        </a>
                    </li>
                    @endcan
                      
                    @can('blog-index')
                     <li class="nav-item">
                        <a href="{{ route('blog.index') }}" class="nav-link">
                        <i class="fas fa-file-alt nav-icon"></i>
                        <p>{{ __('staticword.blogs')  }}</p>
                        </a>
                    </li> 
                    @endcan
                </ul>
            </li>
            @endcan


            @can('manage-users')
          <li class="nav-item">
            <a href="#" class="nav-link">

             <i class="nav-icon fas fa-users-cog"></i>
              <p>
              {{ __('staticword.manage users')  }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
                
            @can('users-index')
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                  <p>  {{ __('staticword.users')  }}</p>
                </a>
              </li>
              @endcan

               @can('role-index')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                  <p>{{ __('staticword.roles')  }}</p>
                </a>
              </li>
              @endcan
              
              @can('permission-index')
              <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                  <p>{{ __('staticword.permissions')  }}</p>
                </a>
              </li> 
              @endcan
                   @can('unverify-user')
              <li class="nav-item">
                        <a href="{{ url('/admin/unverifyusers') }}" class="nav-link">
                      <i class="fas fa-broom nav-icon"></i>
                        <p>{{ __('staticword.Verify users')  }}</p>
                        </a>
                    </li>
                    @endcan

            </ul>
          </li>
          @endcan

   @can('Contactus-index')
         <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-address-card"></i>
              <p>
              {{ __('staticword.company profile')  }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contactus.create') }}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                  <p>   {{ __('staticword.add')  }} </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contactus.index') }}" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                  <p>   {{ __('staticword.view')  }}</p>
                </a>
              </li>
            </ul>
          </li>
@endcan

         @can('seo-index')
          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fab fa-accusoft"></i>
              <p>
              {{ __('staticword.seo')  }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('seo.create') }}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('staticword.add')  }}</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('seo.index') }}" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                  <p>{{ __('staticword.view')  }}</p>
                </a>
              </li>

            </ul>
          </li>
          @endcan
                
                @can('block-ip')
                    <li class="nav-item">
                        <a href="{{ url('/admin/maintenace') }}" class="nav-link">        
                      <i class="fas fa-ban nav-icon"></i>
                        <p>{{ __('staticword.block ip address')  }}</p>
                        </a>
                    </li>
                    @endcan
                   
                   
                    @can('book-event')            
                  <li class="nav-item">
                        <a href="{{ url('/admin/event') }}" class="nav-link">
                     <i class="fas fa-ticket-alt nav-icon"></i>
                        <p>{{ __('staticword.Book Event')  }}</p>
                        </a>
                    </li>
                    @endcan

                    @can('live-trace')
                    <li class="nav-item">
                        <a href="{{ url('/admin/liveusers') }}" class="nav-link">
                        <img src="{{ asset('front_assets/assets/img/download.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="25px" width="25px">
                        <p>{{ __('staticword.live tracking site users')  }}</p>
                        </a>
                    </li>
                    @endcan

            @can('clear-cache')
        <li class="nav-item">
                        <a href="{{ url('/admin/clear-cache') }}" class="nav-link">
                      <i class="fas fa-broom nav-icon"></i>
                        <p>{{ __('staticword.clear cache')  }}</p>
                        </a>
                    </li>
                    @endcan
                    
                     @can('tickets-index')
                    <li class="nav-item">
                        <a href="{{ url('/admin/ticket') }}" class="nav-link">
                            <i class="fas fa-ticket-alt nav-icon"></i>
                        <p>{{ __('staticword.Tickets')  }}</p>
                        </a>
                    </li>
                    @endcan
                  
                    
                    @if(Auth()->user()->is_admin=="s")                  
                  <li class="nav-item">
                        <a href="{{ url('/admin/ticket-view') }}" class="nav-link">
                     <i class="fas fa-ticket-alt nav-icon"></i>
                        <p>{{ __('staticword.Ticket')  }}</p>
                        </a>
                    </li>
                    @endif


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
              {{ __('staticword.settings')  }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/profile') }}" class="nav-link">
                <i class="fas fa-user-alt nav-icon"></i>
                  <p>{{ __('staticword.my profiles')  }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/2fa') }}" class="nav-link">
                <img src="{{ asset('front_assets/assets/img/2fa-1.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="25px" width="25px">
                  <p>{{ __('staticword.2FA Autehnticate')  }}</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('change.password') }}" class="nav-link">
                <i class="fas fa-user-alt nav-icon"></i>
                  <p>{{__('staticword.change password')  }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/profilechange') }}" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                  <p>{{ __('staticword.change profiles')  }}</p>
                </a>
              </li>
                             <li class="nav-item">
                                   <a class="nav-link"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>{{ __('staticword.logout')  }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </li>

            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



