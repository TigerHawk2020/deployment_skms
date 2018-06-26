<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
 switch($accion) {

    case 1: 
            if (($xlogin == '') || (xpassword == '')) {
              header("Location: admin_guest001.php?error=2");
            }
            else {

            $sql_busca = "select idcliente from smclientes where login='$xlogin'";
            $result_sql_busca = mysql_query($sql_busca, $db);
            if (mysql_num_rows($result_sql_busca)) {
              header("Location: admin_guest001.php?error=1");
            }
            else {

            $xfecha_d_hoy = date("Y-m-d");
            $sql_insert = "insert into smclientes set ";
            $sql_insert .= "nombre_s = '$xnombre_s', ";
            $sql_insert .= "login = '$xlogin', ";
            $sql_insert .= "password = '$xpassword', ";            
            $sql_insert .= "guest = 'S', ";
            $sql_insert .= "email = 'rod_em@hotmail.com', ";
            $sql_insert .= "fecha_inscripcion = '$xfecha_d_hoy'";
            if (mysql_query($sql_insert, $db)) {
            header("Location: admin_guest001.php?save=1"); }
               
                 }

                 }
            break;
    case 2: 
            if (($xlogin == '') || ($xpassword == '')) {
              header("Location: admin_guest001.php?error=2");
            }
            else {

            $sql_update = "update smclientes set ";
            $sql_update .= "password = '$xpassword' ";           
            $sql_update .= "where idcliente=$xidcliente";
            if (mysql_query($sql_update, $db)) {
            header("Location: admin_guest001.php?save=2"); }

                 }
            break;

    case 3: 
            $sql_delete = "delete from smclientes where idcliente = $xidcliente";
            mysql_query($sql_delete, $db);
            $sql_delete_servicio = "delete from smservicios where idusuario = $xidcliente";
            mysql_query($sql_delete_servicio, $db);
            header("Location: admin_guest001.php?save=3");
            break;

                  }
                                            }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>