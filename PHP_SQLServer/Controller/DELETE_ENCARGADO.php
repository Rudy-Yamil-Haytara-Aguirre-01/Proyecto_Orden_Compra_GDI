<?php
  if(isset($_GET['borrar'])){

    $delete_ruc = $_GET['borrar'];

    include_once("../conexion.php");

    $consulta = "EXECUTE sp_DELETE_ENCARGADO '$delete_ruc'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    if($ejecutar){
          echo "<script>alert('REGISTRO ELIMINADO')</script>";
          echo "<script>window.open('../View/tblEncargado.php ','_self')</script>";
        }
  }
?>