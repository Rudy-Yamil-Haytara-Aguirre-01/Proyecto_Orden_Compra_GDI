<?php
  if(isset($_GET['borrar'])){

    $delete_RUC = $_GET['borrar'];

    include_once("../conexion.php");

    $consulta = "EXECUTE sp_DELETE_PROVEEDOR '$delete_RUC'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    if($ejecutar){
          echo "<script>alert('REGISTRO ELIMINADO')</script>";
          echo "<script>window.open('../View/tblProveedor.php ','_self')</script>";
        }
  }
?>