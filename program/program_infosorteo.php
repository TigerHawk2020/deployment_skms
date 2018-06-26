<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
 $authdata = $_SESSION["authdata"];
?>
<html>
<head>
  <title>Informaci&oacute;n del Sorteo N&uacute;mero: <?php echo $xsorteo; ?></title>
  <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">   
  <script type="text/javascript" src="funciones_program.js"></script>  
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<div id="fondo" style="position:absolute;">
<?php
  $bd = $_GET['bd'];
  $xsorteo = $_GET['xsorteo'];
  if ($_GET['bd'] == 1) {
    $imagen = 'fondo_info.gif';
  } else { 
    $imagen = 'fondo_info2.gif';
    }
?>
  <img src="imagenes/<?php echo $imagen; ?>">
</div>
<div id="infosorteo" style="position:absolute;">
 <table boder="0" cellpadding="0" cellspacing="4" width="100%">
<?php
  include('../conexion.php');
  if ($bd  == 1) {
    $sql_sorteo = "select sorteo, bolsa, fecha, nat1, nat2, nat3, nat4, nat5, nat6, adicional from smdbmelate where sorteo = ".$xsorteo;
    $nombreBD = 'smresult_sorteo';
  } else {
    $sql_sorteo = "select sorteo, bolsa, fecha, nat1, nat2, nat3, nat4, nat5, nat6 from smdbrevancha where sorteo = ".$xsorteo;
    $nombreBD = 'smresult_revancha';
    }
  $resultado_sql = mysql_query($sql_sorteo, $db);  
?>           
           <tr>
              <td class="txt9contenido" align="left"><b>Sorteo:</b></td>
              <td colspan="2" class="txt9contenido" aling="left">#<?php echo mysql_result($resultado_sql, 0, 'sorteo'); ?></td>
           </tr>
           <tr>
              <td class="txt9contenido" align="left"><b>Bolsa:</b></td>
              <td colspan="2" class="txt9contenido" aling="left"><?php echo mysql_result($resultado_sql, 0, 'bolsa'); ?></td>
           </tr>
           <tr>
              <td class="txt9contenido" align="left" vAlign="top"><b>Fecha:</b></td>
              <td colspan="2" class="txt9contenido" align="left">
              <?php 
		include('../fecha.php');
                $tmp_xfecha = mysql_result($resultado_sql, 0, 'fecha');
                list ($A, $m, $d) = split("-", $tmp_xfecha);
                $xfecha = mktime(0,0,0,$m, $d, $A);
                $fecha = getdate($xfecha);
                echo $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;
              ?>
              </td>
           </tr>
           <tr>
              <td class="txt9titulo" colspan="3" align="center" height="10"><b>COMBINACI&Oacute;N GANADORA</b></td>
           </tr>
           <tr>
              <td class="txt9contenido" colspan="3" align="center" height="10" bgcolor="#eeeeee"><?php echo mysql_result($resultado_sql, 0, 'nat1').'&nbsp;&nbsp;'.mysql_result($resultado_sql, 0, 'nat2').'&nbsp;&nbsp;'.mysql_result($resultado_sql, 0, 'nat3').'&nbsp;&nbsp;'.mysql_result($resultado_sql, 0, 'nat4').'&nbsp;&nbsp;'.mysql_result($resultado_sql, 0, 'nat5').'&nbsp;&nbsp;'.mysql_result($resultado_sql, 0, 'nat6'); ?></td>
           </tr>
<?php
    if ($bd == 1) {
?>
           <tr><td class="txt9titulo" colspan="3" align="center"><b>ADICIONAL: </b><?php echo mysql_result($resultado_sql, 0, 'adicional'); ?></td></tr>
<?php
    }
?>
           <tr height="20">
              <td class="txt9titulo" align="center">&nbsp;<b>Lugar</b>&nbsp;</td>
              <td class="txt9titulo" align="center">&nbsp;<b>Ganadores</b>&nbsp;</td>
              <td class="txt9titulo" align="center">&nbsp;<b>Premio</b>&nbsp;</td>
           </tr> 
<?php
     $sql_resultado_sorteo = "select * from ".$nombreBD." where sorteo = " .$xsorteo;
     $resultado_sql_list = mysql_query($sql_resultado_sorteo, $db);
     if (mysql_num_rows($resultado_sql_list)) {
     while ($lista = mysql_fetch_array($resultado_sql_list)) {
?>
           <tr onmouseover="cambia_color1(this, '#eeeeee')" onmouseout="cambia_color2(this, '#ffffff')">
              <td class="txt9contenido" align="center"><b><?php echo $lista['lugar']; ?>º</b></td>
              <td class="txt9contenido" align="center"><?php echo $lista['ganadores']; ?></td>
              <td class="txt9contenido" align="right"><?php echo $lista['premio']; ?></td>
           </tr>
<?php
                } /* Cierre del While que despliega la lista de ganadores de revancha */
                                                            }
      else {
?>
	<tr><td colspan="3" class="txt9_contenido" align="center">&nbsp;</td></tr>
<?php
            }
?>
</table>
</div>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>