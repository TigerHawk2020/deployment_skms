<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
 switch($accion) {
    case 1: 
               for($i=1; $i<8; $i++) {
                    $xcampo1 = 'xganador' . $i;
                    $xcampo2 = 'xpremio' . $i;
                    $sql_insert = "insert into smresult_sorteo set ";
                    $sql_insert .= "sorteo = $xnumsorteo, ";
                    $sql_insert .= "lugar = $i, ";
                    $sql_insert .= "ganadores = '";
                    $sql_insert .= $HTTP_POST_VARS[$xcampo1];
                    $sql_insert .= "', ";
                    $sql_insert .= "premio = '";
                    $sql_insert .= $HTTP_POST_VARS[$xcampo2];
                    $sql_insert .= "'";
                    mysql_query($sql_insert, $db);
               }
               header("Location: admin_premiosmelate001.php?confirmacion=1");
               break;
    case 2: 
               for($i=1; $i<8; $i++) {
                    $xcampo1 = 'xganador' . $i;
                    $xcampo2 = 'xpremio' . $i;
                    $sql_update = "update smresult_sorteo set ";
                    $sql_update .= "ganadores = '";
                    $sql_update .= $HTTP_POST_VARS[$xcampo1];
                    $sql_update .= "', ";
                    $sql_update .= "premio = '";
                    $sql_update .= $HTTP_POST_VARS[$xcampo2];
                    $sql_update .= "' ";
                    $sql_update .= "where sorteo=$xnumsorteo and lugar=";
                    $sql_update .= $i;
                    mysql_query($sql_update, $db);
               }
               header("Location: admin_premiosmelate001.php?confirmacion=2");
               break;
 }
                                                        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>