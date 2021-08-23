<?php
include_once 'Model.php';

class Receptes extends Model{
    
   protected $taula="receptes"; 

    
   public function addRecepta($iduser,$titol,$introduccio,$ingredients,$msg,$tipus,$fitxer) {
    $sql ="insert into receptes(iduser,titol,introduccio,ingredients,msg,tipus,fitxer,fecha) values 
      			 (:iduser,:titol,:introduccio,:ingredients,:msg,:tipus,:fitxer,now())";
      	$ordre = $this->bd->prepare($sql);	 
      	$ordre->bindValue(':iduser',$iduser);
          $ordre->bindValue(':titol',$titol);
      	$ordre->bindValue(':introduccio',$introduccio);
      	$ordre->bindValue(':ingredients',$ingredients);
      	$ordre->bindValue(':msg',$msg);
        $ordre->bindValue(':tipus',$tipus);
        $ordre->bindValue(':fitxer',$fitxer);
      
      	$res = $ordre->execute(); 
        return $res;
  }

  public function mostrarReceptes($iduser) {
    $sql = "select * from receptes where iduser =:iduser";
    $ordre = $this->bd->prepare($sql);
    $ordre->bindValue(':iduser',$iduser);	 
    $ordre->execute(); 
    $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

    return $res;
  }

  public function mostrarUnaRecepta($idrecepta) {
    $sql = "select * from receptes where idrecepta =:idrecepta";
    $ordre = $this->bd->prepare($sql);
    $ordre->bindValue(':idrecepta',$idrecepta);	 
    $ordre->execute(); 
    $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

    return $res;
  }

  public function mostrarTotesReceptes() {
    $sql = "select * from receptes";
    $ordre = $this->bd->prepare($sql); 
    $ordre->execute(); 
    $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

    return $res;
  }

  public function filtrarReceptes($tipus,$titol) {
    $sql = "select * from receptes where tipus =:tipus AND titol LIKE '%$titol%' ";
    $ordre = $this->bd->prepare($sql); 
    $ordre->bindValue(':tipus',$tipus);	 
    $ordre->execute(); 
    $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

    return $res;
  }

  public function esborrarRecepta($idrecepta) {
      $sql = "delete from receptes where idrecepta=:idrecepta";
      $ordre = $this->bd->prepare($sql); 
      $ordre->bindValue(':idrecepta',$idrecepta); 
      $ordre->execute(); 

      return $ordre;
  }

  public function likes($iduser) {
    $sql = "select idrecepta from likes where iduser=:iduser";
    $ordre = $this->bd->prepare($sql); 
    $ordre->bindValue(':iduser',$iduser);	 
    $ordre->execute(); 
    $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

    return $res;
  }

  public function addlikes($idrecepta, $iduser) {
    $sql = "insert into likes values(:idrecepta,:iduser)";
    $ordre = $this->bd->prepare($sql); 
    $ordre->bindValue(':idrecepta',$idrecepta);
    $ordre->bindValue(':iduser',$iduser);	 
    $ordre->execute(); 

    return $ordre;
  }

  public function deletelikes($idrecepta, $iduser) {
    $sql = "delete from likes where iduser=:iduser and idrecepta=:idrecepta";
    $ordre = $this->bd->prepare($sql); 
    $ordre->bindValue(':idrecepta',$idrecepta);
    $ordre->bindValue(':iduser',$iduser);	 
    $ordre->execute(); 

    return $ordre;
  }

  

  

}

?>