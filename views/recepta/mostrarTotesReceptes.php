
<?php if(!isset($_SESSION['showInfo'])) : ?>
    <?php include_once('helpers/sweetAlerts.php'); ?>
    <?php $_SESSION['sweetAlert'] = 3; ?>
    <?php showSweetAlert($_SESSION['sweetAlert']); ?>
<?php endif; ?>
<?php $_SESSION['showInfo'] = true; ?>

<section>
    <div class="container-fluid mt-5 section-title">
    <h2 class="pb-3 text-center">Receptes</h2>
    <form action="index.php?controller=ControllerRecepta&action=mostrarTotesReceptes" method="POST">
        <div class="container text-center mb-4">
            <select class="mb-3" name="tipus"> 
                <option value="all">Totes</option>
                <option value="primero" 
                <?php if(isset($_SESSION['tipus']) && $_SESSION['tipus'] == 'primero') : ?>
                    selected
                <?php endif; ?>
                >Primer plat</option>
                <option value="segundo"
                <?php if(isset($_SESSION['tipus']) && $_SESSION['tipus'] == 'segundo') : ?>
                    selected
                <?php endif; ?>
                >Segon plat</option>
                <option value="postre"
                <?php if(isset($_SESSION['tipus']) && $_SESSION['tipus'] == 'postre') : ?>
                    selected
                <?php endif; ?>
                >Postre</option>
            </select><br>
            <input type="text" name="filter" placeholder="Busca receptes" value=
            <?php if(isset($_SESSION['filter'])) : ?>
                <?php echo $_SESSION['filter']; ?>
            <?php endif; ?>
            ><br><br>
            <button class="button btn btn-login" type="submit">Filtra</button>
        </div>
    </form>


    <nav class="ml-4">
        <ul class="pagination">
            <?php
                echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarTotesReceptes&page=1' >Primera</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarTotesReceptes&page=".($numPagina-1)."' >&laquo;</a></li>";
                    for ($i=1; $i<=$total_pags; $i++) {         
                    echo "<li id='page' class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarTotesReceptes&page=".$i."' >".$i."</a></li>";
                }
                echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarTotesReceptes&page=".($numPagina+1)."' >&raquo;</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarTotesReceptes&page=".$total_pags."' >Última</a></li>"; 
            ?>            
        </ul>
    </nav>

    <?php $i = 0; ?>
    <div class="row recipes-wrap">
        <?php foreach($res as $receptes) : ?>
            <?php if($i == 0 || $i == 1) : ?> <!-- Mostrarà una animació de dreta a esquerra (2 primers) -->
                <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-3 col-md-6 mb-4 text-center"> 
            <?php else : ?> <!-- Mostrarà una animació d'esquerra a esquerra (2 últims) -->
                <div data-aos="fade-left" class="col-lg-3 col-md-6 mb-4 text-center"> 
            <?php endif; ?>
                    <div id="target" class="pt-4">
                        <?php if(isset($_SESSION['identity'])) : ?>
                        <p class="text-right"><i id="<?=$receptes['idrecepta']?>" class="icofont-heart guardadas_icon nolike text-right text-danger"></i></p>
                        <?php endif; ?>
                        <h4><strong><?=$receptes['titol']?></strong></h4> 
                        <img src="uploads/images/<?=$receptes['fitxer']?>" class="img-fluid rounded pt-3 pb-3 pr-3 pl-3" alt="">            
                        <?php if(strlen($receptes['introduccio']) >= 300) : ?>
                            <p class="pl-2 pr-2"><?=mb_substr($receptes['introduccio'], 0, 300)?>... <span><a href="index.php?controller=ControllerRecepta&action=mostrarUnaRecepta&id=<?=$receptes['idrecepta']?>">Leer más</a></span></p>
                        <?php else : ?>
                            <p class="pl-2 pr-2"><?=mb_substr($receptes['introduccio'], 0, 300)?></p>
                        <?php endif; ?>
                        <hr style="width:60px; border:1px solid gray">
                        <p><strong>Publicada el:</strong> <?=$receptes['fecha']?></p>
                        </form>
                        <a class="button btn mb-3 mt-3" style="background-color:rgb(0 0 0 / 40%); color:white" href="index.php?controller=ControllerRecepta&action=mostrarUnaRecepta&id=<?=$receptes['idrecepta']?>">Accedir</a>
                    </div>
                </div>
            <?php $i++; ?>
            <!-- Si el contador arriba a 4, (fila sencera) es reseteja el contador -->
            <?php if($i == 4) : ?>
                <?php $i = 0; ?>
            <?php endif;?>
        <?php endforeach; ?>
    </div>
    </div>
</section>


<?php
unset($_SESSION['sweetAlert']);
?>







