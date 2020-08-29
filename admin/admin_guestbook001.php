<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

if (!isset($modificar)) { 
$accion = 1; 
$tit_accion = 'Registro de una Nueva Membres&iacute;a GUEST';
$xidcliente = '';
}

else {
$accion = 2;
$tit_accion = 'Actualizaci&oacute;n de la Membres&iacute;a GUEST';
$sql_busc_cliente = "select * from smclientes where idcliente=$xidcliente";
$result_sql_busc_cliente = mysql_query($sql_busc_cliente, $db);
while ($fila = mysql_fetch_array($result_sql_busc_cliente)) {
   $campo = array("nombre_s"=>$fila['nombre_s'], "login"=>$fila['login'], "password"=>$fila['password']);
 }

     }

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_guest001.php'
  }

  function nuevaposicion() {
    window.scrollTo(100,380);
  }
  
</script>
</head>
<?php
  if (isset($BuscaCliente)) {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="MM_preloadImages('imagenes/titulo_adminguestbook.gif'); nuevaposicion()">
<?php
             }
  else {
?>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onLoad="MM_preloadImages('imagenes/titulo_adminguestbook.gif')">
<?php
        }
?>
<center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center" colspan="4"><img src="imagenes/titulo_adminguestbook.gif"></td>
    </tr> 
    <tr>
      <td align="center" colspan="4">&nbsp;</td>
    </tr> 
<?php
  $sql_select_visitas = "select * from smlibrovisitas";
  $result_sql_select_visitas = mysql_query($sql_select_visitas, $db);
  if (mysql_num_rows($result_sql_select_visitas)) {
      $numvisitas = mysql_num_rows($result_sql_select_visitas);
      $cociente = $numvisitas / 5;
      $residuo = $numvisitas % 5;

      if (!isset($xAvPag)) {
          $xAvPag = 0;
      }
  
      if ($residuo >= 0) {
         $numpaginas = $cociente + 1;
      }
      else {
         $numpaginas = $cociente;
  }
?>
    <tr>      
      <td>&nbsp;</td>
      <td><b>Comentarios Actuales:</b> <?php  echo $numvisitas; ?></td>
      <td align="right">
<table border="0" cellpadding="0" cellspacing="5">
            <tr>
              <td><b>P&aacute;ginas<b></td>
<?php
  $xcont = 0;
  for($i=1; $i<$numpaginas; $i++) { 
?>
              <td class="txt9contenido"><a class="navegador" href="admin_guestbook001.php?xAvPag=<?php echo $xcont; ?>"><?php echo $i; ?></a></td>
<?php          
   $xcont = $xcont + 5;
  }
?>
            </tr>
</table>
      </td>
      <td>&nbsp;</td>
    </tr>   
<?php
  }
  
  else {
?>
    <tr>
      <td align="center" colspan="4" height="50"><b>No se encontro ningun registro en el Libro de Visitas.</b></td>
    </tr>   
<?php
        }
?>
    <tr>
      <td align="center" colspan="4">&nbsp;</td>
    </tr>    
<?php
  $select_libro = "select * from smlibrovisitas order by idvisita desc limit ".$xAvPag.",5";
  $result_select = mysql_query($select_libro, $db);

  if (mysql_num_rows($result_sql_select_visitas)) {

  while ($fila = mysql_fetch_array($result_select)) {
    if ($fila['publicar'] == 'S') {
        $xchecked = 'checked';
        $xbgcolor='#aaaaaa';
    }
    else {
             $xchecked = '';         
             $xbgcolor='red';
          }
?>
    <tr>
      <td width="100" vAlign="top">
         <table border="0" cellpadding="0" cellspacing="4" width="100%"> 
           <tr>
              <td align="right"><b>ID:</b></td>
              <td><?php echo $fila['idvisita']; ?></td>
           </tr>
           <tr>
              <form action="admin_guestbook002.php" method="post">
              <input type="hidden" name="accion" value="1">
              <input type="hidden" name="xidvisita" value="<?php echo $fila['idvisita']; ?>">
              <input type="hidden" name="xAvPag" value="<?php echo $xAvPag; ?>">
              <td align="center"><input type="checkbox" name="xpublicar" <?php echo $xchecked; ?> ></td>
              <td><a href="#" onclick="javascript:submit()">Publicar</a></td>
              </form>
           </tr>
           <tr>
              <td align="center"><img src="imagenes/img_delete.gif" onclick="javascript:location.href='admin_guestbook002.php?xidvisita=<?php echo $fila['idvisita']; ?>&accion=2'" onMouseOver="this.style.cursor='hand';"></td>
              <td><a href="admin_guestbook002.php?xidvisita=<?php echo $fila['idvisita']; ?>&accion=2">Eliminar</a></td>
           </tr>
         </table>
      </td>
      <td align="center" colspan="2">
         <table border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td bgcolor="<?php echo $xbgcolor; ?>" width="20" align="center" height="30"><img align="center" src="../imagenes/user.gif"></td>
               <td width="10" bgcolor="#eeeeee">&nbsp;</td>
               <td class="txt9titulo" width="400" bgcolor="#eeeeee"><?php echo $fila['nombre'].' '.$fila['apellidos']; ?></td>
               <td width="150" class="txt9titulo" bgcolor="#eeeeee" align="right"><b><?php echo $fila['fecha']; ?>&nbsp;</b></td>
             </tr>
             <tr><td bgcolor="#bbbbbb" colspan="4"><spacer height="1" type="block"></td></tr>
             <tr>
               <td bgcolor="<?php echo $xbgcolor; ?>" width="20" align="center" height="30"><img align="center" src="../imagenes/email.gif"></td>
               <td width="10" bgcolor="#eeeeee">&nbsp;</td>
               <td class="txt9titulo" colspan="2" bgcolor="#eeeeee"><a href="mailto:<?php echo $fila['email']; ?>" class="email2guestbook"><?php echo $fila['email']; ?></a></td>
             </tr>
             <tr><td bgcolor="#bbbbbb" colspan="4"><spacer height="1" type="block"></td></tr>
             <tr>
               <td td colspan="4">
               <table border="0" cellpadding="0" cellspacing="10" width="100%" height="100%" bgcolor="#eeeeee">
               <tr>
               <td class="txt9titulo" bgcolor="#eeeeee">
                  <b>Comentario:</b><br><br>
                  <?php echo nl2br($fila['comentario']); ?>
               </td>
               </tr>
               </table>
               </td>
             </tr>
             <tr><td  colspan="2">&nbsp;</td></tr>
         </table>     
      </td>
      <td>&nbsp;</td>
    </tr> 
<?php
        }
    }
?>

    <tr>
      <td align="center" colspan="4">&nbsp;</td>
    </tr> 
 </table>
</center>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>