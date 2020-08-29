<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
 switch($accion) {

    case 1: if ($xopc_nombre == '') {
             header("Location: admin_opciones001.php?error=1");
            } else {
              $sql_insert = "insert into smopciones set ";
              $sql_insert .= "opc_nombre = '$xopc_nombre', ";
              $sql_insert .= "opc_descripcion = '$xopc_descripcion', ";
              $sql_insert .= "opc_pagina = '$xopc_pagina'";
              if (mysql_query($sql_insert, $db)) {
              header("Location: admin_opciones001.php?save=1"); }
                   }
            break;
    case 2: 
            $sql_update = "update smopciones set ";
            $sql_update .= "opc_nombre = '$xopc_nombre', ";
            $sql_update .= "opc_descripcion = '$xopc_descripcion', ";
            $sql_update .= "opc_pagina = '$xopc_pagina' where idopcion = ";
            $sql_update .= $xidopcion;
            if (mysql_query($sql_update, $db)) {
            header("Location: admin_opciones001.php?save=2"); }
            break;

    case 3: 
            $sql_delete_opc = "delete from smopciones where idopcion = $xidopcion";
            $sql_delete_opc_paq = "delete from smpaquetes where idopcion = $xidopcion";            
            mysql_query($sql_delete_opc, $db);
            mysql_query($sql_delete_opc_paq, $db);
            header("Location: admin_opciones001.php?save=3");
            break;

                  }
                                            }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>