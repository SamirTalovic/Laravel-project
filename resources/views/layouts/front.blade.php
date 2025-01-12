<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== BOX ICONS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper.css') }}" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style.css') }}" />

    <title>Responsive Watches website</title>
  </head>
  <body>
    <header class="header" id="header">
      <div class="nav container">
        <a href="{{ route('home') }}" class="nav-logo">
        <i class='bx bx-compass'></i> Sschool
        </a>

        <div class="nav-menu" id="nav-menu">
          <ul class="nav-list">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link">Pocetna</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('courses.index') }}" class="nav-link">Kursevi</a>
            </li>
            @auth
              @if(auth()->user()->isAdmin())
                <li class="nav-item">
                  <a href="{{ route('admin.courses.index') }}" class="nav-link">Admin</a>
                </li> 
              @endif
            @endauth
          </ul>
         @auth
            <ul class="nav-list nav-account" style="margin-top: 1rem">
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="{{ route('courses.index') }}"
                    class="button nav-link"
                    style="display: block; width: 100%"
                    >My Course</a
                >
                </li>
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="#"
                    class="button nav-link"
                    onclick="getElementById('logout').submit()"
                    style="display: block; width: 100%"
                    >Logout</a
                >
                <form id="logout" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                </li>
            </ul>
         @endauth

         @guest 
         <ul class="nav-list nav-account" style="margin-top: 1rem">
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="{{ route('login') }}"
                    class="button nav-link"
                    style="display: block; width: 100%"
                    >Login</a
                >
                </li>
                <li class="nav-item" style="width: 100%; text-align: center">
                <a
                    href="{{ route('register') }}"
                    class="button nav-link"
                    style="display: block; width: 100%"
                    >Register</a
                >
                </li>
            </ul>
         @endguest

          <div class="nav-close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
        </div>

        <div class="nav-btns">
          <i class="bx bx-moon change-theme" id="theme-button"></i>
          @guest
          <div class="btn-account">
            <a href="{{ route('login') }}" class="btn btn-login">Prijavi se</a>
            <a href="{{ route('register') }}" class="btn btn-register">Registruj se</a>
          </div>
          @endguest
          @auth
          <div class="nav-user" id="nav-user">
            <i class="bx bx-user-circle"></i> <small> {{ auth()->user()->name }} </small>
            <i class="bx bx-chevron-down"></i>
          </div>
          @endauth

          <div class="nav-toggle" id="nav-toggle">
            <i class="bx bx-grid-alt"></i>
          </div>
        </div>
      </div>
    </header>

    <div class="dropdown" id="dropdown">
      <i class="bx bx-x dropdown-close" id="dropdown-close"></i>

      <a href="{{ route('courses.index') }}"><h2 class="dropdown-title-center">Moji kursevi</h2></a>
      <a href="#" onclick="getElementById('logout').submit()"><h2 class="dropdown-title-center">Odjavi se</h2></a>
      <form id="logout" action="{{ route('logout') }}" method="post">
          @csrf
      </form>
    </div>

    <main class="main container">
     @yield('content')
    </main>

    <footer class="footer section">
      <div class="footer-container container grid">
        <div class="footer-content">
          <h3 class="footer-title">Naše informacije</h3>
          <ul class="footer-list">
            <li>+381 631747820</li>
            <li>Sjenica, Srbija</li>
          </ul>
        </div>

        <div class="footer-content">
          <h3 class="footer-title">Meni</h3>
          <ul class="footer-links">
            <li>
              <a href="#" class="footer-link">Početna</a>
            </li>
            <li>
              <a href="#" class="footer-link">Kursevi</a>
            </li>
            <li>
              <a href="#" class="footer-link">Kategorije</a>
            </li>
          </ul>
        </div>

        <div class="footer-content">
          <h3 class="footer-title">Nalog</h3>
          <ul class="footer-links">
            <li>
              <a href="#" class="footer-link">Registruj se</a>
            </li>
            <li>
              <a href="#" class="footer-link">Prijavi se</a>
            </li>
            <li>
              <a href="#" class="footer-link">faq</a>
            </li>
          </ul>
        </div>

        <div class="footer-content">
          <h3 class="footer-title">Društvene mreže</h3>
          <ul class="footer-social">
            <a href="www.facebook.com" class="footer-social-link">
              <i class="bx bxl-facebook"></i>
            </a>
            <a href="www.twitter.com" class="footer-social-link">
              <i class="bx bxl-twitter"></i>
            </a>
            <a href="www.instagram.com" class="footer-social-link">
              <i class="bx bxl-instagram"></i>
            </a>
          </ul>
        </div>
      </div>

      <span class="footer-copy">&#169; Samir Talovil , Sva prava rezervisana
      </span>
    </footer>

    <a href="#" class="scroll-up" id="scroll-up">
      <i class="bx bx-up-arrow-alt scroll-up-icon"></i>
    </a>

    <!-- swiper -->
    <script src="{{ asset('frontend/assets/libraries/swiper.js') }}"></script>
    <!--===== MAIN JS =====-->
    <script src="{{ asset('frontend/assets/main.js') }}"></script>
  </body>
</html>
