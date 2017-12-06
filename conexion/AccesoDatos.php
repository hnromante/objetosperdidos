<?php
#EN CASO DE QUE XAMPP O WAMPP ARROJE PROBLEMAS CON LAS VARIABLES DE MYSQL_BOTH Y ASSSOC, comentar o descomentar lo siguiente:
// define('MYSQL_NUM',MYSQLI_NUM);
// define('MYSQL_ASSOC',MYSQLI_ASSOC);
// define('MYSQL_ASSOC',MYSQLI_BOTH);

class AccesoDatos{
    #Variable de conexion que representa la base de datos MYSQL.
    protected $con;
    protected function conexion(){
        #Inicializamos la variable deconexion utilizando la clas mysqli propia de
        #$this->con = new MySQLi("localhost","id3777850_arcegod","miguelitopopwine","id3777850_clinicalourde") or die("Sin Conexion");
        $this->con = new MySQLi("localhost","root","","objetosPerdidos") or die("Sin Conexion");
        #UNA LINEA ES PARA DESARROLLAR EN LOCAL HOST, Y LA OTRA PARA PRODUCCION EN EL SERVIDOR DE HOSTINGER. Mantener solo 1 habilitada.

        if($this->con->connect_errno){
            die('Error en la conexion! '.$this->con->connect_error);
        }
    }

    protected function desconexion(){
        $this->con->close();
    }


}

?>
