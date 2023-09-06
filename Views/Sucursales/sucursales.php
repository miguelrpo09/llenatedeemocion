<?php 

headerTienda($data);

$banner = $data['page']['portada'];

$idpagina = $data['page']['idpost'];

 ?>

<script>

  document.querySelector('header').classList.add('header-v4');

</script>



 <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">

  <h2 class="ltext-105 cl0 txt-center">

    <?= $data['page']['titulo'] ?>

  </h2>

</section>



<section class="py-5 text-center">

    <div class="container">

      <p>Visita nuestras tiendas virtuales</p>

      <a href="https://www.tiendabici.com.co/" class="btn btn-info">Tienda Bici</a>
      <a href="https://www.tiendadoppler.com.co/" class="btn btn-danger">Tienda Doppler</a>
      

    </div>

</section>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/mayorca.jpg" alt="Doppler Mayorca" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Doppler Mayorca</p>
            <p>Dirección: Cra 48 No. 50 sur - 128 Centro Comercial Mayorca Local 1020 <br>
              Teléfono: (604)4442404 Ext: 605 - 606 <br>
              Correo: doppler.mayorca@disandina.com
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/vivaenvigado.jpg" alt="Doppler Viva Envigado" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Doppler Viva Envigado</p>
            <p>Dirección: Cra 48 No. 32B Sur - 139 Centro Comercial Viva Envigado Local 268A <br>
              Teléfono: (604)4442404 Ext: 640 <br>
              Correo: doppler.vivaenvigado@disandina.com
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/santafe.jpg" alt="Doppler Santafé" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Doppler Santafé</p>
            <p>Dirección: Cra 43A No. 7 Sur - 170 Centro Comercial Santafé Local 3208 <br>
              Teléfono: (604)4442404 Ext: 601 <br>
              Correo: doppler.santafe@disandina.com
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/molinos.jpg" alt="Doppler Molinos" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Doppler Molinos</p>
            <p>Dirección: Calle 30A No. 82A - 26 Centro Comercial Los Molinos Local 2009 <br>
              Teléfono: (604)4442404 Ext: 660 <br>
              Correo: doppler.molinos@disandina.com
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/parquefabricato.jpeg" alt="Doppler Parque Fabricato" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Doppler Parque Fabricato</p>
            <p>Dirección: Cra 50 No. 38A - 185 Centro Comercial Parque Fabricato Local 2224 <br>
              Teléfono: (604)4442404 Ext: 680 <br>
              Correo: doppler.parquefabricato@disandina.com
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/tesoro.jfif" alt="Doppler Tesoro" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Doppler Tesoro</p>
            <p>Dirección: Carrera 25 A No. 1 A Sur 45 El Tesoro Parque Comercial Local 1436 <br>
              Teléfono: (604)4442404 Ext: 650 <br>
              Correo: doppler.tesoro@disandina.com
            </p>
          </div>
        </div>
      </div>
	<div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/quiksilver.jfif" alt="Quiksilver" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Quiksilver</p>
            <p>Dirección: Carrera 25 A No. 1 A Sur 45 El Tesoro Parque Comercial Local 1688  <br>
              Teléfono: (604)4442404 Ext: 603 <br>
              Correo: quiksilver@disandina.com
            </p>
          </div>
        </div>
      </div>
	<div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/giant.jpg" alt="Giant Liv Poblado" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Giant Liv Poblado</p>
            <p>Dirección: Cra 43A No. 19 - 105 Avenida El Poblado <br>
              Teléfono: (604)4442404 Ext: 670 - 671 <br>
              Correo: poblado@giant-liv.com.co
            </p>
          </div>
        </div>
      </div>
	<div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img src="<?= media() ?>/images/outlet.jpg" alt="Giant Liv Outlet" width="100%" height="250px">
          <div class="card-body">
            <p class="card-text">Giant Liv Outlet</p>
            <p>Dirección: Calle 16 No. 55 - 129 Centro Comercial De Moda Outlet Local 119  <br>
              Teléfono: (604)4442404 Ext: 675 <br>
              Correo: demodaoutlet@giant-liv.com.co
            </p>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>


<?php

  if(viewPage($idpagina)){

    echo $data['page']['contenido'];

  }else{

  ?>

<div>

  <div class="container-fluid py-5 text-center" >

    <img src="<?= media() ?>/images/construction.png" alt="En construcción">

    <h3>Estamos trabajando para usted.</h3>

  </div>

</div>

<?php 

  }

  footerTienda($data);

?>