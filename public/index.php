<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ActiConnect</title>
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <!-- css for style link -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!--- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600;700;800;900&family=Rubik:wght@400;500;800&display=swap" rel="stylesheet">
  <!--- preload images-->
  <link rel="preload" as="image" href="../assets/images/hero-banner.png">
  <link rel="preload" as="image" href="../assets/images/hero-circle-one.png">
  <link rel="preload" as="image" href="../assets/images/hero-circle-two.png">
  <link rel="preload" as="image" href="../assets/images/heart-rate.svg">
  <link rel="preload" as="image" href="./assets/images/calories.svg">


  <script>
    function showSweetAlert1(message, icon) {
      Swal.fire({
        icon: icon,
        title: 'Notification',
        text: message,
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function showSweetAlert(message) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: message,
      });
    }
  </script>
</head>

<body id="top">

  <!--- #HEADER-->
  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <span class="span">ActiConnect</span>
      </a>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-sharp" aria-hidden="true"></ion-icon>
        </button>

        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link active" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li>
            <a href="#activity" class="navbar-link" data-nav-link>Activities</a>
          </li>

          <li>
            <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li>
            <a href="#contact" class="navbar-link" data-nav-link>Contact Us</a>
          </li>

        </ul>

      </nav>

      <a href="login.php" class="btn btn-secondary">Join Now</a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </button>

    </div>
  </header>





  <main>
    <article>

      <!-- - #HERO-->

      <section class="section hero bg-dark has-after has-bg-image" id="home" aria-label="hero" data-section style="background-image: url('../assets/images/hiking-men-conquer-mountain-peak-adventure-awaits-generative-ai.jpg'); background-size: cover;background-position: bottom;height: 100vh;padding: 0;">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">
              <strong class="strong">The Best</strong>Activity Club
            </p>

            <h1 class="h1 hero-title">Work Hard To Get Better Life</h1>

            <p class="section-text">
              Unlocking Success Through Dedication and Perseverance
            </p>

            <a href="login.php" class="btn btn-primary">Get Started</a>

          </div>

      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <div class="about-banner has-after">
            <img src="../assets/images/actbody.jpg" width="660" height="648" loading="lazy" alt="about banner" class="w-100">

            <img src="../assets/images/about-circle-one.png" width="660" height="534" loading="lazy" aria-hidden="true" alt="" class="circle circle-1">
            <img src="../assets/images/about-circle-two.png" width="660" height="534" loading="lazy" aria-hidden="true" alt="" class="circle circle-2">

            <img src="../assets/images/fitness.png" width="650" height="154" loading="lazy" alt="fitness" class="abs-img w-100">
          </div>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">Welcome To Our Acti-Connect Club </h2>

            <p class="section-text">
              At Acti-Connect, we're more than just a fitness club; we're your partners in achieving a healthier, happier life. Our diverse fitness programs, experienced trainers, and supportive community create the perfect environment for your wellness journey.
            </p>

            <p class="section-text">
              Join us in celebrating achievements, overcoming challenges, and building lasting connections. Acti-Connect is where fitness meets community, and a better, healthier you begins. Explore our facilities, engage in dynamic workouts, and embark on your path to well-being.
            </p>



            <p class="section-text">
              Step into Acti-Connect – your destination for transformation, empowerment, and a vibrant community. Let's make fitness a way of life together.
            </p>

            <div class="wrapper">


              <a href="aboutus.php" class="btn btn-primary">Explore More</a>

            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #VIDEO
      -->

      <section class="section video" aria-label="video">
        <div class="container">

          <div class="video-card has-before has-bg-image" style="background-image: url('../assets/images/actbody.jpg')">

            <h2 class="h2 card-title">Explore Fitness Life</h2>

            <button class="play-btn" aria-label="play video">
              <ion-icon name="play-sharp" aria-hidden="true"></ion-icon>
            </button>

            <a href="#" class="btn-link has-before">Watch More</a>

          </div>

        </div>
      </section>





      <!-- 
        - #CLASS
      -->

      <section class="section class bg-dark has-bg-image" id="activity" aria-label="activity" style="background-image: url('../assets/images/classes-bg.png')">
        <div class="container">

          <p class="section-subtitle">Our Activities</p>

          <h2 class="h2 section-title text-center">Acti-Connect Activities For Every Goal</h2>

          <ul class="class-list has-scrollbar">

            <li class="scrollbar-item">
              <div class="class-card">

                <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                  <img src="../assets/images/act2.jpg" width="416" height="240" loading="lazy" alt="Cardio & Strenght" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="title-wrapper">
                    <img src="../assets/images/class-icon-2.png" width="52" height="52" aria-hidden="true" alt="" class="title-icon">

                    <h3 class="h3">
                      <a href="#" class="card-title">Music</a>
                    </h3>
                  </div>

                  <p class="card-text">
                    A smaller version of the sculpture was created to fit into the limited gallery space.
                  </p>

                  <div class="card-progress">

                    <div class="progress-wrapper">
                      <p class="progress-label">Class Full</p>

                      <span class="progress-value">70%</span>
                    </div>

                    <div class="progress-bg">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "intership";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql1 = "SELECT * FROM events";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
              while ($row = $result1->fetch_assoc()) {
                $progressValue = rand(70, 90);
                echo "<li class='scrollbar-item'>
                            <div class='class-card'>";
                echo "<figure class='card-banner img-holder' style='--width: 416; --height: 240;'>
                                <img src='../assets/images/" . $row['image_path'] . "' alt='Event Image' width='416' height='240' loading='lazy' class='img-cover'>
                              </figure>";

                echo "<div class='card-content'>

                                <div class='title-wrapper'>
                                  <img src='../assets/images/class-icon-1.png' width='52' height='52' aria-hidden='true' alt='' class='title-icon'>

                                  <h3 class='h3'>
                                    <a href='#' class='card-title'>" . $row['name'] . " </a>
                                  </h3>
                                </div>

                                <p class='card-text'>
                                " . $row["description"] . "
                                </p>

                                <div class='card-progress'>

                                  <div class='progress-wrapper'>
                                    <p class='progress-label'>Class Full</p>

                                    <span class='progress-value'>" . $progressValue . "%</span>
                                  </div>

                                  <div class='progress-bg'>
                                  <div class='progress-bar' style='width: " . $progressValue . "%'></div>
                                  </div>

                                </div>

                              </div>
                            </div>
                          </li>";
              }
            } else {
              echo 'No Events found';
            }
            ?>





          </ul>

        </div>
      </section>





      <!-- 
        - #BLOG
      -->

      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">

          <p class="section-subtitle">Our News</p>

          <h2 class="h2 section-title text-center">Latest Blog Feed</h2>

          <ul class="blog-list has-scrollbar">

            <li class="scrollbar-item">
              <div class="blog-card">

                <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                  <img src="../assets/images/act1.jpg" width="440" height="270" loading="lazy" alt="Going to the gym for the first time" class="img-cover">

                  <time class="card-meta" datetime="2022-07-07">7 July 2022</time>
                </div>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">Going to the gym for the first time</a>
                  </h3>

                  <p class="card-text">
                    Praesent id ipsum pellentesque lectus dapibus condimentum curabitur eget risus quam. In hac
                    habitasse platea dictumst.
                  </p>

                  <a href="#" class="btn-link has-before">Read More</a>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="blog-card">

                <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                  <img src="../assets/images/act2.jpg" width="440" height="270" loading="lazy" alt="Parturient accumsan cacus pulvinar magna" class="img-cover">

                  <time class="card-meta" datetime="2022-07-07">7 July 2022</time>
                </div>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">Parturient accumsan cacus pulvinar magna</a>
                  </h3>

                  <p class="card-text">
                    Praesent id ipsum pellentesque lectus dapibus condimentum curabitur eget risus quam. In hac
                    habitasse platea dictumst.
                  </p>

                  <a href="#" class="btn-link has-before">Read More</a>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="blog-card">

                <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                  <img src="../assets/images/act3.jpg" width="440" height="270" loading="lazy" alt="Risus purus namien parturient accumsan cacus" class="img-cover">

                  <time class="card-meta" datetime="2022-07-07">7 July 2022</time>
                </div>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">Risus purus namien parturient accumsan cacus</a>
                  </h3>

                  <p class="card-text">
                    Praesent id ipsum pellentesque lectus dapibus condimentum curabitur eget risus quam. In hac
                    habitasse platea dictumst.
                  </p>

                  <a href="#" class="btn-link has-before">Read More</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>


      <section id="contact">
        <div class="container11">
          <p class="section-subtitle">Contact Us</p>
          <h2 class="h2 section-title text-center">Get In Touch</span>
          </h2>


          <?php if (isset($_SESSION["success"])) : ?>
            <div> <?php echo $_SESSION["success"]; ?> </div>

            <?php unset($_SESSION["success"]); ?>

          <?php elseif (isset($_SESSION["error"])) : ?>
            <div> <?php echo $_SESSION["error"]; ?> </div>

            <?php unset($_SESSION["error"]); ?>
          <?php endif; ?>

          <div class="row">
            <img src="../assets/images/Capture3.PNG" alt="img">
            <form action="contact.php" method="POST">
              <input type="text" name="name" id="Name" placeholder="Name" required>
              <input type="email" name="email" id="Email" placeholder="Email" required>
              <textarea name="feedback" id="Message" placeholder="Message" cols="30" rows="10"></textarea>
              <button type="submit" class="btn-primary1" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="section footer-top bg-dark has-bg-image" style="background-image: url('../assets/images/footer-bg.png')">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">

            <span class="span">Acti-Connect</span>
          </a>

          <p class="footer-brand-text">
            Unlocking Success Through Dedication and Perseverance
          </p>

          <div class="wrapper">

            <img src="../assets/images/footer-clock.png" width="34" height="34" loading="lazy" alt="Clock">

            <ul class="footer-brand-list">

              <li>
                <p class="footer-brand-title">Monday - Friday</p>

                <p>7:00Am - 10:00Pm</p>
              </li>

              <li>
                <p class="footer-brand-title">Saturday - Sunday</p>

                <p>7:00Am - 2:00Pm</p>
              </li>

            </ul>

          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Our Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">Home</a>
          </li>

          <li>
            <a href="#" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Classes</a>
          </li>

          <li>
            <a href="#" class="footer-link">Blog</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Contact Us</p>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="location" aria-hidden="true"></ion-icon>
            </div>

            <address class="address footer-link">
              Beirut, Lebanon
            </address>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="call" aria-hidden="true"></ion-icon>
            </div>

            <div>

              <a href="tel:+915552348765" class="footer-link">+961 71 653 043</a>
            </div>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="mail" aria-hidden="true"></ion-icon>
            </div>

            <div>
              <a href="mailto:info@acticonnect.com" class="footer-link">info@acticonnect.com</a>

              <a href="mailto:services@acticonnect.com" class="footer-link">services@acticonnect.com</a>
            </div>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Our Newsletter</p>
          </li>

          <li>
            <form action="" class="footer-form">
              <input type="email" name="email_address" aria-label="email" placeholder="Email Address" required class="input-field">

              <button type="submit" class="btn btn-primary" aria-label="Submit">
                <ion-icon name="chevron-forward-sharp" aria-hidden="true"></ion-icon>
              </button>
            </form>
          </li>

          <li>
            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 Acti-Connect. All Rights Reserved By <a href="#" class="copyright-link">Ahmad Doughman.</a>
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link has-before">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link has-before">Terms & Condition</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up-sharp" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="../assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>