<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {

?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
<script language="JavaScript">

  function cancelar_opcion() {
    window.location.href='admin_premiosrevancha001.php'
  }
  
</script>
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
 <center>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center">
       <img align="center" src="imagenes/titulo_ganadoresrevancha.gif">
      </td>
    </tr>  
    <tr><td align="center" height="40">Introduzca el N&uacute;mero del Sorteo.</td></tr>
    <tr>
       <td vAlign="top" align="center">
	<table border="0" cellpadding="0" cellspacing="0" bgcolor="#eeeeee">
               <form action="admin_premiosrevancha001.php" method="post">
	        <tr>
                   <td width="5" height="25"><img src="imagenes/top_barra_izq.gif"></td>
                   <td width="50" height="25">&nbsp;</td>
                   <td width="135"><b>N&uacute;mero del SORTEO:</b></td>
                   <td width="5">&nbsp;</td>
                   <td width="45"><input type="text" name="xnumsorteo" value="0" maxlenght="10" size="5" style="text-align:'right';" onFocus="this.select();"></td>
                   <td width="5">&nbsp;</td>
                   <td width="50"><input type="button" class="button" value="Buscar" onClick="valida_busqueda_sorteo_01(this.form)"></td>
                   <td width="50">&nbsp;</td>
                   <td width="5" height="25"><img src="imagenes/top_barra_der.gif"></td>
                </tr>
               </form>
	</table>
       </td>
    </tr>    
<?php

/* Esta condicion pregunta si existe la variable que sirve para confirmar las acciones de guardar y modificar */

if (isset($confirmacion)) {
   switch ($confirmacion) {
    case 1: echo '<tr><td align="center"><b>El nuevo registro se guardo satisfactoriamente.</b></td></tr>';
               break;
    case 2: echo '<tr><td align="center"><b>Las actualizaciones se realizaron satisfactoriamente.</b></td></tr>';
               break;
                                  }
                                 }
/* ------------------------------------------------------------------------------------------------------*/

if (isset($xnumsorteo)) {
      $sql_busca_sorteo = "select sorteo from smdbrevancha where sorteo=$xnumsorteo";
      $resultado_busca_sorteo = mysql_query($sql_busca_sorteo, $db);
      if (mysql_num_rows($resultado_busca_sorteo)) {
         $sql_busca_premios = "select * from smresult_revancha where sorteo=$xnumsorteo";
         $resultado_busca_premios = mysql_query($sql_busca_premios, $db);
         if (!mysql_num_rows($resultado_busca_premios)) {
?>
<form action="admin_premiosrevancha002.php" method="post">
<input type="hidden" name="accion" value="1">
<input type="hidden" name="xnumsorteo" value="<?php echo $xnumsorteo; ?>">
    <tr><td align="center" height="30"><b>Registro de Ganadores y Premios del Sorteo: <?php echo $xnumsorteo; ?></b></td></tr>
    <tr><td vAlign="top" align="center">
    <?php
       $aciertos[0] = 'Seis n&uacute;meros naturales';
       $aciertos[1] = 'Cinco n&uacute;meros naturales';
       $aciertos[2] = 'Cuatro n&uacute;meros naturales';
    ?>
       <table border="1" cellpadding="0" cellspacing="0" bordercolor="#dddddd">
          <tr>
             <td width="40" align="center" bgcolor="#eeeeee">Lugar</td>
             <td width="250" align="center" bgcolor="#eeeeee">Aciertos</td>
             <td width="100" align="center" bgcolor="#eeeeee">Ganadores</td>
             <td width="100" align="center" bgcolor="#eeeeee">Premio</td>
          </tr>
      <?php
         for ($cont=0; $cont<3; $cont++) {
      ?>
          <tr>
             <td align="center"><?php echo $cont+1; ?>º</td>
             <td>&nbsp;<?php echo $aciertos[$cont]; ?></td>
             <td align="center"><input type="text" name="xganador<?php echo $cont+1; ?>" style="width:100%; text-align:center;" value="---" onFocus="this.select();"></td>
             <td align="center"><input type="text" name="xpremio<?php echo $cont+1; ?>" style="width:100%; text-align:center;" value="---" onFocus="this.select();"></td>
          </tr>
       <?php                          
                                                       }
       ?>
       </table>
    <tr><td align="center" height="40"><input type="submit" class="button" value="Guardar">&nbsp;<input type="button" class="button" value="Cancelar" onClick="cancelar_opcion()"></td></tr>
    </td></tr>
</form>
<?php
                       } /* no existe registro de premios y ganadores */

      else { /* si existe registro de premios */
?>
<form action="admin_premiosrevancha002.php" method="post">
<input type="hidden" name="accion" value="2">
<input type="hidden" name="xnumsorteo" value="<?php echo $xnumsorteo; ?>">
    <tr><td align="center" height="30"><b>Actualizaci&oacute;n de Ganadores y Premios del Sorteo: <?php echo $xnumsorteo; ?></b></td></tr>
    <tr><td vAlign="top" align="center">
    <?php
       $aciertos[0] = 'Seis n&uacute;meros naturales';
       $aciertos[1] = 'Cinco n&uacute;meros naturales';
       $aciertos[2] = 'Cuatro n&uacute;meros naturales';
    ?>
       <table border="1" cellpadding="0" cellspacing="0" bordercolor="#dddddd">
          <tr>
             <td width="40" align="center" bgcolor="#eeeeee">Lugar</td>
             <td width="250" align="center" bgcolor="#eeeeee">Aciertos</td>
             <td width="100" align="center" bgcolor="#eeeeee">Ganadores</td>
             <td width="100" align="center" bgcolor="#eeeeee">Premio</td>
          </tr>
<?php
   $sql_busca_premios_sorteo = "select lugar, ganadores, premio from smresult_revancha where sorteo = $xnumsorteo";
   $result_busca_premios_sorteo = mysql_query($sql_busca_premios_sorteo);
   $cont = 0;
   while ($fila = mysql_fetch_array($result_busca_premios_sorteo)) {
?>
          <tr>
             <td align="center"><?php echo $fila['lugar']; ?>º</td>
             <td>&nbsp;<?php echo $aciertos[$cont]; ?></td>
             <td align="center"><input type="text" name="xganador<?php echo $fila['lugar']; ?>" style="width:100%; text-align:center;" value="<?php echo $fila['ganadores']; ?>" onFocus="this.select();"></td>
             <td align="center"><input type="text" name="xpremio<?php echo $fila['lugar']; ?>" style="width:100%; text-align:center;" value="<?php echo $fila['premio']; ?>" onFocus="this.select();"></td>
          </tr>
<?php
             $cont++;
             } /* Termina el ciclo que despliega los premios del sorteo  */
?>           
        </table>
     </td></tr>     
     <tr><td align="center" height="40"><input type="submit" class="button" value="Actualizar">&nbsp;<input type="button" class="button" value="Cancelar" onClick="cancelar_opcion()"></td></tr>
</form>
<?php
            }

                    } /* si existe el sorteo */

      else {
?>
<tr><td colspan="4" height="40" align="center"><b>El #SORTEO: <?php echo $xnumsorteo; ?>, No se encuentra registrado en la B.D.</b></td></tr>
<?php
            }   
   } /* cierre de la busqueda */
?>
  </table>
 </center>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>