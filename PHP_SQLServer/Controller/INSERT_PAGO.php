<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pago</title>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
             
    <div class="col-md-8 col-md-offset-2">
      <h1>INSERTAR DATOS DEL PAGO</h1>
      <form method="POST" action="INSERT_PAGO.php">
        <div class="form-group">
          <label>Moneda</label>
          <input type="text" name="moneda" class="form-control" placeholder="ingrese moneda"><br />
        </div>
        <div class="form-group">
          <label>Cambio</label>
            <input type="text" name="cambio" class="form-control" placeholder="ingrese cambio equivalente"><br />
        </div>
        
         <div class="form-group">
          <input type="submit" name="insertar" class="btn btn-warning" value="INSERTAR DATOS"><br />
        </div>
        <br>
      </form>
      <form action="../View/tblPago.php">
          <div class="form-group">
            <input type="submit" name="regresarPAGO" class="btn btn-warning" value="VOLVER"><br />
          </div>
     </form>
    </div>
    
    <?php

      include_once("../conexion.php");

       $consulta = "SELECT * FROM PAGO";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $moneda  = $fila['moneda'];
            $cambio = $fila['Tipo_de_cambio'];
            $i++;
          }



      if(isset($_POST['insertar'])) {
        $moneda=$_POST['moneda'];
        $cambio=$_POST['cambio'];
     
      }

      $insert = "EXECUTE sp_INSERT_PAGO '$moneda','$cambio';";

      $ejecutar = sqlsrv_query($conn,$insert);

      if($ejecutar){
          echo "<script>alert('DATOS INSERTADOS CON EXITO')</script>";
          echo "<script>window.open('../View/tblPago.php ','_self')</script>";
        }


    ?>

  </body>
</html>