<?php

//include("conexion.php");

?>
<table border="0" cellpadding="0" cellspacing="10" width="100%">
   <tr><td bgcolor="#cccccc" background="imagenes/bg_linea_punteada.gif" height="1"></td></tr>
   <tr><td><img src="imagenes/titulo_librovisitas.gif"></td></tr> 
   <tr>
    <td>
     <table border="0" cellpadding="0" cellspacing="5" bordercolor="#cccccc">       
       <tr>
          <td class="txtcontenido">
            <p style="text-align:justify;">
              ESTIMADO VISITANTE:
esta secci&oacute;n fue hecha con el fin de saber su opini&oacute;n, , sugerencia o duda, con respecto a nuestro sistema y su funcionamiento, nuestro objetivo es que ud. este  bien informado  y  lo  pueda usar  con  el  m&aacute;ximo  provecho  y  brindarle  los  mayores apoyos , para que ud.  tenga &eacute;xito, lo cual nos llenaria de satisfacci&oacute;n.

Por favor  llene el siguiente formulario y denos  su invaluable  opinion, o escribanos  su duda y nosotros se  la  trataremos de aclarar, lo mas pronto posible. Gracias
            </p>
          </td>
       </tr>       
<?php
  if (!isset($_GET['msg'])) {  
?>
       <tr><td>&nbsp;</td></tr>
<?php
  }
  elseif ($_GET['msg'] == 1) {
?>
       <tr><td align="center" class="txtcontenido" height="50"><b>Gracias por firmar nuestro libro de visitas.</b></td></tr>    
<?php
  } else {
?>
       <tr><td align="center" class="txtcontenido" height="50"><b>Su información es importante para nosotros.<br>No deje campos vac&iacute;os.</b></td></tr>    
<?php
         }
?>
       <tr>
        <td align="center">
          <form action="procesar_visita.php" method="post" name="formlibro">
          <table border="0" cellpadding="0" cellspacing="5" width="450">
            <tr>
              <td class="txt11titulo"><b>Nombre(s):</b></td>
              <td>&nbsp;</td>
              <td><input type="text" name="xnombre" size="25"></td>
            </tr>
            <tr>
              <td class="txt11titulo"><b>Apellidos:</b></td>
              <td>&nbsp;</td>
              <td><input type="text" name="xapellidos" size="25"></td>
            </tr>
            <tr>
              <td class="txt11titulo"><b>E-mail:</b></td>
              <td>&nbsp;</td>
              <td><input type="text" name="xemail" size="25" value="@"></td>
            </tr>
	    <tr><td colspan="3" class="txt11titulo" style="text-align=justify;">Estimado usuario: favor de redactar en el recuadro de abajo su opini&oacute;n, duda o sugerencia lo mas concisa que le sea posible ya que en este recuadro solo podra usar como m&aacute;ximo 300 palabras.
            </td>
            </tr>
            <tr>
               <td colspan="3" align="center">
                <textarea name="xcomentario" cols="35" rows="7"></textarea>
               </td>
            </tr>
            <tr>
               <td colspan="3" align="center">
                <table border="0" cellpadding="5" cellspacing="5">
                  <tr>
                    <td><input type="submit" value="Enviar"></td>
                    <td><input type="reset" value="Borrar"></td>
                  </tr>
                </table>
               </td>
            </tr>
          </table>
          </form>
        </td>
       </tr>
<?php
  $sql_select_visitas = "select * from smlibrovisitas where publicar = 'S'";
  $result_sql_select_visitas = mysql_query($sql_select_visitas, $db);
  if (mysql_num_rows($result_sql_select_visitas)) {

  $numvisitas = mysql_num_rows($result_sql_select_visitas);
  $cociente = $numvisitas / 5;
  $residuo = $numvisitas % 5;

  if (!isset($_GET['xAvPag'])) {
    $xAvPag = 0;
  } else {
  	$xAvPag = $_GET['xAvPag'];
  }
  
  if ($residuo >= 0) {
     $numpaginas = $cociente + 1;
  }
  else {
     $numpaginas = $cociente;
  }
?>
      <tr>
        <td align="left">
          <table border="0" cellpadding="0" cellspacing="5">
            <tr>
              <td class="txt9contenido">P&aacute;ginas</td>
<?php
  $xcont = 0;
  for($i=1; $i<$numpaginas; $i++) { 
?>
              <td class="txt9contenido"><a class="guestbook" href="index.php?xopcion=8&xAvPag=<?php echo $xcont; ?>"><?php echo $i; ?></a></td>
<?php          
   $xcont = $xcont + 5;
  }
?>
              <td class="txt9contenido" width="500" align="right"><b>Comentarios: <?php echo $numvisitas; ?></b></td>
            </tr>
          </table>
        </td>
      </tr>
<?php
  $select_libro = "select * from smlibrovisitas where publicar = 'S' order by idvisita desc limit ".$xAvPag.",5";
  $result_select = mysql_query($select_libro, $db);
  while ($fila = mysql_fetch_array($result_select, MYSQL_ASSOC)) {

?>

       <tr>
         <td>
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
               <td bgcolor="#aaaaaa" width="20" align="center" height="30"><img align="middle" src="imagenes/user.gif"></td>
               <td width="10" bgcolor="#eeeeee">&nbsp;</td>
               <td class="txt9titulo" width="400" bgcolor="#eeeeee"><?php echo $fila['nombre'].' '.$fila['apellidos']; ?></td>
               <td width="150" class="txt9titulo" bgcolor="#eeeeee" align="right"><b><?php echo $fila['fecha']; ?>&nbsp;</b></td>
             </tr>
             <tr><td bgcolor="#bbbbbb" colspan="4">&nbsp;</td></tr>
             <tr>
               <td colspan="4">
               <table border="0" cellpadding="0" cellspacing="10" width="100%" height="100%" bgcolor="#eeeeee">
               <tr>
               <td class="txt9titulo" bgcolor="#eeeeee">
                  <b>Comentario:</b><br><br>
                  <?php echo nl2br($fila['comentario']); ?>
               </td>
               </tr>
               </table>
             </tr>
           </table>
         </td>
       </tr>
<?php
       }
     }
  
  if (mysql_num_rows($result_sql_select_visitas)) {

  $numvisitas = mysql_num_rows($result_sql_select_visitas);
  $cociente = $numvisitas / 5;
  $residuo = $numvisitas % 5;
  
  if ($residuo >= 0) {
     $numpaginas = $cociente + 1;
  }
  else {
     $numpaginas = $cociente;
  }
?>
      <tr>
        <td align="left">
          <table border="0" cellpadding="0" cellspacing="5">
            <tr>
              <td class="txt9contenido">P&aacute;ginas</td>
<?php
  $xcont = 0;
  for($i=1; $i<$numpaginas; $i++) { 
?>
              <td class="txt9contenido"><a class="guestbook" href="index.php?xopcion=8&xAvPag=<?php echo $xcont; ?>"><?php echo $i; ?></a></td>
<?php          
   $xcont = $xcont + 5;
  }
?>
            </tr>
          </table>
<?php
}
?>
        </td>
      </tr>     
     </table>
    </td>
   </tr>
</table>