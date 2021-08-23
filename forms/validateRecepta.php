<?php require_once("helpers/sweetAlerts.php"); ?>
<?php

require_once('validateFunctions.php');

$title = isset($_POST['title']) ? $_POST['title'] : null;
$intro = isset($_POST['intro']) ? $_POST['intro'] : null;
$ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : null;
$cos = isset($_POST['cos']) ? $_POST['cos'] : null;
$tipus = isset($_POST['tipus']) ? $_POST['tipus'] : null;
$uploadedfile = isset($_POST['uploadedfile']) ? $_POST['uploadedfile'] : null;


$errors = array(); //Variable errors
$borders = array(); //Variable per posar els border vermells en cas d'error

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//VALIDACIÓ TÍTOL

	if(!requiredField($title) || !stringValidation($title)) {
		$borders['title'] = true;
		if(!requiredField($title)) {
			$errors[] = 'El título es obligatorio';
		} else if(!stringValidation($title)) {
			$errors[] = 'El título no puede contener carácteres especiales';
		}	 
	} else $borders['title'] = false;

	$titleLength = maxLength($title,0,100);
	if($titleLength != null) {
		$errors[] = 'El título ha de contener máximo 100 carácteres';
	}

	// -------------------------------

	//VALIDACIÓ INTRO

	if(!requiredField($intro)) {
		$borders['intro'] = true;
		if(!requiredField($intro)) {
			$errors[] = 'La introducción es obligatorio';
		}  
	} else $borders['intro'] = false;

	$introLength = maxLength($title,0,1000);
	if($introLength != null) {
		$errors[] = 'La introducción ha de contener máximo 1000 carácteres';
	}

	// -------------------------------

    //VALIDACIÓ INGREDIENTS

	if(!requiredField($ingredients)) {
		$borders['ingredients'] = true;
		if(!requiredField($ingredients)) {
			$errors[] = 'Los ingredientes son obligatorios';
		}  
	} else $borders['ingredients'] = false;

	$ingredientsLength = maxLength($title,0,1000);
	if($ingredientsLength != null) {
		$errors[] = 'Ingredientes ha de contener máximo 1000 carácteres';
	}

	// -------------------------------

    //VALIDACIÓ COS

	if(!requiredField($cos)) {
		$borders['cos'] = true;
		if(!requiredField($cos)) {
			$errors[] = 'El mensaje de la receta es obligatorio';
		}  
	} else $borders['cos'] = false;

	$msgLength = maxLength($title,0,1000);
	if($msgLength != null) {
		$errors[] = 'La receta de contener máximo 1000 carácteres';
	}

	// -------------------------------

    //VALIDACIÓ FITXER

	$file = $_FILES['uploadedfile'];
	$filename = $file['name'];
	$mimetype = $file['type'];

	if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
		if(!is_dir('uploads/images')) {
			mkdir('uploads/images', 0777);
		}

		move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);	
		$uploadedfile = $filename;
	} else {
        $errors[] = 'El format de l arxiu no és correcte';
    }

	// -------------------------------

	

	if(!$errors) {

		//Crides al mètode addRecepta del Model per afegir la recepta
		$res = $this->receptes->addRecepta($_SESSION['identity']->id,$title, $intro, $ingredients, $cos, $tipus,
         $uploadedfile);
        if($res) {
			echo '<a class="button btn btn-info" href="index.php?controller=ControllerRecepta&action=mostrarReceptes">Ver la receta</a>';
            echo '<p class="text-info">Se ha subido tu receta</p>';
			showSweetAlert(1); 
        }
		 
	}  else { 
		showSweetAlert(2); 
		$_SESSION['title'] = $title;
		$_SESSION['intro'] = $intro;
		$_SESSION['ingredients'] = $ingredients;
		$_SESSION['cos'] = $cos;
		$_SESSION['tipus'] = $tipus;
        $_SESSION['uploadedfile'] = $uploadedfile;
	}

    

}


?>