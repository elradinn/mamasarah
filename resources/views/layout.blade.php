<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" rel="stylesheet">
  <link href="/css/style.css?1710416701658" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.7/dist/inputmask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
  <script src="/js/script.js?1710416701658"></script>
</head>

<body class="small">
  @auth
  <div class="wrapper">
    <input id="sidebar_toggle" type="checkbox" />
    <nav id="sidebar">
      <a href="/" class="bg-light border-bottom">
        <h4>MamaSarah</h4>
      </a>
      <ul class="list-unstyled">
        <li>
          <a href="/home" class="{{ Str::endsWith(request()->path(), 'home') ? 'active bg-success' : '' }}">Home</a>
        </li>
        @foreach (auth()->user()->getMenu() as $menu)
        <li><a href="/{{$menu['path']}}"
            class="{{ explode('/', request()->path())[0] == $menu['path'] ? 'active bg-success' : '' }}">{{$menu['title']}}</a>
        </li>
        @endforeach
      </ul>
    </nav>
    <div id="body">
      <nav class="navbar bg-light border-bottom">
        <label for="sidebar_toggle" class=" btn btn-success btn-sm"><i class="fa fa-bars"></i></label>
        <ul class="navbar-nav ml-auto">
          <li id="searchbar_toggle_menu" class="d-none">
            <a class="nav-link text-secondary" href="#"><label for="searchbar_toggle" class="d-lg-none"><i
                  class="fa fa-search"></i></label></a>
          </li>
          <li class="dropdown">
            <a class="nav-link text-secondary dropdown-toggle" data-toggle="dropdown" href="#"><i
                class="fa fa-user"></i> <span class="d-none d-lg-inline"> {{ auth()->user()->name }}</span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/profile" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
              <a href="/logout" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>
  @endauth
  @guest
  @yield('content')
  @endguest
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              Zone 9, Brgy Pacol, Naga City, Bicol Region, Philippines, Naga
              City <br />
              Philippines, 4400<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> 0917 140 7968<br />
              <strong>Email:</strong> mamasarahs.lettucegarden@gmail.com<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Fri: </strong>8AM - 8PM<br />
              <strong>Sat-Sun: </strong>7AM - 8PM<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="https://www.facebook.com/MamaSarahsLettuceGardenPacol" class="facebook"><i
                class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/mamasarahslettucegarden/" class="instagram"><i
                class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright
        <strong><span>Mama Sarah's Lettuce Garden</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
</body>

</html>