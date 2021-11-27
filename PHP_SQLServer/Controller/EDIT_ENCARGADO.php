<?php

  if(isset($_GET['editar'])){

    $editar_RUC = $_GET['editar'];

    include_once("../conexion.php");

    $consulta = "SELECT * FROM ENCARGADO WHERE RUC_cliente='$editar_RUC'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    $fila = sqlsrv_fetch_array($ejecutar);
  
    $Ruc_C = $fila['RUC_cliente'];
    $nombre = $fila['nombre_Empresa'];
    $padron = $fila['padron']; 
  }
?>
<br />
<div class="col-md-8 col-md-offset-2">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
    <form method="POST" action="EDIT_ENCARGADO.php">
       <div class="form-group">
          <label>RUC empresa</label>
            <input type="text" name="Ruc_C" class="form-control" readonly="readonly" value="<?php echo $Ruc_C; ?>"><br />
        </div>
         <div class="form-group">
          <label>Nombre </label>
          <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>"><br />
        </div>
         <div class="form-group">
          <label>Padron</label>
          <input type="text" name="padron" class="form-control" value="<?php echo $padron; ?>"><br />
        </div>
      <div class="form-group">
        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
      </div>
        <br>
      </form>
      <form action="../View/tblEncargado.php">
        <div class="form-group">
          <input type="submit" name="regresarENCARGADO" class="btn btn-warning" value="VOLVER"><br />
        </div>
      </form>
</div>

<?php

  include_once("../conexion.php");
  if(isset($_POST['actualizar'])) {

      $Ruc_C=$_POST['Ruc_C'];
      $nombre=$_POST['nombre'];
      $padron=$_POST['padron'];

      $consulta = "sp_UPDATE_ENCARGADO '$Ruc_C','$nombre','$padron'";

      $ejecutar = sqlsrv_query($conn,$consulta);

      if($ejecutar){
        echo "<script>alert('DATOS ACTUALIZADOS CORRECTAMENTE')</script>";
        echo "<script>window.open('../View/tblEncargado.php ','_self')</script>";
      }
  }
?>

