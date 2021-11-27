<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Articulo</title>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
             
    <div class="col-md-8 col-md-offset-2">
      <h1>INSERTAR DATOS DEL ARTICULO</h1>
      <form method="POST" action="INSERT_ARTICULO.php">
        <div class="form-group">
          <label>Codigo</label>
          <input type="text" name="codigo" class="form-control" placeholder="ingrese codigo"><br />
        </div>
        <div class="form-group">
          <label>RUC Proveedor</label>
            <input type="text" name="Ruc_P" class="form-control" placeholder="ingrese RUC del proveedor"><br />
        </div>
         <div class="form-group">
          <label>Nombre </label>
          <input type="text" name="nombre" class="form-control" placeholder="ingrese nombre del articulo"><br />
        </div>
         <div class="form-group">
          <label>Precio</label>
          <input type="text" name="precio" class="form-control" placeholder="ingrese precio"><br />
        </div>
         <div class="form-group">
          <label>Stock</label>
          <input type="text" name="stock" class="form-control" placeholder="ingrese stock inicial"><br />
        </div>
         <div class="form-group">
          <label>Unidad</label>
          <input type="text" name="unidad" class="form-control" placeholder="ingrese unidad"><br />
        </div>
         <div class="form-group">
          <input type="submit" name="insertar" class="btn btn-warning" value="INSERTAR DATOS"><br />
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

       $consulta = "SELECT * FROM ARTICULO";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $codigo  = $fila['codigo_A'];
            $Ruc_P = $fila['RUC_proveedor'];
            $nombre = $fila['nombre_articulo'];
            $precio = $fila['precio'];
            $stock = $fila['stock'];
            $unidad = $fila['unidad'];
            $i++;
          }



      if(isset($_POST['insertar'])) {
        $codigo=$_POST['codigo'];
        $Ruc_P=$_POST['Ruc_P'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        $unidad=$_POST['unidad'];
      }

      $insert = "EXECUTE sp_INSERT_ARTICULO '$codigo','$Ruc_P','$nombre','$precio','$stock','$unidad';";

      $ejecutar = sqlsrv_query($conn,$insert);

      if($ejecutar){
          echo "<script>alert('DATOS INSERTADOS CON EXITO')</script>";
          echo "<script>window.open('../View/tblArticulo.php ','_self')</script>";
        }

    ?>

  </body>
</html>