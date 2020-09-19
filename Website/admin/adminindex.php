<?php
    require('../config/config.php');
    require('../config/db.php');
    
    $query = 'SELECT * FROM articles ORDER BY startdate DESC';
    $result = mysqli_query($conn, $query);
    $circulars = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NHPC Admin</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/gijgo.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/all.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="main_menu_iner">
                        <div class="logo">
                            <a href="adminindex.php"><img src="img/logo.png" alt="#"></a>
                        </div>
                        <span class="menu-trigger visible-xs">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <div class="off-canven-menu">
                            <span class="close-icon">
                                <i class="ti-close"></i>
                            </span>
                            <div class="canven-menu-warp">
                                <div class="canven-menu-iner">
                                    <ul>
                                        <li><a href="adminindex.php">Home</a></li>
                                        <li><a href="jba.php">JBA</a></li>
                                        <li><a href="caa.php">CAA</a></li>
                                        <li><a href="cba.php">CBA</a></li>
                                        <li><a href="../circular/circular.php">Circular</a></li>
                                        <li><a href="index.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>What's New</h2>
                    <div class="banner_text">
                        <?php foreach($circulars as $circular): ?>
                            <div class="banner_text_iner">
                                <h5>Issued on: <?php echo $circular['startdate']; ?></h5>
                                <h1><?php echo $circular['title']; ?></h1>
                                <p><?php echo $circular['body']; ?></p>
                                <br><hr noshade="noshade"><br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="nav next"><a href="#"><span class="flaticon-left-arrow"></span></a></div>
                    <div class="nav prev"><a href="#"><span class="flaticon-right-arrow"></span></a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- blog part start-->
    <section class="blog_part">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="section_tittle">
                        <br>
                        <h2>Gallery</h2>
                        <p>Here are some latest media releases of 
                            NHPC Limited. It highlights the work culture
                            of organisation as well as the ongoing projects
                            that are running successfully across India.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog_post_slider owl-carousel">
                        <div class="single_blog_post">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="single_img">
                                        <img src="img/slider1.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog_post">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="single_img">
                                        <img src="img/slider2.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog_post">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="single_img">
                                        <img src="img/slider3.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog_post">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="single_img">
                                        <img src="img/slider4.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog_post">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="single_img">
                                        <img src="img/slider5.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog part end-->

    

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer_1">
                        <div class="social_icon">
                            <a href="https://www.facebook.com/NHPCIndiaLimited/"><i class="ti-facebook"></i></a>
                            <a href="https://twitter.com/nhpcltd?lang=en"><i class="ti-twitter-alt"></i></a>
                            <a href="https://youtu.be/XF3ndSL81x0"><i class="ti-youtube"></i></a>
                            <a href="https://www.instagram.com/nhpclimited/?hl=en"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="footer-text m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i> by Aditya</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
    </script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>