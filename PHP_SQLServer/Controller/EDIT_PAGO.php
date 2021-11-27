<?php

  if(isset($_GET['editar'])){

    $editar_mon = $_GET['editar'];

    include_once("../conexion.php");

    $consulta = "SELECT * FROM PAGO WHERE moneda='$editar_mon'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    $fila = sqlsrv_fetch_array($ejecutar);
  
    $moneda  = $fila['moneda'];
    $cambio = $fila['Tipo_de_cambio']; 
  }
?>
<br />
<div class="col-md-8 col-md-offset-2">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
    <form method="POST" action="EDIT_PAGO.php">
       <div class="form-group">
          <label>Moneda</label>
          <input type="text" name="moneda" class="form-control" readonly="readonly" value="<?php echo $moneda; ?>"><br />
        </div>
        <div class="form-group">
          <label>Cambio</label>
            <input type="text" name="cambio" class="form-control" value="<?php echo $cambio; ?>"><br />
        </div>
      <div class="form-group">
        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
      </div>
        <br>
      </form>
      <form action="../View/tblPAGO.php">
        <div class="form-group">
          <input type="submit" name="regresarPAGO" class="btn btn-warning" value="VOLVER"><br />
        </div>
      </form>
</div>

<?php

  include_once("../conexion.php");
  if(isset($_POST['actualizar'])) {

      $moneda=$_POST['moneda'];
      $cambio=$_POST['cambio'];


       

        $consulta = "EXECUTE sp_UPDATE_PAGO '$moneda','$cambio'";

        $ejecutar = sqlsrv_query($conn,$consulta);

        if($ejecutar){
          echo "<script>alert('DATOS ACTUALIZADOS CORRECTAMENTE')</script>";
          echo "<script>window.open('../View/tblPago.php','_self')</script>";
        }
      }
?>

