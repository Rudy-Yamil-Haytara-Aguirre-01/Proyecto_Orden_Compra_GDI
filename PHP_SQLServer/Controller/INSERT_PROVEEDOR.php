<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proveedor</title>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
             
    <div class="col-md-8 col-md-offset-2">
      <h1>INSERTAR DATOS DEL PROVEEDOR</h1>
      <form method="POST" action="INSERT_PROVEEDOR.php">
        <div class="form-group">
          <label>RUC</label>
          <input type="text" name="Ruc" class="form-control" placeholder="ingrese RUC"><br />
        </div>
         <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="nombre" class="form-control" placeholder="ingrese nombre de la empresa"><br />
        </div>
         <div class="form-group">
          <label>Padron</label>
          <input type="text" name="padron" class="form-control" placeholder="ingrese padron"><br />
        </div>
         <div class="form-group">
          <label>Ciudad</label>
          <input type="text" name="ciudad" class="form-control" placeholder="ingrese ciudad"><br />
        </div>
         <div class="form-group">
          <label>Distrito</label>
          <input type="text" name="distrito" class="form-control" placeholder="ingrese distrito"><br />
        </div>
         <div class="form-group">
          <label>Calle</label>
          <input type="text" name="calle" class="form-control" placeholder="ingrese calle"><br />
        </div>
        </div>
         <div class="form-group">
          <label>Numero</label>
          <input type="text" name="numero" class="form-control" placeholder="ingrese numero"><br />
        </div>
         <div class="form-group">
          <input type="submit" name="insertar" class="btn btn-warning" value="INSERTAR DATOS"><br />
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

       $consulta = "SELECT * FROM PROVEEDOR";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $RUC  = $fila['RUC_proveedor'];
            $Nombre = $fila['nombre_empresa'];
            $padron = $fila['padron'];
            $ciudad = $fila['ciudad'];
            $distrito = $fila['distrito'];
            $calle = $fila['calle'];
            $numero = $fila['numero'];
            $i++;
          }



      if(isset($_POST['insertar'])) {
        $RUC=$_POST['Ruc'];
        $Nombre=$_POST['nombre'];
        $padron=$_POST['padron'];
        $ciudad=$_POST['ciudad'];
        $distrito=$_POST['distrito'];
        $calle=$_POST['calle'];
        $numero=$_POST['numero'];
      }

      $insert = "EXECUTE sp_INSERT_PROVEEDOR '$RUC','$Nombre','$padron','$ciudad','$distrito','$calle','$numero';";

      $ejecutar = sqlsrv_query($conn,$insert);

      if($ejecutar){
          echo "<script>alert('DATOS INSERTADOS CON EXITO')</script>";
          echo "<script>window.open('../View/tblProveedor.php ','_self')</script>";
        }

    ?>

  </body>
</html>