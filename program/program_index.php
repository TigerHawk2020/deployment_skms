<?php
@session_start();
include('../conexion.php');
function auth($login='', $passwd) {        
         @session_start();         
         global $PHP_SELF, $authdata;
         $check = ! empty($login);
         if (is_array($authdata)) {
             return true;
         } elseif ( $check ) {
                include('../conexion.php');
                $sql = "select login, idcliente, guest from smclientes where login='$login' and password=md5('$passwd')";                
                $resultado_sql = mysql_query($sql, $db);
                    if (mysql_num_rows($resultado_sql)) {
                   	 while ($fila=mysql_fetch_array($resultado_sql)) {
			     			$sql_busca_paquete = "
			     			select 
			     				idservicio, idpaquete, fecha_inicio, fecha_termina 
			     			from 
			     				smservicios 
			     			where 
			     				idusuario = " . $fila['idcliente']. " and 
			     				fecha_inicio <= current_date() and 
			     				fecha_termina >= current_date()";			     			
                            $result_sql_paquete = mysql_query($sql_busca_paquete, $db);
			     			if (mysql_num_rows($result_sql_paquete)) {
                               $xidpaquete = mysql_result($result_sql_paquete, 0, 'idpaquete');
                               $xfecha_inicio = mysql_result($result_sql_paquete, 0, 'fecha_inicio');
                               $authdata = array("login"=>$fila['login'], "guest"=>$fila['guest'], "paquete"=>$xidpaquete, "idcliente"=>$fila['idcliente'], "fechaInicio"=>$xfecha_inicio);                              
                               $_SESSION['authdata'] = $authdata;
         		     		} else {
                               return false;        
                            }                                                                                       
                         }
                         return true;
                    }
                    else { @mysql_close($db); return false; }
                }
    else { @mysql_close($db);
 return false; }
 }

function loginform($error = false) {
   ?>
<html>
<head>
  <title> SkyMoney System - Acceso al Sistema</title>  
  <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
</head>  

<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
 <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
   <tr>
      <td align="center" height="75"><img align="left" src="../imagenes/logo_skm.gif"></td>
   </tr>
   <?php if($error) { ?>   
         <td height="65" vAlign="middle" align="center"><p>La informaci&oacute;n es invalida. Por favor, intentelo de nuevo.</p></td>
    <?php } else { ?> 
   <tr>
      <td height="65">&nbsp;</td>
   </tr>
   <?php } ?>
   <tr>
      <td align="center" vAlign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="269" height="210">
         <tr> 
	  <td background="../imagenes/candado.gif" align="center">
           <table border="0" cellpadding="1" cellspacing="3">
             <form action="program_index.php" method="post">
             <tr><td height="50" align="center" colspan="3" vAlign="top"><b>&Aacute;rea de Acceso al Sistema<br>SkyMoney</b></td></tr>
             <tr>
                <td align="right">Usuario</td>
                <td>&nbsp;</td>
                <td><input type="text" class="inputgris" name="username" value=""></td>
             </tr>
             <tr>
                <td align="right">Contraseña</td>
                <td>&nbsp;</td>
                <td><input type="password" class="inputgris" name="passwd" value=""></td>
             </tr>
             <tr><td vAlign="bottom" align="center" colspan="3" height="50"><input type="image" src="../imagenes/boton_enviar_login.gif" border="0" class="inputimg"></td></tr>
             </form>
           </table> 
          </td>
         </tr>
        </table>
      </td>
   </tr>
   <tr><td align="center"><a href="#" class="cerrar" onClick="javascript:window.close();">[cerrrar ventana]</a></td></tr>
   <tr><td class="txtcopy" align="center">&copy; 2011 SkyMoney Siystem. Reservados todos los derechos.</td></tr>
 </table>
</body>   

</html>   
<?php   
}  
if (!auth(isset($_POST['username']) ? $_POST['username'] : false, isset($_POST['passwd']) ? $_POST['passwd'] : false)) {
    	loginform(isset($_POST['username']));
} elseif(auth(false, false)) {
@session_start();
?>
<html>
<?php
  $sql_busc_cliente = "select concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto from smclientes ";
  $sql_busc_cliente .= "where login = '";
  $sql_busc_cliente .= $authdata['login'];
  $sql_busc_cliente .= "'";
  $result_sql =  mysql_query($sql_busc_cliente, $db);
  if (mysql_num_rows($result_sql)) {
     $xusuario = mysql_result($result_sql, 0, 'nombreCompleto');
  }
?>
<head>     
   <title>>SkyMoney System: Bienvenido al Sistema !!!</title>
   <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
   <script type="text/javascript" src="funciones_program.js"></script>
</head>

<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
 <tr>
 <td vAlign="top" height="61">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr>
  <td height="60" width="450" background="imagenes/interfaz_program_v1.gif">&nbsp;</td>
  <td background="imagenes/bg_interfaz.gif">&nbsp;</td>
  <td align="right" vAlign="top" width="280" background="imagenes/interfaz_program_v11.gif">
  <table border="0" cellpadding="0" cellspacing="0" width="100%">        
         <tr>
            <td align="right" style="color:#000000; font-size:10px; font-weight:bold;"><?php include('../fecha.php'); echo $fecha_d_hoy; ?>&nbsp;&nbsp;</td>
         </tr>
         <tr><td height="10"></td></tr>
         <tr>
            <td align="right" style="color:#000000;"><b><a class="modulo" href="#" onClick="OpenAWindowInfo('program_cambiarpassword.php','ShowCambio',400,200)">Usuario:</a>&nbsp;</b><?php echo $authdata['login']; ?>&nbsp;&nbsp;</td>
         </tr>         
   </table> 
  </td>
 </tr> 
 </table>
 </td>
 </tr>

 <tr>
   <td bgcolor="#ffffff" height="18" vAlign="top">
	     <table border="0" cellpadding="0" cellspacing="0" bgcolor="#0099cc">
               <tr>
                <td bgcolor="#006699" width="2"></td>
		<td onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">&nbsp;<a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='program_pant001.php';">Inicio</a>&nbsp;</td>
                          <td bgcolor="#ffffff" width="1" height="20"></td>
                          <td onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">&nbsp;<a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='program_skyquick.php';">SkyQuick</a>&nbsp;</td>
                <?php
		  $sql_opciones = "select a1.opc_nombre opcmenu, a1.opc_pagina pagina from smopciones a1, smpaqcontenido a2 where a1.idopcion = a2.idopcion and a2.idpaquete = " . $authdata['paquete'];		  
		  $result_sql_opciones = mysql_query($sql_opciones, $db);
                  while ($fila = mysql_fetch_array($result_sql_opciones)) {
                     echo '<td bgcolor="#ffffff" width="1" height="20"></td>';
		     echo '<td onClick="CambiarColorClick(this,\'#0099cc\');" onMouseOut="CambiarColorOut(this,\'#0099cc\');" onMouseOver="CambiarColorIn(this,\'#003366\');">&nbsp;<a href="#" class="menu" onClick="javascript:document.getElementById(\'xcontenido\').src=\''.$fila['pagina'].'\';">' . $fila['opcmenu'] . '</a>&nbsp;</td>';
                     echo '<td bgcolor="#006699" width="2"></td>';
			}                  
		?>
                <td bgcolor="#ffffff" width="1"></td>
                <td onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">&nbsp;<a href="cerrar_session.php" class="menu">Cerrar Sesi&oacute;n</a>&nbsp;</td>
                <td bgcolor="#006699" width="2"></td>
               </tr>
             </table>
   </td>
 </tr>
 <tr>
   <td><iframe id="xcontenido" src="program_pant001.php" width="100%" height="100%" frameborder="" hspace="0" vspace="0" marginwidth="0" marginheight="0" noresize scrolling="AUTO"></iframe></td>
 </tr>
 <tr>
   <td class="txtcopy" align="center" vAlign="middle" height="15">&copy; 2011 SkyMoney System. Reservados todos los derechos.</td>
 </tr>
</table>
</body>
</html>
<?php        }?>