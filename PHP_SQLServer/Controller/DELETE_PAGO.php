<?php
  if(isset($_GET['borrar'])){

    $delete_mon = $_GET['borrar'];

    include_once("../conexion.php");

    $consulta = "EXECUTE sp_DELETE_PAGO '$delete_mon'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    if($ejecutar){
          echo "<script>alert('REGISTRO ELIMINADO')</script>";
          echo "<script>window.open('../View/tblPago.php ','_self')</script>";
        }
  }
?>