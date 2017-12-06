<?php
include 'extend/headerInicio.php';

require_once ('conexion/AccesoDatos.php');
require_once ('model/objeto.php');
require_once ('conexion/DaoObjeto.php');

$daoObj = new DaoObjeto();
?>

<div style="margin-top:5%; margin-left:5%; margin-right:5% " class="row">
  <div class="col s12 m6 l6">
    <img src="img/logo.png" class="responsive-img" alt="" />
  </div>
  <div class="col s12 m6 l6 ">
    <p class="flow-text grey-text text-darken-2">Bienvenido a los objetos perdidos de Inacap Rancagua, en esta página se publicarán las pertenencias que sean encontradas por el personal de la sede.<p/>
    <p class="flow-text grey-text text-darken-2">Puedes encontrar el historial de los objetos reclamados en el menú de la izquierda.</p>
    <p class="flow-text grey-text text-darken-2">Para el bien de la comunidad, pedimos hacer buen uso de la plataforma. <a href="/objetosperdidos/retiros/como.php">Más info.</a> </p>
  </div>

</div>
<div style="margin-top:3%" class="row">
  <?php

      $lista = $daoObj->obtenerUltimosSeis();

      foreach($lista as $obj){

          echo '<div class="col s12 m6 l4">
            <div class="card z-depth-2">
                <div class="card-content grey-text text-darken-2">
                    <span class="card-title">'.$obj->getNom().'</span>
                    <p>'.$obj->getObservacion().'</p>
                </div>
                <div class="card-action grey-text text-darken-2">
                    <p>Lugar: '.$obj->getLugar().' </p>
                    <p>Fecha: '.$obj->getFechaPerdida().' </p>
                    <div class="center-align">
                        <a href="#">'.$obj->getCategoria().'</a>
                    </div>
                </div>
            </div>
          </div>';
      }

  ?>

<!-- <div class="col s12 m6 l4">
  <div class="card z-depth-2">
      <div class="card-content grey-text text-darken-2">
          <span class="card-title">Bufanda</span>
          <p>Se me perdió en la sala numero 8</p>
      </div>
      <div class="card-action grey-text text-darken-2">
          <p>Lugar: </p>
          <p>Fecha: </p>
          <div class="center-align">
              <a href="#"></a>
          </div>
      </div>
  </div>
</div> -->

</div>


<?php include 'extend/scripts_inicio.php';?>
</body>
</html>
