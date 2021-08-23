<?php require_once('helpers/sweetAlerts.php'); ?>
<!-- ======= Login Form ======= -->
<section id="about" class="about">
  <div class="container pt-4 pb-4">
        <?php if(isset($_SESSION['sweetAlert']) && $_SESSION['sweetAlert'] == 3) : ?>
          <?php showSweetAlert($_SESSION['sweetAlert']); ?>
          <?php unset($_SESSION['sweetAlert']); ?>
          <?php header('Location: index.php?controller=ControllerUser&action=logout'); ?>
        <?php elseif(isset($_SESSION['sweetAlert']) && $_SESSION['sweetAlert'] == 1) : ?>
          <?php showSweetAlert($_SESSION['sweetAlert']); ?>
          <?php unset($_SESSION['sweetAlert']); ?>
        <?php endif; ?>
        <div class="contenedor mb-5 mt-2">
          <form class="loginForm" action="index.php?controller=ControllerUser&action=loginUser" method="POST">
            <div class="all">
              <div id="formTitle">
              <?php if(!isset($_SESSION['identity'])) : ?>
                <h2 class="text-center title-login">Inicia sessió</h2>
                </div>	
                <div class="form-group">
                  <input type="email" class="form-control" name="email" data-rule="email" data-ms="Entra un e-mail vàlid" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Contrasenya" required>
                </div>
                <button class="btn btn-login btn-lg btn-block" type="submit">Entrar</button>
              <?php endif; ?>
							<?php if(isset($_SESSION['incorrect'])) : ?>
								<?php echo '<div class="mb-2 mt-2 bg-danger text-center text-white">'.$_SESSION['incorrect'].'</div>'; ?>
								<?php unset($_SESSION['incorrect']); ?>
							  <?php endif; ?>
                <div class="mb-4 pb-2">
                  <a class="returnLink btn btn-login mt-3 mb-3 float-left" href="index.php?controller=ControllerDefault&action=index">&larr; Tornar a la pàgina inicial</a>
                  <a class="returnLink btn btn-login mt-3 mb-3 float-right" href="index.php?controller=ControllerUser&action=register">Regístra't &rarr;</a>
                </div>
            </div>
          </form>
        </div>
  </div>
</section><!-- End About Us Section -->

