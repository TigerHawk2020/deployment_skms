<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

if (!isset($modificar)) { 
$accion = 1; 
$tit_accion = 'Registro de un nuevo Cliente';
$xidcliente = '';
}

else {
$accion = 2;
$tit_accion = 'Actualizaci&oacute;n de los Datos del Cliente';
$sql_busc_cliente = "select * from smclientes where idcliente=$xidcliente";
$result_sql_busc_cliente = mysql_query($sql_busc_cliente, $db);
while ($fila = mysql_fetch_array($result_sql_busc_cliente)) {
   $campo = array("nombre_s"=>$fila['nombre_s'], "apellido_pat"=>$fila['apellido_pat'], "apellido_mat"=>$fila['apellido_mat'], "direccion"=>$fila['direccion'], "ciudad"=>$fila['ciudad'], "estado"=>$fila['estado'], "colonia"=>$fila['colonia'], "cp"=>$fila['cp'], "telefono"=>$fila['telefono'], "email"=>$fila['email']);
 }

     }

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_clientes001.php'
  }

  function validaEleccion(xforma) {
    hayEleccion = false;
    if (xforma.elements[1].checked) {
        hayEleccion = true;
        if (!valida_campo_int(xforma.xID,'Olvido introducir el N&uacute;mero ID del Cliente','Introduzca un n&uacute;mero valido, Por Favor!')) return;
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
    if (xforma.elements[9].checked) {
        hayEleccion = true;        
    }
    if (hayEleccion) {
      xforma.submit();
    }
    else {
      alert ('Por favor, Elija su opción de búsqueda');
    }
  }

  function nuevaposicion() {
    window.scrollTo(100,380);
  }
  
</script>
</head>
<?php
  if (isset($BuscaCliente)) {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="MM_preloadImages('imagenes/titulo_adminclientes.gif'); nuevaposicion()">
<?php
             }
  else {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onLoad="MM_preloadImages('imagenes/titulo_adminclientes.gif')">
<?php
        }
?>
<center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center"><img src="imagenes/titulo_adminclientes.gif"></td>
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
                                  <td><b style="color:#ff9900">Los datos del Cliente han sido guardados, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Los datos del Cliente han sido actualizados, correctamente.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 3: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Los datos del Cliente han sido eliminados, correctamente.</b></td>
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
          <form action="admin_clientes002.php" method="post">
          <input type="hidden" name="xidcliente" value="<?php echo $xidcliente; ?>">
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <tr>
            <td width="150"><b>Nombre (s):</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xnombre_s" value="<?php if (isset($campo)) echo $campo['nombre_s']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150"><b>Apellido Paterno:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xapellido_pat" value="<?php if (isset($campo)) echo $campo['apellido_pat']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150"><b>Apellido Materno:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xapellido_mat" value="<?php if (isset($campo)) echo $campo['apellido_mat']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150"><b>Ciudad:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xciudad" value="<?php if (isset($campo)) echo $campo['ciudad']; else echo ''; ?>" size="25" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150"><b>Estado:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xestado" value="<?php if (isset($campo)) echo $campo['estado']; else echo ''; ?>" size="25" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150" vAlign="top"><b>Direcci&oacute;n:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><textarea name="xdireccion" class="barra" cols="39" rows="5"><?php if (isset($campo)) echo $campo['direccion']; else echo ''; ?></textarea></td>
          </tr>
	  <tr>
            <td width="150"><b>Colonia:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xcolonia" value="<?php if (isset($campo)) echo $campo['colonia']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150"><b>C&oacute;digo Postal:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xcp" value="<?php if (isset($campo)) echo $campo['cp']; else echo '0'; ?>" size="5" onFocus="this.select();"></td>
          </tr>
          <tr>
            <td width="150" vAlign="top"><b>Tel&eacute;fono:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><textarea name="xtelefono" class="barra" cols="39" rows="2"><?php if (isset($campo)) echo $campo['telefono']; else echo ''; ?></textarea></td>
          </tr>
          <tr>
            <td width="150" vAlign="top"><b>E-m@il:</td>
            <td width="10">&nbsp;</td>
            <td width="390"><input type="text" name="xemail" value="<?php if (isset($campo)) echo $campo['email']; else echo ''; ?>" size="40" onFocus="this.select();"></td>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          <tr>
            <td colspan="4">
<?php if (!isset($modificar)) { ?>
              <input type="button" class="button" value="Guardar" onClick="confirmar_submit(this.form,'�Deseas Guardar los Datos del Nuevo Cliente?')">
<?php } else { ?>
              <input type="button" class="button" value="Actualizar" onClick="confirmar_submit(this.form,'�Deseas Actualizar los datos del Cliente N� <?php echo $xidcliente; ?>?')">&nbsp;
              <input type="button" class="button" value="Eliminar" onClick="confirmar_submit_eliminar(this.form,'�Deseas Eliminar al Cliente N� <?php echo $xidcliente; ?>?')">&nbsp;
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
     <tr>
            <td colspan="3" align="center">
             <table border="0" cellpadding="0" cellspacing="0">
               <tr> 
                 <td height="30" align="center">
                   <u><b>B&uacute;squeda del Cliente por:</b></u>
                 </td>
               </tr>
               <form action="admin_clientes001.php" method="post">
               <tr> 
                 <td>
                  <table border="0" cellpadding="0" cellspacing="3">
                  <form action="" method="post">
                  <input type="hidden" name="BuscaCliente" value="1">
                   <tr>
                    <td><input type="checkbox" name="BuscPorID" value="1"></td>
                    <td>&nbsp;</td>
                    <td>N� ID:</td>
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
                   <tr>
                    <td><input type="checkbox" name="BuscTodos" value="5"></td>
                    <td>&nbsp;</td>
                    <td colspan="2">Listar todos</td>
                   </tr>
		   <tr><td colspan="5" align="center" height="30"><input type="button" class="button" value="Buscar Cliente" onClick="validaEleccion(this.form)"></td></tr>
                  </form>
                  </table>  
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
       $sql_busc_id = "select idcliente, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto, login from smclientes where guest = 'N' and ";
       while ($contador < sizeof($xvalor)-1) {
         $sql_busc_id .= $xvalor[$contador];         
         $sql_busc_id .= " and ";
         $contador++;
       }
       $sql_busc_id .= $xvalor[$contador];
    }

    if (isset($BuscPorID))
    {
       $sql_busc_id = "select idcliente, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto, login from skm.smclientes ";
       $sql_busc_id .= "where idcliente = $xID and guest = 'N'";
    }

    if (isset($BuscTodos)) {
       $sql_busc_id = "select idcliente, concat(nombre_s, ' ', apellido_pat, ' ', apellido_mat) nombreCompleto, login from skm.smclientes where guest = 'N'";
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
                           <td align="center" width="80" bgcolor="#ffffff"><a href="admin_clientes001.php?modificar=si&xidcliente=<?php echo $fila['idcliente']; ?>"><?php echo $fila['idcliente']; ?></a></td>  
                           <td align="center" width="250" bgcolor="#ffffff"><a href="admin_clientes001.php?modificar=si&xidcliente=<?php echo $fila['idcliente']; ?>"><?php echo $fila['nombreCompleto']; ?></a></td>  
                           <td align="center" width="80" bgcolor="#ffffff"><img src="imagenes/img_info.gif" onClick="OpenAWindowInfo('admin_infocliente.php?xid=<?php echo $fila['idcliente']; ?>','ShowInfoCliente',400,250);" alt="Informaci�n del Cliente: <?php echo $fila['login']; ?>" onMouseOver="this.style.cursor='hand';"></td>
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
     else { echo '<tr><td align="center"><b style="color:red;">No hay registrado ningun cliente.</b></td></tr>'; }
   }
?>
     <tr><td>&nbsp;</td></tr>
</table>
</center>
</body>
</html>
<?php
        }
  else { header("Location: http://skms.com.mx"); }
?>