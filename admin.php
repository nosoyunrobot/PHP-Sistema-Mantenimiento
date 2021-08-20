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
  <title>HILDAS MP</title>
                                      <!--bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php include 'topBar.php';?>
    <!---segunda navegación--->

    <!--Fin de segunda navegacion--->
        
    <!--cards con row-->
    <div class="row">
        
        <div class="col-sm-2"><!--Columna 1-->
            <?php include 'dashboardCards.php' ;?>
        </div><!--fin Columna 1-->

        <div class="col-10"> <!--Columna 2--> 
          <table class="table table-hover">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>titulo</th>
                  <th>Equipo</th>
                  <th>fecha de solicitud</th>
                  <th>Tipo de mant.</th>
                  <th>Responsable</th>
                  <th>fecha prevista</th>
                  <th>Hora</th>
                  <th>prioridad</th>
                  <th>nota interna</th>
                  <th>estado</th>
              </tr>
            </thead>
            <?php 
                                      $sql = "SELECT * FROM peticion_mant";

                                      $query = mysqli_query($conexion, $sql);
                                      while($row = mysqli_fetch_assoc($query)){
               ?>
              <tbody>
                <tr>
                  <td class="deep-purple lighten-4"><?php echo $row['id'] ;?></td>
                  <td class="deep-purple lighten-3"><?php echo $row['nombre_pet'] ;?></td>
                  <td><?php echo $row['id_equipo'] ;?></td>
                  <td><?php echo $row['fechasolitud'] ;?></td>
                  <td><?php echo $row['id_tipomant'];?></td>
                  <td><?php echo $row['id_personal'] ;?></td>
                  <td><?php echo $row['fecha_prevista'] ;?></td>
                  <td class="indigo lighten-5" ><?php echo $row['duracion'] ;?></td>
                  <td class="#fff9c4 yellow lighten-4" ><?php echo $row['prioridad'] ;?></td>
                  <td><?php echo $row['notas_internas'] ;?></td>
                  <td><?php echo $row['estadoID'] ;?></td>
                </tr>
              </tbody>
              <?php } ?>
          </table>
        </div><!-- fin Columna 2-->
        

        <!--inicio card crear mantenimiento-->
        <div class="row">
    <div class="col s12 m5">
        <div class="card">
          <div class="card-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet vitae corporis explicabo deserunt doloribus. Provident quaerat hic explicabo quas dolorum.
          </div>
        </div>
    </div>
  </div>
    </div>
    <!--fin cards-->



    <!---script-->
  
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!--fin script-->
</body>
</html>