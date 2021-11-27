<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Datos Compra</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <div class="col-md-8 col-md-offset-2">
      <ul class="menu">
        <li><a href="tblProveedor.php">PROVEEDOR</a></li>
        <li><a href="tblArticulo.php">ARTICULO</a></li>
        <li><a href="tblEncargado.php">ENCARGADO</a></li>
        <li><a href="tblPago.php">PAGO</a></li>
        <li><a href="tblDatos_Compra.php">DATOS COMPRA</a></li>
        <li><a href="tblIncluye.php">INCLUYE</a></li>
        <li><a href="consulta01.php">Buscar Proveedor por articulo</a></li>
        <li><a href="consulta02.php">Ordenes de compra entre fechas </a></li>
        <li><a href="consulta03.php">cantidad de ordenes por proveedor</a></li>
        <li><a href="consulta04.php">Stock de articulo</a></li>
        <li><a href="consulta05.php">gastos totales por obra</a></li>
        <li><a href="consulta06.php">cantidad de ordenes por soliciante</a></li>
        <li><a href="consulta07.php">Ordenes de compra por moneda</a></li>
        <li><a href="consulta08.php">Ordenes de compra por moneda</a></li>
    </ul>
      <table class="table table-bordered table-responsive">
        <tr>
          <td>nro_orden</td>
          <td>RUC_cliente</td>
          <td>RUC_proveedor</td>
          <td>moneda</td>
          <td>solicitante</td>
          <td>obra</td>
          <td>taller</td>
          <td>representante</td>
          <td>prioridad</td>
          <td>autorizante</td>
          <td>requerimiento</td>
          <td>metodo_pago</td>
          <td>observaciones</td>
          <td>fecha</td>
          <td>subtotal_T</td>
          <td>total</td>
          
        </tr>

        <?php

          include_once("../conexion.php");

          $consulta = "SELECT * FROM DATOS_COMPRA";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $nro_orden  = $fila['nro_orden_compra'];
            $RUC_cliente = $fila['RUC_cliente'];
            $RUC_proveedor  = $fila['RUC_proveedor'];
            $moneda  = $fila['moneda'];
            $solicitante  = $fila['solicitante'];
            $obra  = $fila['obra'];
            $taller  = $fila['orden_de_taller'];
            $representante  = $fila['representante'];
            $prioridad  = $fila['prioridad_compra'];
            $autorizante  = $fila['autorizante'];
            $requerimiento  = $fila['requerimiento'];
            $metodo_pago  = $fila['metodo_de_pago'];
            $observaciones  = $fila['observaciones'];
            $fecha  = $fila['fecha']->format('Y/m/d');
            $subtotal_T  = $fila['SubtoTal_T'];
            $total  = $fila['Total'];
           
            $i++;
          
          ?>
        <tr align="center">
          <td><?php echo $nro_orden; ?></td>
          <td><?php echo $RUC_cliente; ?></td>
          <td><?php echo $RUC_proveedor; ?></td>
          <td><?php echo $moneda; ?></td>
          <td><?php echo $solicitante; ?></td>
          <td><?php echo $obra; ?></td>
          <td><?php echo $taller; ?></td>
          <td><?php echo $representante; ?></td>
          <td><?php echo $prioridad; ?></td>
          <td><?php echo $autorizante; ?></td>
          <td><?php echo $requerimiento; ?></td>
          <td><?php echo $metodo_pago; ?></td>
          <td><?php echo $observaciones; ?></td>
          <td><?php echo $fecha; ?></td>
          <td><?php echo $subtotal_T; ?></td>
          <td><?php echo $total; ?></td>
          <td><a href="../controller/EDIT_DATOS_COMPRA.php?editar=<?php echo $nro_orden; ?>">EDITAR</a></td>
          <td><a href="../controller/DELETE_DATOS_COMPRA.php?borrar=<?php echo $nro_orden; ?>">BORRAR</a></td>
        
          
     
        <?php } ?>
      </table>  
    </div>

     <div class="col-md-8 col-md-offset-2">
         <form action="../controller/INSERT_DATOS_COMPRA.php">
           <div class="form-group">
            <input type="submit" name="nuevo" class="btn btn-warning" value="NUEVO"><br />
           </div>
        <br><br>
      </form>
    </div>
  </body>
</html>