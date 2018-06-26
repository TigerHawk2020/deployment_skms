<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

if (!isset($modificar)) { 

$accion = 1; 
$tit_accion = 'Registro de un nuevo Paquete';
$xidpaquete = '';

}

else {

$accion = 2; 
$sql_busca_paq = "select * from smpaquetes where idpaquete= $xidpaquete";
$result_busca = mysql_query($sql_busca_paq, $db);
while ($fila = mysql_fetch_array($result_busca)) {
$campo = array("paq_nombre"=>$fila['paq_nombre'], "paq_descripcion"=>$fila['paq_descripcion'], "paq_nomimagen"=>$fila['paq_nomimagen'], "paq_observaciones"=>$fila['paq_observaciones']);
                                                 }
$tit_accion = 'Actualizaci&oacute;n de los Datos del Paquete  Nº ' . $xidpaquete;
     }

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_paquetes001.php'
  }

  function eliminar_opcion() {
     if (!(paquetes.oSelect.length == 0))
        {
          seleccion = false;
          for(i=0; i<paquetes.oSelect.length; i++) {
           if (paquetes.oSelect.options[i].selected) {
             seleccion = true;
           }
          }
          if (seleccion) {
          paquetes.cambioSelect.value='1';
          paquetes.oSelect.remove(paquetes.oSelect.selectedIndex); }
          else { alert('Elija la opción que desea Quitar de la Lista.'); }
        }
  }

  function agregar_opcion() {    
    if (paquetes.xopciones.options[paquetes.xopciones.selectedIndex].value == '0') {
        alert('Elija la opción que desea Agregar.');
    } else {
            encontrado = false;
            for(i=0; i<paquetes.oSelect.length;i++) {              
              if (paquetes.oSelect.options[i].text == paquetes.xopciones.options[paquetes.xopciones.selectedIndex].text) {
                encontrado = true;
              }
            }
            if (encontrado) {
              alert('La Opción ya ha sido seleccionada');
              return;
            }
            else {
             paquetes.cambioSelect.value='1';
             nuevaOpcion = new Option();
             nuevaOpcion.text = paquetes.xopciones.options[paquetes.xopciones.selectedIndex].text;
             nuevaOpcion.value = paquetes.xopciones.options[paquetes.xopciones.selectedIndex].value;
             paquetes.oSelect.add(nuevaOpcion, 1);
             }
           }
  }

</script>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center"><img src="imagenes/titulo_adminpaquetes.gif"></td></tr>
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
                                  <td><b style="color:#ff9900">El nuevo Paquete ha sido guardado, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Los datos han sido actualizados, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 3: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">El paquete ha sido eliminado, correctamente.</b></td>
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
                                  <td><b style="color:red">Verifique que por lo menos se introduzca el nombre del paquete.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                 }
               } 
          ?>          
          <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="4"></td></tr>
          <form action="admin_paquetes002.php" method="post" name="paquetes">
          <input type="hidden" name="cambioSelect" value="0">
          <input type="hidden" name="xidpaquete" value="<?php echo $xidpaquete; ?>">
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <tr>
            <td width="150"><b>Nombre del Paquete:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xpaq_nombre" value="<?php if (isset($campo)) echo $campo['paq_nombre']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150" vAlign="top"><b>Descripci&oacute;n:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><textarea name="xpaq_descripcion" class="barra" cols="39" rows="4" maxlength="255"><?php if (isset($campo)) echo $campo['paq_descripcion']; else echo ''; ?></textarea></td>
          </tr>
          <tr>
            <td width="150"><b>Imagen:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xpaq_nomimagen" value="<?php if (isset($campo)) echo $campo['paq_nomimagen']; else echo ''; ?>" size="25" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150" vAlign="top"><b>Observaciones:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><textarea name="xpaq_observaciones" class="barra" cols="39" rows="4" maxlength="255"><?php if (isset($campo)) echo $campo['paq_observaciones']; else echo ''; ?></textarea></td>
          </tr>
          <tr><td colspan="4" bgcolor="#dddddd">&nbsp;<b>Contenido del Paquete<b></td></tr>          
          <tr>
            <td width="150"><b>Opciones:</td>
            <td width="10">&nbsp;</td>          
            <td width="390">
             <table border="0" cellpadding="0" cellspacing="0">
	      <tr>
               <td>
               <select name="xopciones">
		 <option value="0">--- Elija la Opci&oacute;n ---
<?php
$sql_busca_opc = "select idopcion, opc_nombre from smopciones";
$result_sql_busca_opc = mysql_query($sql_busca_opc, $db);
while ($opcion = mysql_fetch_array($result_sql_busca_opc)) {
      echo '<option value="'.$opcion['idopcion'].'">'.$opcion['opc_nombre'];
                                                           }
?>
               </select>
               </td>
               <td>
               <input type="button" class="button" value="Agregar" onClick="agregar_opcion()">
               </td>
               </tr>
              </table>
            </td>
          </tr>          
          <tr><td colspan="4"><u>Listado de las Opciones Seleccionadas</u></td></tr>
          <tr>
            <td colspan="4">
              <table border="0" cellpadding="0" cellspacing="0">
              <tr>
               <td>
                  <select multiple ID="oSelect" name="combo[]" size="8" style="width:250;">
<?php

  $sql_display_opc = "select a1.idopcion opcion, a2.opc_nombre nombre from ";
  $sql_display_opc .= "smpaqcontenido a1, smopciones a2 where ";
  $sql_display_opc .= "a1.idopcion = a2.idopcion and a1.idpaquete=$xidpaquete";
  $resultado_sql_display = mysql_query($sql_display_opc, $db);
  if (mysql_num_rows($resultado_sql_display)) {
  while ($fila_opcion = mysql_fetch_array($resultado_sql_display)) {
    echo '<option value="'.$fila_opcion['opcion'].'">'.$fila_opcion['nombre'];
     }
  }

?>               
                  </select>
               </td>
               <td>&nbsp;</td>
               <td vAlign="top">
                 <input type="button" class="button" value="Quitar" onClick="eliminar_opcion()">
               </td>
               </tr>
              </table>
            </td>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          <tr>
            <td colspan="4">
<?php if (!isset($modificar)) { ?>
              <input type="button" class="button" value="Guardar" onClick="confirmar_submit_paquetes(this.form,'¿Deseas Guardar el nuevo Paquete?')">
<?php } else { ?>
              <input type="button" class="button" value="Actualizar" onClick="confirmar_submit_paquetes(this.form,'¿Deseas Actualizar los datos del Paquete Nº <?php echo $xidpaquete; ?>?')">&nbsp;
              <input type="button" class="button" value="Eliminar" onClick="confirmar_submit_eliminar(this.form,'¿Deseas Eliminar el Paquete Nº <?php echo $xidpaquete; ?>?')">&nbsp;
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
$sql_lista_paq = "select * from smpaquetes";
$result_lista = mysql_query($sql_lista_paq, $db);
if (mysql_num_rows($result_lista)) {
?>
     <tr>
      <td>
         <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
             <td vAlign="top" align="center">
                   <table border="0" cellpadding="0" cellspacing="0" bordercolor="#aaaaaa" bgcolor="#dddddd">
                    <tr><td colspan="11">
                         <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_izq.gif"></td>
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>Lista de Paquetes SkyMoney</b></td>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>
                         </table>
                    </td></tr>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff">#ID Paquete</td>  
                           <td align="center" width="250" bgcolor="#eeeeee">Paquetes SkyMoney</td>
                        </tr></table>
                        </td>
                    </tr>
<?php
 while($fila = mysql_fetch_array($result_lista)) {
?>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff"><a href="admin_paquetes001.php?xidpaquete=<?php echo $fila['idpaquete']; ?>&modificar=si"><?php echo $fila['idpaquete']; ?></a></td>  
                           <td align="center" width="250" bgcolor="#ffffff"><a href="admin_paquetes001.php?xidpaquete=<?php echo $fila['idpaquete']; ?>&modificar=si"><?php echo $fila['paq_nombre']; ?></a></td>  
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