<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
 switch($accion) {

    case 1: 
            if ($xpublicar == 'on') {
               $sql_update = "update smlibrovisitas set publicar = 'S' where idvisita = $xidvisita";
            } 
            else {
               $sql_update = "update smlibrovisitas set publicar = 'N' where idvisita = $xidvisita";
            }
            mysql_query($sql_update, $db);
            header("Location: admin_guestbook001.php?xAvPag=$xAvPag");            
            break;
    case 2: 
            $sql_delete = "delete from smlibrovisitas where idvisita = $xidvisita" ;
            mysql_query($sql_delete, $db);
            header("Location: admin_guestbook001.php");            
            break;
                       }
                                                        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>