<?php

class ControllerRecepta {

    function __construct() {
        
        include_once 'models/Receptes.php';
        $this->receptes = new Receptes();
    }
    
    public function index() {
        
    }

    public function receta() {

        if(!isset($_SESSION['identity'])) {
            header('Location: index.php?controller=ControllerUser&action=login'); 
        }
        include_once 'views/templates/header.php';
        include_once 'views/recepta/recepta.php';
        include_once 'views/templates/footer.php';
    }

    public function mostrarReceptes() {
        //$res = $this->receptes->mostrarReceptes($_SESSION['identity']->id);

        if(isset($_GET['page'])) {
            $numPagina=$_GET['page'];
        }
        else {
            $numPagina=1; 
        }
        
        $numRegsPag=8;
        
        $total_pags = $this->receptes->numPagesOneUser($numRegsPag, $_SESSION['identity']->id);
        
        if($numPagina<=0 || $numPagina>$total_pags) {
            $numPagina=1;
        } 
        
        $res = $this->receptes->getPageOneUser($numPagina,$numRegsPag, $_SESSION['identity']->id);
        
        include_once 'views/templates/header.php';
        include_once 'views/recepta/mostrarReceptes.php';
        include_once 'views/templates/footer.php';
        
    }

    public function mostrarUnaRecepta() {
        $idrecepta = $_GET['id'];
        $res = $this->receptes->mostrarUnaRecepta($idrecepta);

        include_once 'views/templates/header.php';
        include_once 'views/recepta/mostrarUnaRecepta.php';
        include_once 'views/templates/footer.php'; 
    }

    public function mostrarTotesReceptes() {

        if(isset($_GET['page'])) {
            $numPagina=$_GET['page'];
        } 
        else  {
            $numPagina=1; 
            $_SESSION['tipus'] = 'all'; //Inicialitzo per mostrar alguna cosa només entrar
            $_SESSION['filter'] = ''; //Inicialitzo per mostrar alguna cosa només entrar
        }
        // Cada pàgina 8 2 registres
        $numRegsPag=8;

        $_SESSION['tipus'] = 'all';
        // Si hi ha post, iniciem les sessions amb els valors de POST
        if(isset($_POST)) {
            if(isset($_POST['tipus'])) {
                $_SESSION['tipus'] = $_POST['tipus'];
            } 
            if(isset($_POST['filter'])) {
                $_SESSION['filter'] = $_POST['filter'];
            } 
        } 
 
        // Obtenim les receptes de la pàgina indicada
        if($_SESSION['tipus'] == 'all') { //Mostra tots els registres
            if(isset($_SESSION['filter'])) {
                $total_pags = $this->receptes->numPagesTot($numRegsPag, $_SESSION['filter']); 
            } else {
                $total_pags = $this->receptes->numPagesTot($numRegsPag, ''); 
            }
                  
            if($numPagina<=0 || $numPagina>$total_pags) {
                $numPagina=1;
            }  
            if(isset($_SESSION['filter'])) {
                $res = $this->receptes->getPageTot($numPagina,$numRegsPag, $_SESSION['filter']);
            } else {
                $res = $this->receptes->getPageTot($numPagina,$numRegsPag, '');
            }
            
        } else { //Mostra els registres que tenen una classificació assignada
            // Obtenim el número màxim de pàgines
            $total_pags = $this->receptes->numPages($numRegsPag, $_SESSION['tipus'], $_SESSION['filter']);       
            // Si el número de pàgina és incorrecta mostrem la primera
            if($numPagina<=0 || $numPagina>$total_pags) $numPagina=1; 
            $res = $this->receptes->getPage($numPagina,$numRegsPag, $_SESSION['tipus'], $_SESSION['filter']);
        }

        // Obtenim la URL actual i un input amb la ID el qual utilitzarem per l'arxiu de likes.js comparar aquesta
        // URL amb l'actual. Perquè amb el paginate, la URL va canviant amb el GET &page
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $pag = "http://" . $host . $url;
        ?><input type="hidden" id="pag" value="<?=$pag?>">

        <?php

        include_once 'views/templates/header.php';
        include_once 'views/recepta/mostrarTotesReceptes.php';
        include_once 'views/templates/footer.php';
                
    }

    public function gestionarLikes() {
        if(!isset($_SESSION['identity'])) {
            header('Location: index.php?controller=ControllerRecepta&action=mostrarTotesReceptes');
            exit();
        }
        if(!isset($_POST['idrecepta']) && !isset($_POST['userid']) && !isset($_POST['param'])) {
            header('Location: index.php?controller=ControllerRecepta&action=mostrarTotesReceptes');
            exit();
        }
        $idrecepta = $_POST['idrecepta'];
        $iduser = $_POST['userid'];
        $param = $_POST['param'];
        if($param == 'addLike') {
            $res = $this->receptes->addlikes($idrecepta, $iduser);
            if($res) {
                echo 1;
            } 
        }
        else if($param == 'deleteLike') {
            $res = $this->receptes->deleteLikes($idrecepta, $iduser);
            if($res) {
                echo 1;
            } 
        }
    }

    public function mostrarLikes() {
        if(!isset($_SESSION['identity'])) {
            header('Location: index.php?controller=ControllerRecepta&action=mostrarTotesReceptes');
            exit();
        }
        if(!isset($_POST['userid'])) {
            header('Location: index.php?controller=ControllerRecepta&action=mostrarTotesReceptes');
            exit();
        }
        $iduser = $_POST['userid'];
        $res = $this->receptes->likes($iduser);
        if($res) {
            echo json_encode($res);
        } 
        
    }

    public function esborrarRecepta() {
       if(!isset($_SESSION['identity'])) {
            header('Location: index.php?controller=ControllerRecepta&action=mostrarTotesReceptes');
            exit();
        } 

        if(!isset($_GET['id'])) {
            header('Location: index.php?controller=ControllerRecepta&action=mostrarTotesReceptes');
            exit();
        }

        $id = $_GET['id'];

        $delete = $this->receptes->esborrarRecepta($id);

    }

}

?>