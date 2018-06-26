<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
 switch($accion) {

    case 1: if ($xpaq_nombre == '') {
             header("Location: admin_paquetes001.php?error=1");
            } else {
              $sql_insert = "insert into smpaquetes set ";
              $sql_insert .= "paq_nombre = '$xpaq_nombre', ";
              $sql_insert .= "paq_descripcion = '$xpaq_descripcion', ";
              $sql_insert .= "paq_nomimagen = '$xpaq_nomimagen', ";
              $sql_insert .= "paq_observaciones = '$xpaq_observaciones'";    
              if (mysql_query($sql_insert, $db)) {
                 if (isset($combo)) {
                  $xidpaquete = mysql_insert_id($db);
                  $combo_size = sizeof($combo);
                  for($i=0; $i<$combo_size; $i++) {              
                   $sql_insert_content = "insert into smpaqcontenido set ";
                   $sql_insert_content .= "idpaquete = " . $xidpaquete . ", ";
                   $sql_insert_content .= "idopcion = " . $combo[$i];
                   mysql_query($sql_insert_content, $db);                                                } 
                   }
              header("Location: admin_paquetes001.php?save=1"); }
                   } 
            break;

    case 2: if ($xpaq_nombre == '') {
             header("Location: admin_paquetes001.php?error=1");
             } else {
             $sql_update = "update smpaquetes set ";
             $sql_update .= "paq_nombre = '$xpaq_nombre', ";
             $sql_update .= "paq_descripcion = '$xpaq_descripcion', ";
             $sql_update .= "paq_observaciones = '$xpaq_observaciones', ";
             $sql_update .= "paq_nomimagen = '$xpaq_nomimagen' where idpaquete =" . $xidpaquete;
             if ($cambioSelect == 1) {
              if (isset($combo)) {
               $sql_delete_content = "delete from smpaqcontenido where idpaquete =" . $xidpaquete;
               mysql_query($sql_delete_content, $db);
               $combo_size = sizeof($combo);
               for($i=0; $i<$combo_size; $i++){              
                $sql_insert_content = "insert into smpaqcontenido set ";
                $sql_insert_content .= "idpaquete = " . $xidpaquete . ", ";
                $sql_insert_content .= "idopcion = " . $combo[$i];
                mysql_query($sql_insert_content, $db);
                                              } 
                                 }
                                     }
             if (mysql_query($sql_update, $db)) {
             header("Location: admin_paquetes001.php?save=2"); }
                    }
             break;

     case 3: $sql_delete_paq = "delete from smpaquetes where idpaquete = $xidpaquete";
             $sql_delete_cont = "delete from smpaqcontenido where idpaquete = $xidpaquete";
             mysql_query($sql_delete_paq, $db); 
             mysql_query($sql_delete_cont, $db);              
             header("Location: admin_paquetes001.php?save=3");             
             break;

                  }
                                            }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>