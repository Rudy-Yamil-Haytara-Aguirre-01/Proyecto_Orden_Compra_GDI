<?php

  if(isset($_GET['editar'])){

    $editar_RUC = $_GET['editar'];

    include_once("../conexion.php");

    $consulta = "SELECT * FROM PROVEEDOR WHERE RUC_proveedor='$editar_RUC'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    $fila = sqlsrv_fetch_array($ejecutar);
  
    $RUC  = $fila['RUC_proveedor'];
    $Nombre = $fila['nombre_empresa'];
    $padron = $fila['padron'];
    $ciudad = $fila['ciudad'];
    $distrito = $fila['distrito'];
    $calle = $fila['calle'];
    $numero = $fila['numero'];  
  }
?>
<br />
<div class="col-md-8 col-md-offset-2">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
    <form method="POST" action="EDIT_PROVEEDOR.php">
      <div class="form-group">
        <label>RUC</label>
        <input type="text" name="Ruc" class="form-control" readonly="readonly" value="<?php echo $RUC; ?>"><br />
      </div>
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $Nombre; ?>"><br />
      </div>
      <div class="form-group">
        <label>Padron</label>
        <input type="text" name="padron" class="form-control" value="<?php echo $padron; ?>"><br />
      </div>
      <div class="form-group">
        <label>Ciudad</label>
        <input type="text" name="ciudad" class="form-control" value="<?php echo $ciudad; ?>"><br />
      </div>
       <div class="form-group">
        <label>Distrito</label>
        <input type="text" name="distrito" class="form-control" value="<?php echo $distrito; ?>"><br />
      </div>
      <div class="form-group">
        <label>Calle</label>
        <input type="text" name="calle" class="form-control" value="<?php echo $calle; ?>"><br />
      </div>
      <div class="form-group">
        <label>Numero</label>
        <input type="text" name="numero" class="form-control" value="<?php echo $numero; ?>"><br />
      </div>
      <div class="form-group">
        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
      </div>
        <br>
      </form>
      <form action="../View/tblProveedor.php">
        <div class="form-group">
          <input type="submit" name="regresarPROVEEDOR" class="btn btn-warning" value="VOLVER"><br />
        </div>
      </form>
</div>

<?php

  include_once("../conexion.php");
  if(isset($_POST['actualizar'])) {

        $RUC=$_POST['Ruc'];
        $Nombre=$_POST['nombre'];
        $padron=$_POST['padron'];
        $ciudad=$_POST['ciudad'];
        $distrito=$_POST['distrito'];
        $calle=$_POST['calle'];
        $numero=$_POST['numero'];

        $consulta = "EXECUTE sp_UPDATE_PROVEEDOR '$RUC','$Nombre','$padron','$ciudad','$distrito','$calle','$numero'";

        $ejecutar = sqlsrv_query($conn,$consulta);

        if($ejecutar){
          echo "<script>alert('DATOS ACTUALIZADOS CORRECTAMENTE')</script>";
          echo "<script>window.open('../View/tblProveedor.php ','_self')</script>";
        }
      }
?>

