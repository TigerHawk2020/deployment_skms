<?php
@session_start();
include('../conexion.php');
//echo nl2br(print_r($_GET, true));
if (isset($_SESSION["authdata"])) {
        $authdata = $_SESSION["authdata"];
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
            $sql_grafica = "select " . ($xtipo == 1 ? "nat" : "comp") . $xcampo ." numNatural, sorteo from ". $base_d_datos . $xsql;
            
            if ($xtipo == 2) {
            	switch ($xcampo) {
            		case 1: $xcampo_comp = 6;
            				break;
            		case 2: $xcampo_comp = 5;
            				break;
            		case 3: $xcampo_comp = 4;
            				break;
					case 4: $xcampo_comp = 3;
            				break;
            		case 5: $xcampo_comp = 2;
            				break;            				
            		case 6: $xcampo_comp = 1;
            				break;
            	}
            	
            	$sql_grafica_comp = "select nat" . $xcampo_comp ." numNatural, sorteo from ". $base_d_datos . $xsql;
            } else 
            {
                switch ($xcampo) {
            		case 1: $xcampo_comp = 6;
            				break;
            		case 2: $xcampo_comp = 5;
            				break;
            		case 3: $xcampo_comp = 4;
            				break;
					case 4: $xcampo_comp = 3;
            				break;
            		case 5: $xcampo_comp = 2;
            				break;            				
            		case 6: $xcampo_comp = 1;
            				break;
            	}

                $sql_grafica_comp = "select comp" . $xcampo_comp ." numNatural, sorteo from ". $base_d_datos . $xsql;
            }
        }
        $result_sql = mysql_query($sql_grafica, $db);
        if (mysql_num_rows($result_sql)) {
            $num_de_puntos = mysql_num_rows($result_sql);
            if ($num_de_puntos < 7) { $num_de_puntos = 7; }
            $im = imagecreate($num_de_puntos * 30 + 100, 410);
            $white = imagecolorallocate($im, 255, 255, 255);
            $black = imagecolorallocate($im, 0, 0, 0);
            $blue = imagecolorallocate($im, 0, 0, 192);
            $red = imagecolorallocate($im, 255, 0, 0);
            $colorxPunto = imagecolorallocate($im, 192, 0, 0);
            $colorxPuntoComp = imagecolorallocate($im, 0, 0, 238);
            $colorLinea = imagecolorallocate($im, 128, 128, 128);
            $colorTextoEjeY = imagecolorallocate($im, 0, 0, 192);
            $colorTextoEjeX = imagecolorallocate($im, 0, 0, 192);
            $colorMalla = imagecolorallocate($im, 230, 228, 228);
            
            $i = 40;
            while ($i < ($num_de_puntos * 30 + 20)) {
             imageline($im, $i, 100, $i, 340, $colorMalla);
             $i = $i + 25;
            }
            
            $i = 100;
            while ($i < 350) {
             imageline($im, 30, $i, $num_de_puntos * 30 + 20, $i, $colorMalla);
             $i = $i + 20;
            }
            
            $txt_titulo = 'Gráfica del ' . $xcampo . '° número ' . ($xtipo == 1 ? "natural" : "de la complementaria");
            imagestring($im, 3, 15, 20, $txt_titulo, $blue);
            imagestring($im, 3, 15, 0, 'SORTEO ' . $xtitulo, $blue);
            
            imageline($im, 15, 100, 15, 340, $black);
            
            $cont = 100;
            $txt_barra = 60;
            $cont_txt = 95;
            while ($cont < 350) {
              imagestring($im, 1, 0, $cont_txt, $txt_barra, $colorTextoEjeY);
              imageline($im, 15, $cont, 25, $cont, $black);  
              $cont = $cont + 20;
              $cont_txt = $cont_txt + 20;
              $txt_barra = $txt_barra - 5;
            }
            
            $pos_x = 40;
            $num_ciclos = 0;
            while ($xvalor = mysql_fetch_array($result_sql)) {
              $xlocal_punto = 340 - (($xvalor['numNatural'] / 5) * 20);
              imagestringup($im, 2, $pos_x-6, 85, $xvalor['sorteo'], $colorTextoEjeX);
              imagestring($im, 3, $pos_x-3, ($xlocal_punto-20), $xvalor['numNatural'], $black);
              //imagearc($im, $pos_x, $xlocal_punto, 10, 10, 0, 360, $blue);
              if ($xtipo == 1) {
              	imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $blue, IMG_ARC_PIE);
              } else {
              	imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $red, IMG_ARC_PIE);
              }
              if ($num_ciclos > 0) {
              	if ($xtipo == 1) {
              		imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $blue);
              	} else {
              		imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $red);
              	}
              }
              $xpos_X = $pos_x;
              $xpos_Y = $xlocal_punto;
              $pos_x = $pos_x + 25;
              $num_ciclos++;
            }
            
            $result_sql_comp = mysql_query($sql_grafica_comp, $db);
            
        	$pos_x = 40;
            $num_ciclos = 0;
            while ($xvalor = mysql_fetch_array($result_sql_comp)) {
              $xlocal_punto = 340 - (($xvalor['numNatural'] / 5) * 20);
              imagestringup($im, 2, $pos_x-6, 85, $xvalor['sorteo'], $colorTextoEjeX);
              imagestring($im, 3, $pos_x-3, ($xlocal_punto-20), $xvalor['numNatural'], $black);
              //imagearc($im, $pos_x, $xlocal_punto, 5, 5, 0, 360, $red);
              if ($xtipo == 2) 
              {              	         
              	imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $blue, IMG_ARC_PIE);
              } else {
              	imagefilledarc($im, $pos_x, $xlocal_punto, 8, 8, 0, 360, $red, IMG_ARC_PIE);
              }
              if ($num_ciclos > 0) {
              	if ($xtipo == 2) {
              		imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $blue);
              	} else {
              		imageline($im, $xpos_X, $xpos_Y, $pos_x, $xlocal_punto, $red);
              	}
              }
              $xpos_X = $pos_x;
              $xpos_Y = $xlocal_punto;
              $pos_x = $pos_x + 25;
              $num_ciclos++;
            }
            
            header ("Content-type: image/png");
            imagepng($im);
            imagedestroy ($im);
        } 
        else { header("Location: http://192.100.213.51/~SM/"); }
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>