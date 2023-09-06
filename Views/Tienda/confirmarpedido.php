<?php 

headerTienda($data);

 ?>

<br><br><br>

<div class="jumbotron text-center">

  <h1 class="display-4">¡Gracias, has hecho uso de uno de los beneficios ofrecidos por la empresa!</h1>

  <p class="lead">Tu pedido fue procesado con éxito.</p>

  <p>No. Orden: <strong> <?= $data['orden']; ?> </strong></p>

  	<?php 

  		if(!empty($data['transaccion'])){

    ?>

    <p>Transacción: <strong> <?= $data['transaccion']; ?> </strong></p>

   <?php } ?>

  <hr class="my-4">

  <p>Póngase en contacto con su jefe inmediato para que apruebe el uso del beneficio solicitado.</p>

  <p>Puedes ver el estado de tu pedido en la sección pedidos de tu usuario.</p>

  <br>

  <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>" role="button">Continuar</a>

</div>



<?php 

	footerTienda($data);

?>