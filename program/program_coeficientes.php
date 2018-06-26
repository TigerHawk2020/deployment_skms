<?php
@session_start();
include('../conexion.php');
if (session_is_registered("authdata")) {

if ($xdb == 1) {
   $nombreBD = 'smdbmelate';  
   $titulo = 'MELATE';
} else {
   $nombreBD = 'smdbrevancha';
   $titulo = 'REVANCHA';
  }
 $sql_busca_max = "select count(sorteo) totalSorteos from " . $nombreBD;
 $result_sql = mysql_query($sql_busca_max, $db);
 $total_sorteo = mysql_result($result_sql, 0, 'totalSorteos');

?>
<html>
<head>
   <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">   
   <script type="text/javascript" src="funciones_program.js"></script>     
   <title>Coeficientes SkyMoney</title>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<div id="fondo" style="position:absolute;">
  <img src="imagenes/fondo_coeficientes.gif">
</div>
<div id="contenido" style="position:absolute;">
<table border="0" cellpaddign="0" cellspacing="4" width="100%">
  <tr><td align="left" height="70" vAlign="bottom">Sorteo: <b><?php echo $titulo; ?></b></td></tr>
  <tr><td align="left" vAlign="bottom">&nbsp;</b></td></tr>
  <tr>
   <td>
   <table border="0" cellpadding="0" cellspacing="2" width="100%">
     <tr>
       <td align="center" vAlign="bottom"><b>N° Natural</b></td>
       <td align="center" vAlign="bottom"><b>Sorteos que ha salido</b></td>
       <td align="center" vAlign="bottom"><b>Sorteos sin salir</b></td>
       <td align="center" vAlign="bottom"><b>Coefi. Aparici&oacute;n</b></td>
       <td align="center" vAlign="bottom"><b>Coefi. No Aparici&oacute;n</b></td>
     </tr>
<?php
  $xnumNatural = 1;
  while ($xnumNatural <= 47) {
     $xnat = 1;
     $suma = 0;
     while ($xnat <= 6) {
       $sql_busca_xnum = "select count(nat".$xnat.") xCantidad from ".$nombreBD." where nat".$xnat." = ".$xnumNatural;
       $result_sql_busca_xnum = mysql_query($sql_busca_xnum, $db);
       $suma = $suma + mysql_result($result_sql_busca_xnum, 0, 'xCantidad');
       $xnat++;
     }
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center" vAlign="bottom"><?php echo $xnumNatural; ?></td>
       <td align="center" vAlign="bottom"><?php echo $suma; ?></td>
       <td align="center"><?php echo $total_sorteo - $suma; ?></td>
       <td align="center" vAlign="bottom"><?php $division = $suma / $total_sorteo; $coef = round($division, 2); echo $coef; ?></td>
       <td align="center" vAlign="bottom"><?php $division = ($total_sorteo - $suma) / $total_sorteo; $coef = round($division, 2); echo $coef; ?></td>
     </tr>     
<?php
     $xnumNatural++;
  }
?>
   </table>
   </td>
  </tr>
  <tr>
   <td height="40" align="center" vAlign="bottom">
      <input type="button" class="classinput" value="Cerrar Ventana" onClick="javascript:window.close();">
   </td>
  </tr>
</table>
</div>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>