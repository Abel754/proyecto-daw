<!-- FORM PER PUJAR UNA RECEPTA -->
  <!-- Page Header -->
  <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="title-recepta">Pujar una recepta</h2>
        <form enctype="multipart/form-data" method="POST">

            <?php require_once("forms/validateRecepta.php");?>

            <!-- Mostra els errors -->
            
            <div class="form-group">
                <?php if(isset($errors)) : ?>
                    <?php foreach($errors as $error) : ?>
                        <p class="text-danger"><?php echo $error."<br>"; ?></p>
                    <?php endforeach; ?>           
                <?php endif; ?>                  
            </div>

            <div class="form-group">
                <label><strong>Títol</strong></label>
                <input type="text" style="line-height:100px" class="form-control" name="title" maxlength="100" required value=
                <?php if(isset($_SESSION['title'])) : ?>
                    <?php echo $_SESSION['title']; ?>
                <?php else: ?>
                    <?php echo ''; ?>
                <?php endif;?>
                >
                <label></label>
            </div>
            <div class="form-group">
                <label><strong>Plato</strong></label>
                <select class="form-select" name="tipus" id="tipus">
                    <option value="primero">Primer plat</option>
                    <option value="segundo">Segon plat</option>
                    <option value="postre">Postre</option>
                </select>
                <label></label>
            </div>
            <div class="form-group">
                <label><strong>Introducció</strong></label><br>              
                <textarea name="intro" cols=60 rows=6 style="width: 100%"  maxlength="1000" required><?php if(isset($_SESSION['intro'])) : ?><?php echo $_SESSION['intro']; ?><?php else : ?><?php echo ''; ?><?php endif?></textarea>
            </div>

            <div class="form-group">
                <label><strong>Ingredients</strong></label><br>
                <textarea name="ingredients" cols=60 rows=6 style="width: 100%"  maxlength="1000" required><?php if(isset($_SESSION['ingredients'])) : ?><?php echo $_SESSION['ingredients']; ?><?php else : ?><?php echo ''; ?><?php endif?></textarea>
            </div>

            <div class="form-group">
                <label><strong>Com realitzar-la</strong></label><br>
                <textarea name="cos" cols=60 rows=10 style="width: 100%"  maxlength="2000" required><?php if(isset($_SESSION['cos'])) : ?><?php echo $_SESSION['cos']; ?><?php else : ?><?php echo ''; ?><?php endif?></textarea>
            </div>

            <div class="form-group mb-4">
                <label><strong>Pujar imatge</strong></label><br>
                <input name='uploadedfile' type='file' required><br>
            </div>

            <button class="btn btn-recepta" type="submit">Pujar</button>
            <a class="btn btn-recepta" href="index.php?control=ControllerDefault" role="button">Cancel·lar</a>
        </form>
    </div>

<?php
unset($_SESSION['title']);
unset($_SESSION['intro']);
unset($_SESSION['ingredients']);
unset($_SESSION['cos']);
unset($_SESSION['tipus']);

?>