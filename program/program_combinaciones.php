<?php
@session_start();
include('../conexion.php');
if (session_is_registered("authdata")) {

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

/* ------------------ */

?>

<html>
<script type="text/javascript" src="funciones_program.js"></script>
<style type="text/css">

body {
FONT: 11px/1.5 verdana;
background:#ffffff;
scrollbar-face-color : #66CCFF;
scrollbar-shadow-color : #336699;
scrollbar-highlight-color : #336699;
scrollbar-3dlight-color : #ffffff;
scrollbar-darkshadow-color : #ffffff;
scrollbar-track-color : #ffffff;
scrollbar-arrow-color : #336699;
}

</style>
<head>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
  <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
      <td vAlign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#ffffff">
          <tr>
           <td vAlign="top">
             <table border="0" cellpadding="0" cellspacing="1" width="100%" bgcolor="#dddddd">
<?php

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
             for($i=0; $i<sizeof($combinaciones); $i++) {
               $xSuma = $xSuma + $combinaciones[$i];
             }  
             if ($xSuma == $buscarTotal) {               
               $xcoinciden_criterio++;
?>
		<tr onMouseOver="cambia_color1(this, '#eeeeee')" onMouseOut="cambia_color2(this, '#ffffff')">
<?php
               for ($i=0; $i<sizeof($combinaciones); $i++) {
?>
                  <td>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#ffffff">
                      <tr><td align="center" style="font-family:tahoma; font-size:18px"><?php echo $combinaciones[$i]; ?></td></tr>
                    </table>
                  </td>     
<?php
               }
?>
                </tr>
<?php
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
?>             
             </table>
           </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
<?php

  }

 }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>