<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];

if ($_GET['xdb'] == 1) {
   $nombreBD = 'smdbmelate';  
   $titulo = 'MELATE';
} else {
   $nombreBD = 'smdbrevancha';
   $titulo = 'REVANCHA';
}

if ($_GET['sorteo'] == 0) {

 $sql_busca_max = "select max(sorteo) mayor from " . $nombreBD;
 $result_sql = mysql_query($sql_busca_max, $db);
 $ultimo_sorteo = mysql_result($result_sql, 0, 'mayor');
} else {
 $ultimo_sorteo = $_GET['sorteo'];
}

?>
<html>
<head>
   <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">   
   <script type="text/javascript" src="funciones_program.js"></script>     
   <title>Secuenci&oacute;metro SkyMoney</title>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<div id="fondo" style="position:absolute;">
  <img src="imagenes/fondo_secuenciometro.png">
</div>
<div id="contenido" style="position:absolute;">
<table border="0" cellpaddign="0" cellspacing="4" width="100%">
  <tr><td align="left" height="70" vAlign="bottom">Sorteo: <b><?php echo $titulo; ?></b></td></tr>
  <tr><td align="left" vAlign="bottom">Ultimo Sorteo N° <b><?php echo $ultimo_sorteo; ?></b></td></tr>
  <tr>
   <td>
   <table border="0" cellpadding="0" cellspacing="5" width="100%">
     <tr>
       <td align="center" vAlign="bottom"><b>Digitos</b></td>
       <td align="center" vAlign="bottom"><b>Suma/Serie</b></td>
       <td align="center"><b>Ultima<br>Aparici&oacute;n</b></td>
       <td align="center" vAlign="bottom"><b>Frecuencia</b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><b>Secuencia</b></td>
     </tr>
<?php
 $xdigito = 1;
 while ($xdigito < 3) {
      
   if ($_GET['sorteo'] == 0) 
   {
    $sql_busca_frecuencia = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." order by sorteo desc limit 1";
   } else {
    $sql_busca_frecuencia = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." and sorteo <= ".$_GET['sorteo']." order by sorteo desc limit 1";
   }
   $result_frecuencia = mysql_query($sql_busca_frecuencia, $db);
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center"><?php echo $xdigito; ?></td>
       <td align="center"><b style="color:blue;"><?php echo mysql_result($result_frecuencia, 0 , 'suma'); ?></b></td>
       <td align="center"><?php echo mysql_result($result_frecuencia, 0 , 'sorteo'); ?></td>
       <td align="center"><b style="color:red;"><?php echo ($ultimo_sorteo - mysql_result($result_frecuencia, 0 , 'sorteo'))+1; ?></b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><input name="secuencia_<?php echo $xdigito ?>" size="20" /></td>
     </tr>
<?php
   $xdigito++;
 }
 //------------------------------------------------------------------------------
 $xdigito = 3;
 while ($xdigito < 5) {
    
   if ($_GET['sorteo'] == 0) 
   {
       $sql_busca_frecuencia = "select sorteo, sumacomp from ". $nombreBD ." where digitocomp = ".$xdigito." order by sorteo desc limit 1";
   } else {
       $sql_busca_frecuencia = "select sorteo, sumacomp from ". $nombreBD ." where digitocomp = ".$xdigito." and sorteo <= ".$_GET['sorteo']." order by sorteo desc limit 1";
   }
   $result_frecuencia = mysql_query($sql_busca_frecuencia, $db);
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center" style="color:red;"><?php echo $xdigito; ?>*</td>
       <td align="center"><b style="color:blue;"><?php echo mysql_result($result_frecuencia, 0 , 'sumacomp'); ?></b></td>
       <td align="center"><?php echo mysql_result($result_frecuencia, 0 , 'sorteo'); ?></td>
       <td align="center"><b style="color:red;"><?php echo ($ultimo_sorteo - mysql_result($result_frecuencia, 0 , 'sorteo'))+1; ?></b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><input name="secuencia_<?php echo $xdigito ?>" size="20" /></td>
     </tr>
<?php
   $xdigito++;
 }
 //------------------------------------------------------------------------------
 $xdigito = 5;
 while ($xdigito < 7) {
   if ($_GET['sorteo'] == 0) 
   {
    $sql_busca_frecuencia = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." order by sorteo desc limit 1";
   } else {
    $sql_busca_frecuencia = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." and sorteo <= ".$_GET['sorteo']." order by sorteo desc limit 1";
   }
   $result_frecuencia = mysql_query($sql_busca_frecuencia, $db);
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center"><?php echo $xdigito; ?></td>
       <td align="center"><b style="color:blue;"><?php echo mysql_result($result_frecuencia, 0 , 'suma'); ?></b></td>
       <td align="center"><?php echo mysql_result($result_frecuencia, 0 , 'sorteo'); ?></td>
       <td align="center"><b style="color:red;"><?php echo ($ultimo_sorteo - mysql_result($result_frecuencia, 0 , 'sorteo'))+1; ?></b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><input name="secuencia_<?php echo $xdigito ?>" size="20" /></td>
     </tr>
<?php
   $xdigito++;
 }
 //------------------------------------------------------------------------------
 $xdigito = 7;
 while ($xdigito < 9) {
   if ($_GET['sorteo'] == 0) 
   {
       $sql_busca_frecuencia = "select sorteo, sumacomp from ". $nombreBD ." where digitocomp = ".$xdigito." order by sorteo desc limit 1";
   } else {
       $sql_busca_frecuencia = "select sorteo, sumacomp from ". $nombreBD ." where digitocomp = ".$xdigito." and sorteo <= ".$_GET['sorteo']." order by sorteo desc limit 1";
   }
   $result_frecuencia = mysql_query($sql_busca_frecuencia, $db);
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center" style="color:red;"><?php echo $xdigito; ?>*</td>
       <td align="center"><b style="color:blue;"><?php echo mysql_result($result_frecuencia, 0 , 'sumacomp'); ?></b></td>
       <td align="center"><?php echo mysql_result($result_frecuencia, 0 , 'sorteo'); ?></td>
       <td align="center"><b style="color:red;"><?php echo ($ultimo_sorteo - mysql_result($result_frecuencia, 0 , 'sorteo'))+1; ?></b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><input name="secuencia_<?php echo $xdigito ?>" size="20" /></td>
     </tr>
<?php
   $xdigito++;
 }
 //------------------------------------------------------------------------------
 $xdigito = 9;
 while ($xdigito < 10) {
   if ($_GET['sorteo'] == 0) 
   {
        $sql_busca_frecuencia = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." order by sorteo desc limit 1";
   } else {
        $sql_busca_frecuencia = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." and sorteo <= ".$_GET['sorteo']." order by sorteo desc limit 1";
   }
   $result_frecuencia = mysql_query($sql_busca_frecuencia, $db);
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center"><?php echo $xdigito; ?></td>
       <td align="center"><b style="color:blue;"><?php echo mysql_result($result_frecuencia, 0 , 'suma'); ?></b></td>
       <td align="center"><?php echo mysql_result($result_frecuencia, 0 , 'sorteo'); ?></td>
       <td align="center"><b style="color:red;"><?php echo ($ultimo_sorteo - mysql_result($result_frecuencia, 0 , 'sorteo'))+1; ?></b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><input name="secuencia_<?php echo $xdigito ?>" size="20" /></td>
     </tr>
<?php
   $xdigito++;
 }
 //------------------------------------------------------------------------------
 $xdigito = 9;
 while ($xdigito < 10) {
   if ($_GET['sorteo'] == 0) 
   {
       $sql_busca_frecuencia = "select sorteo, sumacomp from ". $nombreBD ." where digitocomp = ".$xdigito." order by sorteo desc limit 1";
   } else {
       $sql_busca_frecuencia = "select sorteo, sumacomp from ". $nombreBD ." where digitocomp = ".$xdigito." and sorteo <= ".$_GET['sorteo']." order by sorteo desc limit 1";
   }
   $result_frecuencia = mysql_query($sql_busca_frecuencia, $db);
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center" style="color:red;"><?php echo $xdigito; ?>*</td>
       <td align="center"><b style="color:blue;"><?php echo mysql_result($result_frecuencia, 0 , 'sumacomp'); ?></b></td>
       <td align="center"><?php echo mysql_result($result_frecuencia, 0 , 'sorteo'); ?></td>
       <td align="center"><b style="color:red;"><?php echo ($ultimo_sorteo - mysql_result($result_frecuencia, 0 , 'sorteo'))+1; ?></b></td>
       <td align="center" vAlign="bottom">&nbsp;</td>
       <td align="center" vAlign="bottom"><input name="secuencia_<?php echo $xdigito ?>" size="20" /></td>
     </tr>
<?php
   $xdigito++;
 }
 //------------------------------------------------------------------------------
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
  else { header("Location: http://skms.com.mx/"); }
?>