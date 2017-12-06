<?php

#Esta es la clase de acceso a datos de los objetos aca se encuentran las consultas SQL a la base de datos MYSQL-PhpMyAdmin

#Data Access Object - Objeto Perdido
class DaoObjeto extends AccesoDatos{ #Herencia EXTENDS con, conexion(), desconexion()

    //Metodo para listar TODOS los objetos
    public function obtenerObjetosTodos(){
        $this->conexion();
        $lista = array();

        $sql = "SELECT objetos.id, objetos.nom, objetos.fechaPerdida,objetos.lugar,objetos.estadoRetiro,objetos.fechaRetiro,categoria.nom_cat,categoria.requisitos,objetos.observacion,objetos.rutRetiro,objetos.AgregadoEn FROM objetos, categoria WHERE objetos.categoria = categoria.id_cat";
        $st = $this->con->query($sql);

        while ($rs = $st->fetch_array(MYSQL_BOTH)) {
            $id = $rs['id'];
            $nom = $rs['nom'];
            $fechaPerdida = $rs['fechaPerdida'];
            $lugar = $rs['lugar'];
            $estadoRetiro = $rs['estadoRetiro'];
            $fechaRetiro = $rs['fechaRetiro'];

            $nomCat = $rs['nom_cat'];
            $categoria = $nomCat;



            $observacion = $rs['observacion'];
            $rutRetiro = $rs['rutRetiro'];
            $agregadoEn = $rs['AgregadoEn'];
            if ($estadoRetiro == 0){
              $fechaRetiro = NULL;
              $rutRetiro = NULL;
            }
            $obj = new Objeto($id,$nom,$fechaPerdida,$lugar,$estadoRetiro,$fechaRetiro,$categoria,$observacion,$rutRetiro,$agregadoEn);

            $lista[] = $obj;

        }
        $this->desconexion();
        return $lista;
    }

    #Listar los objetos retirados
    public function obtenerObjetosRetirados(){
      $this->conexion();
      $lista = array();

      $sql = "SELECT objetos.id, objetos.nom, objetos.fechaPerdida,objetos.lugar,objetos.estadoRetiro,objetos.fechaRetiro,categoria.nom_cat,categoria.requisitos,objetos.observacion,objetos.rutRetiro,objetos.AgregadoEn FROM objetos, categoria WHERE objetos.categoria = categoria.id_cat AND estadoRetiro=1";
      $st = $this->con->query($sql);

      while ($rs = $st->fetch_array(MYSQL_BOTH)) {
          $id = $rs['id'];
          $nom = $rs['nom'];
          $fechaPerdida = $rs['fechaPerdida'];
          $lugar = $rs['lugar'];
          $estadoRetiro = $rs['estadoRetiro'];
          $fechaRetiro = $rs['fechaRetiro'];

          $nomCat = $rs['nom_cat'];
          $categoria = $nomCat;

          $observacion = $rs['observacion'];
          $rutRetiro = $rs['rutRetiro'];
          $agregadoEn = $rs['AgregadoEn'];
          if ($estadoRetiro == 0){
            $fechaRetiro = NULL;
            $rutRetiro = NULL;
          }
          $obj = new Objeto($id,$nom,$fechaPerdida,$lugar,$estadoRetiro,$fechaRetiro,$categoria,$observacion,$rutRetiro,$agregadoEn);

          $lista[] = $obj;

      }
      $this->desconexion();
      return $lista;
    }
    #Listar los objetos no retirados
    public function obtenerObjetosNoRetirados(){
      $this->conexion();
      $lista = array();

      $sql = "SELECT objetos.id, objetos.nom, objetos.fechaPerdida,objetos.lugar,objetos.estadoRetiro,objetos.fechaRetiro,categoria.nom_cat,categoria.requisitos,objetos.observacion,objetos.rutRetiro,objetos.AgregadoEn FROM objetos, categoria WHERE objetos.categoria = categoria.id_cat AND estadoRetiro=0";
      $st = $this->con->query($sql);

      while ($rs = $st->fetch_array(MYSQL_BOTH)) {
          $id = $rs['id'];
          $nom = $rs['nom'];
          $fechaPerdida = $rs['fechaPerdida'];
          $lugar = $rs['lugar'];
          $estadoRetiro = $rs['estadoRetiro'];
          $fechaRetiro = $rs['fechaRetiro'];

          $nomCat = $rs['nom_cat'];
          $requisitos =$rs['requisitos'];
          $categoria = $requisitos;

          $observacion = $rs['observacion'];
          $rutRetiro = $rs['rutRetiro'];
          $agregadoEn = $rs['AgregadoEn'];
          if ($estadoRetiro == 0){
            $fechaRetiro = NULL;
            $rutRetiro = NULL;
          }
          $obj = new Objeto($id,$nom,$fechaPerdida,$lugar,$estadoRetiro,$fechaRetiro,$categoria,$observacion,$rutRetiro,$agregadoEn);

          $lista[] = $obj;

      }
      $this->desconexion();
      return $lista;
    }
    public function obtenerUltimosSeis(){
      $this->conexion();
      $lista = array();

      $sql = "SELECT objetos.id, objetos.nom, objetos.fechaPerdida,objetos.lugar,objetos.estadoRetiro,objetos.fechaRetiro,categoria.nom_cat,categoria.requisitos,objetos.observacion,objetos.rutRetiro,objetos.AgregadoEn FROM objetos, categoria WHERE objetos.categoria = categoria.id_cat AND estadoRetiro=0 ORDER BY AgregadoEn DESC LIMIT 6";
      $st = $this->con->query($sql);

      while ($rs = $st->fetch_array(MYSQL_BOTH)) {
          $id = $rs['id'];
          $nom = $rs['nom'];
          $fechaPerdida = $rs['fechaPerdida'];
          $lugar = $rs['lugar'];
          $estadoRetiro = $rs['estadoRetiro'];
          $fechaRetiro = $rs['fechaRetiro'];

          $nomCat = $rs['nom_cat'];
          $requisitos =$rs['requisitos'];
          $categoria = $nomCat.': '.$requisitos;

          $observacion = $rs['observacion'];
          $rutRetiro = $rs['rutRetiro'];
          $agregadoEn = $rs['AgregadoEn'];
          if ($estadoRetiro == 0){
            $fechaRetiro = NULL;
            $rutRetiro = NULL;
          }
          $obj = new Objeto($id,$nom,$fechaPerdida,$lugar,$estadoRetiro,$fechaRetiro,$categoria,$observacion,$rutRetiro,$agregadoEn);

          $lista[] = $obj;

      }
      $this->desconexion();
      return $lista;
    }

    //Antes de llamar a los metodos de agregar, modificar o eliminar, es necesario consular si el objeto existe.
    //Si encuentra un objeto, va a retornar el OBJETO objeto. Si no lo encuentra, retorna 0.
    public function consultarObjeto($id){
        $this->conexion();
        $sql = "SELECT * FROM objetos WHERE id='$id'";
        $st = $this->con->query($sql);

        if($rs = $st->fetch_array(MYSQL_BOTH)){
            $id = $rs['id'];
            $nom = $rs['nom'];
            $fechaPerdida = $rs['fechaPerdida'];
            $lugar = $rs['lugar'];
            $estadoRetiro = $rs['estadoRetiro'];
            $fechaRetiro = $rs['fechaRetiro'];
            $categoria = $rs['categoria'];
            $observacion = $rs['observacion'];
            $rutRetiro = $rs['rutRetiro'];
            $agregadoEn = $rs['AgregadoEn'];
            $obj = new Objeto($id,$nom,$fechaPerdida,$lugar,$estadoRetiro,$fechaRetiro,$categoria,$observacion,$rutRetiro,$agregadoEn);
            $this->desconexion();
            return $obj;
        }

        $this->desconexion();
        return 0;
    }

    //Metodo para agregar objetos (Exclusivo del admin)
    public function agregarObjeto(Objeto $obj){
      #Recibimos un objeto como parametro y lo descomponemos en sus distintos atributos para insertar en MYSQL
        $this->conexion();

        $id = $obj->getId();
        $nom = $obj->getNom();
        $fechaPerdida = $obj->getFechaPerdida();
        $lugar = $obj->getLugar();
        $estadoRetiro = $obj->getEstadoRetiro();
        $fechaRetiro = $obj->getFechaRetiro();
        $categoria = $obj->getCategoria();
        $observacion = $obj->getObservacion();
        $rutRetiro = $obj->getRutRetiro();
        $agregadoEn = $obj->getAgregadoEn();
        #SI el estado de retiro = 0, setiamos la fecha de retiro y el rut de retiro a DEFAULT, que en MYSQL se transforma en
        if($estadoRetiro == 0){
            $sql = "INSERT INTO objetos VALUES (DEFAULT,'$nom','$fechaPerdida','$lugar','$estadoRetiro',DEFAULT,$categoria,'$observacion',DEFAULT,DEFAULT)";
        }else{
            $sql = "INSERT INTO objetos VALUES (DEFAULT,'$nom','$fechaPerdida','$lugar','$estadoRetiro','$fechaRetiro',$categoria,'$observacion','$rutRetiro',DEFAULT)";
        }

        $st = $this->con->query($sql);

        if($this->con->affected_rows > 0){
            echo 'Se ha agregado el objeto correctamente';
        }else{
            echo 'No se ha podido agregar el objeto';
        }
        $this->desconexion();

    }

    //Metodo para moificar el estao del objeto
    public function cambiarEstadoRetiro($id){

  		$obj = $this->consultarObjeto($id);
  		$this->conexion();
      $sql = '';

      $estado = $obj->getEstadoRetiro();
  		if ($estado) {
  			$sql = "UPDATE objetos SET estadoRetiro=0 WHERE id='$id'";

  		}else{
  			$sql = "UPDATE objetos SET estadoRetiro=1 WHERE id='$id'";
  		}

  		$st = $this->con->query($sql);

  		if($this->con->affected_rows > 0 ){
  			echo 'Se cambio el estado correctamente';
  		}else{
  			echo '...Error! No se pudo cambiar el estado';
  		}
  		$this->desconexion();

  	}
    public function modificarObjeto($obj){
        $this->conexion();

        $id = $obj->getId();
        $nom = $obj->getNom();
        $fechaPerdida = $obj->getFechaPerdida();
        $lugar = $obj->getLugar();
        $estadoRetiro = $obj->getEstadoRetiro();
        $fechaRetiro = $obj->getFechaRetiro();
        $categoria = $obj->getCategoria();
        $observacion = $obj->getObservacion();
        $rutRetiro = $obj->getRutRetiro();
        $agregadoEn = $obj->getAgregadoEn();

        $sql = "UPDATE objetos SET nom='$nom', fechaPerdida='$fechaPerdida', lugar='$lugar', estadoRetiro='$estadoRetiro', fechaRetiro='$fechaRetiro', categoria='$categoria', observacion='$observacion', rutRetiro='$rutRetiro' WHERE id=$id;";
        $st = $this->con->query($sql);

        if ($this->con->affected_rows > 0){
            echo 'Se actualizo la informacion del objeto!';
        }else{
            echo '...ERROR!, no se pudo actualizar la informacion del usuario';
        }
        $this->desconexion();
    }
}

?>
