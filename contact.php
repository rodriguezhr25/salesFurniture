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

    <!--  <header class="top-header">
        <a href="index."><img class="logo" src="images/logo-start.png" alt="logo"></a>
        <section class="headings">
            <h1> Starts Sales Furniture</h1>
            <div class="motto">We find the best option for you</div>
        </section>

    </header> -->

    <div id="page-container">
        <div id="content-wrap">


            <div class="herodiv-contact">
                <h1 class="bg-brown-contact">
                </h1>

                <div class="summary-contact">
                    <h1 class="titles center single">FINANCING PLANS, DELIVERY AND NEW MERCH <span class="ligther">EVERY WEEK. </span> </h1>

                    <div class="btn-wraper">
                        <button type="button" class="btn  btn-danger btn-lg">LEARN MORE</button>
                    </div>


                </div>


            </div>
            <div id="container" class="container-nav">
                <nav class="navbar navbar-expand-lg site-header navbar-dark topnav">

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
                            <li class="nav-item">
                                <a class="py-2  d-md-inline-block" href="productos.php">CATALOGUE</a>
                            </li>

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
            <div class="container">
            <div class="contact3 py-5">
  <div class="row no-gutters">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="card-shadow">
         
        <iframe width="100%" height="538" frameborder="0"  style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:Ei40ODg1IFMgUmVkd29vZCBSZCwgVGF5bG9yc3ZpbGxlLCBVVCA4NDEyMywgVVNBIjESLwoUChIJ6SckaJKLUocRMTU-5aSHun4QlSYqFAoSCdWNL-iQhlKHEYoXWCACyx5K&key=AIzaSyC2-MPgIlcnvLdo5tp8DY87Yv4J6oujgkI" allowfullscreen data-aos="fade-left" data-aos-duration="3000"></iframe> 
    
    </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-box ml-3">
            <h1 class="font-weight-light mt-2">Quick Contact</h1>
            <form class="mt-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                    <input class="form-control" type="text" placeholder="name">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                    <input class="form-control" type="email" placeholder="email address">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                    <input class="form-control" type="text" placeholder="phone">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                    <textarea class="form-control" rows="3" placeholder="message"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <button type="submit" class="btn btn-danger-gradiant mt-3 text-white border-0 px-3 py-2"><span> SUBMIT</span></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="card mt-4 border-0 mb-4">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="card-body d-flex align-items-center c-detail pl-0">
                  <div class="mr-3 align-self-center">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon1.png">
                  </div>
                  <div class="">
                    <h6 class="font-weight-medium">Address</h6>
                    <p class="">4885 S Redwood Rd
                      <br> Taylorsville, UT</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="card-body d-flex align-items-center c-detail">
                  <div class="mr-3 align-self-center">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon2.png">
                  </div>
                  <div class="">
                    <h6 class="font-weight-medium">Phone</h6>
                    <p class="">251 546 9442
                      <br> 630 446 8851</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="card-body d-flex align-items-center c-detail">
                  <div class="mr-3 align-self-center">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon3.png">
                  </div>
                  <div class="">
                    <h6 class="font-weight-medium">Email</h6>
                    <p class="">
                      info@wrappixel.com
                      <br> 123@wrappixel.com
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
               <!--  <div class="bg-info contact4 overflow-hiddedn position-relative">
                  
                    <div class="row no-gutters">

                        <div class="col-lg-6 contact-box mb-4 mb-md-0">
                            <div class="container">
                                <h1 class="titles  mt-2">Contact Us</h1>
                                <form class="mt-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-2">
                                                <input class="form-control " type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mt-2">
                                                <input class="form-control " type="email" placeholder="email address">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mt-2">
                                                <textarea class="form-control " rows="3" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex align-items-center mt-2">
                                            <button type="submit" class="btn bg-success text-inverse px-3 py-2"><span> Submit</span></button>
                                            <span class="ml-auto  align-self-center"><i class="icon-phone mr-2"></i>251 546 9442</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 right-image p-r-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1619902.0054433027!2d-122.68851282163044!3d37.534535608111824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1507725785789" width="100%" height="538" frameborder="0" style="border:0" allowfullscreen data-aos="fade-left" data-aos-duration="3000"></iframe>
                        </div>
                    </div>
                </div> -->


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