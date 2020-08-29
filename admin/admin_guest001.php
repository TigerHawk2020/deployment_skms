<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

if (!isset($modificar)) { 
$accion = 1; 
$tit_accion = 'Registro de una Nueva Membres&iacute;a GUEST';
$xidcliente = '';
}

else {
$accion = 2;
$tit_accion = 'Actualizaci&oacute;n de la Membres&iacute;a GUEST';
$sql_busc_cliente = "select * from smclientes where idcliente=$xidcliente";
$result_sql_busc_cliente = mysql_query($sql_busc_cliente, $db);
while ($fila = mysql_fetch_array($result_sql_busc_cliente)) {
   $campo = array("nombre_s"=>$fila['nombre_s'], "login"=>$fila['login'], "password"=>$fila['password']);
 }

     }

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_guest001.php'
  }

  function nuevaposicion() {
    window.scrollTo(100,380);
  }
  
</script>
</head>
<?php
  if (isset($BuscaCliente)) {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="MM_preloadImages('imagenes/titulo_adminguest.gif'); nuevaposicion()">
<?php
             }
  else {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onLoad="MM_preloadImages('imagenes/titulo_adminguest.gif')">
<?php
        }
?>
<center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center"><img src="imagenes/titulo_adminguest.gif"></td>
    </tr>
    <tr>
       <td vAlign="top">
	<table border="0" cellpadding="0" cellspacing="3">
          <tr><td bgcolor="#336699" background="../imagenes/bg_linea_punteada.gif" rowspan="20" width="2"></td></tr>
          <tr><td colspan="4" bgcolor="#003366" style="color:#ffffff;">&nbsp;T&iacute;tulo de la Acci&oacute;n: <b><?php echo $tit_accion; ?></b></td></tr>
          <?php 
           if (isset($save)) {
             switch($save) {
                case 1: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Los datos de la Membres&iacute;a han sido guardados, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Los datos de la Membres&iacute;a han sido actualizados, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 3: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Los datos de la Membres&iacute;a han sido eliminados, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                 }
               } 
           if (isset($error)) {
             switch($error) {
                case 1: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:red">El Login ya ha sido utilizado como Membres&iacute;a Guest.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:red">No olvide introducir los datos que se le piden.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                 }
               } 
          ?>          
          <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="4"></td></tr>
          <form action="admin_guest002.php" method="post">
          <input type="hidden" name="xidcliente" value="<?php echo $xidcliente; ?>">
          <input type="hidden" name="xnombre_s" value="guest">
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <tr>
            <td width="150"><b>Membres&iacute;a:</td>
            <td width="10">&nbsp;</td>
            <td width="390">guest</td>
          </tr>
          <tr>
            <td width="150"><b>Login:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xlogin" value="<?php if (isset($campo)) echo $campo['login']; else echo ''; ?>" size="20" onFocus="<?php if ($accion == 1) { echo 'this.select();'; } else { echo 'this.blur();'; } ?>"></td>
          </tr>
          <tr>
            <td width="150"><b>Contrase&ntilde;a:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xpassword" value="<?php if (isset($campo)) echo $campo['password']; else echo ''; ?>" size="20" onFocus="this.select();"></td>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          <tr>
            <td colspan="4">
<?php if (!isset($modificar)) { ?>
              <input type="button" class="button" value="Guardar" onClick="confirmar_submit(this.form,'¿Deseas Guardar los Datos de la Nueva Membresía GUEST?')">
<?php } else { ?>
              <input type="button" class="button" value="Actualizar" onClick="confirmar_submit(this.form,'¿Deseas Actualizar los datos Membresía <?php echo $xidcliente; ?>?')">&nbsp;
              <input type="button" class="button" value="Eliminar" onClick="confirmar_submit_eliminar(this.form,'¿Deseas Eliminar la Membresía Nº <?php echo $xidcliente; ?>?')">&nbsp;
              <input type="button" class="button" value="Cancelar" onClick="cancelar_opcion()">
<?php } ?>
              &nbsp;<input type="reset" class="button" value="Limpiar Casillas">
            </td>
          </tr>
          </form>
        </table>
       </td>
     </tr>
     <tr><td>&nbsp;</td></tr>
     <?php
$sql_lista = "select * from smclientes where guest = 'S'";
$result_lista = mysql_query($sql_lista, $db);
if (mysql_num_rows($result_lista)) {
?>
     <tr>
      <td>
         <table border="0" cellpadding="0" cellspacing="0" width="100%">         
          <tr>
             <td vAlign="top" align="center">
                   <table border="0" cellpadding="0" cellspacing="0" bordercolor="#aaaaaa" bgcolor="#dddddd">                    
                    <tr><td>
                         <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_izq.gif"></td>
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>Lista de Membres&iacute;as GUEST</b></td>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>                         
                         </table>
                    </td></tr>
	            <tr>
                        <td>
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff">#ID Clinte</td>  
                           <td align="center" width="250" bgcolor="#eeeeee">Nombre</td>  
                           <td align="center" width="80" bgcolor="#eeeeee">Info</td>  
                        </tr></table>
                        </td>
                    </tr>
<?php
 while($fila = mysql_fetch_array($result_lista)) {
?>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff"><a href="admin_guest001.php?xidcliente=<?php echo $fila['idcliente']; ?>&modificar=si"><?php echo $fila['idcliente']; ?></a></td>  
                           <td align="center" width="250" bgcolor="#ffffff"><a href="admin_guest001.php?xidcliente=<?php echo $fila['idcliente']; ?>&modificar=si"><?php echo $fila['nombre_s']." - ".$fila['login']; ?></a></td>  
                           <td align="center" width="80" bgcolor="#ffffff"><img src="imagenes/img_info.gif" onClick="OpenAWindowInfo('admin_infocliente.php?xid=<?php echo $fila['idcliente']; ?>','ShowInfoCliente',400,250);" alt="Información del Cliente: <?php echo $fila['login']; ?>" onMouseOver="this.style.cursor='hand';"></td>  
                        </tr></table>
                        </td>
                    </tr>
<?php
                                                 }
?>
                    <tr><td height="5" bgcolor="#ffcc00"></td></tr>
                    </table>
             </td>
          </tr>
         </table>
      </td>
     </tr>
<?php
 } else {
?>
     <tr><td>&nbsp;</td></tr>
<?php
        }
?>
</table>
</center>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>