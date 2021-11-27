<?php
  if(isset($_GET['borrar'])){

    $delete_inc = $_GET['borrar'];

    $pk = explode(' ', $delete_inc);

    include_once("../conexion.php");

    $consulta = "EXECUTE sp_DELETE_INCLUYE '$pk[0]','$pk[1]'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    if($ejecutar){
          echo "<script>alert('REGISTRO ELIMINADO')</script>";
          echo "<script>window.open('../View/tblIncluye.php ','_self')</script>";
        }

  }
?>