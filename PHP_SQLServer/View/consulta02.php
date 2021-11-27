<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consulta</title>
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
    </div>
      <table class="table table-bordered table-responsive">
        <form method="POST" action="consulta02.php">
          <div class="form-group">
            <label>Fecha Inicial</label>
              <input type="text" name="FechaI" class="form-control" placeholder="fecha de inicio (yy-mm-dd)"><br />
          </div>
          <div class="form-group">
            <label>Fecha Final</label>
              <input type="text" name="FechaF" class="form-control" placeholder="fecha final (yy-mm-dd)"><br />
          </div>
          <div class="form-group">
            <input type="submit" name="enviar" class="btn btn-warning" value="BUSCAR"><br />
          </div>
        </form>
        <tr>
          <td>Orden de Compra</td>
          <td>Solicitante</td>
          <td>Obra</td>
          <td>Representante</td>
          <td>Metodo de pago</td>
          <td>Fecha</td>
        </tr>
        <?php

          if(isset($_POST['enviar'])){

            $Fec_I = $_POST['FechaI'];
            $Fec_F = $_POST['FechaF'];

            include_once("../conexion.php");

            $consulta = "EXECUTE sp_mostrar_Ordenes_por_Fecha '$Fec_I','$Fec_F'";

            $ejecutar = sqlsrv_query($conn,$consulta);
          
            $i=0;
            while ($fila = sqlsrv_fetch_array($ejecutar)){

            $ordenC  = $fila['nro_orden_compra'];
            $solicitante = $fila['solicitante'];
            $obra = $fila['obra'];  
            $representante = $fila['representante'];
            $metodo = $fila['metodo_de_pago'];
            $fecha = $fila['fecha']->format('Y/m/d');         
            $i++;
        ?>
        <tr align="center">
          <td><?php echo $ordenC; ?></td>
          <td><?php echo $solicitante; ?></td>
          <td><?php echo $obra; ?></td>
          <td><?php echo $representante; ?></td> 
          <td><?php echo $metodo; ?></td> 
          <td><?php echo $fecha; ?></td>             
        </tr>

        <?php }} ?>

         </table>    
    </div>
  
  </body>
</html>