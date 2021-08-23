<section id="team" class="team">
    <div class="container-fluid">
    
        <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-3"></div>
            <div class="col-xl-6 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title">
                    <h2><?=$res[0]['titol']?></h2>
                </div>
                <div class="member">
                    <div class="pic"><img src="uploads/images/<?=$res[0]['fitxer']?>" class="img-fluid" alt=""></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3"></div>
            
            <div class="col-xl-3 col-lg-3 col-md-3"></div>
            <div class="mt-0 col-xl-6 col-lg-6 col-md-6">
                <h4 class="subtitle-recepta text-left"><strong>Ingredients</strong></h4  >
                <p class='text-justify'><?=nl2br($res[0]['ingredients'])?></p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3"></div>

            <div class="col-xl-3 col-lg-3 col-md-3"></div>
            <div class="mt-0 col-xl-6 col-lg-6 col-md-6">
                <h4 class="subtitle-recepta text-left pt-4"><strong>Introducció</strong></h4  >
                <p class='text-justify'><?=nl2br($res[0]['introduccio'])?></p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3"></div>

            <div class="col-xl-3 col-lg-3 col-md-3 mt-2"></div>
            <div class="mt-0 col-xl-6 col-lg-6 col-md-6">
                <h4 class="subtitle-recepta text-left pt-4"><strong>Preparar la recepta</strong></h4  >
                <p class='text-justify'><?=nl2br($res[0]['msg'])?></p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3"></div>

        </div>

      </div>
</section><!-- End Our Team Section -->



