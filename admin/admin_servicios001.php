<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

if (!isset($modificar)) { 

$accion = 1; 
$tit_accion = 'Registro de un nuevo Servicio';
$xidservicio = '';
$xidcliente = '';
$xidpaquete = 0;
$xnomCompleto = '';
$x_fecha = date("d-m-Y");
list ($d, $m, $Y) = split("-", $x_fecha);

}

else {

$accion = 2;
$tit_accion = 'Actualizaci&oacute;n de los Datos del Servicio';
$sql_busca_servicio = "select idusuario, idpaquete, fecha_inicio from smservicios where idservicio = $xidservicio";
$result_buscServicio = mysql_query($sql_busca_servicio, $db);

$xidpaquete = mysql_result($result_buscServicio, 0, 'idpaquete');
list ($Y, $m, $d) = split("-", mysql_result($result_buscServicio, 0, 'fecha_inicio'));

$sql_buscaID = "select idcliente, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nomCompleto from smclientes where idcliente = ". mysql_result($result_buscServicio, 0, 'idusuario');
$result_buscaID = mysql_query($sql_buscaID, $db);
$xidcliente = mysql_result($result_buscaID, 0, 'idcliente');
$xnomCompleto = mysql_result($result_buscaID, 0, 'nomCompleto');



     }

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_servicios001.php'
  }

  function validaEleccion(xforma) {
    hayEleccion = false;
    if (xforma.elements[1].checked) {
        hayEleccion = true;
        if (!valida_campo_int(xforma.xID,'Olvido introducir el Nº ID del Cliente','Introduzca un número valido, Por Favor!!')) return;
    }
    if (xforma.elements[3].checked) {
        hayEleccion = true;
        if (!valida_campo_str(xforma.xNombre,'Olvido introducir el Nombre del Cliente')) return;
    }
    if (xforma.elements[5].checked) {
        hayEleccion = true;
        if (!valida_campo_str(xforma.xApePat,'Olvido introducir el Apellido Paterno del Cliente')) return;
    }
    if (xforma.elements[7].checked) {
        hayEleccion = true;
        if (!valida_campo_str(xforma.xApeMat,'Olvido introducir el Apellido Materno del Cliente')) return;
    }
    if (hayEleccion) {
      xforma.submit();
    }
    else {
      alert ('Por favor, Elija su opción de búsqueda');
    }
  }

  function pasaValor(xvalor1, xvalor2) {
    datService.xnombreCompleto.value=xvalor1;
    datService.xidcliente.value=xvalor2;
  }

</script>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center"><img src="imagenes/titulo_adminservicios.gif"></td>
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
                                  <td><b style="color:#ff9900">El nuevo servicio ha sido guardado, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">El servicio ha sido actualizado, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 3: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">El servicio ha sido eliminado, correctamente.</b></td>
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
                                  <td><b style="color:red">El Cliente ya tiene actualmente un Servicio SkyMoney.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                 }
               } 
          ?>          
          <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="4"></td></tr>          
          <tr>
            <td colspan="3">
             <table border="0" cellpadding="0" cellspacing="0" width="100%">
               <tr> 
                 <td>
                   <u><b>B&uacute;squeda del Cliente por:</b></u>
                 </td>
               </tr>
               <form action="admin_servicios001.php" method="post">
               <tr> 
                 <td>
                  <table border="0" cellpadding="0" cellspacing="3">
                  <form action="" method="post">
                  <input type="hidden" name="BuscaCliente" value="1">
                   <tr>
                    <td><input type="checkbox" name="BuscPorID" value="1"></td>
                    <td>&nbsp;</td>
                    <td>N° ID:</td>
                    <td>&nbsp;</td>
                    <td><input type="text" size="5" name="xID" style="text-align='right';" onFocus="this.select();" value="0"></td>
                   </tr>
                   <tr>
                    <td><input type="checkbox" name="BuscPorNombre" value="2"></td>
                    <td>&nbsp;</td>
                    <td>Nombre:</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="xNombre"></td>
                   </tr>
                   <tr>
                    <td><input type="checkbox" name="BuscPorApePat" value="3"></td>
                    <td>&nbsp;</td>
                    <td>Apellido Paterno:</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="xApePat"></td>
                   </tr>
                   <tr>
                    <td><input type="checkbox" name="BuscPorApeMat" value="4"></td>
                    <td>&nbsp;</td>
                    <td>Apellido Materno:</td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="xApeMat"></td>
                   </tr>
		   <tr><td colspan="5" align="right"><input type="button" class="button" value="Buscar Cliente" onClick="validaEleccion(this.form)"></td></tr>
                  </form>
                  </table>  
                 </td>
               </tr>
               </form>
             </table>
            </td>          
          </tr>
          <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="4"></td></tr>          
          <form action="admin_servicios002.php" method="post" name="datService">
          <input type="hidden" name="xidservicio" value="<?php echo $xidservicio; ?>">
          <input type="hidden" name="xidcliente" value="<?php echo $xidcliente; ?>">
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <tr>
            <td width="150"><b>Nombre del Cliente:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xnombreCompleto" value="<?php echo $xnomCompleto; ?>" size="40" onFocus="this.select(); this.blur();"></td>
          </tr>          
          <tr>
            <td width="150"><b>Paquete SkyMoney:</td>
            <td width="10">&nbsp;</td>
            <td width="390">
             <select name="xidpaquete">
              <option value="0">-- Lista de Paquetes --
<?php
  $sql_display_paquetes = "select idpaquete, paq_nombre from smpaquetes";
  $result_display_paquetes = mysql_query($sql_display_paquetes, $db);
  while ($xPaquete = mysql_fetch_array($result_display_paquetes)) {
     if ($xidpaquete == $xPaquete['idpaquete']) { $xselect = ' selected'; } else { $xselect = ''; }
     echo '<option value="'.$xPaquete['idpaquete'].'"'. $xselect.'>'.$xPaquete['paq_nombre'];
           }
?>
             </select>
            </td>
          </tr>
          <tr>
                    <td width="150"><b>Fecha de Inicio:</b></td>
                    <td width="10">&nbsp;</td>
                    <td width="390">
                      <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
   			  <td>
                            <select name="x_dia"><?php 
				for ($i=1; $i < 32; $i++) {   
                                      ?>
                               <option value="<?php echo $i . '"'; if ($d == $i) echo ' selected'; ?>><?php echo $i; } ?>
			    </select>
                          </td>
			  <td>-</td>
   			  <td>
                            <select name="x_mes"><?php 
	                       $mes[0] = "Ene";
		               $mes[1] = "Feb";
			       $mes[2] = "Mar";
			       $mes[3] = "Abr";
			       $mes[4] = "May";
			       $mes[5] = "Jun";
			       $mes[6] = "Jul";	
			       $mes[7] = "Ago";
			       $mes[8] = "Sep";
			       $mes[9] = "Oct";
			       $mes[10] = "Nov";
			       $mes[11] = "Dic";
				for ($i=1; $i < 13; $i++) {   
                                      ?>
                               <option value="<?php echo $i . '"'; if ($m == $i) echo ' selected'; ?>><?php echo $mes[$i-1]; } ?>
			    </select>
                          </td>
			  <td>-</td>
   			  <td>
                            <select name="x_anno"><?php 
				for ($i=1993; $i < 2016; $i++) {   
                                      ?>
                               <option value="<?php echo $i . '"'; if ($Y == $i) echo ' selected'; ?>><?php echo $i; } ?>
			    </select>
                          </td>
                        </tr>
                      </table>
                    </td>
          </tr>
          <tr>
            <td width="150" align="left"><b>Duraci&oacute;n:</b>&nbsp;(Meses)</td>
            <td width="10">&nbsp;</td>
            <td width="390"><select name="xduracion"><option value="1">1<option value="2">2<option value="3">3<option value="4">4<option value="5">5<option value="6">6</select></td>
          </tr>
          <tr>
            <td width="150" align="right"><input type="checkbox" name="enviardatos"></td>
            <td width="10">&nbsp;</td>
            <td width="390">Enviar informaci&oacute;n del servicio (nombre de usuario y contrase&ntilde;a)</td>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          <tr>
            <td colspan="4">
<?php if (!isset($modificar)) { ?>
              <input type="button" class="button" value="Guardar" onClick="confirmar_submit(this.form,'¿Deseas Guardar los datos del Nuevo Servicio?')">
<?php } else { ?>
              <input type="button" class="button" value="Actualizar" onClick="confirmar_submit(this.form,'¿Deseas Actualizar los datos del Servicio Nº <?php echo $xidservicio; ?>?')">&nbsp;
              <input type="button" class="button" value="Eliminar" onClick="confirmar_submit_eliminar(this.form,'¿Deseas Eliminar el Servicio Nº <?php echo $xidservicio; ?>?')">&nbsp;
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
if (isset($BuscaCliente)) {   

    $i = 0;
    if (isset($BuscPorNombre)) { $xvalor[$i++]= "nombre_s LIKE '%".$xNombre."%'"; }
    if (isset($BuscPorApePat)) { $xvalor[$i++]= "apellido_pat LIKE '%".$xApePat."%'"; }
    if (isset($BuscPorApeMat)) { $xvalor[$i++]= "apellido_mat LIKE '%".$xApeMat."%'"; }
    if (isset($xvalor)) {
       $contador = 0;       
       $sql_busc_id = "select idcliente, login, guest, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto from smclientes where ";
       while ($contador < sizeof($xvalor)-1) {
         $sql_busc_id .= $xvalor[$contador];         
         $sql_busc_id .= " and ";
         $contador++;
       }
       $sql_busc_id .= $xvalor[$contador];
    }

    if (isset($BuscPorID))
    {
       $sql_busc_id = "select idcliente, login, guest, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto from smclientes ";
       $sql_busc_id .= "where idcliente = $xID";
    }

    $result_lista = mysql_query($sql_busc_id, $db);

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
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>Resultado de la B&uacute;squeda</b></td>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>
                         </table>
                    </td></tr>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff">#ID Cliente</td>  
                           <td align="center" width="250" bgcolor="#eeeeee">Nombre del Cliente</td>
                           <td align="center" width="100" bgcolor="#eeeeee">N° Servicio</td>
                        </tr></table>
                        </td>
                    </tr>
<?php
 while($fila = mysql_fetch_array($result_lista)) {
   $sql_busca_servicios = "select idservicio from smservicios where ";
   $sql_busca_servicios .= "idusuario = ";
   $sql_busca_servicios .= $fila['idcliente'];
   $result_servicios = mysql_query($sql_busca_servicios, $db)
?>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff"><a href="#" onClick="pasaValor('<?php echo $fila['nombreCompleto']; ?>', '<?php echo $fila['idcliente']; ?>')"><?php echo $fila['idcliente']; ?></a></td>  
                           <td align="center" width="250" bgcolor="#ffffff"><a href="#" onClick="pasaValor('<?php if ($fila['guest'] == 'S') { echo $fila['login']; } else { echo $fila['nombreCompleto']; } ?>', '<?php echo $fila['idcliente']; ?>')"><?php echo $fila['nombreCompleto']; if ($fila['guest'] == 'S') { echo " - " . $fila['login']; } ?></a></td>  
                           <td align="center" width="100" bgcolor="#eeeeee"><?php 
                             if (mysql_num_rows($result_servicios)) {
                               echo '<a href="admin_servicios001.php?modificar=si&xidservicio=' . mysql_result($result_servicios, 0, 'idservicio') . '">' . mysql_result($result_servicios, 0, 'idservicio') . '</a>'; 
                             } else { echo 'S/N'; }
                           ?></td>
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
}
?>
     <tr><td align="center" height="30"><b>Introduzca la fecha del Servicio:</b></td></tr>
     <form action="admin_servicios001.php" method="post">
     <input type="hidden" name="xbuscaServicio" value="1">
     <tr>
       <td align="center" vAlign="top">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
                    <td align="right">
                      <img src="imagenes/busque_x_fecha.gif">
                    </td>
                    <td width="20">&nbsp;</td>
                    <td>
                      <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
   			  <td>
                            <select name="x_dia"><?php 
				for ($i=1; $i < 32; $i++) {   
                                      ?>
                               <option value="<?php echo $i . '"'; if ($d == $i) echo ' selected'; ?>><?php echo $i; } ?>
			    </select>
                          </td>
			  <td>-</td>
   			  <td>
                            <select name="x_mes"><?php 
	                       $mes[0] = "Ene";
		               $mes[1] = "Feb";
			       $mes[2] = "Mar";
			       $mes[3] = "Abr";
			       $mes[4] = "May";
			       $mes[5] = "Jun";
			       $mes[6] = "Jul";	
			       $mes[7] = "Ago";
			       $mes[8] = "Sep";
			       $mes[9] = "Oct";
			       $mes[10] = "Nov";
			       $mes[11] = "Dic";
				for ($i=1; $i < 13; $i++) {   
                                      ?>
                               <option value="<?php echo $i . '"'; if ($m == $i) echo ' selected'; ?>><?php echo $mes[$i-1]; } ?>
			    </select>
                          </td>
			  <td>-</td>
   			  <td>
                            <select name="x_anno"><?php 
				for ($i=1993; $i < 2016; $i++) {   
                                      ?>
                               <option value="<?php echo $i . '"'; if ($Y == $i) echo ' selected'; ?>><?php echo $i; } ?>
			    </select>
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td width="100" align="center"><input type="submit" value="Buscar" class="button"></td>
          </tr>
       </table>
       </td>
     </tr>
     </form>
     <tr><td>&nbsp;</td></tr>
<?php
 if (isset($xbuscaServicio)) {
  $xfechaServicio = $x_anno . '-' . $x_mes . '-' . $x_dia;

 $sql_busca_servicios = "select idusuario, idservicio from smservicios where ";
 $sql_busca_servicios .= "fecha_inicio = '".$xfechaServicio."'";
 $result_lista = mysql_query($sql_busca_servicios, $db);
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
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>Resultado de la B&uacute;squeda por fecha</b></td>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>
                         </table>
                    </td></tr>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff">#ID Cliente</td>  
                           <td align="center" width="250" bgcolor="#eeeeee">Nombre del Cliente</td>
                           <td align="center" width="80" bgcolor="#ffffff">Info</td>
                        </tr></table>
                        </td>
                    </tr>
<?php
   while($fila = mysql_fetch_array($result_lista)) {
   $sql_busc_id = "select idcliente, login, guest, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto from smclientes ";
   $sql_busc_id .= "where idcliente = ".$fila['idusuario'];
   $result_servicios = mysql_query($sql_busc_id, $db)   
?>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="80" bgcolor="#ffffff"><a href="admin_servicios001.php?xidservicio=<?php echo $fila['idservicio']; ?>&modificar=si"><?php echo mysql_result($result_servicios, 0, 'idcliente'); ?></a></td>  
                           <td align="center" width="250" bgcolor="#ffffff"><a href="admin_servicios001.php?xidservicio=<?php echo $fila['idservicio']; ?>&modificar=si"><?php echo mysql_result($result_servicios, 0, 'nombreCompleto'); if ((mysql_result($result_servicios, 0, 'guest')) == 'S') { echo '- '.mysql_result($result_servicios, 0, 'login'); } ?></a></td>  
                           <td align="center" width="80" bgcolor="#ffffff"><img src="imagenes/img_info.gif" onClick="OpenAWindowInfo('admin_infocliente.php?xid=<?php echo mysql_result($result_servicios, 0, 'idcliente'); ?>','ShowInfoCliente',400,250);" alt="Información del Cliente: <?php echo $fila['idusuario']; ?>" onMouseOver="this.style.cursor='hand';"></td>
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
   }
  else {
?>
     <tr><td align="center"><b style="color:red;">Noy hay datos asociados a esa fecha.</b></td></tr>
<?php
        }
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