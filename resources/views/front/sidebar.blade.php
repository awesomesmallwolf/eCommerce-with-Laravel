<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('profile/i5.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">Priyanshu</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('profile/i2.jpeg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{{ Auth::user()->email}}}
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

   
         
          <li class="nav-item">
            <a href="/user" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <span class="h5"><i class="fas fa-users"  style="color:#ffffff"></i></span>
             
              <p class="h5"   style="color:#ffffff">
                Users 
                
              </p>
            </a>
          </li>
          
         
   
         
          <li class="nav-item">
            <a href="/banner" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <span class="h5">
                {{-- <i class="fas fa-users"  style="color:#FFC00D"></i> --}}
                <i class="fas fa-image" style="color:#ffffff"></i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
                Banner
                
              </p>
            </a>
          </li>
          
          
          {{-- CATEGORIES --}}
         
          <li class="nav-item">
            <a href="/category" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <span class="h5">
                {{-- <i class="fas fa-users"  style="color:#FFC00D"></i> --}}
                {{-- <i class="fas fa-image" ></i> --}}
                <i class="fas fa-sitemap" style="color:#ffffff"></i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
                Categories
                
              </p>
            </a>
          </li>

         
          {{-- Coupan --}}
         
          <li class="nav-item">
            <a href="/coupon" class="nav-link">
              <span class="h5">
                
                <i class="fas fa-gift" style="color:#ffffff"></i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
                Coupon 
              </p>
            </a>
          </li>



         
          {{-- Coupan --}}
         
          <li class="nav-item">
            <a href="/contactus" class="nav-link">
              <span class="h5 text-white">
                <i class="fas fa-mobile-alt"></i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
                Contact Us 
              </p>
            </a>
          </li>





        {{-- PRODUCT  --}}
         
          <li class="nav-item">
            <a href="/product-option" class="nav-link">
              <span class="h5">
                
                <i class="fab fa-product-hunt"    style="color:#ffffff"> </i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
                Product 
              </p>
            </a>
          </li>



        {{-- ORDER  --}}
         
          <li class="nav-item">
            <a href="/myorder" class="nav-link">
              <span class="h5">
                
                <i class="fas fa-truck"    style="color:#ffffff"> </i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
                Order 
              </p>
            </a>
          </li>




        {{-- CMS  --}}
         
          <li class="nav-item">
            <a href="/cms" class="nav-link">
              <span class="h5">
                <i class="fas fa-filter"  style="color:#ffffff"></i>
        
              </span>
             
              <p class="h5"   style="color:#ffffff">
                CMS 
              </p>
            </a>
          </li>

       {{-- SETTING   --}}
         
          <li class="nav-item">
            <a href="/configuration" class="nav-link">
              <span class="h5">
                
                <i class="fas fa-cogs"    style="color:#ffffff"> </i>
              </span>
             
              <p class="h5"   style="color:#ffffff">
               Setting 
              </p>
            </a>
          </li>

           
          



          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt text-light"></i>
              <p class="h5"   style="color:#ffffff">{{ __('Logout') }}</p>
          
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


