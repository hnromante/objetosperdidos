<?php

class Categoria {
  #ID del objeto perdido. TYPE INT, AUTOINCREMENTAL
  private $id;
  #Nombre. TYPE VARCHAR
  private $nom;
  #Fecha aproximada de cuando se perdió el objeto. TYPE DATE
  private $requisitos;

  #CONSTRUCTOR
  public function Categoria($id,$nom,$requisitos){
    $this->id = $id;
    $this->nom = $nom;
    $this->requisitos = $requisitos;
  }

  #GETTERS
  public function getId(){
    return $this->id;
  }
  public function getNom(){
    return $this->nom;
  }
  public function getRequisitos(){
    return $this->requisitos;
  }
}

?>
