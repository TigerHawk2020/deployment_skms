<?php

 if (isset($_POST['x1'])) {
     
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
     
   $x_suma = $x1 + $x2 + $x3 + $x4 + $x5 + $x6;
   $y_suma = $y1 + $y2 + $y3 + $y4 + $y5 + $y6;
 }

?>
<html>
<head>
  <title>Combinador</title>
  
  <style type="text/css">
    body {
           font-family: Tahoma, Verdana;
           font-size: 12px;
         }
    td {
           font-family: Tahoma, Verdana;
           font-size: 12px;
         }
    input {
           font-family: Tahoma, Verdana;
           font-size: 12px;
         }
    select {
           font-family: Tahoma, Verdana;
           font-size: 12px;
         }
  </style>
  <script language="JavaScript">
     
     function sumaRango_X(xforma) {
        xforma.sumaX.value = parseInt(xforma.x1.value) + parseInt(xforma.x2.value) + parseInt(xforma.x3.value) + parseInt(xforma.x4.value) + parseInt(xforma.x5.value) + parseInt(xforma.x6.value);
     }

     function sumaRango_Y(xforma) {
        xforma.sumaY.value = parseInt(xforma.y1.value) + parseInt(xforma.y2.value) + parseInt(xforma.y3.value) + parseInt(xforma.y4.value) + parseInt(xforma.y5.value) + parseInt(xforma.y6.value);
     }

  </script>
  
</head>
<body>
  <table border="0" cellpadding="0" cellspacing="3">
    <tr>
      <td colspan="9" align="center"><b>RANGOS PARA LA POWER BALL</b></td>
    </tr>
    <tr>
      <td colspan="9" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">N1</td>
      <td align="center">N2</td>
      <td align="center">N3</td>
      <td align="center">N4</td>
      <td align="center">N5</td>
      <td>&nbsp;</td>
      <td align="center">PWB</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <form action="generador_pwb.php" method="post">
    <tr>
      <td><input type="text" name="x1" onfocus="this.select();" size="5" value="<?php if (isset($x1)) { echo $x1; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="x2" onfocus="this.select();" size="5" value="<?php if (isset($x2)) { echo $x2; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="x3" onfocus="this.select();" size="5" value="<?php if (isset($x3)) { echo $x3; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="x4" onfocus="this.select();" size="5" value="<?php if (isset($x4)) { echo $x4; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="x5" onfocus="this.select();" size="5" value="<?php if (isset($x5)) { echo $x5; } else { echo '0'; } ?>"></td>
      <td>&nbsp;</td>
      <td><input type="text" name="x6" onfocus="this.select();" size="5" style="background-color:#cccccc;" value="<?php if (isset($x6)) { echo $x6; } else { echo '0'; } ?>"></td>
      <td><input type="button" value="=" onClick="sumaRango_X(this.form)"></td>
      <td><input type="text" name="sumaX" size="5" value="<?php if (isset($x_suma)) { echo $x_suma; } else { echo '0'; } ?>"></td>
    </tr>
    <tr>
      <td><input type="text" name="y1" onfocus="this.select();" size="5" value="<?php if (isset($y1)) { echo $y1; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="y2" onfocus="this.select();" size="5" value="<?php if (isset($y2)) { echo $y2; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="y3" onfocus="this.select();" size="5" value="<?php if (isset($y3)) { echo $y3; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="y4" onfocus="this.select();" size="5" value="<?php if (isset($y4)) { echo $y4; } else { echo '0'; } ?>"></td>
      <td><input type="text" name="y5" onfocus="this.select();" size="5" value="<?php if (isset($y5)) { echo $y5; } else { echo '0'; } ?>"></td>
      <td>&nbsp;</td>
      <td><input type="text" name="y6" onfocus="this.select();" size="5" style="background-color:#cccccc;" value="<?php if (isset($y6)) { echo $y6; } else { echo '0'; } ?>"></td>
      <td><input type="button" value="=" onClick="sumaRango_Y(this.form)"></td>
      <td><input type="text" name="sumaY" size="5" value="<?php if (isset($y_suma)) { echo $y_suma; } else { echo '0'; } ?>"></td>
    </tr>
    <tr>
      <td colspan="9">
        <table border="0" cellpadding="0" cellspacing="3">
           <tr>
             <td>Total a buscar:</td>
             <td><input type="text" name="buscarTotal" size="5" value="<?php if (isset($buscarTotal)) { echo $buscarTotal; } else { echo ''; } ?>"></td>
           </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="9"><input type="submit" value="Iniciar"></td>
    </tr>
    </form>
<?php
  if (isset($x1)) {

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

print '
    <tr>
      <td colspan="9">
         <select name="xcombinaciones" size="8" style="width:200;">
      ';

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
               echo '<option>';              
               for($i=0; $i<sizeof($combinaciones); $i++ ) {
                  echo $combinaciones[$i].'&nbsp;&nbsp;&nbsp;&nbsp;';
               }
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
 print '
           </select>
         </td>
       </tr>';
 echo '<tr><td colspan="9">Combinaciones que cumplen el criterio: '.$xcoinciden_criterio.'</td></tr>';
 echo '<tr><td colspan="9">Combinaciones Posibles: '.$numero_iteraciones.'</td></tr>';

 }
?>
  </table>
</body>
</html>
