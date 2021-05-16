<?php 
@session_start();
?>
<?php if(isset($_SESSION['detalle'])){ ?>
<div class="bor cart-det">
    <i class="flaticon-shopping-bag"></i>&nbsp; <h2>Cart</h2>
</div> 

<div class="cart-item-hover">                    
    <?php
        $total=0;
        foreach($_SESSION['detalle'] as $k => $detalle) {
            $img="http://www.starsales.online/2021/".$detalle['imagen'];
    ?>
    
    <form>
        <div class="cart-item-list text-left">
        <img src="<?php echo $img; ?>" style="width: 120px; height: 120px" alt=""  />
        <a href="#"><h3><?php  if (strlen($detalle['producto'])>42)  {echo substr($detalle['producto'],0,42),'...';}else {echo $detalle['producto'];}; ?></h3>

            <a href="#"><h3>Cantidad: <?php echo $detalle['cantidad'];?></h3></a>
            <b><button type="button" class="btn btn-xs btn-primary eliminar-producto" id="<?php echo $detalle['id'];?>">X</button></b>
            <p>Price: $. <?php echo $detalle['precio'];?></p>
            <?php $total+=$detalle['precio']*$detalle['cantidad'];  ?>
        </div>
    </form>

    <div style="padding-top: 30px"></div>
    <?php } ?>
    <div class="border"></div>

    <div class="cart-total">
  
        <h6>Total Price:  </h6> <p><?php echo "$. ".$total;?></p><div class="clearfix"></div>
  
        <a href="check-out.php" class="cart-checkout">Verificar</a>
    </div>
</div>
<?php } ?>

<script type="text/javascript" src="js/ajax.js"></script>