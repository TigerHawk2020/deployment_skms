<?php
@session_start();
include('../conexion.php4');
if (session_is_registered("authdata")) {

  if ($authdata['guest'] == 'S') {
    header("Location: program_cambiarpassword.php4?msg=2");
  }
  else {
  
       $sql_update = "update smclientes set ";
       $sql_update .= "password = '$newpassword' ";
       $sql_update .=  "where idcliente = " . $xidcliente;       
       mysql_query($sql_update, $db);       
       header("Location: program_cambiarpassword.php4?msg=1");
       }

  }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>