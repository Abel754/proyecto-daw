<?php
include_once 'Model.php';

class Usuaris extends Model{
    
   protected $taula="usuaris"; 

   // Afegir a la BD un nou usuari
    public function add($nom,$cognom,$email,$contrasenya) {
       	$sql ="insert into usuaris(nom,cognom,email,contrasenya) values 
      			 (:nom,:cognom,:email,:contrasenya)";
      	$ordre = $this->bd->prepare($sql);	 
      	$ordre->bindValue(':nom',$nom);
      	$ordre->bindValue(':cognom',$cognom);
      	$ordre->bindValue(':email',$email);
      	$ordre->bindValue(':contrasenya',$contrasenya);
      
      	$res = $ordre->execute(); 
        return $res;
    }

    public function emailRepetit($email) {
       $sql ="select email from usuaris where email =:email";
       $ordre = $this->bd->prepare($sql);
       $ordre->bindValue(':email',$email);	 
       $ordre->execute(); 
       $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

       return $res;
 	}

	public function login($email, $password) {
		$db = mysqli_connect('bbdd.comoencasa.cat','ddb166152','P@ssw0rd','ddb166152');
		$result = false;

		// Comprovar si existeix usuari
		$sql = "select * from usuaris where email = '$email'";
		$login = $db->query($sql);
		
		if($login && $login->num_rows == 1) {
			$usuario = $login->fetch_object();

			// Verificar contrasenya
			$verify = password_verify($password,$usuario->contrasenya);
			if($verify) {
				$result = true;
				$_SESSION['identity'] = $usuario;
			} 
			else { 
				$_SESSION['incorrect'] = "Alguno de los dos datos no coinciden";
			}
		}

		return $result;
	}

	public function updateCredentials($name, $secondName, $email, $password, $id) {
		$db = mysqli_connect('bbdd.comoencasa.cat','ddb166152','P@ssw0rd','ddb166152');
		$sql="update usuaris SET nom='$name', cognom='$secondName', email='$email', contrasenya='$password' where id=$id";

		if(mysqli_query($db, $sql)){
			return true;
		} else {
			return false;
		}
	}

	public function changePassword($password, $iduser) {
		$sql = "update usuaris set contrasenya= '$password' where id= '$iduser'";
      	$ordre = $this->bd->prepare($sql);	
      	$ordre->bindValue(':contrasenya',$password);
		$ordre->bindValue(':id',$iduser);
      
      	$res = $ordre->execute(); 
        return $res;
	}

    public function receptesGuardades($iduser) {
        $sql = "SELECT count(iduser) as receptesGuardades FROM likes WHERE iduser=:iduser;";
        $ordre = $this->bd->prepare($sql); 
        $ordre->bindValue(':iduser',$iduser);	 
        $ordre->execute(); 
        $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function receptesPujades($iduser) {
        $sql = "SELECT count(iduser) as receptesPujades FROM receptes WHERE iduser=:iduser;";
        $ordre = $this->bd->prepare($sql); 
        $ordre->bindValue(':iduser',$iduser);	 
        $ordre->execute(); 
        $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function receptesLikeades($iduser) {
        $sql = "SELECT count(*) as receptesLikeades from likes where iduser <>" .$iduser. " AND idrecepta in(select idrecepta from receptes where iduser =:iduser)";
        $ordre = $this->bd->prepare($sql); 
        $ordre->bindValue(':iduser',$iduser);	 
        $ordre->execute(); 
        $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

}

?>