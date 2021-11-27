<?php

  if(isset($_GET['editar'])){

    $editar_mon = $_GET['editar'];

    $pk = explode(' ', $editar_mon);

    include_once("../conexion.php");

    $consulta = "SELECT * FROM INCLUYE WHERE nro_orden_compra='$pk[0]' and codigo_A='$pk[1]'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    $fila = sqlsrv_fetch_array($ejecutar);
  
    $nro_orden  = $fila['nro_orden_compra'];
    $cod_art = $fila['codigo_A'];
    $cantidad = $fila['cantidad']; 
  }
?>
<br />
<div class="col-md-8 col-md-offset-2">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
    <form method="POST" action="EDIT_INCLUYE.php">
      <div class="form-group">
        <label>Nro Orden Compra</label>
        <input type="text" name="nro_orden" class="form-control" readonly="readonly" value="<?php echo $nro_orden; ?>"><br />
      </div>
      <div class="form-group">
        <label>Codigo Articulo</label>
          <input type="text" name="cod_art" class="form-control" readonly="readonly" value="<?php echo $cod_art; ?>"><br />
      </div>
       <div class="form-group">
        <label>Cantidad </label>
        <input type="text" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>"><br />
      </div>
       
      <div class="form-group">
        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
      </div>
        <br>
      </form>
      <form action="../View/tblINCLUYE.php">
        <div class="form-group">
          <input type="submit" name="regresarINCLUYE" class="btn btn-warning" value="VOLVER"><br />
        </div>
      </form>
</div>

<?php

  include_once("../conexion.php");
  if(isset($_POST['actualizar'])) {

     $nro_orden=$_POST['nro_orden'];
     $cod_art=$_POST['cod_art'];
     $cantidad=$_POST['cantidad'];


    $consulta = "EXECUTE sp_UPDATE_INCLUYE '$nro_orden','$cod_art','$cantidad'";

    $ejecutar = sqlsrv_query($conn,$consulta);
    if($ejecutar){
        echo "<script>alert('DATOS ACTUALIZADOS CORRECTAMENTE')</script>";
        echo "<script>window.open('../View/tblIncluye.php ','_self')</script>";
    }
  }
?>

