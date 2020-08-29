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
$semana[0] = "Domingo";
$semana[1] = "Lunes";
$semana[2] = "Martes";
$semana[3] = "Mi&eacute;rcoles";
$semana[4] = "Jueves";
$semana[5] = "Viernes";
$semana[6] = "S&aacute;bado";
$nom_mes = date('n');
settype($nom_mes,"integer");
$nom_semana = date('w');
settype($nom_semana,"integer");
$fecha_d_hoy = $semana[$nom_semana] . ", " . date("d") . " de " . $mes[$nom_mes-1] . " del " . date("Y");
?>