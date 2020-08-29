<?php 
include('fecha.php'); 
include('conexion.php'); 

$xfecha_hoy = date('Y-m-d');
$sql_busca_ip_hoy = "select * from smvisitas where ";
$sql_busca_ip_hoy .= "ip = '" . getenv('REMOTE_ADDR') . "' and ";
$sql_busca_ip_hoy .= "fecha = '".$xfecha_hoy."'";
$result_sql = mysql_query($sql_busca_ip_hoy, $db);
if (!mysql_num_rows($result_sql)) {

    $sql_update_visitas = "insert into smvisitas set ";
    $sql_update_visitas .= "ip = '" . getenv('REMOTE_ADDR') . "', ";
    $sql_update_visitas .= "fecha = '".$xfecha_hoy."'";
    mysql_query($sql_update_visitas, $db);

}

if (!isset($_GET["xopcion"])) { $xopcion = 1; } else { $xopcion = $_GET["xopcion"];}

switch($xopcion) {
         case 1:  $text_titulo = 'Home';
                     break;
         case 2: $text_titulo = 'Qu&eacute; es SkyMoney System';
                    break;
         case 3: $text_titulo = 'C&oacute;mo adquirirlo';
                    break;
         case 4: $text_titulo = 'Paquetes SkyMoney System';
                    break;
         case 5: $text_titulo = 'C&oacute;mo Surge SkyMoney System';
                    break;
         case 6: $text_titulo = 'Informaci&oacute;n de Contacto';
                    break;
         case 7: $text_titulo = 'Ventajas de una Membres&iacute;a SkyMoney';
                    break;
         case 8: $text_titulo = 'Libro de Visitas SkyMoney System';
                    break;
         case 9: $text_titulo = 'Juegos en los que puedo utilizar el SkyMoney';
                    break;
 }                        

?>
<html>
<head>
<meta http-equiv="Content-Language" content="es-mx">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="description" content="Sistema Gráfico - Analítico que tiene el objetivo de formar una o varias combinaciones...">
<meta name="keywords" content="melate,jugar melate,revancha,ganar melate">
<title> SkyMoney System - <?php echo $text_titulo; ?> </title>
<script type="text/javascript" src="funciones_sm_portal.js"></script>
<script language="JavaScript">
<!--//
function cerrar_Win() {
  if (confirm('Cerrar Ventana')) {
    
  }
}
if (navigator.appName == "Microsoft Internet Explorer")
	{document.write('<LINK HREF="skymoney_style_explorer.css" REL="STYLESHEET" TYPE="text/css">')}
else
	{document.write('<LINK HREF="skymoney_style_netscape.css" REL="STYLESHEET" TYPE="text/css">')}

//-->	
</script>

</head>

<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onLoad="MM_preloadImages('imagenes/interfaz_SM_v121.gif', 'imagenes/interfaz_SM_v123.gif', 'imagenes/interfaz_SM_v123.gif', 'imagenes/bg_linea_punteada.gif', 'imagenes/img_bottom_opc.gif', 'imagenes/interfaz_SM_v22.gif', 'imagenes/img_bottom_opc2.gif')">

<div id="fondo" style="position:absolute;">
  <img src="imagenes/interfaz_SM_v22.gif">
</div>

<div id="contenido" style="position:absolute;">
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="445" bordercolor=red>
 <tr>
      <td height="88">
       <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
         <tr>
             <td background="imagenes/interfaz_SM_v11.gif" width="370">
              <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
               <tr><td>&nbsp;</td></tr>
               <tr><td class="fecha" height="15">&nbsp;Coatzacoalcos, Ver. <?php echo $fecha_d_hoy; ?></td></tr>
              </table>
             </td>
             <td vAlign="top">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr><td width="410" height="20"><img src="imagenes/interfaz_SM_v121.gif"></td></tr>
                <tr><td width="410" height="50"><img src="imagenes/interfaz_SM_v122.gif"></td></tr>
                <tr><td width="410" height="10"><img src="imagenes/interfaz_SM_v123.gif"></td></tr>
              </table>
             </td>
         </tr>
       </table>
      </td>
 </tr>
 <tr>
      <td vAlign="top">
           <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
             <tr>
                <!-- Columna izquierda -->
                <td width="160" vAlign="top">
                    <?php include('sm_menuprincipal.php'); ?>
                </td>
                <!-- Termina Columna izquierda -->
                <!-- Columna Centro -->
                <td vAlign="top" align="center" width="<?php if ($xopcion == 1) { echo '480'; }?>">
					
                    <?php 
					
                         switch($xopcion) {
                          case 1:  include('portada_principal.php'); 
                                      break;
                          case 2: include('que_es_skymoney.php'); 
                                      break;
                          case 3: include('como_adquirirlo.php'); 
                                      break;
                          case 4: include('paquetes.php'); 
                                      break;
                          case 5: include('como_surge.php'); 
                                      break;
                          case 6: include('contactos.php'); 
                                      break;
                          case 7: include('ventajas_membresia.php'); 
                                      break;
                          case 8: include('libro_visitas.php'); 
                                      break;
                          case 9: include('otros_juegos.php'); 
                                      break;
                         }                        
					
                    ?>
					
                </td>
                <!-- Termina Columna Centro -->
                <!-- Columna derecha -->
                <td width="<?php if ($xopcion == 1) { echo '150'; } else { echo '10'; } ?>" vAlign="top">
                    <?php 
                         switch($xopcion) {
                          case 1:  include('columna_der_principal.php'); 
                                   break;
                          default: echo "&nbsp;";
                         }                        

                    ?>
                </td>
                <!-- Termina Columna Derecha -->
             </tr>
           </table>
      </td>
 </tr>
 <tr>
   <td height="10" align="center">
     <table border="0" cellpadding="0" cellspacing="0">
       <tr>
         <td class="txt11td">IE</td>
         <td width="50" align="center"><img src="imagenes/explorer.gif"></td>
         <td class="txt11td">Resoluci&oacute;n M&iacute;nima 800x600 p&iacute;xeles</td>
      </tr>
    </table>
  </td>
 </tr> 
 <tr>
   <td  height="10" bgcolor="#ffffff" vAlign="middle" align="left" class="txtcopy">
    <table border="0" cellpadding="0" cellspacing="0">
       <tr>
         <td class="txt9contenido" bgcolor="#ffffff" width="50" onMouseOut="ColorOut(this,'#ffffff');" onMouseOver="ColorIn(this,'#003366');"><img src="imagenes/img_acceso_admin.gif" onClick="OpenAWindow('admin/admin_index.php','ShowInfo',680,450);"></td>
         <td class="txt9contenido" width="190">&nbsp;</td>
         <td class="txtcopy">&copy; <?php echo date("Y"); ?> SkyMoney System. Reservados todos los derechos.</td>
      </tr>
    </table>      
   </td>
 </tr>
</table>
</div>
</body>
</html>