<?php
                                  
      function pendientes_total(){
        include 'db.php';
        $sqlmant = "SELECT COUNT(id_mantenimiento) as total_mantenimientos from mantenimiento where estadoMant_id = 2";
        $query = mysqli_query($conexion, $sqlmant);
        $result = mysqli_fetch_assoc($query);
        $data = $result['total_mantenimientos'];
        echo $data;
        mysqli_close($conexion);
      }
      
      function mant_Completados(){
        include 'db.php';
        $sqlmant = "SELECT COUNT(id_mantenimiento) as total_mantenimientos from mantenimiento where estadoMant_id = 1";
        $query = mysqli_query($conexion, $sqlmant);
        $result = mysqli_fetch_assoc($query);
        $data = $result['total_mantenimientos'];
        echo $data; 
        mysqli_close($conexion);
      }

      function total_equipos(){
        include 'db.php';
        $sqlmant = "SELECT COUNT(id_equipo) as total_equipos from equipo";
        $query = mysqli_query($conexion, $sqlmant);
        $result = mysqli_fetch_assoc($query);
        $data = $result['total_equipos'];
        echo $data; 
        mysqli_close($conexion);
      }

?>