<?php
require_once "Database.php";
require_once "User.php";
class Mensaje {
    private int $idMen;
    private int $idOri;
    private int $idDes;
    private string $fecha;
    private string $asunto;
    private string $texto;
    private int $leido;
    private string $nombreOri;
    

    /**
     * Get the value of leido
     */ 
    public function getLeido()
    {
        return $this->leido;
    }

    /**
     * Set the value of leido
     *
     * @return  self
     */ 
    public function setLeido($leido)
    {
        $this->leido = $leido;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of asunto
     */ 
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set the value of asunto
     *
     * @return  self
     */ 
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of idDes
     */ 
    public function getIdDes()
    {
        return $this->idDes;
    }

    /**
     * Set the value of idDes
     *
     * @return  self
     */ 
    public function setIdDes($idDes)
    {
        $this->idDes = $idDes;

        return $this;
    }

    /**
     * Get the value of idOri
     */ 
    public function getIdOri()
    {
        return $this->idOri;
    }

    /**
     * Set the value of idOri
     *
     * @return  self
     */ 
    public function setIdOri($idOri)
    {
        $this->idOri = $idOri;

        return $this;
    }

    /**
     * Get the value of idMen
     */ 
    public function getIdMen()
    {
        return $this->idMen;
    }

    /**
     * Set the value of idMen
     *
     * @return  self
     */ 
    public function setIdMen($idMen)
    {
        $this->idMen = $idMen;

        return $this;
    }
      /**
     * Get the value of nombreOri
     */ 
    public function getNombreOri()
    {
        return $this->nombreOri;
    }

    /**
     * Set the value of nombreOri
     *
     * @return  self
     */ 
    public function setNombreOri($nombreOri)
    {
        $this->nombreOri = $nombreOri;

        return $this;
    }

    public function mensajesRecibidos($idDes) {

        $connectDb = Database::getDatabase();
       
        $query = "select idMen, idOri, idDes, fecha, asunto, leido, nombre from mensaje  join usuario  on idOri = idUsu where idDes=:idDes";
        $result = $connectDb->query($query, [":idDes"=>$idDes]);
        if(!$result)return false;

        $array = [];
        while($result->getClass("Mensaje")) {
            $newInstance = new Mensaje;

            $newInstance->setIdMen($result->idMen);
            $newInstance->setIdOri($result->idOri);
            $newInstance->setIdDes($result->idDes);
            $newInstance->setFecha($result->fecha);
            $newInstance->setAsunto($result->asunto);
            $newInstance->setLeido($result->leido);
            $newInstance->setNombreOri($result->nombre);
            
            array_push($array, $newInstance);

        }
        return $array;
    }
    public function mensajesEnviados($idOri) {

        $connectDb = Database::getDatabase();
        $connection = $connectDb->startConnection();

        $result = $connection->query("select idMen, idOri, idDes, fecha, asunto, leido, nombre from mensaje  join usuario  on idDes = idUsu where idOri=$idOri");
        if(!$result)return false;

        $array = [];
        while($rows = $result->fetchObject("Mensaje")) {
            $newInstance = new Mensaje;

            $newInstance->setIdMen($rows->idMen);
            $newInstance->setIdOri($rows->idOri);
            $newInstance->setIdDes($rows->idDes);
            $newInstance->setFecha($rows->fecha);
            $newInstance->setAsunto($rows->asunto);
            $newInstance->setLeido($rows->leido);
            $newInstance->setNombreOri($rows->nombre);
            
            array_push($array, $newInstance);

        }
        return $array;
    }

    public function deleteMensaje($idMen) {
        $connectDb = Database::getDatabase();
        $connection = $connectDb->startConnection();
        $result = $connection->query("delete from mensaje where idMen=$idMen");
        if(!$result) return false;
        return true;
    }

    public function sendEmail($idOri, $emailDes, $asunto, $texto) {
        $connectDb = Database::getDatabase();
        $connection = $connectDb->startConnection();
        $user = new User;
        $idUsu = $user->getIdReceptor($emailDes);
        
        $timezone  = +1; 
        $fecha = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("I")));
        
        $result = $connection->query("insert into mensaje (idOri, idDes, fecha, asunto, texto, leido) values ($idOri, $idUsu, '$fecha', '$asunto', '$texto',0) ");
       
        if(!$result) return false;
        return true;
    }

    public function leerMensaje($idMen, $enviado =false) {
        $connectDb = Database::getDatabase();
        $connection = $connectDb->startConnection();
        if(!$enviado){
            //mensajes recibidos
            $result = $connection->query("select idMen, idOri, idDes, fecha, asunto, texto, nombre from mensaje  join usuario  on idOri = idUsu where idMen=$idMen");
        }else {
            //mensajes enviados
            $result = $connection->query("select idMen, idOri, idDes, fecha, asunto, texto, nombre from mensaje  join usuario  on idDes = idUsu where idMen=$idMen");
        }
        
        if(!$result) return false;

        $dataMsg = $result->fetchObject("Mensaje");
        $this->setIdMen($dataMsg->idMen);
        $this->setIdOri($dataMsg->idOri);
        $this->setIdDes($dataMsg->idDes);
        $this->setFecha($dataMsg->fecha);
        $this->setAsunto($dataMsg->asunto);
        $this->setTexto($dataMsg->texto);
        $this->setNombreOri($dataMsg->nombre);

        return true;
    }

    public function mensajeLeido($idMen) {
        $connectDb = Database::getDatabase();
        $connection = $connectDb->startConnection();
        
        $result = $connection->query("update mensaje set leido=1 where idMen=$idMen");
       
        
        if(!$result) return false;

        return true;
    }
    

  
}
?>