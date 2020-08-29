<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {


/* Variables del Módulo */

if (!isset($modificar)) { 

$accion = 1; 
$tit_accion = 'Nuevo Registro de Datos del Sorteo Revancha';
$sql_next_num_sorteo = "select sorteo+1 as numsorteo from smdbrevancha order by sorteo desc limit 1";
$result_query = mysql_query($sql_next_num_sorteo, $db);
$numsorteo = mysql_result($result_query, 0, 'numsorteo');
$x_fecha = date("d-m-Y");
list ($d, $m, $Y) = split("-", $x_fecha);
}

else {

$accion = 2; 
$tit_accion = 'Actualizaci&oacute;n de Datos del Sorteo Revancha';
$numsorteo = $n_sorteo;
$sql_busca_sorteo = "select * from smdbrevancha where sorteo=$n_sorteo";
$result_busca = mysql_query($sql_busca_sorteo);
while ($fila = mysql_fetch_array($result_busca)) {
$campo = array("fecha"=>$fila['fecha'], "nat1"=>$fila['nat1'], "nat2"=>$fila['nat2'], "nat3"=>$fila['nat3'], "nat4"=>$fila['nat4'], "nat5"=>$fila['nat5'], "nat6"=>$fila['nat6'], "adic"=>$fila['adicional'], "bolsa"=>$fila['bolsa']);
                                                 }
list ($Y, $m, $d) = split("-", $campo['fecha']);
$x_fecha = $d.'-'.$m.'-'.$Y;
}

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function nuevaposicion() {
    window.scrollTo(100,380);
  }

  function cancelar_opcion() {
    window.location.href="admin_dbrevancha001.php"
  }
  
</script>
</head>
<?php
  if (isset($xyear) || isset($xBnumSorteo)) {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="MM_preloadImages('imagenes/titulo_adminrevancha.gif','imagenes/busque_x_fecha.gif', 'imagenes/titulo_consult_revancha.gif'); nuevaposicion()">
<?php
             }
  else {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onLoad="MM_preloadImages('imagenes/titulo_adminrevancha.gif','imagenes/busque_x_fecha.gif', 'imagenes/titulo_consult_revancha.gif')">
<?php
        }
?>
 <center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center"><img src="imagenes/titulo_adminrevancha.gif" align="center"></td></tr>
    <tr>
       <td vAlign="top">
	<table border="0" cellpadding="0" cellspacing="3">
                <form name="form_revancha" action="admin_dbrevancha002.php" action="post">                  
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                <tr><td bgcolor="#336699" background="../imagenes/bg_linea_punteada.gif" rowspan="20" width="2"></td></tr>
                <tr><td colspan="4" bgcolor="#003366" style="color:#ffffff;">&nbsp;T&iacute;tulo de la Acci&oacute;n: <b><?php echo $tit_accion; ?></b> </td></tr>
<?php 
           if (isset($error)) {
             switch($error) {
                case 1: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">Introduzca una fecha valida.</b></td>
				  <td>&nbsp;</td>
                                  <td><img src="imagenes/img_ok.gif" onClick="cancelar_opcion()" onMouseOver="this.style.cursor=\'hand\';"></td>
                                  </tr></table>
                              </td></tr>';
          		break;
                case 2: echo '<tr><td colspan="4" align="center" vAlign="middle">
                                  <table border="0" cellpadding="0" cellspacing="0"><tr>
                                  <td><b style="color:#ff9900">El n&uacute;mero de Sorteo '.$tmp_sorteo.' ya existe en la B.D. del Revancha.</b></td>
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
                    <td width="150"><b>N&uacute;mero de SORTEO:</td>
                    <td width="10">&nbsp;</td>
                    <td width="390"><?php 
                      if (isset($modificar)) {
                        echo $numsorteo;
                        echo '<input type="hidden" name="xsorteo" value="'.$numsorteo.'">';
                      } else {
                        echo '<input type="text" size="5" style="text-align=right;" onFocus="this.select();" name="xsorteo" value="'.$numsorteo.'">';
                             }
                    ?></td>
                </tr>
                <tr>
                    <td width="150"><b>Fecha</b> (dd-mm-aaaa):</td>
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
                <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="3"></td></tr>
                <tr><td colspan="3"><u>Combinaci&oacute;n Ganadora</u></td></tr>
                <tr>
                    <td><b>1º N&uacute;mero Natural:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" style="text-align='right';" onFocus="this.select();" name="xnat1" value="<?php if (isset($campo)) echo $campo['nat1']; else echo '0'; ?>" size="2" maxlength="2"></td>
                </tr>
                <tr>
                    <td><b>2º N&uacute;mero Natural:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" style="text-align='right';" onFocus="this.select();" name="xnat2" value="<?php if (isset($campo)) echo $campo['nat2']; else echo '0'; ?>" size="2" maxlength="2"></td>
                </tr>
                <tr>
                    <td><b>3º N&uacute;mero Natural:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" style="text-align='right';" onFocus="this.select();" name="xnat3" value="<?php if (isset($campo)) echo $campo['nat3']; else echo '0'; ?>" size="2" maxlength="2"></td>
                </tr>
                <tr>
                    <td><b>4º N&uacute;mero Natural:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" style="text-align='right';" onFocus="this.select();" name="xnat4" value="<?php if (isset($campo)) echo $campo['nat4']; else echo '0'; ?>" size="2" maxlength="2"></td>
                </tr>
                <tr>
                    <td><b>5º N&uacute;mero Natural:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" style="text-align='right';" onFocus="this.select();" name="xnat5" value="<?php if (isset($campo)) echo $campo['nat5']; else echo '0'; ?>" size="2" maxlength="2"></td>
                </tr>
                <tr>
                    <td><b>6º N&uacute;mero Natural:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" style="text-align='right';" onFocus="this.select();" name="xnat6" value="<?php if (isset($campo)) echo $campo['nat6']; else echo '0'; ?>" size="2" maxlength="2"></td>
                </tr>
                <tr><td bgcolor="#cccccc" background="../imagenes/bg_linea_punteada.gif" height="1" colspan="3"></td></tr>
                <tr>
                    <td><b>Bolsa:</b></td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="xbolsa" style="text-align='right';" onFocus="this.select();" value="<?php if (isset($campo)) echo $campo['bolsa']; else echo '$0.00'; ?>" size="10"></td>
                </tr>
                <tr><td colspan="4">&nbsp;</td></tr>
                <tr><td colspan="4"><?php
if (!isset($modificar)) { ?>
      <input type="button" class="button" value="Guardar" onClick="confirmar_submit_dbrevancha(this.form,'¿Deseas Guardar el Nuevo Sorteo del Revancha?')"><?php
                        }
else {?>
      <input type="button" class="button" value="Acutalizar" onClick="confirmar_submit(this.form,'¿Deseas Guardar los Nuevos Datos del Sorteo Nº <?php echo $numsorteo; ?>?')">
      &nbsp;<input type="button" class="button" value="Eliminar" onClick="confirmar_submit_eliminar(this.form, '¿Deseas Eliminar el Sorteo Nº <?php echo $numsorteo; ?>?')">
      &nbsp;<input type="button" class="button" value="Cancelar" onClick="cancelar_opcion()"><?php 
     }
                ?>&nbsp;<input type="reset" class="button" value="Limpiar Casillas"></td></tr>
                </form>
	</table>
       </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
      <td align="center">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
	     <td align="center"><img src="imagenes/titulo_consult_revancha.gif"></td>
             </tr>  
	     <tr><td align="center" height="40"><b>Para realizar su b&uacute;squeda, seleccione el mes, y/o a&ntilde;o del sorteo.</b></td></tr>
             <tr>
              <td align="center" vAlign="top">
 	       <table border="0" cellpadding="0" cellspacing="0">
                <tr>                
                <td width="150"><img src="imagenes/busque_x_fecha.gif" align="right"></td>
                <td width="5"></td>
                <td width="260">
	         <table border="0" cellpadding="0" cellspacing="4">
<form action="admin_dbrevancha001.php" method="post">
			  <tr>
                             <td>Mes del Sorteo:</td>
                             <td>&nbsp;</td>
                             <td>
                              <select name="xmonth">
                               <option value="0">--MES--
                              <?php 
	                       $mes[0] = "Enero";
		               $mes[1] = "Febrero";
			       $mes[2] = "Marzo";
			       $mes[3] = "Abril";
			       $mes[4] = "Mayo";
			       $mes[5] = "Junio";
			       $mes[6] = "Julio";	
			       $mes[7] = "Agosto";
			       $mes[8] = "Septiembre";
			       $mes[9] = "Octubre";
			       $mes[10] = "Noviembre";
			       $mes[11] = "Diciembre";
				for ($i=1; $i < 13; $i++) {   
                                      ?>
                               <option value="<?php echo $i; ?>"><?php echo $mes[$i-1]; } ?>
	                       </select>
                             </td>
                          </tr>
                          <tr>
                               <td>A&ntilde;o del Sorteo:</td>
                               <td>&nbsp;</td>
                               <td>
                                   <select name="xyear" onChange="this.form.submit()">	
			<option value="0">Elija el a&ntilde;o por favor
<?php
   $sql_busca_year = "select year(fecha) as year from smdbrevancha group by year(fecha)";
   $resultado_sql = mysql_query($sql_busca_year, $db);
   while ($fila = mysql_fetch_array($resultado_sql, $db)) {
?>
			<option value="<?php echo $fila['year']; ?>"><?php echo $fila['year']; ?>
<?php } ?>
		         </select>
                               </td>
                          </tr>
</form>
                      </table>
                     </td></tr>
                    </table>
                  </td>
             </tr>
        <tr><td align="center" height="40"><b>Para realizar su b&uacute;squeda, introduzca el n&uacute;mero del sorteo.</b></td></tr>
        <tr>
          <td align="center" vAlign="top">
            <table border="0" cellpadding="0" cellspacing="0">
             <tr>
              <td width="150"><img src="imagenes/busque_x_sorteo.gif" align="right"></td>
              <td width="5">&nbsp;</td>
              <td width="260">
                <table border="0" cellpadding="0" cellspacing="4">
                 <form action="admin_dbrevancha001.php" method="post">
                 <tr>
                   <td>N° Sorteo:</td>
                   <td>&nbsp;</td>
                   <td><input type="text" name="xBnumSorteo" style="text-align='right';" onFocus="this.select();" value="0" size="5"></td>
                   <td>&nbsp;</td>
                   <td><input type="submit" class="button" value="Ir"></td>
                 </tr>
                 </form>
                </table>
              </td>
             </tr>
            </table>
          </td>
        </tr>                    
	<tr><td>&nbsp;</td></tr>
             <tr>
                 <td vAlign="top" align="center">
                     <table border="0" cellpadding="0" cellspacing="0" bordercolor="#aaaaaa" bgcolor="#dddddd">
<?php
  if (isset($xyear) || isset($xBnumSorteo)) {
?>
                    <tr><td colspan="11">
                         <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_izq.gif"></td>
<?php
  if (isset($xyear)) {
?>
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>A&ntildeo: <?php echo $xyear; ?></b></td>
<?php
                     }
  if (isset($xBnumSorteo)) {
?>
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>B&uacute;squeda por Sorteo</b></td>
<?php
                     }
?>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>
                         </table>
                    </td></tr>
	            <tr>
                        <td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="60" bgcolor="#ffffff">#SORTEO</td>  
                           <td align="center" width="50" bgcolor="#ffffff">FECHA</td>  
                           <td align="center" width="40" bgcolor="#aaaaaa">NAT1</td>  
                           <td align="center" width="40" bgcolor="#aaaaaa">NAT2</td>  
                           <td align="center" width="40" bgcolor="#aaaaaa">NAT3</td>  
                           <td align="center" width="40" bgcolor="#aaaaaa">NAT4</td>  
                           <td align="center" width="40" bgcolor="#aaaaaa">NAT5</td>  
                           <td align="center" width="40" bgcolor="#aaaaaa">NAT6</td>                              
                           <td align="center" width="40" bgcolor="#ffffff">SUMA</td>  
                           <td align="center" width="50" bgcolor="#ffffff">DIGITO</td>
                        </tr></table>
                        </td>
                    </tr>
<?php
                    }
  if (isset($xyear) || isset($xBnumSorteo)) {
     if (isset($xmonth) && ($xmonth > 0)) {
       $sql_datos = "select * from smdbrevancha where year(fecha) = $xyear ";
       $sql_datos .= "and month(fecha) = $xmonth";
     }
     else if (isset($xyear)) {
       $sql_datos = "select * from smdbrevancha where year(fecha) = $xyear"; 
     }
     if (isset($xBnumSorteo)) {
       $sql_datos = "select * from smdbrevancha where sorteo = $xBnumSorteo"; 
     }
     $resultado_datos = mysql_query($sql_datos, $db);
     while ($fila = mysql_fetch_array($resultado_datos)) {
?>
	      <tr>
<td colspan="11">
                        <table border="0" cellpadding="0" cellspacing="1" width="100%"><tr>
                           <td align="center" width="60" bgcolor="#ffffff"><a href="admin_dbrevancha001.php?modificar=si&n_sorteo=<?php echo $fila['sorteo']; ?>"><?php echo $fila['sorteo']; ?></a></td>  
                           <td align="center" width="50" bgcolor="#ffffff">
                                <?php 
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
                                    list ($A, $m, $d) = split("-", $fila['fecha']);
		          echo $mes[$m-1].'-'.$d;
                                ?>
                           </td>  
                           <td align="center" width="40" bgcolor="#eeeeee"><?php echo $fila['nat1']; ?></td>  
                           <td align="center" width="40" bgcolor="#eeeeee"><?php echo $fila['nat2']; ?></td>  
                           <td align="center" width="40" bgcolor="#eeeeee"><?php echo $fila['nat3']; ?></td>  
                           <td align="center" width="40" bgcolor="#eeeeee"><?php echo $fila['nat4']; ?></td>  
                           <td align="center" width="40" bgcolor="#eeeeee"><?php echo $fila['nat5']; ?></td>  
                           <td align="center" width="40" bgcolor="#eeeeee"><?php echo $fila['nat6']; ?></td>  
                           <td align="center" width="40" bgcolor="#ffffff"><?php echo $fila['suma']; ?></td>  
                           <td align="center" width="50" bgcolor="#ffffff"><?php echo $fila['digito']; ?></td>
                         </tr></table>
                        </tr>
<?php
                                                                                                         }
                        }
?>
                     <tr><td height="5" bgcolor="#ffcc00"></td></tr>
                     </table>
                 </td>
             </tr>             
             <tr><td>&nbsp;</td></tr>
             <tr>
              <td align="center">
<table border="1" cellpadding="0" cellspacing="5">
<?php
$sql_total_sorteos = "select count(sorteo) total from smdbrevancha";
$result_sorteo = mysql_query($sql_total_sorteos, $db);
$xtotal = mysql_result($result_sorteo, 0, 'total');
?>
<tr><td colspan="4" align="center" height="30"><b>TOTAL DE SORTEOS JUGADOS:</b> <?php echo $xtotal; ?></td></tr>
<tr>
  <td>DIGITO</td>
  <td>#SORTEOS</td>
  <td>PORCENTAJE</td>
  <td bgcolor="#ffcc00" width="100" align="center">100%</td>
</tr>
<?php
$sql_grafica = "select digito, count(digito) contador, (count(digito)*100)/$xtotal total  from smdbrevancha group by digito";
$result_sql = mysql_query($sql_grafica, $db);
$contador=0;
while($fila = mysql_fetch_array($result_sql)) {
if (($contador % 2) == 0) {
  $bgColor = '#003366';
} else {
  $bgColor = '#006699';
}
?>
<tr>
  <td align="center"><?php echo $fila['digito']; ?></td>
  <td align="center"><?php echo $fila['contador']; ?></td>
  <td align="center"><?php echo $fila['total']; ?>%</td>
  <td>
   <table border="0" cellpadding="0" cellspacing="0">
    <tr>     
     <td>
      <table border="0" cellpadding="0" cellspacing="0"><tr>
     <td bgcolor="<?php echo $bgColor; ?>"><img src="imagenes/clearpixel.gif" height="10" alt="<?php echo $fila['total']; ?>%" width="<?php echo $fila['total']; ?>"></td>
      </tr></table>
     </td>
     <td>
      <table border="0" cellpadding="0" cellspacing="0"><tr>
     <td bgcolor="<?php echo $bgColor; ?>"><img src="imagenes/clearpixel.gif" height="15" width="1"></td>  
      </tr></table>
     </td>
    </tr>
   </table>
  </td>
</tr>
<?php
   $contador++;
        }
?>                 
</table>
              </td>
             </tr>
             <tr><td>&nbsp;</td></tr>
           </table>
      </td>
    </tr>
  </table>
 </center>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>