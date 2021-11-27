<?php

  if(isset($_GET['editar'])){

    $editar_orden = $_GET['editar'];

    include_once("../conexion.php");

    $consulta = "SELECT * FROM DATOS_COMPRA WHERE nro_orden_compra='$editar_orden'";

    $ejecutar = sqlsrv_query($conn,$consulta);

    $fila = sqlsrv_fetch_array($ejecutar);
  
    $nro_orden  = $fila['nro_orden_compra'];
    $RUC_cliente = $fila['RUC_cliente'];
    $RUC_proveedor  = $fila['RUC_proveedor'];
    $moneda  = $fila['moneda'];
    $solicitante  = $fila['solicitante'];
    $obra  = $fila['obra'];
    $taller  = $fila['orden_de_taller'];
    $representante = $fila['representante'];
    $prioridad  = $fila['prioridad_compra'];
    $autorizante  = $fila['autorizante'];
    $requerimiento  = $fila['requerimiento'];
    $metodo_pago  = $fila['metodo_de_pago'];
    $observaciones  = $fila['observaciones'];
    $fecha  = $fila['fecha']->format('Y/m/d');
 
  }
?>
<br />
<div class="col-md-8 col-md-offset-2">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
    <form method="POST" action="EDIT_DATOS_COMPRA.php">
      <div class="form-group">
          <label>Nro ORDEN COMPRA</label>
          <input type="text" name="nro_orden" class="form-control" readonly="readonly" value="<?php echo $nro_orden; ?>"><br />
        </div>
         <div class="form-group">
          <label>RUC Cliente</label>
          <input type="text" name="Ruc_C" class="form-control" readonly="readonly" value="<?php echo $RUC_cliente; ?>"><br />
        </div>
         <div class="form-group">
          <label>RUC Proveedor</label>
          <input type="text" name="Ruc_P" class="form-control" readonly="readonly" value="<?php echo $RUC_proveedor; ?>"><br />
        </div>
         <div class="form-group">
          <label>Moneda</label>
          <input type="text" name="moneda" class="form-control"  value="<?php echo $moneda; ?>"><br />
        </div>
         <div class="form-group">
          <label>Solicitante</label>
          <input type="text" name="Solicitante" class="form-control" value="<?php echo $solicitante; ?>"><br />
        </div>
         <div class="form-group">
          <label>Obra</label>
          <input type="text" name="Obra" class="form-control" value="<?php echo $obra; ?>"><br />
        </div>
        <div class="form-group">
          <label>Orden de Taller</label>
          <input type="text" name="Taller" class="form-control" value="<?php echo $taller; ?>"><br />
        </div>
        <div class="form-group">
          <label>representante</label>
          <input type="text" name="representante" class="form-control" value="<?php echo $representante; ?>"><br />
        </div>
        <div class="form-group">
          <label>Prioridad de compra</label>
          <input type="text" name="Prioridad" class="form-control" value="<?php echo $prioridad; ?>"><br />
        </div>
        <div class="form-group">
          <label>Autorizante</label>
          <input type="text" name="Autorizante" class="form-control" value="<?php echo $autorizante; ?>"><br />
        </div>
        <div class="form-group">
          <label>Requerimiento</label>
          <input type="text" name="Requerimiento" class="form-control" value="<?php echo $requerimiento; ?>"><br />
        </div>
        <div class="form-group">
          <label>Metodo de pago</label>
          <input type="text" name="metodo_P" class="form-control" value="<?php echo $metodo_pago; ?>"><br />
        </div>
        <div class="form-group">
          <label>Observaciones</label>
          <input type="text" name="Observaciones" class="form-control" value="<?php echo $observaciones; ?>"><br />
        </div>
        <div class="form-group">
          <label>Fecha</label>
          <input type="text" name="Fecha" class="form-control" value="<?php echo $fecha; ?>"><br />
        </div>  
      <div class="form-group">
        <input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
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
  if(isset($_POST['actualizar'])) {

        $nro_orden=$_POST['nro_orden'];
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

        $consulta = "EXECUTE sp_UPDATE_DATOS_COMPRA '$nro_orden','$moneda','$solicitante','$obra','$taller',
                    '$representante','$prioridad','$autorizante','$requerimiento','$metodo_pago','$observaciones','$fecha'";

        $ejecutar = sqlsrv_query($conn,$consulta);

        if($ejecutar){
          echo "<script>alert('DATOS ACTUALIZADOS CORRECTAMENTE')</script>";
          echo "<script>window.open('../View/tblDatos_Compra.php ','_self')</script>";
        }
      }
?>
