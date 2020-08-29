<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

if (!isset($modificar)) { 

$accion = 1; 
$tit_accion = 'Registro de una nueva Opci&oacute;n';
$xidopcion = '';

}

else {

$accion = 2; 
$sql_busca_opc = "select * from smopciones where idopcion= $xidopcion";
$result_busca = mysql_query($sql_busca_opc, $db);
while ($fila = mysql_fetch_array($result_busca)) {
$campo = array("opc_nombre"=>$fila['opc_nombre'], "opc_descripcion"=>$fila['opc_descripcion'], "opc_pagina"=>$fila['opc_pagina']);
                                                 }
$tit_accion = 'Actualizaci&oacute;n de los Datos de la Opci&oacute;n  Nº ' . $xidopcion;
     }

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_opciones001.php'
  }
  
</script>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center"><img src="imagenes/titulo_adminopciones.gif"></td></tr>
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
                                  <td><b style="color:#ff9900">La nueva Opci&oacute;n ha sido guardada, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">La Opci&oacute;n ha sido actualizada, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 3: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">La Opci&oacute;n ha sido eliminada, correctamente.</b></td>
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
                                  <td><b style="color:red">Verifique que por lo menos se introduzca el nombre de la opci&oacute;n.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                 }
               } 
          ?>          
          <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="4"></td></tr>
          <form action="admin_opciones002.php" method="post">
          <input type="hidden" name="xidopcion" value="<?php echo $xidopcion; ?>">
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <tr>
            <td width="150"><b>Nombre de la Opci&oacute;n:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xopc_nombre" value="<?php if (isset($campo)) echo $campo['opc_nombre']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150" vAlign="top"><b>Descripci&oacute;n:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><textarea name="xopc_descripcion" class="barra" cols="30" rows="4" maxlength="255"><?php if (isset($campo)) echo $campo['opc_descripcion']; else echo ''; ?></textarea></td>
          </tr>
          <tr>
            <td width="150"><b>Archivo Origen:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xopc_pagina" value="<?php if (isset($campo)) echo $campo['opc_pagina']; else echo ''; ?>" size="45" onFocus="this.select();"></td>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          <tr>
            <td colspan="4">
<?php if (!isset($modificar)) { ?>
              <input type="button" class="button" value="Guardar" onClick="confirmar_submit(this.form,'¿Deseas Guardar la Nueva Opción?')">
<?php } else { ?>
              <input type="button" class="button" value="Actualizar" onClick="confirmar_submit(this.form,'¿Deseas Actualizar los datos de la Opción Nº <?php echo $xidopcion; ?>?')">&nbsp;
              <input type="button" class="button" value="Eliminar" onClick="confirmar_submit_eliminar(this.form,'¿Deseas Eliminar la Opción Nº <?php echo $xidopcion; ?>?')">&nbsp;
              <input type="button" class="button" value="Cancelar" onClick="javascript:window.location.href='admin_opciones001.php';">
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
$sql_lista_opc = "select * from smopciones";
$result_lista = mysql_query($sql_lista_opc, $db);
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
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>Lista de Opciones</b></td>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>                         
                         </table>
                    </td></tr>
	            <tr>
                        <td>
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff">#ID Opci&oacute;n</td>  
                           <td align="center" width="250" bgcolor="#eeeeee">Opci&oacute;n</td>  
                        </tr></table>
                        </td>
                    </tr>
<?php
 while($fila = mysql_fetch_array($result_lista)) {
?>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff"><a href="admin_opciones001.php?xidopcion=<?php echo $fila['idopcion']; ?>&modificar=si"><?php echo $fila['idopcion']; ?></a></td>  
                           <td align="center" width="250" bgcolor="#ffffff"><a href="admin_opciones001.php?xidopcion=<?php echo $fila['idopcion']; ?>&modificar=si"><?php echo $fila['opc_nombre']; ?></a></td>  
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
     <tr><td>&nbsp;</td></tr>
 </table>
</center>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>