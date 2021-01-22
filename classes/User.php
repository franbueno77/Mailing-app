<?php
require_once "Database.php";
class User {

    private int $idUsu;
    private string $email;
    private string $password;
    private string $nombre;
    private ?string $apellidos = null;
    private string $foto;
    

    /**
     * Get the value of fotos
     */ 
    public function getFoto()
    {
        return $this->fotos;
    }

    /**
     * Set the value of fotos
     *
     * @return  self
     */ 
    public function setFoto($fotos)
    {
        $this->fotos = $fotos;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of idUsu
     */ 
    public function getIdUsu()
    {
        return $this->idUsu;
    }

    /**
     * Set the value of idUsu
     *
     * @return  self
     */ 
    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;

        return $this;
    }


    public function login ($email, $password){
        $connect = Database::getDatabase();
    
        $query = "select* from usuario where email= ':email' and password= MD5(':pass')";
        $result =$connect->query($query, [":email"=>$email, ":pass"=>$password]);
        var_dump($result);
        if(!$result)return false;
        
    $rows = $result->getClass("User");
        $this->setIdUsu($rows->idUsu);
        $this->setEmail($rows->email);
        $this->setPassword($rows->password);
        $this->setNombre($rows->nombre);
        $this->setApellidos($rows->apellidos);
        $this->setFoto($rows->foto);
    
        
            
  
        return true;
    }

    public function getIdReceptor($email) {
        $connect = Database::getDatabase();
        $connection = $connect->startConnection();
        $result = $connection->query("select idUsu from usuario where email='$email'");

        $getId = $result->fetchObject("User");

        return $getId->idUsu;
    }

    public function updateUser($email, $nombre, $apellidos, $pass) {
        $connect = Database::getDatabase();
        $connection = $connect->startConnection();
        $formatPass = md5($pass);
        $result = $connection->query("update usuario set nombre='$nombre', apellidos='$apellidos', password='$formatPass' where email='$email'");
    
        if(!$result)return false;
        return true;
    } 

    public function getEmailUser($idUsu) {
        $connect = Database::getDatabase();
        $connection = $connect->startConnection();
        $result = $connection->query("select email from usuario where idUsu=$idUsu");

        $getId = $result->fetchObject("User");

        return $getId->email;
    }

}