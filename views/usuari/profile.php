<?php require_once("helpers/sweetAlerts.php"); ?>
<?php require_once("forms/ValidateUpdateUser.php");?>

<div class="container mt-5 text-center">
    <h2 class="mb-5 title-user">Perfil de <?= $_SESSION['identity']->nom?>&nbsp;<?= $_SESSION['identity']->cognom ?></h2>
    <div class="row text-center">
      <div class="col-lg-3 col-md-6">
        <div class="recepta">
          <i class="icofont-document-folder recepta_icon"></i>
          <div>
            <p>Les teves receptes</p>
            <p class="recepta_text"><?=$receptesPujades[0]['receptesPujades']?></p> 
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="valoradas">
          <i class="icofont-paper valoradas_icon"></i>
          <div>
            <p>Receptes que has valorat</p>
            <p class="valoradas_text">0</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="mejor">
          <i class="icofont-star mejor_icon"></i>
          <div>
            <p><i>Likes</i> de les teves receptes</p>
            <p class="mejor_text"><?=$receptesLikeades[0]['receptesLikeades']?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="guardadas">
          <i class="icofont-heart guardadas_icon"></i>
          <div>
            <p>Receptes guardades</p>
            <p class="guardadas_text"><?=$receptesGuardades[0]['receptesGuardades']?></p> <!-- S'ha de mostrar així amb el [0]['receptesGuardades'] perquè agafi el count amb el 'as' de la consulta SQL-->
          </div>
        </div>
      </div>       
</div>
<a class="button btn btn-user text-center mt-5 mb-5" href="index.php?controller=ControllerUser&action=modifyProfile" type="button">Modificar dades personals</a> 

</div>

  