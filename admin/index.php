<?php
include '../extend/header.php';

require_once ('../conexion/AccesoDatos.php');
require_once ('../model/objeto.php');
require_once ('../conexion/DaoObjeto.php');
require_once ('../model/categoria.php');
require_once ('../conexion/DaoCategoria.php');

$daoObj = new DaoObjeto();
$daoCat = new DaoCategoria();
#Preguntamos si se preionó el boton de agregar
if (isset($_REQUEST['btn_guardar'])){ #!EMPTY
	$id = $_REQUEST['id'];
	$nom = $_REQUEST['nom'];
	$fecha = $_REQUEST['fecha'];
	$lugar = $_REQUEST['lugar'];
	$cat = $_REQUEST['cat'];
	$obs = $_REQUEST['obs'];
  $estado = $_REQUEST['estado'];
  $fechaRetiro = $_REQUEST['fechaRetiro'];
  $rut = $_REQUEST['rut'];

	$obj = new Objeto($id,$nom,$fecha,$lugar,$estado,$fechaRetiro,$cat,$obs,$rut,0);

	$daoObj->agregarObjeto($obj);
}

#Inicializamos los valores de los input, vacios
#Inicializmos los valores de los botones, todos deshabilitados
$tf_id='-1';
$tf_nom='';
$tf_fecha='';
$tf_lugar='';
$tf_cat='';
$tf_obs='';
$tf_estado='';
$tf_fechaRetiro='';
$tf_rut='';

$btnagre='disabled';
$btnest='disabled';
$btnmod='disabled';


#Preguntamos si se presionó el boton de consultar.
if (isset($_REQUEST['btn_consultar'])){
  $id = $_REQUEST['id'];
  $obj= $daoObj->consultarObjeto($id);
  if ($obj){ // EXISTE
    $tf_id = $obj->getId();
    $tf_nom = $obj->getNom();
    $tf_fecha = $obj->getFechaPerdida();
    $tf_lugar = $obj->getLugar();
    $tf_estado = $obj->getEstadoRetiro();
    $tf_fechaRetiro = $obj->getFechaRetiro();
    $tf_cat = $obj->getCategoria();
    $tf_obs = $obj->getObservacion();
    $tf_rut = $obj->getRutRetiro();


    //Si se encuentra el objeto, deshabilitamos AGREGAR
    $btnagre ='disabled';
    $btnmod = '';
    $btnest='';
      echo 'objeto encontrado, puede eliminar o modificarlo';
  }else{ //retorno 0
    #Si no se encuentra el objeto, habilitamos agregar y deshabilitamos modificar y estado
    $btnagre='';
    $btnest='disabled';
    $btnmod = 'disabled';
    echo 'No se encontro el Paciente, puede agregar!';
    $tf_id = $id;
    }
}
// Preguntamos si se envio un parametro para cambiar el estado
if (isset($_REQUEST['codest'])){
    $id = $_REQUEST['codest'];
    $daoObj->cambiarEstadoRetiro($id);
}
// Preguntamos si se presionó el boton para cambiar el estado del objeto
if (isset($_REQUEST['btn_estado'])){
  $id = $_REQUEST['id'];
  $daoObj->cambiarEstadoRetiro($id);
  $tf_id ='';
}
//Preguntamos si se presionó el boton para modificar el objeto
if (isset($_REQUEST['btn_modificar'])){

  $id = $_REQUEST['id'];
	$nom = $_REQUEST['nom'];
	$fecha = $_REQUEST['fecha'];
	$lugar = $_REQUEST['lugar'];
	$cat = $_REQUEST['cat'];
	$obs = $_REQUEST['obs'];
  $estado = $_REQUEST['estado'];
  $fechaRetiro = $_REQUEST['fechaRetiro'];
  $rut = $_REQUEST['rut'];

  $obj = new Objeto($id,$nom,$fecha,$lugar,$estado,$fechaRetiro,$cat,$obs,$rut,0);
	$daoObj->modificarObjeto($obj);
  $tf_id ='';
}

?>
  <!--  Sección de título y enunciado-->
  <div style="margin-top:5%" class="row">
    <div class="col s12 m6 l6">
      <img src="../img/logo1.png" width="90%" alt="" />
    </div>
    <div class="col s12 m6 l6">
      <p class="flow-text grey-text text-darken-2">Esta es la pestaña del admin, temporalmente le permite solo a uste agregar, moificar y cambiar el estao de los objetos. Rellene los campos bien ya que no hay verificación de parte del back-end.</p>
      <p class="flow-text grey-text text-darken-2"><strong>IMPORTANTE: </strong>Para presionar cualquiera de los botones debe llenar como mínimo EL ID y SELECCIONAR UNA CATEGORÍA.</p>
    </div>
  </div>
  <!--  Sección de formulario para agregar un objeto nuevo. Puede consultar y cambiar el estado por ID y por el listado(GET URL)-->
  <div style="margin-top:3%" class="row">
  <div class="col s12 m12 l12">
  <div class="card horizontal">
      <div class="card-content grey-text text-darken-2">
          <span class="card-title">Agregar un objeto perdido</span>
          <form class="form" action="index.php" method="POST" >
              <!--  CAMPO ID-->
                <div class="input-field col s6 m3 l2">
                  <input type="number" id="id"  name="id" required value="<?php echo $tf_id; ?>" >
                  <label for="id">ID</label>
                </div>
              <!--  CAMPO boton consultar-->
                <div class="input-field col s6 m3 l2">
                <button name="btn_consultar" id="btn_consultar" type="submit" class="btn black">Consultar</button>
                </div>
              <!--  CAMPO Nombre objeto-->
                <div class="input-field col s12 m6 l4">
                  <input type="text" id="nom"  name="nom" value="<?php echo $tf_nom; ?>" maxlength="30" >
                  <label for="nom">Objeto (nombre)</label>
                </div>
                <!--  CAMPO Fecha de perdida-->
                <div class="col s12 m6 l4">
                  <input type="text" id="fecha"  name="fecha" required class="datepicker" placeholder="Cuando se perdió?" value="<?php echo $tf_fecha; ?>">
                  <label for="fecha" data-error="Incorrecto" data-success="Correcto">Seleccione la fecha en que se encontró </label>
                </div>
                <!--  CAMPO Lugar de perdida-->
                <div class="input-field col s12 m6 l4">
                  <input type="text" id="lugar"  name="lugar" value="<?php echo $tf_lugar; ?>" maxlength="30">
                  <label for="lugar">Lugar donde de encontró</label>
                </div>
                <!--  CAMPO Categoría-->
                <div class="input-field col s12 m6 l4">
                    <select name="cat" required>
                        <option disabled selected>Elija una categoría para los requisitos</option>
                        <?php

                        $lista = $daoCat->obtenerCategorias();

                        foreach ($lista as $cat) {
                          echo '<option value="'.$cat->getId().'">'.$cat->getNom().'</option>';
                        }

                        ?>
                    </select>
                    <label>Categoría</label>
                 </div>
                 <!--  CAMPO Observación-->
                 <div class="input-field col s12 m6 l4">
                   <input type="text" id="obs"  name="obs" value="<?php echo $tf_obs; ?>" maxlength="100" >
                   <label for="obs">Observación</label>
                 </div>
                  <!--  CAMPO Estado de retiro-->
                <div class="input-field col s12 m6 l4">
                  <input type="number" id="estado"  name="estado" value="<?php echo $tf_estado; ?>" max="1" maxlength="1" min="0">
                  <label for="estado">Estado de retiro</label>
                </div>
                <!--  CAMPO fecha de retiro-->
                <div class="col s12 m6 l4">
                  <label for="fecha" data-error="Incorrecto" data-success="Correcto">Seleccione la fecha en que se retiró </label>
                  <input type="text" id="fechaRetiro"  name="fechaRetiro"  class="datepicker" placeholder="Cuando se retiró?" value="<?php echo $tf_fechaRetiro; ?>" >
                </div>
                <!--  CAMPO rut retiro-->
                <div class="input-field col s12 m6 l4">
                  <input type="text" id="rut"  name="rut" value="<?php echo $tf_rut; ?>" maxlength="45" >
                  <label for="rut">Rut de quien retiró</label>
                </div>
                <!--  CAMPO BOTON cambio de estado-->
                <div class="input-field col s12 m4 l4">
                <button name="btn_estado" id="btn_estado" type="submit" class="btn red <?php echo $btnest; ?>">Cambiar Estado <i class="material-icons">compare_arrows</i></button>
                </div>
                <!--  CAMPO BOTON modificar-->
                <div class="input-field col s12 m4 l4">
                <button name="btn_modificar" id="btn_modificar" type="submit" class="btn blue" <?php echo $btnmod; ?>>Modificar <i class="material-icons">edit</i></button>
                </div>
                <!--  CAMPO BOTON guardar-->
                <div class="input-field col s12 m4 l4">
                <button id="btn_guardar" name="btn_guardar" type="submit" class="btn green <?php echo $btnagre; ?>">Guardar <i class="material-icons">send</i></button>
                </div>

              </form>
      </div>
  </div>
  </div>
</div>
  <div style="margin-top:5%" class="row">
    <div class="col s12 m12 l12">
    <div class="card">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title">Listado completo de objetos</span>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="objeto">Objeto (nombre)</th>
                        <th data-field="fecha_encontrada">Encontrado el</th>
                        <th data-field="tel">Lugar</th>
                        <th data-field="categoria">Categoría</th>
                        <th data-field="observacion">Observación</th>
                        <th data-field="agregado">Agregado el</th>
                        <th data-field="estado">Estado retiro</th>
                        <th data-field="fecha_retiro">Retirado el</th>
                        <th data-field="rut_retiro">Rut retiro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

			                $lista = $daoObj->obtenerObjetosTodos();
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
                          $estado = '';
                          if ($obj->getEstadoRetiro()){
                            $estado = " retirado";
                          }else{
                            $estado = " no retirado";
                          }
        			            echo '<td>'.$estado.'</td>';
                          $fechaRet = '';
                          $rutRet = '';
                          if (!$obj->getFechaRetiro()){
                            $fechaRet = ' --- ';
                            $rutRet = '---';
                          }else{
                            $fechaRet = $obj->getFechaRetiro();
                            $rutRet = $obj->getRutRetiro();
                          }

                          echo '<td>'.$fechaRet.'</td>';
                          echo '<td>'.$rutRet.'</td>';
        			            echo '</tr>';
        			        }

        			?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>
<?php include '../extend/scripts.php'?>
</body>
</html>
