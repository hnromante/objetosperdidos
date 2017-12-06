<?php
include '../extend/header.php';

require_once ('../conexion/AccesoDatos.php');
require_once ('../model/objeto.php');
require_once ('../conexion/DaoObjeto.php');


$daoObj = new DaoObjeto();

?>
<div style="margin-top:5%; margin-left:5%; margin-right:5% " class="row">
  <div class="col s12 m6 l6">
    <img src="../img/history2.png" width="60%" alt="" />
  </div>
  <div class="col s12 m6 l6 ">
    <p class="flow-text grey-text text-darken-2">En esta pestaña puedes encontrar un historial de los objetos reclamados.<p/>
    <p class="flow-text grey-text text-darken-2">Si consideras que alguno de los objetos te pertenece, puedes contactar a <a href="#">Jacob Cabello.</a> para más infromación. </p>
  </div>

</div>
<!-- Seccion de listado reservas -->
  <div style="margin-top:5%" class="row">
    <div class="col s12 m12 l12">
    <div class="card ">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title">Listado de objetos NO retirados</span>
            <table class="responsive-table">
      <thead>
          <tr>
              <th data-field="id">Id</th>
              <th data-field="nom">Objeto</th>
              <th data-field="fecha">Fecha Perdida</th>
              <th data-field="lugar">Lugar encontrado</th>
              <th data-field="requisitos">Requisito de retiro</th>
              <th data-field="observacion">Observacion</th>
              <th data-field="agregado">Agregado el :</th>

          </tr>
      </thead>
      <tbody>
        <?php

          $lista = $daoObj->obtenerObjetosNoRetirados();
          echo count($lista);
          foreach($lista as $obj){
              echo '<tr>';
              echo '<td>'.$obj->getId().'</td>';
              echo '<td>'.$obj->getNom().'</td>';
              echo '<td>'.$obj->getFechaPerdida().'</td>';
              echo '<td>'.$obj->getLugar().'</td>';
              echo '<td>'.$obj->getCategoria().'</td>';
              echo '<td>'.$obj->getObservacion().'</td>';
              echo '<td>'.$obj->getAgregadoEn().'</td>';
              echo '</tr>';
          }

  ?>

      </tbody>
  </table>
        </div>
    </div>
    </div>
  </div>


<?php include '../extend/scripts.php';?>
</body>
</html>
