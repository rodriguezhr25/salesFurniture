<?php
session_start();
require_once("sistema/config_pw/db.php");
require_once("sistema/config_pw/conexion.php");
if (!$_GET) {
    header("Location: index.php?pagina=1");
}
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


    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   
    <!--   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src="js/webfontIndex.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="stylesheet" href="Toast/toastr.min.css">


    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->

</head>
<div class="herodiv-products">
    <!--  <h1 class="bg-brown-products">           
        </h1>
        
        <div class="summary-products">
        <h1 class="titles center">CATALOGUE </h1>          
         
            <ul>
                <li>Beds</li>
                <li>Cabinets</li>
                <li>Chair and seating</li>
                <li>Chest</li>
                <li>Clocks</li>
                <li>Desks</li>
                <li>Tablets</li>
            </ul>


        </div> -->


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
                <!--     <li class="nav-item">
                        <a class="py-2  d-md-inline-block" href="index.php">CATALOGUE</a>
                    </li> -->

                <li class="nav-item">
                    <a class="py-2 d-md-inline-block" href="about-us.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="py-2 d-md-inline-block" href="contact.php">CONTACT US</a>
                </li>
                <li class="nav-item">
                <div id="top" class="container-fluid top-bar">                    
                         

                        <div class="col-md-8 text-right">

                            <div class="cart-item detalle-producto">
                                <?php if (isset($_SESSION['detalle']) && count($_SESSION['detalle']) > 0) { ?>
                                    <div class="bor cart-det">
                                        <i class="flaticon-shopping-bag"></i>&nbsp; <span>Cart</span>
                                    </div>

                                    <div class="cart-item-hover">
                                        <?php
                                        $total = 0;
                                        foreach ($_SESSION['detalle'] as $k => $detalle) {
                                            $img = "http://www.starsales.online/2021/" . $detalle['imagen'];
                                        ?>

                                            <div class="cart-item-list text-left">
                                                <img src="<?php echo $img; ?>" style="width: 120px; height: 120px" alt="" />
                                                <a href="#">
                                                    <h3><?php if (strlen($detalle['producto']) > 42) {
                                                            echo substr($detalle['producto'], 0, 42), '...';
                                                        } else {
                                                            echo $detalle['producto'];
                                                        }; ?></h3>
                                                </a>
                                                <a href="#">
                                                    <h3>Cantidad: <?php echo $detalle['cantidad']; ?></h3>
                                                </a>
                                                <b><button type="button" class="btn btn-xs btn-primary eliminar-producto" id="<?php echo $detalle['id']; ?>">X</button></b>

                                                <p>Precio: $. <?php echo $detalle['precio']; ?></p>
                                                <?php $total += $detalle['precio'] * $detalle['cantidad']; ?>
                                            </div>

                                            <div style="padding-top: 30px"></div>
                                        <?php } ?>
                                        <div class="border"></div>

                                        <div class="cart-total">                                        
                                            <a href="check-out.php" class="cart-checkout">Finish</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                      
                    </div>
                </div>
                </li>
            </ul>
        </div>
    </nav>
</div>



<body>
    <script src="Toast/toastr.min.js"></script>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v10.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution="install_email" page_id="406521723281789">
    </div>




    <div id="page-container">
        <div id="content-wrap">








            <div class="container latest-product main-view">
                <div id="titulo" class="col-md-12 sec-head text-center">
                    <h1 class="titles">Our Products </h1>

                    <span></span><br>
                    <p>We offer the best quality and price</p>
                </div>


                <div>
                    <form action=<?php echo "index.php?pagina=1" ?> method="post">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search..." aria-label="Default" class="form-control" />
                            <div class="input-group-btn">
                                <button type='submit' class="btn btn-primary" value="Buscar"><span class="fa fa-search"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="row">
                            <?php
                            $articulos_x_pagina = 12;
                            $link = 5;
                            $search = '';
                            $searchFilter = '';
                            if (isset($_POST['search']) or isset($_GET['search'])) {
                                // $search = $_POST['search'];
                                if (isset($_POST['search'])) {
                                    $search = $_POST['search'];
                                } else {
                                    $search =  $_GET['search'];
                                }
                                $query = "SELECT count(*) AS numrows FROM articulos  WHERE stockfis > 0 AND imagenPropia > 0 AND (UPPER(descripcion) LIKE UPPER('%" . $search . "%') or UPPER(codbarras)  LIKE UPPER('%" . $search . "%')) ";
                                $count_query = mysqli_query($con, $query);
                                echo '<script>';
                                echo 'console.log(' . json_encode($query) . ')';
                                echo '</script>';

                                if ($row = mysqli_fetch_array($count_query)) {
                                    $numrows_sear = $row['numrows'];
                                }
                                $paginas = ceil($numrows_sear / $articulos_x_pagina);
                                //Calcular inicio de paginación
                                $start = (($_GET['pagina'] - $link) > 0) ? $_GET['pagina'] - $link : 1;
                                //Calcular fin de paginación
                                $end =  (($_GET['pagina'] + $link) < $paginas) ? $_GET['pagina'] + $link : $paginas;
                                $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;

                                $query = "SELECT *  FROM articulos WHERE stockfis > 0 AND imagenPropia = 1 AND (UPPER(descripcion) LIKE UPPER('%" . $search . "%') or UPPER(codbarras)  LIKE UPPER('%" . $search . "%')) order by factualizado LIMIT $inciar, $articulos_x_pagina";

                                $sql_proudcts_all = mysqli_query($con, $query);
                            } else {
                                $query = "SELECT count(*) AS numrows FROM articulos WHERE stockfis > 0  AND imagenPropia = 1";
                                echo '<script>';
                                echo 'console.log(' . json_encode($query) . ')';
                                echo '</script>';
                                $count_query = mysqli_query($con, $query);
                                echo '<script>';
                                echo 'console.log(' . json_encode($count_query) . ')';
                                echo '</script>';
                                if (mysqli_num_rows($count_query) > 0) {
                                    if ($row = mysqli_fetch_array($count_query)) {
                                        $numrows = $row['numrows'];
                                    }
                                } else {
                                    $numrows = 10;
                                }
                                $paginas = ceil($numrows / $articulos_x_pagina);
                                //Calcular inicio de paginación
                                $start = (($_GET['pagina'] - $link) > 0) ? $_GET['pagina'] - $link : 1;
                                //Calcular fin de paginación
                                $end =  (($_GET['pagina'] + $link) < $paginas) ? $_GET['pagina'] + $link : $paginas;
                                /* if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                                header("Location: index.php?pagina=1");
                            }*/
                                // $codbarras2 = 220350034;
                                $inciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
                                // $test = "SELECT codbarras,descripcion,buying_price,selling_price,profit,note,image_path,product_code,model FROM products WHERE status='1' AND product_code = '220500006'   order by Orden LIMIT $inciar, $articulos_x_pagina";
                                $query = "SELECT * FROM articulos WHERE stockfis > 0  AND imagenPropia = 1 order by factualizado LIMIT $inciar, $articulos_x_pagina";

                                $sql_proudcts_all = mysqli_query($con, $query);
                            }

                            if (mysqli_num_rows($sql_proudcts_all) > 0) {

                                while ($row = mysqli_fetch_array($sql_proudcts_all)) {
                                    if (!empty($row['imagen'])) {
                                        $image_path = "http://www.starsales.online/2021/" . $row['imagen'];
                                    } else {
                                        $image_path = $row['linkproducto'];
                                    }



                            ?>


                                    <div class="col-md-4 col-sm-12 ">

                                        <div class="product">
                                            <div class="product-img">
                                                <a href="" data-toggle="modal" data-target="#quick-modal<?php echo $row['codbarras']; ?>">
                                                    <img src="<?php echo $image_path; ?>" style="width: 220px; height: 220px" alt="" class="img-home" />
                                                </a>
                                                <div class="new-discount offer-discount"> New </div>
                                            </div>
                                            <div class="product-body">
                                                <div>
                                                    <p><a href="#"><?php echo $row["descripcion"]; ?></a></p>
                                                </div>


                                            </div>
                                            <h4 class="price">Price: $ <?php echo $row["pvp"]; ?></h4>
                                            <div class="product-body">

                                                <div class="detail-row quantity-box text-center">
                                                    <div id="field1" class="input--filled" style="padding-left: 20px;">
                                                        <input class="form-control" type="number" name="cantidad" id="cantidad<?php echo $row['codbarras']; ?>" min="1" max="10000" step="1" value="1">
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <input type="hidden" id="producto<?php echo $row['codbarras']; ?>" value="<?php echo $row["descripcion"]; ?>">
                                                    <input type="hidden" id="precio<?php echo $row2['codbarras']; ?>" value="<?php
                                                                                                                                echo $row["pvp"];
                                                                                                                                ?>">
                                                    <input type="hidden" id="id<?php echo $row['codbarras']; ?>" value="<?php echo $row['codbarras']; ?>">
                                                    <input type="hidden" id="stock<?php echo $row['codbarras']; ?>" value="<?php echo $row['stockfis']; ?>">
                                                    <input type="hidden" id="product_code<?php echo $row['codbarras']; ?>" value="<?php echo $row["codbarras"]; ?>">
                                                    <!--              
                                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#quick-modal<?php echo $row['codbarras']; ?>" id="agregar<?php echo $row['codbarras']; ?>">Add to Cart</button> -->
                                                    <button type="button" class="btn btn-success" id="agregar<?php echo $row['codbarras']; ?>">Add to Cart</button>
                                                    <div class="clearfix"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        $('#agregar<?php echo $row['codbarras']; ?>').click(function() {
                                            toastr.options = {
                                                "closeButton": false,
                                                "debug": false,
                                                "newestOnTop": false,
                                                "progressBar": false,
                                                "positionClass": "toast-top-right",
                                                "preventDuplicates": false,
                                                "onclick": null,
                                                "showDuration": "300",
                                                "hideDuration": "800",
                                                "timeOut": "800",
                                                "extendedTimeOut": "1000",
                                                "showEasing": "swing",
                                                "hideEasing": "linear",
                                                "showMethod": "fadeIn",
                                                "hideMethod": "fadeOut"
                                            }
                                            toastr["success"]("Article Added.", "Sales Furniture");
                                            var producto = document.getElementById('producto<?php echo $row['codbarras']; ?>').value;
                                            var precio = document.getElementById('precio<?php echo $row['codbarras']; ?>').value;
                                            var cantidad = document.getElementById('cantidad<?php echo $row['codbarras']; ?>').value;
                                            var id = document.getElementById('id<?php echo $row['codbarras']; ?>').value;

                                            var product_code = document.getElementById('product_code<?php echo $row['codbarras']; ?>').value;

                                            var stock = document.getElementById('stock<?php echo $row['codbarras']; ?>').value;

                                            var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id +
                                                "&pcod=" + product_code + "&stk=" + stock;

                                            $.ajax({
                                                url: 'header.php',
                                                type: 'POST',
                                                data: ruta,
                                                dataType: 'json',
                                                success: function(data) {
                                                    if (data.success == true) {
                                                        $(".detalle-producto").load('detalle.php');
                                                    } else {
                                                        alertify.error(data.msj);
                                                    }
                                                    $(".detalle-producto").load('detalle.php');
                                                },
                                                error: function(jqXHR, textStatus, error) {
                                                    alertify.error(error);
                                                }
                                            });
                                        });
                                    </script>
                                    <!--modal-->

                                    <?php
                                    $codbarras = $row['codbarras'];

                                    $sql_proudcts_one = mysqli_query($con, "SELECT * FROM articulos WHERE codbarras ='$codbarras'");
                                    $row2 = mysqli_fetch_array($sql_proudcts_one);
                                    $image2 = ($row2['imagen2'] == 'null' || $row2['imagen2'] == 'NULL') ? "" : $row2['imagen2'];
                                    $image3 = ($row2['imagen3'] == 'null' || $row2['imagen3'] == 'NULL') ? "" : $row2['imagen3'];
                                    $image4 = ($row2['imagen4'] == 'null' || $row2['imagen4'] == 'NULL') ? "" : $row2['imagen4'];
                                    $image5 = ($row2['imagen5'] == 'null' || $row2['imagen5'] == 'NULL') ? "" : $row2['imagen5'];
                                    $image6 = ($row2['imagen6'] == 'null' || $row2['imagen6'] == 'NULL') ? "" : $row2['imagen6'];
                                    $video = ($row2['linkproducto'] == 'null'  || $row2['linkproducto'] == 'NULL') ? "" : $row2['linkproducto'];
                                    //  $image_path = ($row2['imagen'] == 'null' || $row2['imagen'] == 'NULL') ? $row2['linkproducto'] :"http://www.starsales.online/2021/" . $row2['imagen'];
                                    $image_path_2 = ($row2['imagen2'] == 'null' || $row2['imagen2'] == 'NULL') ? "" : "http://www.starsales.online/2021/" . $row2['imagen2'];
                                    $image_path_3 = ($row2['imagen3'] == 'null' || $row2['imagen3'] == 'NULL') ? "" : "http://www.starsales.online/2021/" . $row2['imagen3'];
                                    $image_path_4 = ($row2['imagen4'] == 'null' || $row2['imagen4'] == 'NULL') ? "" : "http://www.starsales.online/2021/" . $row2['imagen4'];
                                    $image_path_5 = ($row2['imagen5'] == 'null' || $row2['imagen5'] == 'NULL') ? "" : "http://www.starsales.online/2021/" . $row2['imagen5'];
                                    $image_path_6 = ($row2['imagen6'] == 'null' || $row2['imagen6'] == 'NULL') ? "" : "http://www.starsales.online/2021/" . $row2['imagen6'];
                                    $video_path = $row2['linkproducto'];

                                    $sql_hijos = mysqli_query($con, "SELECT * FROM articulos h  WHERE codbarras='$codbarras'");
                                    $hijos = mysqli_fetch_array($sql_hijos);

                                    ?>

                                    <div class="modal fade quick-modal in" id="quick-modal<?php echo $row2['codbarras']; ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <div class="row">
                                                        <div class="col-md-7">



                                                            <div id="carousel<?php echo $row2['codbarras']; ?>" class="carousel slide" data-ride="carousel">

                                                                <ol class="carousel-indicators">
                                                                    <li data-target="#carousel<?php echo $row2['codbarras']; ?>" class="slide0" data-slide-to="0" class="active"></li>
                                                                    <?php



                                                                    if (!empty($image2)) {

                                                                        echo ' <li data-target="#carousel' . $row2['codbarras'] . '" class = "slide1" data-slide-to="1" ></li>';
                                                                    }

                                                                    if (!empty($image3)) {

                                                                        echo ' <li data-target="#carousel' . $row2['codbarras'] . '" class = "slide2" data-slide-to="2"></li>';
                                                                    }

                                                                    if (!empty($image4)) {

                                                                        echo ' <li data-target="#carousel' . $row2['codbarras'] . '" class = "slide3" data-slide-to="3"></li>';
                                                                    }
                                                                    if (!empty($image5)) {

                                                                        echo ' <li data-target="#carousel' . $row2['codbarras'] . '" class = "slide3" data-slide-to="4"></li>';
                                                                    }
                                                                    if (!empty($image6)) {

                                                                        echo ' <li data-target="#carousel' . $row2['codbarras'] . '" class = "slide3" data-slide-to="5"></li>';
                                                                    }

                                                                    ?>
                                                                </ol>
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">

                                                                        <img id="imgP<?php echo $row2["codbarras"]; ?>" src="<?php echo $image_path; ?>" alt="" style="cursor:pointer" data-toggle="modal" data-target="#myModal_img<?php echo $row2['codbarras']; ?>" data-myvalue="<?php echo $image_path; ?>" class="open-Dialog">
                                                                    </div>
                                                                    <?php

                                                                    if (!empty($image2)) {

                                                                        echo '<div class="carousel-item" data-thumb="1"> <img src="' . $image_path_2 . '" alt="" style="cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['codbarras'] . '" data-myvalue2="' . $image_path_2 . '" class="open-Dialog2"> </div>';
                                                                    }

                                                                    if (!empty($image3)) {

                                                                        echo '<div class="carousel-item" data-thumb="2"> <img src="' . $image_path_3 . '" alt="" style=" cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['codbarras'] . '" data-myvalue3="' . $image_path_3 . '" class="open-Dialog3"> </div>';
                                                                    }

                                                                    if (!empty($image4)) {

                                                                        echo '<div class="carousel-item" data-thumb="2"> <img src="' . $image_path_4 . '" alt="" style=" cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['codbarras'] . '" data-myvalue4="' . $image_path_4 . '" class="open-Dialog4"> </div>';
                                                                    }
                                                                    if (!empty($image5)) {

                                                                        echo '<div class="carousel-item" data-thumb="2"> <img src="' . $image_path_5 . '" alt="" style=" cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['codbarras'] . '" data-myvalue5="' . $image_path_5 . '" class="open-Dialog5"> </div>';
                                                                    }
                                                                    if (!empty($image6)) {

                                                                        echo '<div class="carousel-item" data-thumb="2"> <img src="' . $image_path_6 . '" alt="" style=" cursor:pointer" data-toggle="modal" data-target="#myModal_img' . $row2['codbarras'] . '" data-myvalue5="' . $image_path_6 . '" class="open-Dialog5"> </div>';
                                                                    }
                                                                    ?>

                                                                </div>
                                                                <a class="carousel-control-prev" href="#carousel<?php echo $row2['codbarras']; ?>" role="button" data-slide="prev">
                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next" href="#carousel<?php echo $row2['codbarras']; ?>" role="button" data-slide="next">
                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-5 detail-right">
                                                            <div class="detail-top">
                                                                <h1 id="nombreP<?php echo $row2["codbarras"]; ?>"><?php echo $row2["descripcion"]; ?></h1>
                                                                <div class="rating">
                                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="rate">

                                                                    <h2 id="precioP<?php echo $row2["codbarras"]; ?>">Price: $ <?php

                                                                                                                                echo $row["pvp"];

                                                                                                                                ?> </h2>



                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="detail">
                                                                <div class="sub-menu">
                                                                    <span href="">Details</span>
                                                                    <p id="descripcionP<?php echo $row2["observaciones"]; ?>"><?php echo $row2["observaciones"]; ?></p>
                                                                </div>
                                                            </div>



                                                            <div class="detail feature">
                                                                <div class="sub-menu">
                                                                    <div class="detail-btm">

                                                                        <form action="">
                                                                            <div class="detail-row quantity-box">

                                                                                <input type="hidden" id="producto<?php echo $row2['codbarras']; ?>" value="<?php echo $row2["descripcion"]; ?>">
                                                                                <input type="hidden" id="precio<?php echo $row2['codbarras']; ?>" value="<?php
                                                                                                                                                            echo $row["pvp"];
                                                                                                                                                            ?>">
                                                                                <input type="hidden" id="id<?php echo $row2['codbarras']; ?>" value="<?php echo $row2['codbarras']; ?>">

                                                                                <input type="hidden" id="product_code<?php echo $row['codbarras']; ?>" value="<?php echo $row["referencia"]; ?>">
                                                                                <input type="hidden" id="model<?php echo $row['codbarras']; ?>" value="<?php echo $row["descripcion"]; ?>">



                                                                                <div class="clearfix"></div>
                                                                            </div>
                                                                        </form>


                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!--modal_img-->

                                    <div id="myModal_img<?php echo $row2['codbarras']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">&nbsp;</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo $image_path; ?>" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="myModal_vid<?php echo $row2['codbarras']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">&nbsp;</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe width="100%" height="380" name="vidID" id="vidID" allowFullScreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php  }
                            } else {
                                if ((isset($_POST['search']) or isset($_GET['search'])) && (isset($_GET['categ']))) {
                                    echo '<h3 style="text-align:center">No se encontraron resultados para <span style="color:#1F487E">"' . $searchFilter . ' "</span> en la categoría <span style="color:#1F487E">"' . $search . ' "</span></h3>';
                                    echo '<script>$("#titulo").css("display", "none");</script>';
                                } else {
                                    echo '<h3 style="text-align:center">No se encontraron resultados para <span style="color:#1F487E">"' . $search . '"</span></h3>';
                                    echo '<script>$("#titulo").css("display", "none");</script>';
                                }
                            }
                            ?>

                        </div>
                    </div>

                    <div class="col-md-12 col-xs-12">
                        <center>
                            <nav id="pag" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center pagination-sm pagination-xs">
                                    <?php
                                    //   echo $start;
                                    //   echo $end;
                                    $pagina_actual = $_GET['pagina'];
                                    $class = ($pagina_actual == 1) ? "disabled" : ""; //desactivar boton previo
                                    // $pagina_previa = ($pagina_actual == 1) 


                                    if (isset($_GET['fam'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&fam=<?php echo $_GET['fam']; ?>">Anterior</a>
                                        </li>
                                    <?php
                                    } else if (isset($_GET['sub_fam'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>">Anterior</a>
                                        </li>
                                    <?php
                                    } else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) { //nuevo filtro de categorias
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&categ=<?php echo $_GET['categ']; ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                                                                echo $_POST['search'];
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $_GET['search'];
                                                                                                                                                                            } ?><?php if (isset($_GET['marca'])) {
                                                                                                                                                                        echo "&marca=" . $_GET['marca'];
                                                                                                                                                                    } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                                                    echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                                                } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                                                        echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                                                    } ?>">Anterior</a>
                                        </li>
                                    <?php
                                    } else if (isset($_GET['categ'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1; ?>&categ=<?php echo $_GET['categ']; ?><?php if (isset($_GET['marca'])) {
                                                                                                                                                                        echo "&marca=" . $_GET['marca'];
                                                                                                                                                                    } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                                echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                            } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                                    echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                                } ?>">Anterior</a>
                                        </li>
                                    <?php
                                    } else if (isset($_POST['search']) or isset($_GET['search'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo ($_GET['pagina'] - 1); ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                            echo $_POST['search'];
                                                                                                                                        } else {
                                                                                                                                            echo $_GET['search'];
                                                                                                                                        } ?><?php if (isset($_GET['marca'])) {
                                                                                                                                    echo "&marca=" . $_GET['marca'];
                                                                                                                                } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                            } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                    echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                } ?>">Anterior</a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1; ?><?php if (isset($_GET['marca'])) {
                                                                                                                                    echo "&marca=" . $_GET['marca'];
                                                                                                                                } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                            echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                        } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                            } ?>">Anterior</a>
                                        </li>
                                    <?php
                                    }
                                    if ($start > 1) {
                                    ?>
                                        <?php
                                        if (isset($_POST['search']) or isset($_GET['search'])) {
                                        ?>
                                            <li class="page-item ">
                                                <a class="page-link" href="index.php?pagina=1&search=<?php if (isset($_POST['search'])) {
                                                                                                                echo $_POST['search'];
                                                                                                            } else {
                                                                                                                echo $_GET['search'];
                                                                                                            } ?><?php if (isset($_GET['marca'])) {
                                                                                                        echo "&marca=" . $_GET['marca'];
                                                                                                    } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                                                                echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                                                            } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                                                                    echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                                                                } ?>">1</a>
                                            </li>
                                            <li class="disabled">
                                                <span>...</span>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item ">
                                                <a class="page-link" href="index.php?pagina=1<?php if (isset($_GET['marca'])) {
                                                                                                        echo "&marca=" . $_GET['marca'];
                                                                                                    } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                echo "&precioMin=" . $_GET['precioMin'];
                                                                                            } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                            } ?>">1</a>
                                            </li>
                                            <li class="disabled">
                                                <span>...</span>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <?php

                                    }
                                    // for ($i = 0; $i < $paginas; $i++) {


                                    for ($i = $start - 1; $i < $end; $i++) {
                                        if (isset($_GET['fam'])) {
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?pagina=<?php echo $i + 1; ?>&fam=<?php echo $_GET['fam']; ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php
                                        } else if (isset($_GET['sub_fam'])) {
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?pagina=<?php echo $i + 1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php
                                        } else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) { //nuevo filtro de categorias
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?pagina=<?php echo $i + 1; ?>&categ=<?php echo $_GET['categ']; ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                                                        echo $_POST['search'];
                                                                                                                                                                    } else {
                                                                                                                                                                        echo $_GET['search'];
                                                                                                                                                                    } ?><?php if (isset($_GET['marca'])) {
                                                                                                                                                                echo "&marca=" . $_GET['marca'];
                                                                                                                                                            } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                                            echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                                        } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                                                echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                                            } ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php
                                        } else if (isset($_GET['categ'])) {
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?pagina=<?php echo $i + 1; ?>&categ=<?php echo $_GET['categ']; ?><?php if (isset($_GET['marca'])) {
                                                                                                                                                                echo "&marca=" . $_GET['marca'];
                                                                                                                                                            } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                        echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                    } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                        echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                    } ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php
                                        } else if (isset($_POST['search']) or isset($_GET['search'])) {
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?pagina=<?php echo ($i + 1); ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                    echo $_POST['search'];
                                                                                                                                } else {
                                                                                                                                    echo $_GET['search'];
                                                                                                                                } ?><?php if (isset($_GET['marca'])) {
                                                                                                                            echo "&marca=" . $_GET['marca'];
                                                                                                                        } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                        echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                    } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                            echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                        } ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?pagina=<?php echo $i + 1; ?><?php if (isset($_GET['marca'])) {
                                                                                                                            echo "&marca=" . $_GET['marca'];
                                                                                                                        } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                    echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                    echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                } ?>"><?php echo $i + 1; ?></a>
                                            </li>
                                        <?php
                                        }
                                    }
                                    if ($end < $paginas) {
                                        ?>
                                        <li class="disabled">
                                            <span>...</span>
                                        </li>
                                        <!-- rafael, para tomar filtro de busqueda -->
                                        <?php
                                        if (isset($_POST['search']) or isset($_GET['search'])) { ?>
                                            <li class="page-item ">
                                                <a class="page-link" href="index.php?pagina=<?php echo $paginas; ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                    echo $_POST['search'];
                                                                                                                                } else {
                                                                                                                                    echo $_GET['search'];
                                                                                                                                } ?><?php if (isset($_GET['marca'])) {
                                                                                                                            echo "&marca=" . $_GET['marca'];
                                                                                                                        } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                        echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                    } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                            echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                        } ?><?php if (isset($_GET['categ'])) {
                                                                                                                                                                                                                                                                                            echo "&categ=" . $_GET['categ'];
                                                                                                                                                                                                                                                                                        } ?>"><?php echo $paginas; ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="page-item ">
                                                <a class="page-link" href="index.php?pagina=<?php echo $paginas; ?><?php if (isset($_GET['marca'])) {
                                                                                                                            echo "&marca=" . $_GET['marca'];
                                                                                                                        } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                    echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                        echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                    } ?><?php if (isset($_GET['categ'])) {
                                                                                                                                                                                                                                                                        echo "&categ=" . $_GET['categ'];
                                                                                                                                                                                                                                                                    } ?>"><?php echo $paginas; ?></a>
                                            </li>
                                        <?php } ?>

                                    <?php

                                    }
                                    if (isset($_GET['fam'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1; ?>&fam=<?php echo $_GET['fam']; ?>">Siguiente</a>
                                        </li>
                                    <?php
                                    } else if (isset($_GET['sub_fam'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1; ?>&sub_fam=<?php echo $_GET['sub_fam']; ?>">Siguiente</a>
                                        </li>
                                    <?php
                                    } else if (isset($_GET['categ']) && (isset($_POST['search']) or isset($_GET['search']))) { //nuevos filtros
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo ($_GET['pagina'] + 1); ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                            echo $_POST['search'];
                                                                                                                                        } else {
                                                                                                                                            echo $_GET['search'];
                                                                                                                                        } ?>&categ=<?php echo $_GET['categ']; ?><?php if (isset($_GET['marca'])) {
                                                                                                                                                                        echo "&marca=" . $_GET['marca'];
                                                                                                                                                                    } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                                                    echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                                                } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                                                        echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                                                    } ?>">Siguiente</a>
                                        </li>
                                    <?php

                                    } else if (isset($_GET['categ'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1; ?>&categ=<?php echo $_GET['categ']; ?><?php if (isset($_GET['marca'])) {
                                                                                                                                                                        echo "&marca=" . $_GET['marca'];
                                                                                                                                                                    } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                                echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                                            } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                                    echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                                } ?>">Siguiente</a>
                                        </li>
                                    <?php
                                    } else if (isset($_POST['search']) or isset($_GET['search'])) {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo ($_GET['pagina'] + 1); ?>&search=<?php if (isset($_POST['search'])) {
                                                                                                                                            echo $_POST['search'];
                                                                                                                                        } else {
                                                                                                                                            echo $_GET['search'];
                                                                                                                                        } ?><?php if (isset($_GET['marca'])) {
                                                                                                                                    echo "&marca=" . $_GET['marca'];
                                                                                                                                } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                                                echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                                            } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                                    echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                                                } ?>">Siguiente</a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1; ?><?php if (isset($_GET['marca'])) {
                                                                                                                                    echo "&marca=" . $_GET['marca'];
                                                                                                                                } ?><?php if (isset($_GET['precioMin'])) {
                                                                                                                            echo "&precioMin=" . $_GET['precioMin'];
                                                                                                                        } ?><?php if (isset($_GET['precioMax'])) {
                                                                                                                                                                                                echo "&precioMax=" . $_GET['precioMax'];
                                                                                                                                                                                            } ?>">Siguiente</a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </center>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>



        </div>

        <footer class="fixed-bottom footer" id="footer">
            <div class="container">

                <span class="py-2 d-md-inline-block">&copy; 2020 <span>Start Sales Furniture</span> | <a href="../index.php">HOME</a> | <a href="index.php">CATALOGUE</a></span>

            </div>
        </footer>
    </div>


    <script src="js/functions.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script language=JavaScript>
        /*  $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    $(document).on("contextmenu", function (e) {        
        e.preventDefault();
    });*/

        $(document).on("click", ".open-Dialog", function() {
            var myValue = $(this).data('myvalue');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });
        $(document).on("click", ".open-Dialog2", function() {
            var myValue = $(this).data('myvalue2');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });
        $(document).on("click", ".open-Dialog3", function() {
            var myValue = $(this).data('myvalue3');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });

        $(document).on("click", ".img-home", function() {
            var myValue1 = $('.open-Dialog').data('myvalue');
            var myValue2 = $('.open-Dialog2').data('myvalue2');
            var myValue3 = $('.open-Dialog3').data('myvalue3');
            // var myValue4 = $('.open-Vid').data('myvalue4');



        });
        $(document).on("click", ".open-Vid", function() {
            var myValue = $(this).data('myvalue4');
            $(".modal-body #vidID").val(myValue);
            $(".modal-body #vidID").attr('src', myValue);

        });
        $('.close').on('click', function() {

            var video = $(".modal-body #vidID").attr("src");
            $(".modal-body #vidID").attr("src", "");
            $(".modal-body #vidID").attr("src", video);

        });
        window.onclick = function(event) {
            var target = event.target;
            if (target.classList.contains('modal')) {
                target.style.display = "none";
                stopVideo(target);

            }
        }

        $('#botonPrecios').on('click', function(e) {

            e.preventDefault();
            var min = document.getElementById("precioMin").value;
            var max = document.getElementById("precioMax").value;

            min = typeof(min) == 'undefined' || min == "" ? 0 : min;
            max = typeof(max) == 'undefined' || max == "" ? 0 : max;
            if (max > 0) {
                var href = $(this).attr('href').toString().trim(),
                    queryString = 'precioMin=' + min + "&precioMax=" + max;
            } else {
                var href = $(this).attr('href').toString().trim(),
                    queryString = 'precioMin=' + min;
            }


            if (href.indexOf('?') !== -1) {

                newHref = href + '&' + queryString;

            } else {

                newHref = href + '?' + queryString;
            }

            window.location.href = newHref;
        });

        function dataHijos(id, nombre, precio1, precio2, model, categoria, img1, img2, img3, video, idPadre, note) {


            var nombreID = 'nombreP' + idPadre;
            var precioID = 'precioP' + idPadre;
            var descripcionID = 'descripcionP' + idPadre;
            var codigoID = 'codigoP' + idPadre;
            var categoriaID = 'categoriaP' + idPadre;
            var codigoSpanID = 'codigoSpan' + idPadre;
            var categoriaSpanID = 'categoriaSpan' + idPadre;
            var imgID = 'imgP' + idPadre;
            var productoCarritoID = 'producto' + idPadre;
            var precioCarritoID = 'precio' + idPadre;
            var CarritoID = 'id' + idPadre;
            console.log(nombreID);
            document.getElementById(nombreID).innerHTML = nombre;
            document.getElementById(precioID).innerHTML = "Precio: $. " + precio1;
            document.getElementById(descripcionID).innerHTML = note;
            document.getElementById(codigoID).innerHTML = model;
            document.getElementById(categoriaID).innerHTML = categoria;
            document.getElementById(codigoSpanID).innerHTML = "Codigo: ";
            document.getElementById(categoriaSpanID).innerHTML = "Categoria: ";
            document.getElementById(imgID).src = img1;
            document.getElementById(productoCarritoID).value = nombre;
            document.getElementById(precioCarritoID).value = precio1;
            document.getElementById(CarritoID).value = id;
        }

        function stopVideo(modal) {
            var currentIframe = modal.querySelector('.modal-body > iframe');
            currentIframe.src = currentIframe.src;
        }
    </script>
</body>

</html>