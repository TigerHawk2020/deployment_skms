<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
    
 $xnombre_s = filter_input(INPUT_POST, 'xnombre_s', FILTER_SANITIZE_SPECIAL_CHARS);
 $xemail = filter_input(INPUT_POST, 'xemail', FILTER_SANITIZE_SPECIAL_CHARS);
 $num_cuenta = filter_input(INPUT_POST, 'num_cuenta', FILTER_SANITIZE_SPECIAL_CHARS);
 $xapellido_pat = filter_input(INPUT_POST, 'xapellido_pat', FILTER_SANITIZE_SPECIAL_CHARS);
 $xapellido_mat = filter_input(INPUT_POST, 'xapellido_mat', FILTER_SANITIZE_SPECIAL_CHARS);
 $xciudad = filter_input(INPUT_POST, 'xciudad', FILTER_SANITIZE_SPECIAL_CHARS);
 $xestado = filter_input(INPUT_POST, 'xestado', FILTER_SANITIZE_SPECIAL_CHARS);
 $xdireccion = filter_input(INPUT_POST, 'xdireccion', FILTER_SANITIZE_SPECIAL_CHARS);
 $xcolonia = filter_input(INPUT_POST, 'xcolonia', FILTER_SANITIZE_SPECIAL_CHARS);
 $xcp = filter_input(INPUT_POST, 'xcp', FILTER_SANITIZE_SPECIAL_CHARS);
 $xtelefono = filter_input(INPUT_POST, 'xtelefono', FILTER_SANITIZE_SPECIAL_CHARS);
 $xemail = filter_input(INPUT_POST, 'xemail', FILTER_SANITIZE_SPECIAL_CHARS);
 
 $xidcliente = filter_input(INPUT_POST, 'xidcliente', FILTER_SANITIZE_SPECIAL_CHARS);
    
 switch($accion) {

    case 1: $xfecha_d_hoy = date("Y-m-d");
            include("numero_registro.php");            
            $sql_insert = "insert into skm.smclientes set ";
            $sql_insert .= "nombre_s = '$xnombre_s', ";
            $sql_insert .= "login = '$xemail', ";
            $sql_insert .= "password = '$num_cuenta', ";
            $sql_insert .= "apellido_pat = '$xapellido_pat', ";
            $sql_insert .= "apellido_mat = '$xapellido_mat', ";
            $sql_insert .= "ciudad = '$xciudad', ";
            $sql_insert .= "estado = '$xestado', ";
            $sql_insert .= "direccion = '$xdireccion', ";
            $sql_insert .= "colonia = '$xcolonia', ";          
            $sql_insert .= "cp = $xcp, ";
            $sql_insert .= "telefono = '$xtelefono', ";
            $sql_insert .= "email = '$xemail', ";
            $sql_insert .= "fecha_inscripcion = '$xfecha_d_hoy'";            
            if (mysql_query($sql_insert, $db)) {
            header("Location: admin_clientes001.php?save=1"); }
            break;
    case 2: 
            $sql_update = "update skm.smclientes set ";
            $sql_update .= "nombre_s = '$xnombre_s', ";
            $sql_insert .= "login = '$xemail', ";
            $sql_update .= "apellido_pat = '$xapellido_pat', ";
            $sql_update .= "apellido_mat = '$xapellido_mat', ";
            $sql_update .= "ciudad = '$xciudad', ";
            $sql_update .= "estado = '$xestado', ";
            $sql_update .= "direccion = '$xdireccion', ";
            $sql_update .= "colonia = '$xcolonia', ";          
            $sql_update .= "cp = $xcp, ";
            $sql_update .= "telefono = '$xtelefono', ";
            $sql_update .= "email = '$xemail' where idcliente=$xidcliente";
            if (mysql_query($sql_update, $db)) {
            header("Location: admin_clientes001.php?save=2"); }
            break;

    case 3: 
            $sql_delete = "delete from skm.smclientes where idcliente = $xidcliente";
            mysql_query($sql_delete, $db);
            $sql_delete_servicio = "delete from smservicios where idusuario = $xidcliente";
            mysql_query($sql_delete_servicio, $db);
            header("Location: admin_clientes001?save=3");
            break;

                  }
                                            }
  else { header("Location: http://skms.com.mx"); }
?>