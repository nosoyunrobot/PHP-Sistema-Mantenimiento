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
  <title>Personales</title>
                                        <!--bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

  <link rel="stylesheet" href="personal.css">
</head>
<body class="container">
  <?php include 'topBar.php';?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Menu</a></li>
      <li class="breadcrumb-item"><a href="personal.php">Lista de Personales</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detalles</li>
    </ol>
  </nav>
  <div class="row">
      <div class="col">
          <?php
          $sql = mysqli_query($conexion, "SELECT COUNT(p.id) as totalpeti FROM peticion_mant p INNER JOIN personal l on l.id_personal = p.id_personal WHERE l.id_personal = $id");
          while($row = mysqli_fetch_assoc($sql)){
          ?>
          <h4>Mantenimiento asignados <span class="badge bg-danger"><?php echo $row['totalpeti']; }?></span></h4>
      </div>
      <div class="col">
          <h4>vista general de equipos asignados</h4>
      </div>
  </div>
  <!--inicio de row --->
    <div class="row"  style="padding-top: 20px;">
      <div class="col-sm-6">
            <!-- LISTA PERSONAL -->
                            <?php 
                                $sql = mysqli_query($conexion, "SELECT i.id, i.nombre_pet, i.fecha_prevista, i.fechasolitud, t.nombre_tipomant, e.nombre_pers, eq.nombre_equipo FROM peticion_mant i INNER JOIN personal e on i.id_personal = e.id_personal INNER JOIN equipo eq on i.id_equipo = eq.id_equipo INNER JOIN tipo_mantenimiento t on i.id_tipomant = t.id_tipomant where i.id_personal = $id");
                                while($row = mysqli_fetch_assoc($sql)){
                                  echo '
                                  <ol class="list-group list-group-numbered">
                                  <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">'.$row['nombre_pet'].'</div>
                                      <span class="bg-secondary text-white">Fecha solicitud: '.$row['fechasolitud'].'</span><br>
                                      <span class="bg-success text-white">Fecha prevista: '.$row['fecha_prevista'].'</span><br>
                                      Tipo: '.$row['nombre_tipomant'].' <br>
                                     
                                    </div>
                                    
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>

                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                      <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                      ...
                                    </div>
                                  </div>

                                  </li>
                                </ol>
                                  ';
                                };
                            ?>
      </div>
              <!-- FIN LISTA DE PERSONAL -->
      <div class="col-sm-6">

      </div>
    </div>
  <!-- fin de row -->


    <!--ajax--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script type="text/javascript" src="search.js"></script>
    <!--fin ajax--->
 

      <!---script-->
  
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!--fin script-->
              
 
    
</body>
</html>