
<?php require_once("helpers/sweetAlerts.php"); ?>
<?php require_once("forms/ValidateUpdateUser.php");?>
<div class="container mt-4">
<h2 class="title-user">Actualitzar perfil</h2>
  <form method="POST">
        <!-- Si existeix la SESSIÓ, significa que ha d'aparèixer un sweet alert -->
        <?php if(isset($_SESSION['sweetAlert'])) : ?>
           <?php showSweetAlert($_SESSION['sweetAlert']); ?>
        <?php unset($_SESSION['sweetAlert']); ?>

        <?php endif; ?>
        <div class="form-group">
            <label><strong>Nom</strong></label>
            <input type="text" class="form-control" name="name" value= <?= $_SESSION['identity']->nom ?>>
            <label></label>
        </div>
        <div class="form-group">
            <label><strong>Cognom</strong></label>
            <input type="text" class="form-control" name="secondName" value="<?=$_SESSION['identity']->cognom?>">
            <label></label>
        </div>

        <div class="form-group">
            <label><strong>Email</strong></label>
            <input type="email" class="form-control" name="email" value="<?=$_SESSION['identity']->email?>">
            <label></label>
        </div>

        <div class="form-group">
            <label><strong>Nova contrasenya</strong></label>
            <input type="password" class="form-control" name="password">
            <label></label>
        </div>

        <div class="form-group">
            <?php if(isset($errors)) : ?>
                <?php foreach($errors as $error) : ?>
                    <p class="text-danger"><?php echo $error."<br>"; ?></p>
                <?php endforeach; ?> 
            <?php endif; ?> 

            <?php if(isset($_SESSION['correct'])) : ?>
                <p class="text-info"><?php echo $_SESSION['correct']; ?></p>
                <?php unset($_SESSION['correct']); ?>
            <?php endif; ?>                
        </div>

        <button class="btn btn-user" type="submit">Canviar</button>
        <a class="btn btn-user" href="index.php?controller=ControllerUser&action=changeCredentials" role="button">Cancel·lar</a>
    </form>

</div>