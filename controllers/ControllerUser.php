<?php

class ControllerUser {

    function __construct() {

        if(isset($_SESSION['tipus']) || isset($_SESSION['filter'])) {
            unset($_SESSION['tipus']);
            unset($_SESSION['filter']);
        }
        
        include_once 'models/Usuaris.php';
        $this->users = new Usuaris();
    }
    
    public function index() {
                              
    }

    public function login() {
        include_once 'views/templates/header.php';
        include_once 'views/login/login.php';
        include_once 'views/templates/footer.php'; 
    }

    public function register() {
        include_once 'views/templates/header.php';
        include_once 'views/register/register.php';
        include_once 'views/templates/footer.php';   
    }

    public function policiesANDprocedures() {
        include_once 'views/templates/header.php';
        include_once 'views/register/policies.php';
        include_once 'views/templates/footer.php';  
    }

    public function Validate() {
        include_once 'forms/Validate.php';
    }

    public function addUser() {
        $checkMail = $this->users->emailRepetit($_SESSION['email']);
        if($checkMail) {
            $_SESSION['incorrect'] = "Aquest email ja pertany a un compte, introdueix un altre";
            header('Location: index.php?controller=ControllerUser&action=register');
            exit;
        }
        $password = password_hash($_SESSION['password'], PASSWORD_BCRYPT);
        $res = $this->users->add($_SESSION['name'],$_SESSION['secondName'],$_SESSION['email'],$password);
        if($res) {
            header('Location: index.php?controller=ControllerUser&action=login');
        }
        unset($_SESSION['name']);
        unset($_SESSION['secondName']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
    }

    public function loginUser() {
        if(isset($_POST)) {
            $identity = $this->users->login($_POST['email'],$_POST['password']);
        } 
        if($identity) {
            header('Location: index.php?controller=ControllerDefault');
        } else {
            header('Location: index.php?controller=ControllerUser&action=login');  
        }          
    }

    public function logout() {
        if(isset($_SESSION['identity'])) {
            unset($_SESSION['showInfo']);
            unset($_SESSION['identity']);
        }
        header('Location: index.php?controller=ControllerUser&action=login');
    }

    public function changeCredentials() {
        
        if(isset($_SESSION['identity'])) {

            $receptesGuardades = $this->users->receptesGuardades($_SESSION['identity']->id);
            $receptesPujades = $this->users->receptesPujades($_SESSION['identity']->id);
            $receptesLikeades = $this->users->receptesLikeades($_SESSION['identity']->id);

            include_once 'views/templates/header.php';
            include_once 'views/usuari/profile.php';
            include_once 'views/templates/footer.php';
        }
        else {
            header('Location: index.php?controller=ControllerDefault'); 
        }
	}

    public function updateCredentials() {
        if(!isset($_SESSION['identity'])) {
            header('Location: index.php?controller=ControllerDefault'); 
        }

        //Toca fer la funció del Model per actualitzar els inputs que es canviïn
        $res = $this->users->updateCredentials($_SESSION['name'],$_SESSION['secondName'],$_SESSION['email'],$_SESSION['password'], $_SESSION['identity']->id);
        $password = password_hash($_SESSION['password'], PASSWORD_BCRYPT);
        
        $res2 = $this->users->changePassword($password, $_SESSION['identity']->id);
        
        if($res && $res2) {
            $_SESSION['sweetAlert'] = 1;
            $_SESSION['correct'] = "Perfil actualitzat amb èxit. Tanca sessió i torna a entrar perquè s'apliquin els canvis ";
        } 
        unset($_SESSION['name']);
        unset($_SESSION['secondName']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header('Location: index.php?controller=ControllerUser&action=modifyProfile'); 

	}

    public function modifyProfile() {
        if(!isset($_SESSION['identity'])) {
            header('Location: index.php?controller=ControllerDefault'); 
        }
        include_once 'views/templates/header.php';
        include_once 'views/usuari/modifyProfile.php';
        include_once 'views/templates/footer.php';
    }

}

?>