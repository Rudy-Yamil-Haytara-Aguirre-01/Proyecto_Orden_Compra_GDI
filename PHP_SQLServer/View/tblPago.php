<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pago</title>
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
          <td>moneda</td>
          <td>cambio</td>
          
        </tr>

        <?php

          include_once("../conexion.php");

          $consulta = "SELECT * FROM PAGO";
          $ejecutar = sqlsrv_query($conn,$consulta);

          $i=0;
          while ($fila = sqlsrv_fetch_array($ejecutar)){

            $moneda  = $fila['moneda'];
            $cambio = $fila['Tipo_de_cambio'];
           
           
           
            $i++;
          
          ?>
        <tr align="center">
          <td><?php echo $moneda; ?></td>
          <td><?php echo $cambio; ?></td>
          <td><a href="../controller/EDIT_PAGO.php?editar=<?php echo $moneda; ?>">EDITAR</a></td>
          <td><a href="../controller/DELETE_PAGO.php?borrar=<?php echo $moneda; ?>">BORRAR</a></td>
        
          
        </tr>
        <?php } ?>

      </table>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <form action="../controller/INSERT_PAGO.php">
        <div class="form-group">
          <input type="submit" name="nuevo" class="btn btn-warning" value="NUEVO"><br />
        </div>
        <br><br>
      </form>
    </div>

  </body>
</html>