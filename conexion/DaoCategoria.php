<?php

#Esta es la clase de acceso a datos de las categorias, acá se encuentran las consultas SQL a la base de datos MYSQL-PhpMyAdmin

#Data Access Object - Categoria
class DaoCategoria extends AccesoDatos{ #Herencia EXTENDS con, conexion(), desconexion()

    //Metodo para el comboBox de Categorias
    public function obtenerCategorias(){
        $this->conexion();
        $lista = array();
        $sql = "SELECT * FROM categoria";

        $st = $this->con->query($sql);

        while ($rs = $st->fetch_array(MYSQL_BOTH)) {
            $id_cat = $rs['id_cat'];
            $nom_cat = $rs['nom_cat'];
            $requisitos = $rs['requisitos'];
            $cat = new Categoria($id_cat, $nom_cat, $requisitos);

            $lista[] = $cat;
        }
        $this->desconexion();
        return $lista;
    }

}

?>
