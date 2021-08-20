<?php

include 'db.php';

$id = $_POST['id'];
$estado = $_POST['estado'];

$sql_actualizar = "UPDATE mantenimiento SET estadoMant_id = $estado WHERE mantenimiento.id_mantenimiento = $id;";
$resultado = mysqli_query($conexion, $sql_actualizar);

if($resultado){
  echo "<script>alert('Se actualizó los cambios correctamente'); window.location='pendientes.php';</script>";
}else{
  echo "<script>alert('No se pudo actualizar el dato'); window.history.go(-1);</script>";
}

?>