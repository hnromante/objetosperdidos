<?php

class Objeto {
  #ID del objeto perdido. TYPE INT, AUTOINCREMENTAL
  private $id;
  #Nombre. TYPE VARCHAR
  private $nom;
  #Fecha aproximada de cuando se perdió el objeto. TYPE DATE
  private $fechaPerdida;
  #Lugar aproximado. TYPE VARCHAR
  private $lugar;
  #Estado del objeto, si se ha retirado o no; V o F. TYPE INT(1) 1 o 0
  private $estadoRetiro;
  #Fecha de cuando se retiro el objeto. TYPE DATE
  private $fechaRetiro;
  #La categoría representa una tabla con llave foranea que indica el tipo de objeto,
  #principalmente con el objetivo de llenar una descripcion de como retirar cierto tipo de objeto:
  #POR EJEMPLO : categoría = pendrive; descripcion: para retirar el pendrive usted debe indicar que archivos se encuentran dentro.
  private $categoria;
  #Una pequeña observación opcional del objeto. TYPE VARCHAR
  private $observacion;
  #Rut de quien retiro el objeto (acepta nombres tambien). TYPE VARCHAR(50)
  private $rutRetiro;
  #Valor agregado automaticamente cuando se crea el registro. TYPE TIMESTAMP
  private $agregadoEn;

  #CONSTRUCTOR
  public function Objeto($id,$nom,$fechaPerdida,$lugar,$estadoRetiro,$fechaRetiro,$categoria,$observacion,$rutRetiro,$agregadoEn){
    $this->id = $id;
    $this->nom = $nom;
    $this->fechaPerdida = $fechaPerdida;
    $this->lugar = $lugar;
    $this->estadoRetiro = $estadoRetiro;
    $this->fechaRetiro = $fechaRetiro;
    $this->categoria = $categoria;
    $this->observacion = $observacion;
    $this->rutRetiro = $rutRetiro;
    $this->agregadoEn = $agregadoEn;
  }

  #GETTERS
  public function getId(){
    return $this->id;
  }
  public function getNom(){
    return $this->nom;
  }
  public function getFechaPerdida(){
    return $this->fechaPerdida;
  }
  public function getLugar(){
    return $this->lugar;
  }
  public function getEstadoRetiro(){
    return $this->estadoRetiro;
  }
  public function getFechaRetiro(){
    return $this->fechaRetiro;
  }
  public function getCategoria(){
    return $this->categoria;
  }
  public function getObservacion(){
    return $this->observacion;
  }
  public function getRutRetiro(){
    return $this->rutRetiro;
  }
  public function getAgregadoEn(){
    return $this->agregadoEn;
  }
}

?>
