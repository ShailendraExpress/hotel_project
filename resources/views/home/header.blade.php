<!-- header inner -->
<div class="header">
   <div class="container">
      <div class="row align-items-center">

         <!-- Logo -->
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 logo_section">
            <div class="logo">
               <a href="/">
                  <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid">
               </a>
            </div>
         </div>

         <!-- Navigation -->
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-6">
            <nav class="navigation navbar navbar-expand-md navbar-light py-3">

               <!-- Toggle Button -->
               <button class="navbar-toggler" type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarsExample04"
                  aria-controls="navbarsExample04"
                  aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>

               <!-- Menu -->
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav ms-auto align-items-md-center">

                     <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                     </li>

                    

                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('our_rooms') }}">Our Room</a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('hotel_gallary') }}">Gallery</a>
                     </li>


                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact_us') }}">Contact</a>
                     </li>

                     <!-- Auth buttons -->




                     @if (Route::has('login'))
                     @auth
                     <li class="nav-item dropdown ms-md-3">

                        <a class="nav-link dropdown-toggle text-dark"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                           {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                           <li>
                              <a class="dropdown-item" href="{{ route('profile.show') }}">
                                 Profile
                              </a>
                           </li>

                           <li>
                              <hr class="dropdown-divider">
                           </li>

                           <li>
                              <a class="dropdown-item"
                                 href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                 Logout
                              </a>
                           </li>

                        </ul>
                     </li>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>

                     @else
                     <li class="nav-item ms-md-4">
                        <a class="btn btn-outline-success btn-md px-4 me-2" href="{{url('login')}}">
                           Login
                        </a>
                     </li>

                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="btn btn-success btn-md px-4" href="{{url('register')}}">
                           Register
                        </a>
                     </li>
                     @endif
                     @endauth

                     @endif



                  </ul>
               </div>
            </nav>
         </div>

      </div>
   </div>
</div>


<style>
   .navbar-nav .nav-link {
      font-size: 18px;
      /* size increase */
      font-weight: 500;
      /* thoda bold */
   }
</style>