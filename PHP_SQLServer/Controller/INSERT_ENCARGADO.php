<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Encargado</title>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
             
    <div class="col-md-8 col-md-offset-2">
      <h1>INSERTAR DATOS DE LA EMPRESA</h1>
      <form method="POST" action="INSERT_ENCARGADO.php">

        <div class="form-group">
          <label>RUC empresa</label>
            <input type="text" name="Ruc_C" class="form-control" placeholder="ingrese RUC"><br />
        </div>
         <div class="form-group">
          <label>Nombre </label>
          <input type="text" name="nombre" class="form-control" placeholder="ingrese nombre"><br />
        </div>
         <div class="form-group">
          <label>Padron</label>
          <input type="text" name="padron" class="form-control" placeholder="ingrese padron"><br />
        </div>
         <div class="form-group">
          <input type="submit" name="insertar" class="btn btn-warning" value="INSERTAR DATOS"><br />
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

       $consulta = "SELECT * FROM ENCARGADO";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $Ruc_C = $fila['RUC_cliente'];
            $nombre = $fila['nombre_Empresa'];
            $padron = $fila['padron'];    
            $i++;
          }



      if(isset($_POST['insertar'])) {
        
        $Ruc_C=$_POST['Ruc_C'];
        $nombre=$_POST['nombre'];
        $padron=$_POST['padron'];
        
      }

      $insert = "EXECUTE sp_INSERT_ENCARGADO'$Ruc_C','$nombre','$padron';";

      $ejecutar = sqlsrv_query($conn,$insert);

      if($ejecutar){
          echo "<script>alert('DATOS INSERTADOS CON EXITO')</script>";
          echo "<script>window.open('../View/tblEncargado.php ','_self')</script>";
        }

    ?>

  </body>
</html>