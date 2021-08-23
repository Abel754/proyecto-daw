<?php



class Model {

    protected $bd;
    protected $usuari="ddb166152";
    protected $password="P@ssw0rd";
    protected $taula;
    protected $database ="ddb166152";
    protected $host = "bbdd.comoencasa.cat";

    function __construct() {
		 
		try {
			
			$this->bd = new PDO('mysql:host='.$this->host.';dbname='.$this->database, 
                     $this->usuari, $this->password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
)); 	   

		} catch (PDOException $e) {
			echo "Error: Couldn't connect with the database";
			die();
		}

    }

    // metode per calcular el número de registres que té la taula
    public function numPages($num_regs, $tipus, $titol) {

      $sql = "select count(*) from ".$this->taula." where tipus =:tipus AND titol LIKE '%$titol%'";
      $resultat = $this->bd->prepare($sql);
      $resultat->bindValue(':tipus',$tipus);	
      $resultat->execute();
      $reg = $resultat->fetch(PDO::FETCH_NUM); // recuperem el registre
      $total_regs = $reg[0]; // la informaciÃ³ estarÃ  
      // en la primera posiciÃ³ del array
      $total_pags = ceil($total_regs / $num_regs);
      return $total_pags;
    }

    // Mètode per recuperar un número limitat de registres, partint d'una pàgina determinada

    public function getPage($pagina, $numRegs, $tipus, $titol) {
      $inici = ($pagina - 1) * $numRegs;
      $sentencia = $this->bd->prepare("SELECT * from ".$this->taula." where tipus =:tipus AND titol LIKE '%$titol%' LIMIT :ini, :numr");
      // El bindValue porta un segon paràmetre per especificar el tipus de la variable que es vol enllaçar.
      // S'ha de fer així per a que ens funcionni correctament!
      $sentencia->bindValue(':tipus',$tipus);	 
      $sentencia->bindValue(':ini', $inici, PDO::PARAM_INT);
      $sentencia->bindValue(':numr', $numRegs, PDO::PARAM_INT);
      $sentencia->execute();
      $resultat = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultat;
    }

    // metode per calcular el número de registres que té la taula
    public function numPagesOneUser($num_regs, $iduser) {
      $sql = "select count(*) from ".$this->taula." where iduser=:iduser";
      $resultat = $this->bd->prepare($sql);	
      $resultat->bindValue(':iduser',$iduser);
      $resultat->execute();
      $reg = $resultat->fetch(PDO::FETCH_NUM); // recuperem el registre
      $total_regs = $reg[0]; // la informaciÃ³ estarÃ  
      // en la primera posiciÃ³ del array
      $total_pags = ceil($total_regs / $num_regs);
      return $total_pags;
    }

    // Mètode per recuperar un número limitat de registres, partint d'una pàgina determinada

    public function getPageOneUser($pagina, $numRegs, $iduser) {
      $inici = ($pagina - 1) * $numRegs;
      $sentencia = $this->bd->prepare("SELECT * from ".$this->taula." where iduser=:iduser LIMIT :ini, :numr");
      // El bindValue porta un segon paràmetre per especificar el tipus de la variable que es vol enllaçar.
      // S'ha de fer així per a que ens funcionni correctament!
      $sentencia->bindValue(':iduser',$iduser);	 
      $sentencia->bindValue(':numr', $numRegs, PDO::PARAM_INT);
      $sentencia->bindValue(':ini', $inici, PDO::PARAM_INT);
      $sentencia->execute();
      $resultat = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultat;
    }
    

    public function numPagesTot($num_regs, $titol) {

      $sql = "select count(*) from ".$this->taula." where titol LIKE '%$titol%'";
      $resultat = $this->bd->prepare($sql);
      $resultat->execute();
      $reg = $resultat->fetch(PDO::FETCH_NUM); // recuperem el registre
      $total_regs = $reg[0]; // la informaciÃ³ estarÃ  
      // en la primera posiciÃ³ del array
      $total_pags = ceil($total_regs / $num_regs);
      return $total_pags;
    }

    // Mètode per recuperar un número limitat de registres, partint d'una pàgina determinada

    public function getPageTot($pagina, $numRegs, $titol) {
      $inici = ($pagina - 1) * $numRegs;
      $sentencia = $this->bd->prepare("SELECT * from ".$this->taula." where titol LIKE '%$titol%' LIMIT :ini, :numr");
      // El bindValue porta un segon paràmetre per especificar el tipus de la variable que es vol enllaçar.
      // S'ha de fer així per a que ens funcionni correctament!
      $sentencia->bindValue(':ini', $inici, PDO::PARAM_INT);
      $sentencia->bindValue(':numr', $numRegs, PDO::PARAM_INT);
      $sentencia->execute();
      $resultat = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultat;
    }

    

    

}

?>