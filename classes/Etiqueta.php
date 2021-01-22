<?php
require_once "Database.php";
class Etiqueta {
    private ?int $idTag = null;
    private ?string $etiqueta = null;
    private ?string $color = null;
    

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of etiqueta
     */ 
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Set the value of etiqueta
     *
     * @return  self
     */ 
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * Get the value of idTag
     */ 
    public function getIdTag()
    {
        return $this->idTag;
    }

    /**
     * Set the value of idTag
     *
     * @return  self
     */ 
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;

        return $this;
    }

    public function mostrarEtiqueta($idMen) {

        $connect = Database::getDatabase();
        $connection = $connect->startConnection();
        $result = $connection->query("select idTag, etiqueta, color from mensaje_etiqueta join etiqueta using(idTag) where idMen = $idMen");

        if(!$result) return false;

        $row = $result ->fetchObject("Etiqueta");
        $this->setIdTag(@$row->idTag);
        $this->setEtiqueta(@$row->etiqueta);
        $this->setColor(@$row->color);
        return true;
    }
}