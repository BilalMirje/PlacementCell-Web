<?php
// To Handle Session Variables on This Page
session_start();

// Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->
    <link href="img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="css/our_placements.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;
        1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;
        1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;
        0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="assets/css/variables.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" href="assets/css/chat.css">
    
    <!-- Font Awesome (Optional) -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <?php include 'php/header.php'; ?>
    <!-- End Header -->

    <!-- Hero Section -->
    <section id="hero-animated" class="hero-image-animated d-flex align-items-center justify-content-center mt-3">
        <div class="container mt-3">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <!-- Carousel Indicators (Optional) -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                </div>

                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
                            <img src="assets/img/hero-carousel/gallery6.jpg" class="img-fluid animated" 
                                style="border-radius: 15px; 
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
                                width: 100%; 
                                max-width: 1100px; 
                                height: 600px;"
                            >
                            <div class="carousel-caption d-block">
                                <h2 class="mt-2">Welcome to <span>Placement Cell</span></h2>
                                <p>We Will Support You In Your Entire Placement Journey.</p>
                                <a href="login.php" class="btn btn-info scrollto">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
                            <img src="assets/img/hero-carousel/gallery1.jpg" class="img-fluid animated" 
                                style="border-radius: 15px; 
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
                                width: 100%; 
                                max-width: 1100px; 
                                height: 600px;"
                            >
                            <div class="carousel-caption d-block">
                                <h2 class="mt-2">Join Us for an Exciting Journey!</h2>
                                <p>Find your dream job through our Placement Cell.</p>
                                <!-- <a href="register.php" class="btn btn-success scrollto">Register Now</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
                            <img src="assets/img/hero-carousel/gallery2.jpg" class="img-fluid animated" 
                                style="border-radius: 15px; 
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
                                width: 100%; 
                                max-width: 1100px; 
                                height: 600px;"
                            >
                            <div class="carousel-caption d-block">
                                <h2 class="mt-2">Your Future Starts Here</h2>
                                <p>Let us help you build your career path.</p>
                                <a href="contact.php" class="btn btn-primary scrollto">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main">


        <!-- Call To Action Section -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-out">
                <div class="row g-5">
                    <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3>Placement <em>Portal</em></h3>
                        <p>The Placement Cell plays a crucial role in locating job
                            opportunities for undergraduates and postgraduates passing out from the college by
                            keeping in touch with reputed firms and industrial establishments.
                            <br>The placement cell operates round the year to facilitate contacts between companies
                            and graduates. The number of students placed through the campus interviews is
                            continuously rising.
                        </p>
                        <a class="cta-btn align-self-start" href="#">Get Started</a>
                    </div>
                    <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                        <div class="img">
                            <img src="assets/img/feature-7.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Call To Action Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.svg" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                    </div>
                </div>
            </div>
        </section><!-- End Clients Section -->

        <!-- Features Section -->
        <section id="objectives" class="features" name="objectives">
            <div class="container" data-aos="fade-up">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>Objectives</h3>
                                <p class="fst-italic">
                                    Our Placement Portal serves various objectives:
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Developing the students to meet the Industries recruitment process.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> To motivate students to develop Technical knowledge and soft skills in terms of career planning, goal setting.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> To produce world-class professionals who have excellent analytical skills, communication skills, team building spirit and ability to work in cross-cultural environments.</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="assets/img/features-1.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content -->



                    <section id="our-placements" class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
                <h1>Our Placements</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Scrollable container for the image cards -->
                <div class="placement-slider-wrapper">
                    <div class="placement-slider">
                        <?php
                        // Connect to the database
                        include 'db.php'; // Assuming you have a db.php file that handles your DB connection

                        // Fetch image paths from the 'placements' table
                        $sql = "SELECT image_path FROM placements";  // assuming the images are stored in 'placements' table
                        $result = $conn->query($sql);

                        // Check if there are results
                        if ($result->num_rows > 0) {
                            // Loop through the images and display them directly as cards
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="placement-card">';
                                echo '<img src="uploads/placements/' . $row['image_path'] . '" alt="Placement Image">';
                                echo '</div>';
                            }
                        } else {
                            // If no images are found, display a message
                            echo '<p>No images available.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add CSS and JavaScript for infinite loop scrolling -->



<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('.placement-slider');
        const sliderWidth = slider.scrollWidth;
        const viewportWidth = slider.parentElement.offsetWidth;

        // Duplicate the slider content to make the continuous loop
        slider.innerHTML += slider.innerHTML;

        // Calculate the total width of the duplicated content
        const totalWidth = slider.scrollWidth;

        // Update animation dynamically based on content width
        const animationDuration = totalWidth / 100; // Adjust the divisor for speed
        slider.style.animation = `scroll ${animationDuration}s linear infinite`;

        // Reset position when the animation completes
        slider.addEventListener('animationiteration', function() {
            slider.style.transform = 'translateX(0)';
        });

        // Set the initial transform to start at the first item
        slider.style.transform = 'translateX(0)';
    });
</script> -->













                    <!-- Statistics Section -->
                    <section id="statistics" class="content-header mt-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center latest-job margin-bottom-20">
                                    <h1>Our Statistics</h1>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Total Drives -->
                                <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM job_post";
                                            $result = $conn->query($sql);
                                            $totalno = ($result->num_rows > 0) ? $result->num_rows : 0;
                                            ?>
                                            <h3><?php echo $totalno; ?></h3>
                                            <p>Total Drives</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-ios-paper"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Job Offers -->
                                <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM company WHERE active='1'";
                                            $result = $conn->query($sql);
                                            $totalno = ($result->num_rows > 0) ? $result->num_rows : 0;
                                            ?>
                                            <h3><?php echo $totalno; ?></h3>
                                            <p>Job Offers</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-briefcase"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- CV's/Resume -->
                                <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM users WHERE resume!=''";
                                            $result = $conn->query($sql);
                                            $totalno = ($result->num_rows > 0) ? $result->num_rows : 0;
                                            ?>
                                            <h3><?php echo $totalno; ?></h3>
                                            <p>CV'S/Resume</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-ios-list"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Daily Users -->
                                <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM users WHERE active='1'";
                                            $result = $conn->query($sql);
                                            $totalno = ($result->num_rows > 0) ? $result->num_rows : 0;
                                            ?>
                                            <h3><?php echo $totalno; ?></h3>
                                            <p>Daily Users</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Statistics Section -->

                </div>
            </div>
        </section>
        <!-- End Features Section -->

    </main><!-- End #main -->

    <!-- Footer -->
    <?php include 'php/footer.php'; ?>
    <!-- End Footer -->


    <!-- JS FILES -->

    <!-- Chart.js (Remove one of the versions to prevent duplication) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- Tabs Script (Ensure the path is correct) -->
    <script src="assets/js/tabs.js"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/main1.js"></script>
    <script src="assets/js/counter.js"></script>

    
    <!-- Inline JavaScript for Scroll to Top and Chat Bot -->
    <script>
        // ===== Scroll to Top ==== 
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200); // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200); // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() { // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0 // Scroll to top of body
            }, 500);
        });

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        $("#button").click(function() {
            $('html, body').animate({
                scrollTop: $("#about").offset().top
            }, 1000);
        });
        $("#button1").click(function() {
            $('html, body').animate({
                scrollTop: $("#events").offset().top
            }, 1000);
        });
    </script>

</body>
</html>
