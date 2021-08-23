<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ComoenCasa</title>
  <meta content="Esta es una página web de cocina en la cual puedes visualizar y valorar otras recetas, descubrir otras y subir tus propias invenciones" name="description">
  <meta content="Cocina. Recetas. Subir. Descubrir. Valorar" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/iconorestaurant.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Sweet Alerts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php?controller=ControllerDefault&action=index"><span>COMO EN CASA</span></a></h1>
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul class="navegacion">
          <li class="active"><a href="index.php?controller=ControllerDefault&action=index">Inici</a></li>
          <li><a href="index.php?controller=ControllerDefault&action=index#about">Sobre Nosaltres</a></li>
          <li><a href="index.php?controller=ControllerDefault&action=index#faq">Preguntes</a></li>
          <li><a href="index.php?controller=ControllerRecepta&action=receta">Redactar recepta</a></li>
          <li><a href="index.php?controller=ControllerRecepta&action=mostrarTotesReceptes">Receptes</a></li>
          <?php if(isset($_SESSION['identity'])) : ?>
          <li><a href="index.php?controller=ControllerRecepta&action=mostrarReceptes">Les meves receptes</a></li>
          <li class="drop-down"><a href=""><b><?= $_SESSION['identity']->nom . " " . $_SESSION['identity']->cognom ?></b></a>
              <ul class="navegacion">
                <li><a href="index.php?controller=ControllerUser&action=changeCredentials">Modificar perfil</a></li>
                <li><a href="index.php?controller=ControllerUser&action=logout">Tancar sessió</a></li>
              </ul>
          </li>
          <?php else : ?>
          <li style="padding-left:30px"><a href="index.php?controller=ControllerUser&action=login">Iniciar sessió</a></li>
          <li><a href="index.php?controller=ControllerUser&action=register">Registrar-se</a></li>
          <?php endif; ?>
          
        </ul>
      </nav><!-- .nav-menu -->
  
    </div>
    <?php if(isset($_SESSION['identity'])) : ?>
      <input type="hidden" id="iduser" value="<?=$_SESSION['identity']->id?>">
    <?php endif; ?>
  </header><!-- End Header -->