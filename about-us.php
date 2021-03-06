<?php
session_start();
require_once("sistema/config_pw/db.php");
require_once("sistema/config_pw/conexion.php");

?>
<!doctype html>
<html lang="es">

<head>
    <title>Start Sales Furniture|Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Furniture Sales.">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="css/small.css" />
    <link rel="stylesheet" href="css/medium.css" />
    <link rel="stylesheet" href="css/large.css" />
    <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="fonts/font/flaticon.css" rel="stylesheet" type="text/css">


</head>



<body>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
    xfbml            : true,
    version          : 'v10.0'
  });
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
  attribution="install_email"
  page_id="406521723281789">
</div>
    <!--  <header class="top-header">
        <a href="index."><img class="logo" src="images/logo-start.png" alt="logo"></a>
        <section class="headings">
            <h1> Starts Sales Furniture</h1>
            <div class="motto">We find the best option for you</div>
        </section>

    </header> -->

    <div id="page-container">
        <div id="content-wrap">

            <div class="herodiv-about">

                <div class="summary-about">

                    <h1 class="titles about">ABOUT US </h1>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet
                        dolore magna aliquam erat volutpat. Ut wisi enim ad
                        minim veniam, quis nostrud exerci tation ullamcorper
                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto
                        odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                        Lorem ipsum dolor sit amet, cons ectetuer adipiscing
                        elit, sed diam nonummy nibh euismod tincidunt ut
                        laoreet dolore magna aliquam erat volutpat. Ut wisi
                        enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl


                    </p>


                </div>
                <div class="grid-container">
                    <div class="photo photo1 location-image">
                        <img src="images/sofa.jpg" />
                    </div>
                    <div class="photo photo2 location-image">
                        <img src="images/inside.jpg" />
                    </div>
                    <div class="photo photo3 location-image">

                    </div>
                    <div class="photo photo4 location-image">
                        <img src="images/furniture-store.jpg" />
                    </div>
                    <div class="photo photo5 location-image">
                        <img src="images/chair.jpg" />
                    </div>
                    <div class="photo photo6 location-image">

                    </div>
                    <div class="photo photo7 location-image">
                        <img src="images/inside.jpg" />
                    </div>

                </div>

            </div>
            <div id="container" class="container-nav ">
                <nav class="navbar navbar-expand-lg  site-header-alternative navbar-dark topnav">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse  " id="navbarTogglerDemo01">
                        <a class="py-2" href="index.php">
                            <img src="images/logo.png" alt="logo-start-sales" height="50px">

                        </a>

                        <ul class="navbar-nav nav-fill w-100">
                            <li class="nav-item ">
                                <a class="py-2  d-md-inline-block" href="index.php">HOME</a>
                            </li>
                            <!--     <li class="nav-item">
                        <a class="py-2  d-md-inline-block" href="productos.php">CATALOGUE</a>
                    </li> -->

                            <li class="nav-item">
                                <a class="py-2 d-md-inline-block" href="about-us.php">ABOUT US</a>
                            </li>
                            <li class="nav-item">
                                <a class="py-2 d-md-inline-block" href="contact.php">CONTACT US</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>




        </div>

        <footer class="footer" id="footer">
            <div class="container">

                <span class="py-2 d-md-inline-block">&copy; 2020 <span>Start Sales Furniture</span> | <a href="../index.php">HOME</a> | <a href="productos.php">CATALOGUE</a></span>

            </div>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/webfontIndex.js"></script>
    <script src="js/functions.js"></script>
</body>

</html>