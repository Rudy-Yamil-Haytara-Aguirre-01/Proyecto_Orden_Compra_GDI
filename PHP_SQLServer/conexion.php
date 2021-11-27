<?php

        $serverName = "localhost";

        $conectionInfo = array("Database"=>"ORDEN_COMPRA");
        $conn = sqlsrv_connect($serverName,$conectionInfo);

        if ($conn){
            //echo "Se conectó correctamen a la base de datos";
        }
        else {
            echo "No se logró conectar correctamente con la base de datos.<br />";
            die(print_r(sqlsrv_errors(), true));
        }
?>