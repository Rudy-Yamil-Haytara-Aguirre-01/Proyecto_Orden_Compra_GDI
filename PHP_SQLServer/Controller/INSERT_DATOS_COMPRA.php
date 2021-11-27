<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Datos Compra</title>
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
             
    <div class="col-md-8 col-md-offset-2">
      <h1>INSERTAR DATOS DE LA ORDEN DE COMPRA</h1>
      <form method="POST" action="INSERT_DATOS_COMPRA.php">
        <div class="form-group">
          <label>Nro ORDEN COMPRA</label>
          <input type="text" name="nro_orden" class="form-control" placeholder="ingrese Numero de orden de Compra"><br />
        </div>
         <div class="form-group">
          <label>RUC Cliente</label>
          <input type="text" name="Ruc_C" class="form-control" placeholder="ingrese RUC de emprsa Cliente"><br />
        </div>
         <div class="form-group">
          <label>RUC Proveedor</label>
          <input type="text" name="Ruc_P" class="form-control" placeholder="ingrese RUC de emprsa Proveedor"><br />
        </div>
         <div class="form-group">
          <label>Moneda</label>
          <input type="text" name="moneda" class="form-control" placeholder="ingrese moneda"><br />
        </div>
         <div class="form-group">
          <label>Solicitante</label>
          <input type="text" name="Solicitante" class="form-control" placeholder="ingrese solicitante"><br />
        </div>
         <div class="form-group">
          <label>Obra</label>
          <input type="text" name="Obra" class="form-control" placeholder="ingrese obra"><br />
        </div>
        <div class="form-group">
          <label>Orden de Taller</label>
          <input type="text" name="Taller" class="form-control" placeholder="ingrese orden de taller"><br />
        </div>
        <div class="form-group">
          <label>representante</label>
          <input type="text" name="representante" class="form-control" placeholder="ingrese representante"><br />
        </div>
        <div class="form-group">
          <label>Prioridad de compra</label>
          <input type="text" name="Prioridad" class="form-control" placeholder="ingrese prioridad de compra"><br />
        </div>
        <div class="form-group">
          <label>Autorizante</label>
          <input type="text" name="Autorizante" class="form-control" placeholder="ingrese autorizante"><br />
        </div>
        <div class="form-group">
          <label>Requerimiento</label>
          <input type="text" name="Requerimiento" class="form-control" placeholder="ingrese requerimiento"><br />
        </div>
        <div class="form-group">
          <label>Metodo de pago</label>
          <input type="text" name="metodo_P" class="form-control" placeholder="ingrese metodo de pago"><br />
        </div>
        <div class="form-group">
          <label>Observaciones</label>
          <input type="text" name="Observaciones" class="form-control" placeholder="ingrese observaciones"><br />
        </div>
        <div class="form-group">
          <label>Fecha</label>
          <input type="text" name="Fecha" class="form-control" placeholder="ingrese fecha (yy-mm-dd)"><br />
        </div>      
         <div class="form-group">
          <input type="submit" name="insertar" class="btn btn-warning" value="INSERTAR DATOS"><br />
        </div>
        <br>
      </form>
      <form action="../View/tblDatos_Compra.php">
        <div class="form-group">
          <input type="submit" name="regresarDATOS_COMPRA" class="btn btn-warning" value="VOLVER"><br />
        </div>
      </form>
    </div>
    <?php

      include_once("../conexion.php");

       $consulta = "SELECT * FROM DATOS_COMPRA";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $nro_orden  = $fila['nro_orden_compra'];
            $Ruc_C = $fila['RUC_cliente'];
            $Ruc_P = $fila['RUC_proveedor'];
            $moneda = $fila['moneda'];
            $solicitante = $fila['solicitante'];
            $obra = $fila['obra'];
            $taller = $fila['orden_de_taller'];
            $representante = $fila['representante'];
            $prioridad = $fila['prioridad_compra'];
            $autorizante = $fila['autorizante'];
            $requerimiento = $fila['requerimiento'];
            $metodo_pago = $fila['metodo_de_pago'];
            $observaciones = $fila['observaciones'];
            $fecha = $fila['fecha']->format('Y/m/d');
            $i++;
          }



      if(isset($_POST['insertar'])) {
        $nro_orden=$_POST['nro_orden'];
        $Ruc_C=$_POST['Ruc_C'];
        $Ruc_P=$_POST['Ruc_P'];
        $moneda=$_POST['moneda'];
        $solicitante=$_POST['Solicitante'];
        $obra=$_POST['Obra'];
        $taller=$_POST['Taller'];
        $representante=$_POST['representante'];
        $prioridad=$_POST['Prioridad'];
        $autorizante=$_POST['Autorizante'];
        $requerimiento=$_POST['Requerimiento'];
        $metodo_pago=$_POST['metodo_P'];
        $observaciones=$_POST['Observaciones'];
        $fecha=$_POST['Fecha'];
      }

      $insert = "EXECUTE sp_INSERT_DATOS_COMPRA 
                '$nro_orden','$Ruc_C','$Ruc_P','$moneda','$solicitante','$obra','$taller',
                '$representante','$prioridad','$autorizante','$requerimiento','$metodo_pago','$observaciones','$fecha';";

      $ejecutar = sqlsrv_query($conn,$insert);

      if($ejecutar){
          echo "<script>alert('DATOS INSERTADOS CON EXITO')</script>";
          echo "<script>window.open('../View/tblDatos_Compra.php ','_self')</script>";
        }

    ?>

  </body>
</html>