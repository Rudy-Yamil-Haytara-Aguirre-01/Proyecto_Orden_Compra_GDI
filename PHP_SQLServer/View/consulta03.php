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
        <li><a href="consulta02.php">Ordenes de compra entre fechas</a></li>
        <li><a href="consulta03.php">cantidad de ordenes por proveedor</a></li>
        <li><a href="consulta04.php">Stock de articulo</a></li>
        <li><a href="consulta05.php">gastos totales por obra</a></li>
        <li><a href="consulta06.php">cantidad de ordenes por soliciante</a></li>
        <li><a href="consulta07.php">Ordenes de compra por moneda</a></li>
         <li><a href="consulta08.php">Ordenes de compra por moneda</a></li>
      </ul>
    </div>
      <table class="table table-bordered table-responsive">
        <form method="POST" action="consulta03.php">
          <div class="form-group">
            <label>RUC</label>
              <input type="text" name="Ruc_P" class="form-control" placeholder="ingrese del proveedor"><br />
          </div>
          <div class="form-group">
            <input type="submit" name="enviar" class="btn btn-warning" value="BUSCAR"><br />
          </div>
        </form>
    
        <tr>
          <td>Empresa</td>
          <td>Cantidad de Ordenes</td>
        </tr>
        <?php

          if(isset($_POST['enviar'])){

            $ruc_p = $_POST['Ruc_P'];

            include_once("../conexion.php");

            $consulta = "EXECUTE sp_cantidad_Ordenes_por_Proveedor '$ruc_p'";

            $ejecutar = sqlsrv_query($conn,$consulta);
          
            $i=0;
            while ($fila = sqlsrv_fetch_array($ejecutar)){

            $empresa  = $fila['nombre_empresa'];
            $cantidad = $fila['cantidad_ordenes'];           
            $i++;
        ?>
        <tr align="center">
          <td><?php echo $empresa; ?></td>
          <td><?php echo $cantidad; ?></td>            
        </tr>

        <?php }} ?>

         </table>    
    </div>
  
  </body>
</html>