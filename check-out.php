<?php
session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>

    <script src="js/webfontIndex.js"></script>
</head>




<body>

    <div class="index-new product-list checkout-page">
        <!--page wrap-->

        <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>



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
                        <a class="py-2  d-md-inline-block" href="productos.php">CATALOGUE</a>
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
                                                <i class="flaticon-shopping-bag"></i>&nbsp; <span>Car</span>
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

                                                        <p>Precio: S/. <?php echo $detalle['precio']; ?></p>
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



        <div class="container product-table padd-80">



            <form action="controller/class.envioMail.php" method="post">
                <div class="row border">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                            <h2 class="font-weight-light mt-2"> Contact</h2>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <h5>Name</h5><input type="text" class="form-control" name="txtFirstname" required value="<?php if (isset($_SESSION['full_name'])) {
                                                                                                                                echo $_SESSION['full_name'];
                                                                                                                            } ?>">
                            </div>
                            <div class="col-md-6">
                                <h5>Last Name</h5><input type="text" class="form-control" name="txtLastName" required value="<?php if (isset($_SESSION['lastname'])) {
                                                                                                                                    echo $_SESSION['lastname'];
                                                                                                                                } ?>">
                            </div>
                            <div class="col-md-6">
                                <h5>Email</h5><input class="form-control" type="email" name="txtEmailAddress" required value="<?php if (isset($_SESSION['user_email'])) {
                                                                                                                                    echo $_SESSION['user_email'];
                                                                                                                                } ?>">
                            </div>
                            <div class="col-md-6">
                                <h5>Phone</h5><input class="form-control" type="text" min="1" pattern="^[0-9]+" name="txtPhone" id="txtPhone" onchange="validarSiNumero(this.value)" required value="<?php if (isset($_SESSION['phone'])) {
                                                                                                                                                                                                            echo $_SESSION['phone'];
                                                                                                                                                                                                        } ?>">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Shipping address</h5>
                                <textarea class="form-control" type="text" value="" name="txtdireccion" style="text-transform:uppercase;padding-bottom:10px;padding-top: 10px"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 checkout">
                            <h2>Your order</h2>
                        </div>
                        <?php
                        if (isset($_SESSION['detalle'])) {
                            $carrito = $_SESSION['detalle'];
                            $total = 0;

                        ?>

                            <div class="col-md-12 element-table detalle-final">
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th style="padding-left: 20px;">Quant.</th>
                                                <th style="padding-left: 20px;">Price</th>
                                                <th style="padding-left: 20px;" class="text-right">Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($carrito as $p) {
                                                $total_uni = $p['cantidad'] * $p['precio'];
                                            ?>

                                                <tr>
                                                    <td><?php echo $p['producto']; ?></td>
                                                    <td class="text-right">
                                                        <input type="number" class="cambia-cantidad" style="width: 60px" min="1" max="10000" step="1" name="txtCantidad" product_id="<?php echo $p['id']; ?>" stock="<?php echo $p['stock']; ?>" value="<?php echo $p['cantidad']; ?>" />
                                                        <input type="hidden" name="txtStock" product_id="<?php echo $p['id']; ?>" value="<?php echo $p['stock']; ?>" />
                                                    </td>
                                                    <td class="text-right"><?php echo "S/" . number_format($p['precio'], 2, ".", ","); ?></td>
                                                    <td class="text-right"><?php echo "S/" . number_format($total_uni, 2, ".", ","); ?></td>
                                                    <td> <button type="button" class="btn btn-sm eliminar-detalle" id="<?php echo $p['id']; ?>"><i class="fa fa-trash"></i></button></td>
                                                </tr>
                                            <?php
                                                $total += $total_uni;
                                            }
                                            ?>
                                            <tr>
                                                <td class="text-uppercase"><b>Total</b></td>
                                                <td colspan="3" class="total text-right"><?php echo "S/ " . number_format($total, 2, ".", ","); ?></td>
                                            </tr>
                                            <tr>
                                                <td> <button type="submit" class="btn btn-primary">Send</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                <?php } ?>
                <div class="row">



                </div>



            </form>

        </div>

        <div class="clearfix"></div>

    </div>
    <footer class="fixed-bottom footer" id="footer">
        <div class="container">

            <span class="py-2 d-md-inline-block">&copy; 2020 <span>Start Sales Furniture</span> | <a href="../index.php">HOME</a> | <a href="productos.php">CATALOGUE</a></span>

        </div>
    </footer>




    <!--checkout-->
    <script src="js/jquery.accordion.js"></script>
    <script>
        const options2 = {
            style: 'currency',
            currency: 'USD'
        };
        var numberFormat2 = new Intl.NumberFormat('en-US', options2);

        $(document).ready(function() {
            $('.accordion').accordion({
                defaultOpen: 'some_id'
            }); //some_id section1 in demo
        });
    </script>
    <!--custom-->
    <script src="js/custom.js"></script>
    <script language=JavaScript>
        $(document).keydown(function(event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                return false;
            }
        });

        /*$(document).on("contextmenu", function (e) {        
            e.preventDefault();
        });*/
    </script>
    <!-- <script src="js/contact_me.js"></script> -->
    <script type="text/javascript" src="js/ajax.js"></script>

    <script>
        function validarSiNumero(numero) {
            var output = document.getElementById('Mensaje');
            var container = "";
            document.getElementById('txtPhone').style = "border-color: default;"
            if (!/^([0-9])*$/.test(numero)) {
                document.getElementById('txtPhone').value = "";
                document.getElementById('txtPhone').style = "border-color: red;"

                container = "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><span>The value " + numero + " is not a number</span></div>";
            } else {

            }
            output.innerHTML = container;
        }
    </script>

</body>

</html>