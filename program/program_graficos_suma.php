<?php
@session_start();
include('../conexion.php');

if (isset($_GET['bd'])) 
{
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
     $sql_grafica_comp = "select suma numNatural, sorteo from ". $base_d_datos . $xsql;
 }
}

$result_sql = mysql_query($sql_grafica, $db);
if (mysql_num_rows($result_sql)) {
$num_de_puntos = mysql_num_rows($result_sql);
if ($num_de_puntos < 7) { $num_de_puntos = 7; }
$im = imagecreate($num_de_puntos * 30 + 100, 310);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
$red = imagecolorallocate($im, 255, 0, 0);
$gray = imagecolorallocate($im, 128, 128, 128);
$blue = imagecolorallocate($im, 0, 0, 192);
$grisClaro = imagecolorallocate($im, 230, 228, 228);
$i = 40;
while ($i < ($num_de_puntos * 30 + 20)) {
 imageline($im, $i, 100, $i, 300, $grisClaro);
 $i = $i + 30;
}
$i = 100;
while ($i < 310) {
 imageline($im, 30, $i, $num_de_puntos * 30 + 20, $i, $grisClaro);
 $i = $i + 20;
}
$txt_titulo = 'Gráfica Suma de Serie' ;
imagestring($im, 3, 15, 20, $txt_titulo, $blue);
imagestring($im, 3, 15, 0, 'SORTEO ' . $xtitulo, $blue);
imageline($im, 15, 100, 15, 300, $black);

$cont = 100;
$txt_barra = 300;
$cont_txt = 95;

while ($cont < 310) {
  imagestring($im, 1, 0, $cont_txt, $txt_barra, $blue);
  imageline($im, 15, $cont, 25, $cont, $black);  
  $cont = $cont + 20;
  $cont_txt = $cont_txt + 20;
  $txt_barra = $txt_barra - 30;
}
$pos_x = 40;
$num_ciclos = 0;
while ($xvalor = mysql_fetch_array($result_sql)) {
  $xlocal_punto = 300 - (($xvalor['numNatural'] / 30) * 20);
  imagestringup($im, 2, $pos_x-5, 85, $xvalor['sorteo'], $blue);
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
  $xlocal_punto = 300 - (($xvalor['numNatural'] / 30) * 20);
  imagestringup($im, 2, $pos_x-5, 85, $xvalor['sorteo'], $blue);
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