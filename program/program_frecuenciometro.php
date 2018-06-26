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
 $sql_busca_max = "select max(sorteo) mayor,  resultado from " . $nombreBD;
 $result_sql = mysql_query($sql_busca_max, $db);
 $ultimo_sorteo = mysql_result($result_sql, 0, 'mayor');
 $indicador_sorteo = mysql_result($result_sql, 0, 'resultado');
 
?>
<html>
<head>
   <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">   
   <script type="text/javascript" src="funciones_program.js"></script>     
   <title>Frecuenci&oacute;metro SkyMoney</title>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<div id="fondo" style="position:absolute;">
  <img src="imagenes/fondo_frecuenciometro.gif">
</div>
<div id="contenido" style="position:absolute;">
<table border="0" cellpaddign="0" cellspacing="4" width="100%">
  <tr><td align="left" height="70" vAlign="bottom">Sorteo: <b><?php echo $titulo; ?></b></td></tr>
  <tr><td align="left" vAlign="bottom">Pr&oacute;ximo Sorteo N° <b><?php echo ($ultimo_sorteo + 1); ?></b></td></tr>
  <tr>
   <td>
   <table border="0" cellpadding="0" cellspacing="5" width="100%">
     <tr>
       <td align="center" vAlign="bottom"><b>Digitos</b></td>
       <td align="center" vAlign="bottom"><b>Suma/Serie</b></td>
       <td align="center"><b>Ultima<br>Aparici&oacute;n</b></td>
       <td align="center" vAlign="bottom"><b>Frecuencia</b></td>
     </tr>
<?php

$aRelacionComplementarios = array(
	1 => 8,
	2 => 7,
	3 => 6,
	4 => 5,
	9 => 99
);

/*$aFrecuencia = array(		
	"S1" 	=> array("NS" => 0, "F" => 0),
	"S2" 	=> array("NS" => 0, "F" => 0),
	"S3" 	=> array("NS" => 0, "F" => 0),
	"S4" 	=> array("NS" => 0, "F" => 0),
	"S5" 	=> array("NS" => 0, "F" => 0),
	"S6" 	=> array("NS" => 0, "F" => 0),
	"S7" 	=> array("NS" => 0, "F" => 0),
	"S8" 	=> array("NS" => 0, "F" => 0),
	"S9a"	=> array("NS" => 0, "F" => 0),
	"S9b" 	=> array("NS" => 0, "F" => 0)
);*/

$aFrecuencia = array();

foreach ($aRelacionComplementarios as $nDigitoAux => $nDigitoComplAux) 
{
	$sql_busca_frecuencia_nature = "select sorteo, suma, sumacomp from ". $nombreBD ." where digito = ".$nDigitoAux." order by sorteo desc limit 1";
	$sql_busca_frecuencia_compl = "select sorteo, suma, sumacomp from ". $nombreBD ." where digitocomp = ".$nDigitoAux." order by sorteo desc limit 1";
	
	//echo "sql_busca_frecuencia_nature = ".$sql_busca_frecuencia_nature."<br/>";
	//echo "sql_busca_frecuencia_compl = ".$sql_busca_frecuencia_compl."<br/>";
	//echo "digito = ".$nDigitoAux."<br/>";
	
	$result_frecuencia_nat = mysql_query($sql_busca_frecuencia_nature, $db);
	$result_frecuencia_com = mysql_query($sql_busca_frecuencia_compl, $db);
	
	$nNumSorteo_nat = mysql_result($result_frecuencia_nat, 0 , 'sorteo');
	$nNumSorteo_com = mysql_result($result_frecuencia_com, 0 , 'sorteo');
	
	//echo "sorteo = ".$nNumSorteo_nat."<br/>";
	//echo "sortep_comp = ".$nNumSorteo_com."<br/>";
	
	if ($nNumSorteo_nat > $nNumSorteo_com) {
		
		$aFrecuencia["S".$nDigitoAux]= array("SORTEO" => mysql_result($result_frecuencia_nat, 0 , 'sorteo'), "COLOR" => "blue", "NS" => mysql_result($result_frecuencia_nat, 0 , 'suma'), "F" => ($ultimo_sorteo - $nNumSorteo_nat) + 1);
		$aFrecuencia["S".$nDigitoComplAux]= array("SORTEO" => mysql_result($result_frecuencia_nat, 0 , 'sorteo'), "COLOR" => "red", "NS" => mysql_result($result_frecuencia_nat, 0 , 'sumacomp'), "F" => ($ultimo_sorteo - $nNumSorteo_nat) + 1);
		
	} else {
		
		$aFrecuencia["S".$nDigitoAux]= array("SORTEO" => mysql_result($result_frecuencia_com, 0 , 'sorteo'), "COLOR" => "blue", "NS" => mysql_result($result_frecuencia_com, 0 , 'suma'), "F" => ($ultimo_sorteo - $nNumSorteo_com) + 1);
		$aFrecuencia["S".$nDigitoComplAux]= array("SORTEO" => mysql_result($result_frecuencia_com, 0 , 'sorteo'), "COLOR" => "red", "NS" => mysql_result($result_frecuencia_com, 0 , 'sumacomp'), "F" => ($ultimo_sorteo - $nNumSorteo_com) + 1);
		
	}
	 
}//endforeach

//echo nl2br(print_r($aFrecuencia, true));
$aTemporal = $aFrecuencia["S99"];
?>

	<tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;">9</b></td>
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $aTemporal["NS"]; ?></b></td>
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $aTemporal["SORTEO"]; ?></b></td>
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $aTemporal["F"]; ?></b></td>
     </tr>

<?php

$xdigito = 1;
while ($xdigito < 10) {
   //$sql_busca_frecuencia_nat = "select sorteo, suma from ". $nombreBD ." where digito = ".$xdigito." order by sorteo desc limit 1";
   //$sql_busca_frecuencia_compl = "select sorteo, suma from ". $nombreBD ." where digitocomp = ".$xdigito." order by sorteo desc limit 1";
   //$result_frecuencia = mysql_query($sql_busca_frecuencia_nat, $db);
   $aTemporal = $aFrecuencia["S".$xdigito];
?>
     <tr onMouseOver="cambia_color1(this, '#ffcc00')" onMouseOut="cambia_color2(this, '')">
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $xdigito; ?></b></td>
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $aTemporal["NS"]; ?></b></td>
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $aTemporal["SORTEO"]; ?></b></td>
       <td align="center"><b style="color:<?php echo $aTemporal["COLOR"]; ?>;"><?php echo $aTemporal["F"]; ?></b></td>
     </tr>
<?php
   $xdigito++;
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
  else { header("Location: http://skms.com.mx/"); }
?>