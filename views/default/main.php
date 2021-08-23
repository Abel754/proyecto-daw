<?php require_once('helpers/sweetAlerts.php'); 
  if(isset($_SESSION['sweetAlert']) && $_SESSION['sweetAlert'] == 1) {
  showSweetAlert($_SESSION['sweetAlert']);
  unset($_SESSION['sweetAlert']); 
} ?> 


  <!-- ======= Carousel ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Imagen 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/carousel/slide4.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Et donem la benvinguda a <br><span>Como en Casa</span></h2>
                <p class="animate__animated animate__fadeInUp">Aquesta és una web de cuina enfocada a un bloc en el qual podràs gaudir dels millors plats marcats per la comunitat, pujar els teus propis plats, valorar els altres i molt més!</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Llegir Més</a>
              </div>
            </div>
          </div>

          <!-- Imagen 2 -->
          <div class="carousel-item" style="background-image: url('assets/img/carousel/slideProva.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Comparteix les teves millors receptes</h2>
                <p class="animate__animated animate__fadeInUp">Tindràs la possibilitat de pujar les teves millors receptes des del teu usuari, així com veure les receptes dels altres i poder veure les més ben valorades!</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Llegir Més</a>
              </div>
            </div>
          </div>

          <!-- Imagen 3 -->
          <div class="carousel-item" style="background-image: url('assets/img/carousel/slide3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Descobreix nous plats</h2>
                <p class="animate__animated animate__fadeInUp">En ComoenCasa trobaràs els millors plats valorats pels usuaris, podràs filtrar les receptes o plats per productes i ordenar-los segons els més "M'agrades" que tinguin, entre altres coses.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Llegir Més</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- Acaba Carousel -->

  <main id="main">

    <!-- ======= Sobre Nosotros ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6">
            <img src="assets/img/about1.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>Sobre nosaltres</h2>
              <p>Benvinguts a <strong>Como en casa!</strong> Som dos joves estudiant actualment el cicle formatiu superior Desenvolupament d'Aplicacions Web i amb una gran obstinació i desig de continuar aprenent i veure què ens oferirà el futur.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title">Projecte</h4>
              <p class="description">Hem treballat en el projecte <strong>Como en Casa</strong> per fer una espècie de fòrum en l'àmbit de l'hostaleria</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title">Accions</h4>
              <p class="description">Aquí podràs pujar les teves receptes, valorar les dels altres, filtrar, entre altres característiques en versions futures. Tot això <a href="index.php?controller=ControllerUser&action=login">iniciant sessió</a> com usuari.</p>
            </div>

          </div>
        </div>              
      </div>
 
    <!-- ======= Nuestro Equipo ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2 class="pt-4">L'equip</h2>
          <p class="text-center">Els dos participants que hem realitzat la pàgina web.</p>
        </div>

        <div class="row">

          <div class="col-xl-2"></div>

          <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img style="height:450px" src="assets/img/team/team-abel.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Abel Maré</h4>
                <span>Desenvolupador Web</span>
                <div class="social">
                  <a href="https://twitter.com/abelmc_01" target="_blank"><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/abelmc_01/" target="_blank"><i class="icofont-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img style="height:450px; width:330px" src="assets/img/team/team-uri.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Oriol Boronat</h4>
                <span>Desenvolupador Web</span>
                <div class="social">
                  <a href="https://twitter.com/urii_bf24" target="_blank"><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/urii_bf24/" target="_blank"><i class="icofont-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- Acaba Nuestro Equipo -->

    <!-- ======= Bases del concurso ======= -->

    <section>
        <div class="container">
            <div class="section-title">
                <h2 class="pt-4">Bases del concurs</h2>                
                <div class="row">
                    <div class="col-lg-6 text-center mb-4" data-aos="fade-up"><img src="assets/img/wapps/wapps1.png" alt=""></img></div>
                    <div class="col-lg-6 text-center mt-4" data-aos="fade-up"><img src="assets/img/wapps/dondominio.png" alt=""></img></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= FAQ ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2 class="pt-4">Preguntes recents</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Puc pujar receptes?</h4>
            <p>
              Sempre que estiguis registrat com a usuari, podràs pujar les receptes, si no, només podràs visualitzar les que de moment tenim a la pàgina.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Puc valorar receptes d'altres usuaris?</h4>
            <p>
              De moment les receptes d'altres usuaris no són visibles i no poden ser valorades, arribaran més endavant al costat d'altres canvis.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Com puc modificar del meu perfil?</h4>
            <p>
              Accedint a "El teu nom", "Modificar Perfil" podràs canviar les opcions que has assignat en registrar com a usuari per si cal.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Quins canvis heu pensat implementar properament?</h4>
            <p>
              Estem pensant en què puguis valorar les receptes d'usuaris, visualitzar-les, una barra de cerca per fer-lo més amè, veure el grau de valoracions d'una recepta, poder comentar-la, filtrar per receptes, etc.
            </p>
          </div>

          <div class="col-lg-12 faq-item text-center pt-5" data-aos="fade-up">
            <a id="question" class="button btn btn-faq" role="button">Realitzar una pregunta</a>
          </div>
          
        </div>

      </div>
      
    </section><!-- Acaba FAQ -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">      
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-modal">
                    <h3 class="text-white">Pregunta alguna cosa!</h3> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="POST" id="faqForm">
                    <div class="alert alert-success" id="alert" style="display: none;">&nbsp;</div>                       
                            <div class="form-group">
                                <label for="affair"><strong>Assumpte</strong></label>
                                <input type="text" class="form-control" name="affair" id="affair">
                            </div>
                            <div class="form-group">
                                <label for="question"><strong>Pregunta</strong></label><br>
                                <textarea id="question" name="question" rows="4" cols="45"></textarea>
                            </div>                        
                    </div>
                    <div class="modal-footer bg-modal">
                        <input id="sendQuestion" class="btn" type="submit" value="Enviar" style="float:left"/>
                    </div>
                </form>
            </div>      
        </div>
    </div>


    

  </main><!-- Acaba Main -->

