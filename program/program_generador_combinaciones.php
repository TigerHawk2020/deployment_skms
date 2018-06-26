<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
 $authdata = array('guest' => 'N');
 $numero_iteraciones = 0;
 $xcoinciden_criterio = 0; 
 $direccion = "mensaje_error()";
 if (isset($_POST['x1']) && ($_POST['x1'] != '') && ($_POST['temporal'] == 1)) {
 	
   $x1 = $_POST['x1'];
   $x2 = $_POST['x2'];
   $x3 = $_POST['x3'];
   $x4 = $_POST['x4'];
   $x5 = $_POST['x5'];
   $x6 = $_POST['x6'];
   
   $y1 = $_POST['y1'];
   $y2 = $_POST['y2'];
   $y3 = $_POST['y3'];
   $y4 = $_POST['y4'];
   $y5 = $_POST['y5'];
   $y6 = $_POST['y6'];
   
   $buscarTotal = $_POST['buscarTotal'];
   $temporal = $_POST['temporal'];
   
   $x_maxsuma = isset($_POST['sumaMaxima']) ? $_POST['sumaMaxima'] : 56;
   
   $x_suma = $x1 + $x2 + $x3 + $x4 + $x5 + $x6;
   $y_suma = $y1 + $y2 + $y3 + $y4 + $y5 + $y6;
 }

?>
<html>
<head>   
    <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
    <link rel="stylesheet" type="text/css" href="../incl/jquery-easyui-1.3.4/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../incl/jquery-easyui-1.3.4/themes/icon.css">
    <script type="text/javascript" src="../incl/jquery-easyui-1.3.4/jquery.min.js"></script>
    <script type="text/javascript" src="../incl/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
<script language="JavaScript">

   function mensaje_error() {
     alert('No existe ningun archivo generado.');
   }

   function valida_xNAT(xcampo) {
    if (xcampo.value == '') {
      alert('Olvido Introducir un Valor');
      xcampo.focus();
      return false;
    } else {
        if (isNaN(xcampo.value)) {
           alert('Solo se aceptan caracteres num�ricos');
           xcampo.focus();
           return false;
        } else {            
                return true;
          }
      }
   }

   function valida_xINT(xcampo) {
    if (xcampo.value == '') {
      alert('Olvido Introducir un Valor');
      xcampo.focus();
      return false;
    } else {
        if (isNaN(xcampo.value)) {
           alert('Solo se aceptan caracteres num�ricos');
           xcampo.focus();
           return false;
        } else {
                return true;
          }
      }
   }

   function validaRangos(xcampo1, xcampo2, xcampo3) {
     if ((parseInt(xcampo1.value) >= parseInt(xcampo2.value)) && (parseInt(xcampo1.value) < parseInt(xcampo3.value))) {
        return true;
     } else {
            alert('Rangos en Conflicto.');
            xcampo1.focus();
            return false;
       }
   }

   function EjecutarLimpiar() {
     xrangos.temporal.value = 0;
     xrangos.submit();
   }

   function EjecutarSubmit() {
     if (!valida_xNAT(xrangos.x1)) return;
     if (!valida_xNAT(xrangos.x2)) return;
     if (!valida_xNAT(xrangos.x3)) return;
     if (!valida_xNAT(xrangos.x4)) return;
     if (!valida_xNAT(xrangos.x5)) return;
     if (!valida_xNAT(xrangos.x6)) return;
     if (!valida_xNAT(xrangos.y1)) return;
     if (!valida_xNAT(xrangos.y2)) return;
     if (!valida_xNAT(xrangos.y3)) return;
     if (!valida_xNAT(xrangos.y4)) return;
     if (!valida_xNAT(xrangos.y5)) return;
     if (!valida_xNAT(xrangos.y6)) return;
     if (!valida_xINT(xrangos.buscarTotal)) return;      
     if (!validaRangos(xrangos.y1, xrangos.x1, xrangos.x2)) return;
     if (!validaRangos(xrangos.y2, xrangos.x2, xrangos.x3)) return;
     if (!validaRangos(xrangos.y3, xrangos.x3, xrangos.x4)) return;
     if (!validaRangos(xrangos.y4, xrangos.x4, xrangos.x5)) return;
     if (!validaRangos(xrangos.y5, xrangos.x5, xrangos.x6)) return;
     if (parseInt(xrangos.y6.value) >= parseInt(xrangos.x6.value)) {
        xrangos.temporal.value = 1;
        xrangos.submit();
     } else { 
         alert('Rangos en Conflicto.');
         xrangos.y6.focus();
       }
   }

   function ValidarCasilla(xcampo, xmensaje) {
     if (isNaN(xcampo.value)) {
       alert(xmensaje);
       xcampo.value = '';
       xcampo.focus();
       return (0);
     } else { 
        return (xcampo.value) 
       }
   }

   function ClearLimitInferior(xforma) {
     if (confirm('�Deseas Limpiar las casillas del Limite Inferior?')) {
     xforma.x1.value = '';
     xforma.x2.value = '';
     xforma.x3.value = '';
     xforma.x4.value = '';
     xforma.x5.value = '';
     xforma.x6.value = '';
     xforma.sumaX.value = '0';
     }
   }

   function ClearLimitSuperior(xforma) {
     if (confirm('�Deseas Limpiar las casillas del Limite Superior?')) {
     xforma.y1.value = '';
     xforma.y2.value = '';
     xforma.y3.value = '';
     xforma.y4.value = '';
     xforma.y5.value = '';
     xforma.y6.value = '';
     xforma.sumaY.value = '0';
     }
   }

   function SumaRangosX(xforma) {
     if (xforma.x1.value == '') {
        tmp1 = 0;
     } else {
        tmp1 = ValidarCasilla(xforma.x1,'ERROR: Casilla N1 Limite Inferior');
     }

     if (xforma.x2.value == '') {
        tmp2 = 0;
     } else {
        tmp2 = ValidarCasilla(xforma.x2,'ERROR: Casilla N2 Limite Inferior');
     }

     if (xforma.x3.value == '') {
        tmp3 = 0;
     } else {
        tmp3 = ValidarCasilla(xforma.x3,'ERROR: Casilla N3 Limite Inferior');
     }

     if (xforma.x4.value == '') {
        tmp4 = 0;
     } else {
        tmp4 = ValidarCasilla(xforma.x4,'ERROR: Casilla N4 Limite Inferior');
     }

     if (xforma.x5.value == '') {
        tmp5 = 0;
     } else {
        tmp5 = ValidarCasilla(xforma.x5,'ERROR: Casilla N5 Limite Inferior');
     }

     if (xforma.x6.value == '') {
        tmp6 = 0;
     } else {
        tmp6 = ValidarCasilla(xforma.x6,'ERROR: Casilla N6 Limite Inferior');
     }

     xforma.sumaX.value = parseInt(tmp1) + parseInt(tmp2) + parseInt(tmp3) + parseInt(tmp4) + parseInt(tmp5) + parseInt(tmp6);

   }

   function SumaRangosY(xforma) {
     if (xforma.y1.value == '') {
        tmp1 = 0;
     } else {
        tmp1 = ValidarCasilla(xforma.y1,'ERROR: Casilla N1 Limite Superior');
     }

     if (xforma.y2.value == '') {
        tmp2 = 0;
     } else {
        tmp2 = ValidarCasilla(xforma.y2,'ERROR: Casilla N2 Limite Superior');
     }

     if (xforma.y3.value == '') {
        tmp3 = 0;
     } else {
        tmp3 = ValidarCasilla(xforma.y3,'ERROR: Casilla N3 Limite Superior');
     }

     if (xforma.y4.value == '') {
        tmp4 = 0;
     } else {
        tmp4 = ValidarCasilla(xforma.y4,'ERROR: Casilla N4 Limite Superior');
     }

     if (xforma.y5.value == '') {
        tmp5 = 0;
     } else {
        tmp5 = ValidarCasilla(xforma.y5,'ERROR: Casilla N5 Limite Superior');
     }

     if (xforma.y6.value == '') {
        tmp6 = 0;
     } else {
        tmp6 = ValidarCasilla(xforma.y6,'ERROR: Casilla N6 Limite Superior');
     }

     xforma.sumaY.value = parseInt(tmp1) + parseInt(tmp2) + parseInt(tmp3) + parseInt(tmp4) + parseInt(tmp5) + parseInt(tmp6);

   }

</script>

</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<div id="fondo" style="position:absolute;">
  <img src="imagenes/titulo_generador.gif">
</div>
<center>
<div id="fondo" style="position:absolute;">
 <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
   <tr>
     <td width="2" height="2"></td>
     <td height="2"></td>
     <td width="2" height="2"></td>
   </tr>
   <tr>
     <td width="2"></td>
     <td vAlign="top" align="center">
       <table border="0" cellpadding="0" cellspacing="0" width="100%" bordercolor="red">
	 <tr><td align="center" height="80">&nbsp;</td></tr>
	 <tr>
           <td align="center">
	       <table border="0" cellpadding="0" cellspacing="3">
	           <!-- -->
	          <tr>
                <td colspan="20" align="center">
                    
                <table border="0" cellpadding="0" cellspacing="0" bordercolor="red">
                    
                  
                  
                  <form name="xrangos" action="program_generador_combinaciones.php" method="post"> 
                  <input type="hidden" name="temporal" value="0">
                  
                  <tr>
                      <td colspan="20" align="center">
                      <table border="0" cellpadding="0" cellspacing="3">
                          <tr><td colspan="2"><strong>CANTIDAD TOTAL DE N&Uacute;MEROS</strong> que intervienen en el Sorteo</td></tr>
                          <tr>
                              <td align="center">Introduzca el N&uacute;mero M&aacute;ximo:&nbsp;</td>
                              <td background="imagenes/img_casilla_suma.gif" height="40" width="50" align="center"><input type="text" class="casillaSuma" name="sumaMaxima" id="sumaMaxima" value="<?php if (isset($x_maxsuma)) { echo $x_maxsuma; } else { echo '56'; } ?>" onFocus="this.blur();" size="3"></td>
                          </tr>
                      </table>
                      </td>
                  </tr>
                  
                  <tr><td colspan="20" height="30" align="center" style="font-size:11px;">Introduzca los l&iacute;mites deseados y posteriormente presione<br>los botones de ' = ' para conocer la suma total del l&iacute;mite.</td></tr>
                  <tr><td colspan="20" align="center" style="font-size:18px;font-weigth:bold;"><img src="imagenes/img_rangos.gif"></td></tr>
                  	      
                  <tr>
                    <td width="100">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_n1.gif"></td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_n2.gif"></td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_n3.gif"></td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_n4.gif"></td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_n5.gif"></td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_n6.gif"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center"><img src="imagenes/img_suma.gif"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              
                  <tr>
                    <td width="100"><img src="imagenes/titulo_limite_inferior.gif"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="x1" class="casilla" value="<?php if (isset($_POST['x1'])) { echo $_POST['x1']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="x2" class="casilla" value="<?php if (isset($_POST['x2'])) { echo $_POST['x2']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="x3" class="casilla" value="<?php if (isset($_POST['x3'])) { echo $_POST['x3']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="x4" class="casilla" value="<?php if (isset($_POST['x4'])) { echo $_POST['x4']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="x5" class="casilla" value="<?php if (isset($_POST['x5'])) { echo $_POST['x5']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="x6" class="casilla" value="<?php if (isset($_POST['x6'])) { echo $_POST['x6']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td><input type="button" value="=" class="classinput" onClick="SumaRangosX(this.form)"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla_suma.gif" height="40" width="50" align="center"><input type="text" class="casillaSuma" name="sumaX" value="<?php if (isset($x_suma)) { echo $x_suma; } else { echo '0'; } ?>" onFocus="this.blur();" size="3"></td>
                    <td>&nbsp;</td>
                    <td><input type="button" class="classinput" value="Limpiar" onClick="ClearLimitInferior(this.form)"></td>
                  </tr>
                  <tr>
                    <td colspan="15"><img align="right" src="imagenes/titulo_suma_total.gif"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla_suma.gif" height="40" width="50" align="center"><input type="text" class="casillaSuma" name="buscarTotal" value="<?php if (isset($buscarTotal)) { echo $buscarTotal; } else { echo ''; } ?>" onFocus="this.select();" size="3" maxlength="3"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
    	      <tr>
                    <td width="100"><img src="imagenes/titulo_limite_superior.gif"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="y1" class="casilla" value="<?php if (isset($_POST['y1'])) { echo $_POST['y1']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="y2" class="casilla" value="<?php if (isset($_POST['y2'])) { echo $_POST['y2']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="y3" class="casilla" value="<?php if (isset($_POST['y3'])) { echo $_POST['y3']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="y4" class="casilla" value="<?php if (isset($_POST['y4'])) { echo $_POST['y4']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="y5" class="casilla" value="<?php if (isset($_POST['y5'])) { echo $_POST['y5']; } else { echo ''; } ?>" size="2"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla.gif" height="40" width="40" align="center"><input type="text" onFocus="this.select();" maxlength="2" name="y6" class="casilla" value="<?php if (isset($_POST['y6'])) { echo $_POST['y6']; } else { echo ''; } ?>" size="2"></td>
    		<td>&nbsp;</td>
                    <td><input type="button" value="=" class="classinput" onClick="SumaRangosY(this.form)"></td>
                    <td>&nbsp;</td>
                    <td background="imagenes/img_casilla_suma.gif" height="40" width="50" align="center"><input type="text" class="casillaSuma" name="sumaY" value="<?php if (isset($y_suma)) { echo $y_suma; } else { echo '0'; } ?>" onFocus="this.blur();" size="3"></td>
    		<td>&nbsp;</td>
                    <td><input type="button" class="classinput" value="Limpiar" onClick="ClearLimitSuperior(this.form)"></td>
                  </tr>
                  </form>
                  <tr><td colspan="20">&nbsp;</td></tr>
                  <tr>
                     <td colspan="20" align="center">
                       <table border="0" cellpadding="0" cellspacing="3">
                         <tr>
                           <td align="center">
                               <!--<input type="button" class="classinput" name="iniciar" value="INICIAR" onClick="EjecutarSubmit()">-->
                               <a href="#" class="easyui-linkbutton" onClick="EjecutarSubmit()">Iniciar</a>
                           </td>
                           <td align="center">
                               <!--<input type="button" class="classinput" value="LIMPIAR" onClick="EjecutarLimpiar()">-->
                               <a href="#" class="easyui-linkbutton" onClick="EjecutarLimpiar()">Limpiar</a>
                           </td>
                           <td align="center">
                               <a href="#" class="easyui-linkbutton" onClick="location.href='program_generador_combinaciones.php'">Limpiar Todo</a>
                           </td>                                                                   
                         </tr>
                       </table>
                     </td>
                  </tr>
              
              </table>
              
              </td>
              </tr>
              
              <!-- -->
              
              <tr>
                 <td colspan="20" align="center">


</center>
<?php

$aSerieCombinaciones = array();

echo '<script type="text/javascript"> var data = [';
 /*
 if ($authdata['guest'] == "N") {
    $xruta = "/htdocs/skymon/program/download/" . $authdata['login'];
    $fp = fopen($xruta, "w");    
    $direccion = "javascript:location.href='download/".$authdata['login']."';";    
 }
 */


 if (isset($x1) && ($temporal == 1)) {


$x_maxsuma = $x_maxsuma + 1;

 for($i=0; $i<=($y1-$x1); $i++) {  
   $x1_tmp = $x1;
   $xpos = 0;
   while ($x1_tmp <= $y1) {
     $a1[$xpos] = $x1_tmp;
     $x1_tmp++; $xpos++;
   }
 }

 for($i=0; $i<=($y2-$x2); $i++) {  
   $x2_tmp = $x2;
   $xpos = 0;
   while ($x2_tmp <= $y2) {
     $a2[$xpos] = $x2_tmp;
     $x2_tmp++; $xpos++;
   }
 }

 for($i=0; $i<=($y3-$x3); $i++) {  
   $x3_tmp = $x3;
   $xpos = 0;
   while ($x3_tmp <= $y3) {
     $a3[$xpos] = $x3_tmp;
     $x3_tmp++; $xpos++;
   }
 }

 for($i=0; $i<=($y4-$x4); $i++) {  
   $x4_tmp = $x4;
   $xpos = 0;
   while ($x4_tmp <= $y4) {
     $a4[$xpos] = $x4_tmp;
     $x4_tmp++; $xpos++;
   }
 }

 for($i=0; $i<=($y5-$x5); $i++) {  
   $x5_tmp = $x5;
   $xpos = 0;
   while ($x5_tmp <= $y5) {
     $a5[$xpos] = $x5_tmp;
     $x5_tmp++; $xpos++;
   }
 }

 for($i=0; $i<=($y6-$x6); $i++) {  
   $x6_tmp = $x6;
   $xpos = 0;
   while ($x6_tmp <= $y6) {
     $a6[$xpos] = $x6_tmp;
     $x6_tmp++; $xpos++;
   }
 }

/* ------------------ */

 $numero_iteraciones = 0;
 $xcoinciden_criterio = 0;            
 $cont1 = 0;
 while ($cont1 < sizeof($a1)) {   
   $cont2 = 0; $combinaciones[0] = $a1[$cont1];
   while($cont2 < sizeof($a2)) {
     $cont3 = 0; $combinaciones[1] = $a2[$cont2];
     while($cont3 < sizeof($a3)) {
       $cont4 = 0; $combinaciones[2] = $a3[$cont3];
       while ($cont4 < sizeof($a4)) {
         $cont5 = 0; $combinaciones[3] = $a4[$cont4];
         while ($cont5 < sizeof($a5)) {
           $cont6 = 0; $combinaciones[4] = $a5[$cont5];
           while ($cont6 < sizeof($a6)) {
             $combinaciones[5] = $a6[$cont6];
             $xSuma = 0;
             for($i=0; $i<sizeof($combinaciones); $i++ ) {
               $xSuma = $xSuma + $combinaciones[$i];
             }  
             if ($xSuma == $buscarTotal) {               
               $xcoinciden_criterio++;
               $combinaciones_txt = "";
               
               $sCadenaCombinacionesAux = "{";
               $sCadenaAux = "";
               $nSumaAux = 0;
               $nSumaCompAux = 0;
               $nValor = 0;
               $nSecuencia = 0;
               $nSecuenciaComp = 0;
               for($i=0; $i<sizeof($combinaciones); $i++ ) {
                  //$sCadenaAux .= '"n' . ($i + 1) . '":' . $combinaciones[$i] . ', "nc' . ($i + 1) . '":' . $combinaciones[$i]+5 . ',' ;
                  
                  $nValor = $combinaciones[$i];
                  $nSecuencia = ($i + 1);
                  
                  switch ($nSecuencia) {
                      case 1:
                          $nSecuenciaComp = 6;
                          break;
                      case 2:
                          $nSecuenciaComp = 5;
                          break;
                      case 3:
                          $nSecuenciaComp = 4;
                          break;
                      case 4:
                          $nSecuenciaComp = 3;
                          break;
                      case 5:
                          $nSecuenciaComp = 2;
                          break;
                      case 6:
                          $nSecuenciaComp = 1;
                          break;
                  }
                  
                  $sCadenaAux .= '"n' . $nSecuencia . '":' . $nValor . ', "nc' . $nSecuenciaComp . '" : ' . ($x_maxsuma - $nValor) . ', ';
                  
                  $nSumaAux = $nSumaAux + $combinaciones[$i];
                  $nSumaCompAux = $nSumaCompAux + ($x_maxsuma - $nValor);
                  $combinaciones_txt .= $combinaciones[$i] . " ";
               }
               $sCadenaAux = $sCadenaAux . '"suma":' . $nSumaAux . ', "sumac":' . $nSumaCompAux;
               
               $sCadenaCombinacionesAux .= $sCadenaAux . "},";
               $aSerieCombinaciones[] = $sCadenaCombinacionesAux;
               
               /*
               $combinaciones_txt .= " \n";
               if ($authdata['guest'] == 'N') {
                  fwrite($fp, $combinaciones_txt);
               }
               */
             }
             $numero_iteraciones++;
             $cont6++;
           }
           $cont5++;
         }
         $cont4++;
       }  
       $cont3++;
     }
     $cont2++;
   }
   $cont1++;
 }
}

for ($nCount = 0; $nCount < count($aSerieCombinaciones); $nCount++) {

    if ($nCount == (count($aSerieCombinaciones) - 1) ) {
        echo trim($aSerieCombinaciones[$nCount],",");
    } else {
        echo $aSerieCombinaciones[$nCount];
    }

}

echo '];';
echo '</script>';

 if ($authdata['guest'] == 'N') {
    @fclose($fp); 
 }
/* ------------------ */
?>
<center>
                   <table id="dg" title="Serie de Combinaciones" style="width:1160px;height:250px" data-options="singleSelect:true,data:data">
                        <thead>
                            <tr>
                                <th data-options="field:'n1',width:80, align:'center' ,styler:cellStylerN">N1</th>
                                <th data-options="field:'n2',width:80, align:'center' ,styler:cellStylerN">N2</th>
                                <th data-options="field:'n3',width:80, align:'center' ,styler:cellStylerN">N3</th>
                                <th data-options="field:'n4',width:80, align:'center' ,styler:cellStylerN">N4</th>
                                <th data-options="field:'n5',width:80, align:'center' ,styler:cellStylerN">N5</th>
                                <th data-options="field:'n6',width:80, align:'center' ,styler:cellStylerN">N6</th>
                                <th data-options="field:'suma',width:80, align:'center' ,styler:cellStylerN">SUMA</th>
                                <th data-options="field:'sumac',width:80, align:'center' ,styler:cellStylerNC">SUMAC</th>
                                <th data-options="field:'nc6',width:80, align:'center' ,styler:cellStylerNC">NC6</th>
                                <th data-options="field:'nc5',width:80, align:'center' ,styler:cellStylerNC">NC5</th>
                                <th data-options="field:'nc4',width:80, align:'center' ,styler:cellStylerNC">NC4</th>
                                <th data-options="field:'nc3',width:80, align:'center' ,styler:cellStylerNC">NC3</th>
                                <th data-options="field:'nc2',width:80, align:'center' ,styler:cellStylerNC">NC2</th>
                                <th data-options="field:'nc1',width:80, align:'center' ,styler:cellStylerNC">NC1</th>
                                
                            </tr>
                        </thead>
                    </table>
                    
                 </td>
               
                 <script type="text/javascript" src="../incl/easyui/datagrid-filter/datagrid-filter.js"></script>
                    <script type="text/javascript">
                        
                        function cellStylerN(value,row,index){
                            return 'background-color:#fff;color:blue;';
                        }
                        
                        function cellStylerNC(value,row,index){
                            return 'background-color:#fff;color:red;';
                        }
                        
                        $(function(){
                            var dg = $('#dg').datagrid();
                            dg.datagrid('enableFilter', [{
                                field:'n1',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'n2',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'n3',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'n4',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'n5',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'n6',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'nc1',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'nc2',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'nc3',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'nc4',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'nc5',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            },{
                                field:'nc6',
                                type:'numberbox',
                                options:{precision:0},
                                op:['equal','notequal','less','greater']
                            }
                            
                            ]);
                        });
                    </script>
              </tr>
              <tr><td colspan="20" align="center" height="10"></td></tr>
<?php
 if ($authdata['guest'] == 'N') {
?>
              <tr>
                <td colspan="20" align="center" height="20">
                  <p style="font-size:11px;">Para descargar las combinaciones generadas presione el bot&oacute;n 'DOWNLOAD'.</p>
                </td>
              </tr>
              <tr>
                  <td colspan="20" align="center" height="10">
                      
                      <!--<input type="button" class="classinput" value="DOWNLOAD" onClick="<?php echo $direccion; ?>">-->
                      <a href="#" class="easyui-linkbutton" onClick="<?php echo $direccion; ?>">Download</a>
                      
                  </td>
              </tr>
<?php
 }
?>
              <tr><td colspan="20" align="center" style="font: 18px/1.5;"><?php echo 'Combinaciones que cumplen el criterio: <b style="color:#006699;">'.$xcoinciden_criterio.'</b>'; ?></td></tr>
              <tr><td colspan="20" align="center" style="font: 18px/1.5;"><?php echo 'Combinaciones Posibles: <b style="color:#006699;">'.$numero_iteraciones.'</b>'; ?></td></tr>
	     </table>
           </td>
         </tr>
         <tr><td>&nbsp;</td></tr>
         
       </table>
       </center> 
     </td>
     <td width="2" bgcolor="#ffffff"></td>
   </tr>
   <tr>
     <td width="2" height="2" bgcolor="#ffffff"></td>
     <td height="2" bgcolor="#ffffff"></td>
     <td width="2" height="2" bgcolor="#ffffff"></td>
   </tr>
 </table>
</div>
</body>
</html>
<?php
 }
 else { header("Location: http://www.skms.com.mx/"); }
?>