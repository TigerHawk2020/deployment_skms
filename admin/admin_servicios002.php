<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
 switch($accion) {

    case 1: 
            $sql_busca_servicio = "select idservicio from smservicios ";
            $sql_busca_servicio .= "where ";
            $sql_busca_servicio .= "idusuario = $xidcliente";
            $result_sql_busca = mysql_query($sql_busca_servicio, $db);
            if (mysql_num_rows($result_sql_busca)) {
              header("Location: admin_servicios001.php?error=1");
            } else {
            /* ------------- */
            $xfecha_servicio = $x_anno . '-' . $x_mes . '-' . $x_dia;
            $sql_insert = "insert into smservicios set ";
            $sql_insert .= "idusuario = $xidcliente, ";
            $sql_insert .= "idpaquete = $xidpaquete, ";
            $sql_insert .= "fecha_inicio = '$xfecha_servicio', ";
            $sql_insert .= "fecha_termina = date_add('$xfecha_servicio', interval ". $xduracion ." month)";
            if (mysql_query($sql_insert, $db)) {
               if ($enviardatos == 'on') {
                  $sql_select_servicio = "select fecha_inicio, fecha_termina from smservicios where idservicio = " . mysql_insert_id($db);
                  $result_sql_servicio = mysql_query($sql_select_servicio, $db);		  
                  include('../fecha.php');
                  list ($A, $m, $d) = split("-", mysql_result($result_sql_servicio, 0, 'fecha_inicio'));
                  $xfecha = mktime(0,0,0,$m, $d, $A);
                  $fecha = getdate($xfecha);
                  $dia_inicia = $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;
                  list ($A, $m, $d) = split("-", mysql_result($result_sql_servicio, 0, 'fecha_termina'));
                  $xfecha = mktime(0,0,0,$m, $d, $A);
                  $fecha = getdate($xfecha);
                  $dia_termina = $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;                 
                  $sql_busca_datos_cliente = "select login, password, email, concat(nombre_s,' ',apellido_pat,' ',apellido_mat) NombreCompleto from smclientes where idcliente = " . $xidcliente;            
                  $result_sql_busca_datos = mysql_query($sql_busca_datos_cliente, $db);
                  $sql_busca_paquete = "select paq_nombre from smpaquetes where idpaquete = " . $xidpaquete;
                  $result_sql_paquete = mysql_query($sql_busca_paquete, $db);
                  $email = mysql_result($result_sql_busca_datos, 0 , 'email');
                  $from = "From: info@skymoneysystem.com \r\n";
                  $msg = "Información del Servicio SkyMoney System \n";
                  $msg .= "------------------------------------------------------ \n";
                  $msg .= "Nombre Completo: " . mysql_result($result_sql_busca_datos, 0, 'NombreCompleto') . " \n";
                  $msg .= "Usted contrato nuestro Paquete: ". mysql_result($result_sql_paquete, 0, 'paq_nombre') ." \n";
                  $msg .= "El servicio inicia a partir del día: ". $dia_inicia ."\n";
                  $msg .= "y finaliza el día: ". $dia_termina ."\n";
                  $msg .= "------------------------------------------------------ \n\n";
                  $msg .= "Los datos de autenticación son los siguientes: \n\n";
                  $msg .= "Usuario (Login): " . mysql_result($result_sql_busca_datos, 0, 'login') . " \n";
                  $msg .= "Contraseña (Password): " . mysql_result($result_sql_busca_datos, 0, 'password') . " \n\n";
                  $msg .= "Para cualquier aclaración favor de dirigirse a: info@skymoneysystem.com \n\n";
                  $msg .= "Bienvenido y Mucho Éxito \n\n";
                  $msg .= "Atte. \n\n";
                  $msg .= "ING. ELISEO RÍOS BAUTISTA - Autor de SkyMoney System";
                  mail($email, "SkyMoney System - Información del Servicio", $msg, $from);
              }  
             header("Location: admin_servicios001.php?save=1"); }
            }
            break;
    case 2: 
            $xfecha_servicio = $x_anno . '-' . $x_mes . '-' . $x_dia;
            $sql_update = "update smservicios set ";
            $sql_update .= "idpaquete = $xidpaquete, ";
            $sql_update .= "fecha_inicio = '$xfecha_servicio', ";
            $sql_update .= "fecha_termina = date_add('$xfecha_servicio', interval ".$xduracion." month) where ";
            $sql_update .= "idservicio = $xidservicio";            
            if (mysql_query($sql_update, $db)) {
              if ($enviardatos == 'on') {
                  $sql_select_servicio = "select fecha_inicio, fecha_termina from smservicios where idservicio = " . $xidservicio;
                  $result_sql_servicio = mysql_query($sql_select_servicio, $db);		  
                  include('../fecha.php');
                  list ($A, $m, $d) = split("-", mysql_result($result_sql_servicio, 0, 'fecha_inicio'));
                  $xfecha = mktime(0,0,0,$m, $d, $A);
                  $fecha = getdate($xfecha);
                  $dia_inicia = $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;
                  list ($A, $m, $d) = split("-", mysql_result($result_sql_servicio, 0, 'fecha_termina'));
                  $xfecha = mktime(0,0,0,$m, $d, $A);
                  $fecha = getdate($xfecha);
                  $dia_termina = $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;                 
                  $sql_busca_datos_cliente = "select login, password, email, concat(nombre_s,' ',apellido_pat,' ',apellido_mat) NombreCompleto from smclientes where idcliente = " . $xidcliente;            
                  $result_sql_busca_datos = mysql_query($sql_busca_datos_cliente, $db);
                  $sql_busca_paquete = "select paq_nombre from smpaquetes where idpaquete = " . $xidpaquete;
                  $result_sql_paquete = mysql_query($sql_busca_paquete, $db);
                  $email = mysql_result($result_sql_busca_datos, 0 , 'email');
                  $from = "From: info@skymoneysystem.com \r\n";
                  $msg = "Información del Servicio SkyMoney System \n";
                  $msg .= "------------------------------------------------------ \n";
                  $msg .= "Nombre Completo: " . mysql_result($result_sql_busca_datos, 0, 'NombreCompleto') . " \n";
                  $msg .= "Usted contrato nuestro Paquete: ". mysql_result($result_sql_paquete, 0, 'paq_nombre') ." \n";
                  $msg .= "El servicio inicia a partir del día: ". $dia_inicia ."\n";
                  $msg .= "y finaliza el día: ". $dia_termina ."\n";
                  $msg .= "------------------------------------------------------ \n\n";
                  $msg .= "Los datos de autenticación son los siguientes: \n\n";
                  $msg .= "Usuario (Login): " . mysql_result($result_sql_busca_datos, 0, 'login') . " \n";
                  $msg .= "Contraseña (Password): " . mysql_result($result_sql_busca_datos, 0, 'password') . " \n\n";
                  $msg .= "Para cualquier aclaración favor de dirigirse a: info@skymoneysystem.com \n\n";                                   
                  $msg .= "ING. ELISEO RÍOS BAUTISTA - Autor de SkyMoney System";
                  mail($email, "SkyMoney System - Información del Servicio", $msg, $from);
              }            
                 header("Location: admin_servicios001.php?save=2"); }
            break;

    case 3: 
            $sql_delete = "delete from smservicios where idservicio = $xidservicio";
            mysql_query($sql_delete, $db);
            header("Location: admin_servicios001.php?save=3");
            break;

                  }
                                            }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>