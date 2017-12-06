<?php
include '../extend/header.php';

?>
<!-- Sección de Formulario para publicar-->
<div style="margin-top:5%; margin-left:5%; margin-right:5% " class="row">
  <div class="col s12 m6 l6 center-align">
    <img src="../img/question.png" width="60%" alt="" />
  </div>
  <div class="col s12 m6 l6 ">
    <p class="flow-text grey-text text-darken-2">Para retirar los objetos, debes acercarte personalmente a hablar con Jacob Cabello, encargado vespertino de la sede, ubicado en la oficina de administración y finanzas en el segundo piso, edificio A.</p>
    <p class="grey-text text-darken-2">Esta pequeña plataforma fue creada para el ramo de Competencias de la Empleabilidad, en el contexto de la responsabilidad social y es una iniciativa independiente, agena a la institución. </p>
    <p class="grey-text text-darken-2">Si haz perdido alguna pertenencia recientemente, puedes listarla  a continuación. Para ello necesitamos que ingreses tu <strong>correo inacapmail</strong>. Publicar aquí no asegura que recuperes tu objeto, pero el objetivo es que nos ayudemos como comunidad inacapina. Les pedimos hacer buen uso de la plataforma!</p>
  </div>
</div>

<div class="row">
    <div class="col s12 m12 l12">
      <div class="card">
          <div class="card-content">
              <span class="card-title">Publica aquí</span>

              <form class="form"  action="ins_usuarios.php" method="post" enctype="multipart/form-data">

                <div class="input-field">
                  <input type="text" id="tf_objeto"  name="tf_objeto" required>
                  <label for="tf_objeto">Objeto</label>
                </div>
                <div class="input-field">
                  <input type="text" id="tf_lugar" name="tf_lugar" required title="Donde perdió el objeto.">
                  <label for="tf_lugar">Lugar</label>
                </div>
                <div class="input-field">
                  <input type="text" id="tf_obs" name="tf_obs" required title="Algo característico de tu pertenencia">
                  <label for="tf_obs">Observacion y detalles del objeto.</label>
                </div>
                <div class="input-field">
                  <input type="email" id="tf_correo" class="validate" name="correo" title="Correo electronico">
                  <label for="tf_correo" data-error="Incorrecto" data-success="Correcto">Correo Inacap:</label>
                </div>

                <div class="col s12 m12 l12">
                  <input type="text" id="fecha"  name="fecha" required class="datepicker" placeholder="Cuando se te perdió?" >
                  <label for="fecha" data-error="Incorrecto" data-success="Correcto">Selecciona una fecha</label>
                </div>

                <button id="btn_guardar" type="submit" class="btn black">Enviar<i class="material-icons small">send</i></button>
              </form>

      </div>
    </div>
  </div>
</div>
<!-- Seccion de listado de objetos agregados por alumnos -->
  <div style="margin-top:5%" class="row">
    <div class="col s12 m12 l12">
    <div class="card ">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title"></span>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th data-field="nom">Objeto</th>
                        <th data-field="lugar">Lugar encontrado</th>
                        <th data-field="fecha">Fecha</th>
                        <th data-field="observacion">Observacion</th>
                        <th data-field="contacto">Correo de contacto</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Billetera</td>
                    <td>29-11-2017</td>
                    <td>2do Piso</td>
                    <td>Se me perdió</td>
                    <td>hugo.nunez06@inacapmail.cl</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>


<?php include '../extend/scripts.php';?>
</body>
</html>
