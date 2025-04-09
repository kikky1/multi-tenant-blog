<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite( ['resources/js/app.js'])
     <!-- Font Icon -->
     <link rel="stylesheet" href="{{asset('regLog/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

     <!-- Main css -->
     <link rel="stylesheet" href="{{asset('regLog/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand mx-4" href="#">Kik_tech</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Team</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>

             @guest
             <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
              </li>
             @endguest

              @auth
              <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                  @csrf
                  <button type="submit" class="btn">Logout</button>
                </form>
              </li>
              @endauth

            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      

      @if (session('success'))
          <div class="alert alert-success text-center">
            {{session('success')}}
          </div>
          @elseif (session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
      @endif
      

      @yield('content')


      <footer class="text-center">

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2025 Copyright: 
          <a class="text-body" href="#">KIKTECH.COM</a>
        </div>
        <!-- Copyright -->
        <div class="container-fluid pt-4">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
              data-mdb-ripple-init
              class="btn btn-link btn-floating btn-lg text-body m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <!-- Twitter -->
            <a
              data-mdb-ripple-init
              class="btn btn-link btn-floating btn-lg text-body m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-twitter"></i
            ></a>
            <!-- Google -->
            <a
              data-mdb-ripple-init
              class="btn btn-link btn-floating btn-lg text-body m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-google"></i
            ></a>
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn btn-link btn-floating btn-lg text-body m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-instagram"></i
            ></a>
            <!-- Linkedin -->
            <a
              data-mdb-ripple-init
              class="btn btn-link btn-floating btn-lg text-body m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-linkedin"></i
            ></a>
            <!-- Github -->
            <a
              data-mdb-ripple-init
              class="btn btn-link btn-floating btn-lg text-body m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
      </footer>

    <!-- JS -->
    <script src="{{asset('regLog/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('regLog/js/main.js')}}"></script>
</body>
</html>