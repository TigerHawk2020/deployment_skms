<?php
@session_start();
include('../conexion.php');
if (session_is_registered("authdata")) {
?>
<html>
<head>
  <script type="text/javascript" src="funciones_program.js"></script>
  <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
  <title>Cambiar Datos de Autenticaci&oacute;n</title>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
  <table border="0" cellpadding="0" cellspacing="10" width="100%">
<?php
 if (isset($msg)) {
?>
    <tr>
       <td>
           <p style="text-align:justify;">Los datos de <b>autenticación</b> han sido cambiados correctamente. La proxima vez que entre al Sistema SkyMoney, asegurese de utilizar los nuevos datos.</p>
       </td>
     </tr>
    <tr>
       <td height="50" align="center"><input type="button" class="classinput" value="Cerrar Ventana" onClick="javascript:window.close();"></td>
    </tr>
<?php
 }
 else {
?>
     <tr>
       <td>
           <p style="text-align:justify;">Para cambiar su nombre de usuario y contrase&ntilde;a introduzca los datos que se le piden.</p>
       </td>
     </tr>
     <form action="program_procesarpwd.php4" method="post">
     <input type="hidden" name="xidcliente" value="<?php echo $authdata['idcliente']; ?>">
     <tr>
       <td align="center">
         <table border="0" celppading="0" cellspacing="0">
           <tr>
            <td align="right">Usuario:</td>
            <td>&nbsp;</td>
            <td><b><?php echo $authdata['login']; ?></b></td>
           </tr>
           <tr>
            <td align="right">Nueva Contrase&ntilde;a:</td>
            <td>&nbsp;</td>
            <td><input type="password" name="newpassword" size="15"></td>
           </tr>
           <tr>
            <td align="right">Confirmar Contrase&ntilde;a:</td>
            <td>&nbsp;</td>
            <td><input type="password" name="newpassword2" size="15"></td>
           </tr>
           <tr><td colspan="3" height="50" align="center" vAlign="bottom"><input type="button" class="classinput" value="Aceptar" onClick="validadatos(this.form)">&nbsp;&nbsp;<input type="button" class="classinput" value="Cancelar" onClick="javascript:window.close();"></td></tr>
         </table> 
       </td>
     </tr>
     </form>
<?php
  }
?>
  </table>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>