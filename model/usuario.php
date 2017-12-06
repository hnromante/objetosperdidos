
<?php

#La clase usuario existe solo para darle acceso al admin del sistema.
class Usuario{
    private $id; #TYPE INT, AUTOINCREMENTAL
    private $nombre; #TYPE VARCHAR
    private $pass; #TYPE VARCHAR sha1
    private $admin; #TYPE INT(1), 1 o 0

    #CONSTRUCTOR
    public function Usuario($id,$nombre,$pass,$admin){
      $this->id = $id;
      $this->nombre = $nombre;
      $this->pass = $pass;
      $this->admin = $admin;
    }

    #GETTERS
    public function getId(){
      return $this->id;
    }
    public function getNombre(){
      return $this->nombre;
    }
    public function getPass(){
      return $this->pass;
    }
    public function getAdmin(){
      return $this->admin;
    }
}




?>
