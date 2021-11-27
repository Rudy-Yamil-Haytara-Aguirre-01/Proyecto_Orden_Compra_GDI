<?php

  if(isset($_GET['editar'])){

    $editar_Cod = $_GET['editar'];

    include_once("../conexion.php");

    $consulta = "SELECT * FROM ARTICULO WHERE Codigo_A='$editar_Cod'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    $fila = sqlsrv_fetch_array($ejecutar);
  
    $Codigo  = $fila['codigo_A'];
    $Proveedor = $fila['RUC_proveedor'];
    $Nombre = $fila['nombre_articulo'];
    $Precio = $fila['precio'];
    $Stock = $fila['stock'];
    $Unidad = $fila['unidad'];  
  }
?>
<br />
<div class="col-md-8 col-md-offset-2">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
    <form method="POST" action="EDIT_ARTICULO.php">
      <div class="form-group">
        <label>Codigo</label>
        <input type="text" name="codigo" class="form-control" readonly="readonly" value="<?php echo $Codigo; ?>"><br />
      </div>
      <div class="form-group">
        <label>RUC Proveedor</label>
          <input type="text" name="Ruc_P" class="form-control" readonly="readonly" value="<?php echo $Proveedor; ?>"><br />
      </div>
       <div class="form-group">
        <label>Nombre </label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $Nombre; ?>"><br />
      </div>
       <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio" class="form-control" value="<?php echo $Precio; ?>"><br />
      </div>
       <div class="form-group">
        <label>Stock</label>
        <input type="text" name="stock" class="form-control" value="<?php echo $Stock; ?>"><br />
      </div>
       <div class="form-group">
        <label>Unidad</label>
        <input type="text" name="unidad" class="form-control" value="<?php echo $Unidad; ?>"><br />
      </div>
      <div class="form-group">
        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
      </div>
        <br>
      </form>
      <form action="../View/tblArticulo.php">
        <div class="form-group">
          <input type="submit" name="regresarARTICULO" class="btn btn-warning" value="VOLVER"><br />
        </div>
      </form>
</div>

<?php

  include_once("../conexion.php");
  if(isset($_POST['actualizar'])) {

        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        $unidad=$_POST['unidad'];

        $consulta = "EXECUTE sp_UPDATE_ARTICULO '$codigo','$nombre','$precio','$stock','$unidad'";

        $ejecutar = sqlsrv_query($conn,$consulta);

        if($ejecutar){
          echo "<script>alert('DATOS ACTUALIZADOS CORRECTAMENTE')</script>";
          echo "<script>window.open('../View/tblARTICULO.php ','_self')</script>";
        }
      }
?>

