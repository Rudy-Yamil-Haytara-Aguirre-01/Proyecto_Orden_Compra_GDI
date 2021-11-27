<?php
  if(isset($_GET['borrar'])){

    $delete_ordenC = $_GET['borrar'];

    include_once("../conexion.php");

    $consulta = "EXECUTE sp_DELETE_DATOS_COMPRA '$delete_ordenC'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    if($ejecutar){
          echo "<script>alert('REGISTRO ELIMINADO')</script>";
          echo "<script>window.open('../View/tblDatos_Compra.php ','_self')</script>";
        }
  }
?>