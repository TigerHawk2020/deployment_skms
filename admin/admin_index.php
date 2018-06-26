<?php
include('../conexion.php');
if (isset($logout)) {
 @session_start();
 @session_unset('auth_usuario');
 @session_unregister('auth_usuario');
}
function auth($login='', $passwd='') {        
         @session_start();         
         global $PHP_SELF, $auth_usuario;         
         $check = ! empty($login);
         if (is_array($auth_usuario)) {
             return true;
         } elseif ( $check ) {
                include('../conexion.php');
                $sql = "select usuario, extract(year from ultimo_acceso) year, extract(month from ultimo_acceso) mes, extract(day from ultimo_acceso) dia from smusuarios where usuario='$login' and password=md5('$passwd')";                
                $resultado_sql = mysql_query($sql, $db);
                    if (mysql_num_rows($resultado_sql)) {
                   	 while ($fila=mysql_fetch_array($resultado_sql)) {                             
                             if (!((date('Y') == $fila['year']) && (date('m') == $fila['mes']) && (date('d') == $fila['dia']))) {
                               $sql_update_visitas = "update smusuarios set visitas = visitas + 1 where ";
                               $sql_update_visitas .= "usuario = '";
                               $sql_update_visitas .= $fila['usuario']."'";
                               mysql_query($sql_update_visitas, $db);                               
                             }
                             $sql_update_fecha = "update smusuarios set ultimo_acceso = now() ";
                             $sql_update_fecha .= "where usuario = '";
                             $sql_update_fecha .= $fila['usuario']."'";
                             mysql_query($sql_update_fecha, $db);
                             $auth_usuario = array("usuario"=>$fila['usuario']);
                             //session_register('auth_usuario');
                             $_SESSION['auth_usuario'] = $auth_usuario;
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
  <title>> SkyMoney System - Administrador del Sistio Web</title>  
  <script type="text/javascript" src="funciones_admin.js"></script>
  <script language="JavaScript">
  <!--// 
  if (navigator.appName == "Microsoft Internet Explorer")
	{document.write('<LINK HREF="smadmin_style_explorer.css" REL="STYLESHEET" TYPE="text/css">')}
  else
	{document.write('<LINK HREF="smadmin_style_netscape.css" REL="STYLESHEET" TYPE="text/css">')}

   //-->	
  </script>

</head>  

<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="MM_preloadImages('../imagenes/interfaz_loggin.gif', '../imagenes/boton_enviar_login.gif')">
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
           <table border="0" cellpadding="1" cellspacing="3">
             <form action="admin_index.php" method="post">
             <tr><td height="50" align="center" colspan="3" vAlign="top"><b>Administrador del Sitio Web<br>SkyMoney System</b></td></tr>
             <tr>
                <td align="right">Usuario</td>
                <td>&nbsp;</td>
                <td><input type="text" name="username" value=""></td>
             </tr>
             <tr>
                 <td align="right">Contrase&ntilde;a</td>
                <td>&nbsp;</td>
                <td><input type="password" name="password" value=""></td>
             </tr>
             <tr><td vAlign="bottom" align="center" colspan="3" height="50"><input type="image" src="../imagenes/boton_enviar_login.gif" border="0" class="inputimg"></td></tr>
             </form>
           </table> 
          </td>
         </tr>
        </table>
      </td>
   </tr>
   <tr><td>&nbsp;</td></tr>
   <tr><td align="center"><a href="#" class="cerrar" onclick="javascript:window.close();">[cerrrar ventana]</a></td></tr>
   <tr><td class="txtcopy" align="center">&copy; <?php echo date("Y"); ?> SkyMoney System. Reservados todos los derechos.</td></tr>
 </table>
</body>   

</html>   
<?php   
}  if (!auth(@$_POST['username'], @$_POST['password'])) {
     loginform(isset($_POST['username']));
   }
 elseif(auth()) {
@session_start();
if (isset($_SESSION["auth_usuario"])) {

?>
<html>
<head>
     <title>
        > Administrador: <?php echo strtoupper($auth_usuario['usuario']); ?>, Bienvenido a SkyMoney System
     </title>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script type="text/javascript" src="funciones_admin.js"></script>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="MM_preloadImages('imagenes/interfaz_admin_v3.gif', 'imagenes/bottom_menu_admin.gif')">
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
 <tr>
   <td vAlign="top" height="60">
     <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <tr>
        <td background="imagenes/interfaz_admin_v11.gif" width="420">
           <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
	     <tr><td>&nbsp;</td></tr>
	     <tr><td height="20" class="fecha">&nbsp;<?php include('../fecha.php'); echo $fecha_d_hoy; ?></td></tr>
           </table>
        </td>
        <td background="imagenes/bg_interfaz.gif">
           &nbsp;
        </td>
        <td background="imagenes/interfaz_admin_v12.gif" width="228">
           &nbsp;
        </td>
      </tr>
     </table>
   </td>
 </tr>
 <tr>
    <td width="800">
      <table border="1" cellpadding="0" cellspacing="0" width="100%" height="100%" bordercolor="#ffffff">
      <tr>
        <td width="100" vAlign="top" align="center">
          <?php include('admin_menu.php'); ?>
        </td>
        <td><iframe id="xcontenido" src="admin_pant001.php" width="100%" height="100%" frameborder="0" hspace="0" vspace="0" marginwidth="0" marginheight="0" noresize scrolling="AUTO"></iframe></td>
      </tr>
      </table>
    </td>
 </tr>
 <tr><td class="txtcopy" align="center" height="10">&copy; <?php echo date("Y"); ?> SkyMoney System. Reservados todos los derechos.</td></tr>
</table>
</body>
</html>

<?php
           }
        }?>