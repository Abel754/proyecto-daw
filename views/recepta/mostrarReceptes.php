<section id="team" class="team">
    <div class="container-fluid">
        <div class="section-title">
            <h2>Les meves receptes</h2>
            <p>Aquí podràs veure totes les receptes que has redactat.</p>
        </div>
        <hr>

        <nav class="ml-4">
            <ul class="pagination">
                <?php
                    echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarReceptes&page=1' >Primera</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarReceptes&page=".($numPagina-1)."' >&laquo;</a></li>";
                        for ($i=1; $i<=$total_pags; $i++) {         
                        echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarReceptes&page=".$i."' >".$i."</a></li>";
                    }
                    echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarReceptes&page=".($numPagina+1)."' >&raquo;</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='index.php?controller=ControllerRecepta&action=mostrarReceptes&page=".$total_pags."' >Última</a></li>";               
                ?>                
            </ul>
        </nav>
    
        <?php $i = 0;?>

        <div class="row recipes-wrap">
            <?php foreach($res as $receptes) : ?>
                <?php if($i == 0 || $i == 1) : ?> <!-- Mostrarà una animació de dreta a esquerra (2 primers) -->
                    <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-3 col-md-6 mb-4 text-center"> 
                <?php else : ?> <!-- Mostrarà una animació d'esquerra a esquerra (2 últims) -->
                    <div data-aos="fade-left" class="col-lg-3 col-md-6 mb-4 text-center"> 
                <?php endif; ?>
                        <div data-id=<?=$receptes['idrecepta']?> id="target" class="pt-3 recepta<?=$receptes['idrecepta']?>">
                            <h4><strong><?=$receptes['titol']?></strong></h4>
                            <h6><strong><?=$receptes['tipus']?></strong></h6>  
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
                            <button id="delRecepta" class="button btn btn-danger">Esborrar</a>
                        </div>
                    </div>
                <?php $i++;?>
                <!-- Si el contador arriba a 4, (fila sencera) es reseteja el contador -->
                <?php if($i == 4) : ?>
                    <?php $i = 0; ?>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Our Team Section -->



