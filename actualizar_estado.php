<?php 
  
  session_start();
  include 'function.php';
  verificarSession();

  include 'db.php';
  $id = $_GET['id'];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizaar estado</title>

                                      <!--MATERIALIZE CSS-->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!--icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
      <?php include 'topBar.php'; ?>
      <div class="row">
        <h5 class="center-align">Actualizar estado y datos de Laptop Toshiba </h5>
        <!--inicio de columna-->
          <div class="col s12 m4">
          <!--inicio de formulario-->
            <form action="estado_actualizar.php" method="post">
                <div class="input-field col s12 ">
                    <?php                             
                                $sql = "SELECT * FROM mantenimiento WHERE id_mantenimiento = $id";
                                $query = mysqli_query($conexion, $sql);
                                while($row = mysqli_fetch_assoc($query)){
                              ?>
                                <input type="hidden" value="<?php echo $row['id_mantenimiento'];?>"name="id">
                    <?php };?>
                    <select name="estado">
                    <option value="" disabled selected>Seleccionar...</option>
                    <?php                         
                                  $consulta = mysqli_query($conexion, "SELECT id_tarea, estado from estado_mantenimiento");
                                  while($row = mysqli_fetch_assoc($consulta)){
                                  ?>
                    <option class="" value="<?php echo $row['id_tarea'];?>"><?php echo $row['estado'];?></option>
                    <?php } ?>
                    </select>
                    <label>Cambiar el estado</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Cambiar
                    <i class="material-icons right">send</i>
                    </button>
                </div>      
                <small>El estado actualmente es 
                                <?php $estado = mysqli_query($conexion, "SELECT e.estado from mantenimiento ma inner JOIN estado_mantenimiento e on e.id_tarea = ma.estadoMant_id where id_mantenimiento = $id");
                                while($row = mysqli_fetch_assoc($estado)){
                                  echo $row['estado'];
                                }
                                ?>.
                                <span>Selecciona para cambiarlo.</span>
                  </small>
            </form>
          <!--Fin de formulario-->
          </div>
        <!--fin de columna-->



        <!--segunda columna-->
        <div class="col s12 m8">
                               
        </div>
        <!--fin segunda columna-->
      </div>












    <!--script para el select -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });

      // Or with jQuery

      $(document).ready(function(){
        $('select').formSelect();
      });      
    </script>


</body>
</html>