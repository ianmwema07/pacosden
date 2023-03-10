<?php
include("includes/dblink.php");
$studsql = "SELECT * FROM dogs WHERE GENDER = 'stud'";
$femalesql = "SELECT * FROM dogs WHERE GENDER = 'female'";
$puppysql = "SELECT * FROM dogs WHERE GENDER = 'puppy'";

$studrows = $connection->query($studsql);
$femalerows = $connection->query($femalesql);
$puppyrows = $connection->query($puppysql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pacosden Kennels</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/paw.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">Pacosden Kennels</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Our Dogs</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 37rem">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Pacosden Kennels</h1>
      <h2>We are team of dog keepers who look to make man and dog best friends.</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2 " data-aos="fade-left">
            <img src="assets/img/kennelimage3.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content " data-aos="fade-right">
            <h3>About Us</h3>
            <p class="fst-italic">
                Here at Pacosden kennels, you will find American Bullies with some of the most complete and desirable traits only notable in select bloodlines.Our American Bullies not only possess attractive looks, correct conformation and stable temperaments but muscular and loving personality as well.Our use of quality sires ensures that we produce puppies with consistent and iconic looks. If you are looking for a perfect Pitbull as a companion,you need to locate a reputable breeder and Pacosden Kennels is your answer.We also do dog boarding and grooming,offer stud services and give expert advice on dog breeding."
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Our Dogs</h2>
        </div>
          <div class="section-title">
              <h4>Studs</h4>
          </div>
          <div class="row our-dogs">
              <?php while($row = $studrows->fetch_assoc()): ?>
                  <div class="card" style="width: 18rem;">
                      <img src="uploads/<?php echo $row['IMAGE'];?>" class="card-img-top" alt="..." style="height: 16rem;width: 16rem;">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $row['NAME'];?></h5>
                          <ul style="list-style-type: none;">
                              <li><?php echo $row['BREED'];?></li>
                              <li><?php echo $row['AGE_IN_MONTHS'];?> : Months</li>
                              <li><?php echo $row['GENDER'];?></li>
                          </ul>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
          <div class="section-title">
              <h4>Females</h4>
          </div>
          <div class="row our-dogs">
              <?php while($row = $femalerows->fetch_assoc()): ?>
                  <div class="card" style="width: 18rem;">
                      <img src="uploads/<?php echo $row['IMAGE'];?>" class="card-img-top" alt="..." style="height: 16rem;width: 16rem;">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $row['NAME'];?></h5>
                          <ul style="list-style-type: none;">
                              <li><?php echo $row['BREED'];?></li>
                              <li><?php echo $row['AGE_IN_MONTHS'];?> : Months</li>
                              <li><?php echo $row['GENDER'];?></li>
                          </ul>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
          <div class="section-title">
              <h4>Puppies</h4>
          </div>
        <div class="row our-dogs">
            <?php while($row = $puppyrows->fetch_assoc()): ?>
                <div class="card" style="width: 18rem;">
                    <img src="uploads/<?php echo $row['IMAGE'];?>" class="card-img-top" alt="..." style="height: 16rem;width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['NAME'];?></h5>
                        <ul style="list-style-type: none;">
                            <li><?php echo $row['BREED'];?></li>
                            <li><?php echo $row['AGE_IN_MONTHS'];?> : Months</li>
                            <li><?php echo $row['GENDER'];?></li>
                        </ul>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

      </div>
    </section><!-- End Services Section -->
 <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>For enquiries feel free to reach out to us.</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Find Us</h3>
              <p>Uthiru near ILRI</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
                <a href="mailto: gakariaj@yahoo.com"><p>gakariaj@yahoo.com</p></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
                <a href="tel:+254722868784"><p>+254722868784</p></a>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-12 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.2097314623668!2d36.71976682915564!3d-1.2695469999421267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xed5f1ce9d6368aa3!2zMcKwMTYnMTAuNCJTIDM2wrA0MycxMy4xIkU!5e0!3m2!1sen!2ske!4v1648468522814!5m2!1sen!2ske" width="100%" height="384px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>


        </div>

      </div>
    </section><!-- End Contact Section -->
    <section id="socials" class="socials">
        <div class="container">
            <div></div>
        </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Pacosden Kennels</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://github.com/ianmwema07" target="_blank">Ian Kariuki</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
