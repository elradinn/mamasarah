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
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#location">Location</a></li>
        </ul>
      </nav>
      <!-- .navbar -->
      <a class="btn-book-a-table" href="/login">Login to Order</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div
          class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Enjoy Your Healthy<br />Delicious Food</h2>
          <p data-aos="fade-up" data-aos-delay="100">
            Serving freshly picked lettuce based foods and salads.
          </p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="/login" class="btn-book-a-table">Order Now</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300" />
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url('/img/about-us-image.jpg')"
            data-aos="fade-up" data-aos-delay="150"></div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Come savor the difference at Mama Sarah's Lettuce Garden, where every bite is a celebration of freshness
                and
                flavor.
              </p>
              <ul>
                <li>
                  <i class="bi bi-check2-all"></i> Delicious lettuce-based foods and salads
                </li>
                <li>
                  <i class="bi bi-check2-all"></i> Nourishing, wholesome ingredients
                </li>
                <li>
                  <i class="bi bi-check2-all"></i> Menu celebrating nature's bounty
                </li>
              </ul>
              <p>
                Our commitment to quality ensures that every dish is made with freshly picked lettuce, offering you a
                healthy and flavorful dining experience. At Mama Sarah's, we believe in the power of fresh, wholesome
                ingredients to nourish both body and soul. Join us and indulge in a menu that celebrates the goodness of
                nature's bounty, one leaf at a time.
              </p>

              <div class="position-relative mt-4">
                <img src="{{asset('/img/menus/honey-glazed-chicken-silog.jpg')}}" class="img-fluid" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Mama Sarah's Lettuce Garden?</h3>
            </div>
          </div>
          <!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Fresh and Healthy Foods</h4>
                  <p>
                    Enjoy our healthy and freshly cut fruits and vegetables
                    right on your plate
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Celebrate with us</h4>
                  <p>We would love to celebrate with you on all occasions</p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Dine with humble place</h4>
                  <p>
                    Dine with us and enjoy the fresh air in our humble space
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h2>Events</h2>
          <p>Share <span>Your Moments</span> In Our Restaurant</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
              style="background-image: url('/img/moments/birthday.jpg')">
            </div>
            <!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
              style="background-image: url(/img/moments/random.jpg)">
            </div>
            <!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
              style="background-image: url(/img/moments/simple.jpg)">
            </div>
            <!-- End Event item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End Events Section -->

    <!-- ======= FAQ Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Help</h2>
          <p>Frequently Asked <span>Questions</span></p>
        </div>
        <div class="d-flex align-items-center">
          <div class="row gy-4">
            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-1-square-fill"></i>
                <h4>What are the payment options available?</h4>
                <p>
                  GCASH is the used payment
                </p>
              </div>
            </div>
            <!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-2-square-fill"></i>
                <h4>What is the estimated delivery time for my order?
                </h4>
                <p>Depending on the food that you order, but usually it will take around 15-20 minutes to prepare the
                  food </p>
              </div>
            </div>
            <!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-3-square-fill"></i>
                <h4>Is there a minimum order value for delivery?</h4>
                <p>
                  There is no minimum order value when it comes to delivery
                </p>
              </div>
            </div>
            <!-- End Icon Box -->
          </div>
        </div>
      </div>
    </section>

    <!-- ======= EndFAQ Section ======= -->


    <!-- ======= Location Section ======= -->
    <section id="location" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Location</h2>
          <p>Where to <span>Find Us?</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border: 0; width: 100%; height: 350px"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.4877151057276!2d123.19978510000001!3d13.628070099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a1f343674ef225%3A0x20afd50f1f1989aa!2sMama%20Sarah&#39;s%20Lettuce%20Garden%20-%20Magsaysay%20Branch!5e0!3m2!1sen!2sph!4v1710678943257!5m2!1sen!2sph"
            frameborder="0" allowfullscreen></iframe>
        </div>
        <!-- End Google Maps -->

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>
                  20 Chiu Bldg, Magsaysay Ave, Naga, 4400 Camarines Sur
                </p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>mamasarahs.lettucegarden@gmail.com</p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>0905 418 6008</p>
              </div>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div>
                  <strong>Mon-Thu:</strong> 6:30AM - 8:30PM
                  <br />
                  <strong>Fri-Sun:</strong> 6:30AM - 9PM
                </div>
              </div>
            </div>
          </div>
          <!-- End Info Item -->
        </div>
        <!--End Contact Form -->
      </div>
    </section>
    <!-- End Contact Section -->
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
              20 Chiu Bldg, Magsaysay Ave, Naga, 4400 Camarines Sur<br />
              Philippines, 4400
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> 0905 418 6008<br />
              <strong>Email:</strong> mamasarahs.lettucegarden@gmail.com<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong> Mon-Thu: </strong>6:30AM - 8:30PM<br />
              <strong>Fri-Sun: </strong>6:30AM - 9PM<br />
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="https://www.facebook.com/p/Mama-Sarahs-Lettuce-Garden-Magsaysay-Branch-100070854337090/"
              class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/mamasarahslettucegarden/" target="_blank" class="instagram"><i
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
      <!-- <div class="credits">
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>