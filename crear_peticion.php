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
  <!--estilos bootstrap y css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="stylepeticion.css">
  <!--fin-->
</head>
        
<body>
    <!-- NAVEGACION--->
    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Mantenimiento</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Tablero</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="equipos.php ">equipos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">configuración</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Menu</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               menu
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">chat</a></li>
                <li><a class="dropdown-item" href="#">equipos</a></li>
                <li><a class="dropdown-item" href="personal.php">personales</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- FIN NAVEGACION --->
    <!--contenedor-->
    <div class="container">
      <form action="peticionController.php" method="post" autocomplete="off">
      <div class="row mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="col-sm-8">
         <!---card-->
         <div class="card">
            <div class="card-body text-secondary">
              <label for="titulo" class="col-form-label">Titulo</label>
                <input name="peticiontitulo" type="text" class="form-control" id="titulo" placeholder="Petición de mantenimiento">
                <div class="row mt-3">
                <!--columna 1 del grid 1 -->
                  <div class="col-sm">
                    <div class="row">
                      <div class="col-sm">
                            <label for="staticEmail" class="col-sm col-form-label">Equipamiento</label>
                              <select name="equipamiento" class="form-select"  >
                                
                                <?php
                                $sql = "SELECT * FROM equipo";
                                $query = mysqli_query($conexion, $sql);
                                while($row = mysqli_fetch_row($query)){
                                ?>
                                <option value="<?php echo $row[0] ;?>"><?php echo $row[3];?></option>
                                <?php } ?>
                              </select> 
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm">
                        <label for="staticEmail" class="col-sm col-form-label">Fecha de solicitud</label><br>
                          <label class="col-sm col-form-label" for=""><?php
                            // Obteniendo la fecha actual del sistema con PHP
                            $fechaActual = date('d-m-Y');
                            echo $fechaActual;
                            ?>
                          </label>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                          <label for="staticEmail" class="col-sm col-form-label">Tipo de mantenimiento</label>
                            <select name="tipomantenimiento" class="form-select" aria-label="Disabled select example" >
                                <?php
                                  $sql = "SELECT * FROM tipo_mantenimiento";
                                  $query = mysqli_query($conexion, $sql);
                                  while($row = mysqli_fetch_row($query)){
                                ?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    

                  </div>
                <!--columna 1 fin del grid 1 -->
                <!--columna 2 del grid 1-->
                  <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                          <label for="staticEmail" class="col-sm col-form-label">Responsable</label>
                            <select name="responsable" class="form-select" aria-label="Disabled select example" >
                            <?php
                            $sql = "SELECT * FROM personal";
                            $query = mysqli_query($conexion, $sql);
                            while($row = mysqli_fetch_row($query)) { ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-sm">
                        <label for="staticEmail" class="col-sm col-form-label">Fecha prevista</label>
                            <input name="fechaprevista" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="staticEmail" class="col-sm col-form-label">Horas</label>
                           <input name="horas" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                          <label for="staticEmail" class="col-sm col-form-label">Prioridad</label>
                            <select name="prioridad"  class="form-select" aria-label="Disabled select example" >
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                  </div>
                <!--columna 2 fin del grid 1-->
                  <div>
                    <input name="notasinternas" type="text" class="form-control my-3" placeholder="NOTAS INTERNAS">
                  </div>
                    <button type="submit" class="btn btn-dark text-light">Guardar</button>
                </div>
            </div>
          </div>
         <!-- fin card -->
        </div>
        <div class="col-sm">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    Creando un nuevo registro...
                  </div>
            </div>
        </div>
      </div>
      </form>
    </div>
  <!--fin contenedor-->


  <!--js bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <!--fin js b-->
</body>