<?php
@session_start();
include('../conexion.php');
//echo nl2br(print_r($_GET, true));

if (isset($_GET['bd'])) {
 $bd      = $_GET['bd'];
            $xcampo  = $_GET['xcampo'];
            $xsql    = $_GET['xsql'];
            $xtitulo = $_GET['xtitulo'];
            $xtipo   = $_GET['tipo'];
 if ($bd == 1) {
   $base_d_datos = 'smdbmelate';
 } else {
   $base_d_datos = 'smdbrevancha';
   }
 $sql_grafica = "select ". $xcampo ." numNatural, sorteo from ". $base_d_datos . $xsql;

 if ($xtipo == 1) {
    $sql_grafica_comp = "select " . $xcampo ."comp numNatural, sorteo from ". $base_d_datos . $xsql;
 } else {
     $sql_grafica_comp = "select digito numNatural, sorteo from ". $base_d_datos . $xsql;
 }
}
$result_sql = mysql_query($sql_grafica, $db);
if (mysql_num_rows($result_sql)) {
$num_de_puntos = mysql_num_rows($result_sql);
if ($num_de_puntos < 7) { $num_de_puntos = 7; }
$im = imagecreate($num_de_puntos * 30 + 100, 300);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
$red = imagecolorallocate($im, 255, 0, 0);
$gray = imagecolorallocate($im, 128, 128, 128);
$blue = imagecolorallocate($im, 0, 0, 192);
$grisClaro = imagecolorallocate($im, 230, 228, 228);
$colorxPunto = imagecolorallocate($im, 192, 0, 0);
$colorxPuntoComp = imagecolorallocate($im, 0, 0, 238);
$colorLinea = imagecolorallocate($im, 128, 128, 128);
$colorTextoEjeY = imagecolorallocate($im, 0, 0, 192);
$colorTextoEjeX = imagecolorallocate($im, 0, 0, 192);
$colorMalla = imagecolorallocate($im, 230, 228, 228);

$i = 40;
while ($i < ($num_de_puntos * 30 + 20)) {
 imageline($im, $i, 100, $i, 280, $grisClaro);
 $i = $i + 30;
}
$i = 100;
$nLimite = 290;
while ($i < $nLimite) {
 imageline($im, 30, $i, $num_de_puntos * 30 + 20, $i, $grisClaro);
 $i = $i + 20;
}
$txt_titulo = 'Gráfica de Dígitos' ;

imagestring($im, 3, 15, 20, $txt_titulo, $blue);
imagestring($im, 3, 15, 0, 'SORTEO ' . $xtitulo, $blue);

imageline($im, 15, 100, 15, 280, $black);
$cont = 80;
$txt_barra = 10; /* 50 */
$cont_txt = 75;
while ($cont < $nLimite) {
  if ($txt_barra != 10) {
     imagestring($im, 1, 0, $cont_txt, $txt_barra, $blue);
     imageline($im, 15, $cont, 25, $cont, $black);
  }    
  $cont = $cont + 20;
  $cont_txt = $cont_txt + 20;
  $txt_barra = $txt_barra - 1; /* 5 */
}

$pos_x = 40;
$num_ciclos = 0;

while ($xvalor = mysql_fetch_array($result_sql)) {
  $xlocal_punto = 280 - (($xvalor['numNatural'] / 1) * 20);
  imagestringup($im, 2, $pos_x-6, 80, $xvalor['sorteo'], $blue);
  imagestring($im, 3, $pos_x-3, ($xlocal_punto-20), $xvalor['numNatural'], $black);
  //imagearc($im, $pos_x, $xlocal_punto, 5, 5, 0, 360, $red);
   if ($xtipo == 1) {
    imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $blue, IMG_ARC_PIE);
    } else {
    imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $red, IMG_ARC_PIE);
    }
  if ($num_ciclos > 0) {
   //imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $gray);
   if ($xtipo == 1) {
       imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $blue);
   } else {
       imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $red);
   }
  }
  $xpos_X = $pos_x;
  $xpos_Y = $xlocal_punto;
  $pos_x = $pos_x + 30;
  $num_ciclos++;
}

$result_sql_comp = mysql_query($sql_grafica_comp, $db);

$pos_x = 40;
$num_ciclos = 0;

while ($xvalor = mysql_fetch_array($result_sql_comp)) {
  $xlocal_punto = 280 - (($xvalor['numNatural'] / 1) * 20);
  imagestringup($im, 2, $pos_x-6, 80, $xvalor['sorteo'], $blue);
  imagestring($im, 3, $pos_x-3, ($xlocal_punto-20), $xvalor['numNatural'], $black);
  //imagearc($im, $pos_x, $xlocal_punto, 5, 5, 0, 360, $red);
  if ($xtipo == 1) {
    imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $red, IMG_ARC_PIE);
    } else {
    imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $blue, IMG_ARC_PIE);
    }
  if ($num_ciclos > 0) {
   //imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $gray);
   if ($xtipo == 1) {
       imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $red);
   } else {
       imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $blue);
   }
  }
  $xpos_X = $pos_x;
  $xpos_Y = $xlocal_punto;
  $pos_x = $pos_x + 30;
  $num_ciclos++;
}

header ("Content-type: image/png");
imagepng($im);
imagedestroy ($im);
} 
?>