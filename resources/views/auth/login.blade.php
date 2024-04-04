<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Mama Sarah's Lettuce Garden Official Website</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/vendor/aos/aos.css" rel="stylesheet" />
    <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2></h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Login</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <section class="login">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Welcome to</h2>
                    <p><span>Mama Sarah's</span> Lettuce Garden</p>
                </div>

                <form action="/login" method="post" role="form" class="p-3 p-md-4 php-email-form">
                    @csrf
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        These email/password is incorrect.
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <input id="user_account_name" name="name" class="form-control mb-4"
                                       value="{{ old('name') }}" required maxlength="50" placeholder="Enter username" />
                                <div class="input-group mb-4">
                                    <input id="user_account_password" name="password" class="form-control"
                                           value="{{ old('password') }}" type="password" required maxlength="100"
                                           placeholder="Enter password" />
                                    <div class="input-group-append">
                                        <button id="togglePassword" class="password-eye h-100" tabindex="-1" type="button" onclick="togglePassword()">
                                            <i id="eyeIcon" class="bi bi-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="w-100 mb-3 button">Login</button>
                                <p class="text-center">
                                    Not registered?
                                    <a href="/register"> Create an account </a>
                                </p>
                                <div class="w-100 text-center mb-4">
                                    <p>
                                        <a href="/reset-password"> Forgot Password? </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- End #main -->

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
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/js/main.js') }}"></script>

    <script>
        const passwordInput = document.getElementById('user_account_password');
        const eyeIcon = document.getElementById('eyeIcon');

        document.getElementById('togglePassword').addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            }
        });
    </script>
</body>

</html>
