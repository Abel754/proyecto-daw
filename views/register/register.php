
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

			<?php require_once("forms/Validate.php");?>
			
			<div class="contenedor mb-5 mt-2" style="padding: 15px 5px">
				<form class="registerForm" method="POST">
					<div class="all">
						<div id="formTitle">
							<h2 class="text-center title-register">Formulari de Registre</h2>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<input type="text" name="name" class="form-control" value="<?php if(isset($name)) {echo $name;}?>" 
								style="border-color: <?php if(isset($name) && isset($borders['name']) && $borders['name']) {?> red <?php } ?>" placeholder="Nom" required>
							</div>
							<div class="form-group col-md-6">
								<input type="text" name="secondName" class="form-control" value="<?php if(isset($secondName)) {echo $secondName;}?>" 
								style="border-color: <?php if(isset($secondName) && isset($borders['secondName']) && $borders['secondName']) {?> red <?php } ?>" placeholder="Cognom" required>
							</div>
						</div>	
							<div class="form-group">
								<input type="email" name="email" class="form-control" value="<?php if(isset($email)) {echo $email;}?>" 
								style="border-color: <?php if(isset($email) && isset($borders['email']) && $borders['email']) {?> red <?php } ?>" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Contrasenya" required>
							</div>
							<div class="form-group">
								<input type="password" name="confirmPassword" class="form-control" placeholder="Confirmar contrasenya" required>
							</div>
							<div class="form-group">
								<div class="form-check">
									<label><input class="form-check-input" type="checkbox" value="" id="agreeCheck" required>Accepto els termes i condicions.</label>
                                    <a class="termsconditions" href="index.php?controller=ControllerUser&action=policiesANDprocedures" target="blank">Veure els termes i condicions</a>					
								</div>
							</div>
						<button class="btn btn-register btn-lg btn-block" type="submit">Registrar-se</button>
							<?php if(isset($errors)) : ?>
								<?php echo '<div class="mt-3 bg-danger text-center text-white">'; ?>
								<?php foreach ($errors as $error) : ?>
									<?php echo $error."<br>"; ?>
								<?php endforeach; ?>
								<?php echo '</div>'; ?>
							    <?php endif; ?>
							<?php if(isset($_SESSION['incorrect'])) : ?>
								<?php echo '<div class="mt-3 bg-danger text-center text-white">'.$_SESSION['incorrect'].'</div>'; ?>
								<?php unset($_SESSION['incorrect']); ?>
							    <?php endif; ?>
							<a class="returnLink btn btn-register mt-2" href="index.php?controller=ControllerDefault&action=index">&larr; Tornar a la pàgina inicial</a>
					</div>		
				</form>
			</div>
		</div>
    </section><!-- End About Us Section -->

    


  
