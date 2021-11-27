<?php
  if(isset($_GET['borrar'])){

    $delete_cod = $_GET['borrar'];

    include_once("../conexion.php");

    $consulta = "EXECUTE sp_DELETE_ARTICULO '$delete_cod'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    if($ejecutar){
          echo "<script>alert('REGISTRO ELIMINADO')</script>";
          echo "<script>window.open('../View/tblArticulo.php ','_self')</script>";
        }
  }
?>