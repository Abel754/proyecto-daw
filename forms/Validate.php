<?php

require_once('validateFunctions.php');

$name = isset($_POST['name']) ? $_POST['name'] : null;
$secondName = isset($_POST['secondName']) ? $_POST['secondName'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
$u = false;


$errors = array(); //Variable errors
$borders = array(); //Variable per posar els border vermells en cas d'error

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//VALIDACIÓ NOM

	if(!requiredField($name) || !stringValidation($name)) {
		$borders['name'] = true;
		if(!requiredField($name)) {
			$errors[] = 'El nombre es obligatorio';
		} else if(!stringValidation($name)) {
			$errors[] = 'El nombre no puede contener carácteres especiales';
		}	 
	} else $borders['name'] = false;

	// -------------------------------

	//VALIDACIÓ COGNOM

	if(!requiredField($secondName) || !stringValidation($secondName)) {
		$borders['secondName'] = true;
		if(!requiredField($secondName)) {
			$errors[] = 'El apellido es obligatorio';
		} else if(!stringValidation($secondName)) {
			$errors[] = 'El apellido no puede contener carácteres especiales';
		}	 
	} else $borders['secondName'] = false;

	// -------------------------------

	//VALIDACIÓ EMAIL
	
	if(!requiredField($email) || !emailValidation($email)) {
		$borders['email'] = true;
		if(!requiredField($email)) {
			$errors[] = 'El email es obligatorio';
		} else if(!emailValidation($email)) {
			$errors[] = 'Email incorrecto';	
		}
	} else {
		$borders['email'] = false;
	}

	// -------------------------------

	//VALIDACIÓ PASSWORD

	if(!requiredField($password)) {
		$errors[] = 'La contrasenya es obligatoria';
	}
	if(!requiredField($confirmPassword)) {
		$errors[] = 'Es necesaria la confirmación de la contraseña';
	}

	if(!passwordValidation($confirmPassword,$password)) {
		$errors[] = 'Las contraseñas no son iguales';
	}

	$passComprovar = validPwdLen($password,6, 12);
	if(!$passComprovar == null) {
		$errors[] = $passComprovar;
	}

	// -------------------------------

	if(!$errors) {
		// Posar el codi de la base de dades. Fer la connexió
		$_SESSION['name'] = $name;
		$_SESSION['secondName'] = $secondName;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		header('Location: index.php?controller=ControllerUser&action=addUser');
	}  

}

?>