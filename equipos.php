<?php 
  
  session_start();
  include 'function.php';
  verificarSession();

  include 'db.php';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de equipos</title>
                                        <!--bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
  <?php include 'topBar.php';?>
  <h4 class="center-align">REGISTRO Y LISTADO DE MAQUINARIAS</h4>
    <!--FILA ROW-->
      <div class="row" style="padding-top: 20px;">
       
          <!--PRIMERA COLUMNA DE LA 1 FILA ROW -->
            <div class="col-sm">
              <!---contenedor de registro equipos-->
                <?php
                  $sql = mysqli_query($conexion, "SELECT * FROM categoria_grupo");
                  while($row = mysqli_fetch_assoc($sql)){
                ?>
                <ul class="collection">
                    <li class="collection-item avatar">
                            <img src="logo.png" alt="" class="circle">
                            <span class="title"><?php echo $row['cat_nombre']; ?></span>
                            <p>
                                Categoria.
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                </ul>
                <?php }; ?>
              <!--fin de contenedor equipos-->
            </div>
          <!--FINAL PRIMERA COLUMNA DE LA 1 FILA ROW -->
        



          <!--COLUMNA 2 DE LA FILA 1-->
            <div class="col-sm" >
              <!--registro equipos-->
                <div class="row">
                  <form action="registro_equipo.php" method="post" class="col-sm">
                    <div class="">
                      <div class="input-field col s6">
                        <input placeholder="maquinaria" id="nombre" type="text" class="validate" name="nombreEquipo">
                        <label for="nombre">Nombre de maquinaria/equipo</label>
                      </div>
                      <div class="input-field col ">
                        <input id="codigo" type="text" class="validate"  name="codigoEquipo">
                        <label for="codigo">codigo de maquina</label>
                      </div>
                      <div class="input-field col ">
                        <input id="fecha" type="date" class="validate"  name="fechaCreacion">
                        <label for="fecha">Fecha creación</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input placeholder="Descripción" id="disabled" type="text" class="validate"  name="detallesEquipo">
                        <label for="disabled">Detalles de maquinaria</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s3">
                        <input placeholder="equipo" id="garantia" type="text" class="validate"  name="garantiaEquipo">
                        <label for="garantia">Garantia</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="estado" type="text" class="validate" name="estadoEquipo">
                        <label for="estado">estado de uso</label>
                      </div>
                      <div class="input-field col s3">
                        <input id="precio" type="number" class="validate"  name="precioEquipo">
                        <label for="precio">valor de precio</label>
                      </div>
                    </div>
                    <button class="btn waves-effect grey darken-3" type="submit" name="action">Registrar maquiaria
                    <i class="material-icons right">send</i>
                    </button>
                  </form>
                </div>
              <!--fin registro equipos -->
            </div>
          <!--FIN DE COLUMNA 2 DE LA FILA 1 -->
      </div>
    <!--FIN ROW-->
  


    <!--segundo row-->
      <div class="row">
        <!--primera columna del segundo row-->
            <div class="col s12 m6">
                <!-- Modal Trigger -->
                <a class="waves-effect grey darken-3 btn modal-trigger" href="#modal1">Vista general de equipos</a>

                <!-- Modal Structure -->
                  <div id="modal1" class="modal bottom-sheet">
                    <div class="modal-content">
                      <h4>Vista Maquinaria</h4>
                        <!-- LISTA DE EQUIPOS -->
                          <table class="highlight">
                            <thead class="purple lighten-4">
                              <tr>
                                  <th>ID</th>
                                  <th>Fecha adquisición </th>
                                  <th>codigo equipo</th>
                                  <th>Nombre de quipo</th>
                                  <th>Detalles</th>
                                  <th>Garantia</th>
                                  <th>estado/uso</th>
                                  <th>valor de precio</th>
                              </tr>
                            </thead>
                            <?php 
                            $sql = mysqli_query($conexion, "SELECT * FROM equipo");
                            while($row = mysqli_fetch_assoc($sql)){
                            ?>
                            <tbody>
                              <tr>
                                <td><?php echo $row['id_equipo']; ?></td>
                                <td><?php echo $row['fechaCreacion']; ?></td>
                                <td><?php echo $row['codigo_equipo']; ?></td>
                                <td class="purple lighten-5"><?php echo $row['nombre_equipo']; ?></td>
                                <td><?php echo $row['detalles']; ?></td>
                                <td><?php echo $row['garantia']; ?></td>
                                <td><?php echo $row['estado_uso']; ?></td>
                                <td><?php echo $row['precio']; ?></td>
                              </tr>
                            </tbody>
                            <?php } ?>
                          </table>
                        <!-- FIN LISTA DE EQUIPOS -->
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                  </div>
                <!--fin modal structure-->
            </div>
        <!-- fin primera columna del segundo row-->

        <!-- segunda columna del segundo row-->
            <div class="col s12 m6">
             
            </div>
        <!-- fin segunda columna del row 2-->
      </div>
    <!--fin segundo row-->



     <!---script-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!--fin script-->
</body>
</html>