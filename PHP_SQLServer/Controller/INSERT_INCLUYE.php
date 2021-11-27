<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Incluye</title>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
             
    <div class="col-md-8 col-md-offset-2">
      <h1>INSERTAR DATOS DEL ARTICULO</h1>
      <form method="POST" action="INSERT_INCLUYE.php">
        <div class="form-group">
          <label>Nro Orden Compra</label>
          <input type="text" name="nro_orden" class="form-control" placeholder="ingrese numero de orden de Compra"><br />
        </div>
        <div class="form-group">
          <label>Codigo Articulo</label>
            <input type="text" name="cod_art" class="form-control" placeholder="ingrese codigo del articulo"><br />
        </div>
         <div class="form-group">
          <label>Cantidad </label>
          <input type="text" name="cantidad" class="form-control" placeholder="ingrese la cantidad de articulos"><br />
        </div>
         <div class="form-group">
          <input type="submit" name="insertar" class="btn btn-warning" value="INSERTAR DATOS"><br />
        </div>
        <br>
      </form>
      <form action="../View/tblIncluye.php">
          <div class="form-group">
            <input type="submit" name="regresarINCLUYE" class="btn btn-warning" value="VOLVER"><br />
          </div>
     </form>
    </div>
    
    <?php

      include_once("../conexion.php");

       $consulta = "SELECT * FROM INCLUYE";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $nro_orden  = $fila['nro_orden_compra'];
            $cod_art = $fila['codigo_A'];
            $cantidad = $fila['cantidad'];
            $i++;
          }



      if(isset($_POST['insertar'])) {
        $nro_orden=$_POST['nro_orden'];
        $cod_art=$_POST['cod_art'];
        $cantidad=$_POST['cantidad'];
      }
      

      $insert = "EXECUTE sp_INSERT_INCLUYE '$nro_orden','$cod_art','$cantidad';";

      $ejecutar = sqlsrv_query($conn,$insert);

      if($ejecutar){
          echo "<script>alert('DATOS INSERTADOS CON EXITO')</script>";
          echo "<script>window.open('../View/tblIncluye.php ','_self')</script>";
        }

    ?>

  </body>
</html>