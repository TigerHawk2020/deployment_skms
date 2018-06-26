<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];
$xpagina = $_GET["xpagina"];

$numeropaginas = 17;
if (!isset($xpagina)) {
  $xpagina = 1;
}
?>
<head>
 <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
</head>

<body>

<div id="fondometodo" style="position:absolute;">
 <img src="imagenes/fondo_metodo.gif">
</div>

<div id="metodocontenido" style="position:absolute;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
     <tr>
       <td width="80">&nbsp;</td>
       <td align="center">
        <table border="0" cellpadding="0" cellspacing="10">
             <tr>               
               <td><strong style="font: 10px/1.5 tahoma;">P&aacute;gs.</strong></td>
<?php
             for ($i=1; $i < 17; $i++) {
                echo '<td><a class="navegador" href="program_metodo001.php?xpagina='.$i.'">'.$i.'</a></td>';
             }
?>
             </tr>
           </table>
         </td>
         <td width="80" align="center">
  	  <table border="0" cellpadding="0" cellspacing="0">        
           <tr><td><strong style="font: 10px/1.5 tahoma;">P&aacute;g.</strong></td></tr>
           <tr>
            <td align="center" background="imagenes/img_pag.gif" width="20" height="20"><strong><?php echo $xpagina; ?></strong></td>
           </tr>
          </table>
       </td>
     </tr>
     <tr><td colspan="3" height="30">&nbsp;</td></tr>
</table>
<table border="0" cellpadding="0" cellspacing="15" width="100%">
  <tr>
    <td>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
<?php
   if ($xpagina > 1) {
?>
         <td align="left" width="50"><img src="imagenes/bottom_prev.gif" onMouseOver="this.style.cursor='hand';" alt="Retroceder Página" onClick="location.href='program_metodo001?xpagina=<?php echo $xpagina-1; ?>';"></td>
<?php
   }
?>
         <td align="center">
           &nbsp;
         </td>
<?php
   if ($xpagina < $numeropaginas-1) {
?>
         <td align="right" width="50"><img src="imagenes/bottom_next.gif" onMouseOver="this.style.cursor='hand';" alt="Avanzar Página" onClick="location.href='program_metodo001.php?xpagina=<?php echo $xpagina+1; ?>';"></td>
<?php
   }
?>        
         </tr>
      </table>
    </td>
  </tr>
<?php
if ($xpagina < $numeropaginas) {

 switch($xpagina) {
   case 1: include('program_metodopagina1.php');
           break;
   case 2: include('program_metodopagina2.php');
           break;
   case 3: include('program_metodopagina3.php');
           break;
   case 4: include('program_metodopagina4.php');
           break;
   case 5: include('program_metodopagina5.php');
           break;
   case 6: include('program_metodopagina6.php');
           break;
   case 7: include('program_metodopagina7.php');
           break;
   case 8: include('program_metodopagina8.php');
           break;
   case 9: include('program_metodopagina9.php');
           break;
   case 10: include('program_metodopagina10.php');
           break;
   case 11: include('program_metodopagina11.php');
           break;
   case 12: include('program_metodopagina12.php');
           break;
   case 13: include('program_metodopagina13.php');
           break;
   case 14: include('program_metodopagina14.php');
           break;
   case 15: include('program_metodopagina15.php');
           break;
   case 16: include('program_metodopagina16.php');
           break;

 }

}
?>
  <tr>
    <td>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
<?php
   if ($xpagina > 1) {
?>
         <td align="left" width="50"><img src="imagenes/bottom_prev.gif" onMouseOver="this.style.cursor='hand';" alt="Retroceder Página" onClick="location.href='program_metodo001?xpagina=<?php echo $xpagina-1; ?>';"></td>
<?php
   }
?>
         <td align="center">
           <table border="0" cellpadding="0" cellspacing="10">
             <tr>
               <td><img src="imagenes/img_paginas.gif" alt="Páginas"></td>
<?php
             for ($i=1; $i < 17; $i++) {
                echo '<td><a class="navegador" href="program_metodo001.php?xpagina='.$i.'">'.$i.'</a></td>';
             }
?>             
             </tr>
           </table>
         </td>
<?php
   if ($xpagina < $numeropaginas-1) {
?>
         <td align="right" width="50"><img src="imagenes/bottom_next.gif" onMouseOver="this.style.cursor='hand';" alt="Avanzar Página" onClick="location.href='program_metodo001.php?xpagina=<?php echo $xpagina+1; ?>';"></td>
<?php
   }
?>        
         </tr>
      </table>
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