<?php
@session_start();
if (isset($_SESSION["auth_usuario"])) {
$auth_usuario = $_SESSION["auth_usuario"];
include('../conexion.php');
?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<div id="fondoadmin" style="position:absolute;">
  <img src="imagenes/fondo_admin.gif">
</div>
<div id="contenidoadmin" style="position:absolute;">
  <table border="0" cellpadding="0" cellspacing="0" width="500">
   <tr>
     <td>
      <table border="0" cellpadding="0" cellspacing="5" width="100%">
        <tr>
          <?php
            $sql_num_visitas = "select visitas from smusuarios where usuario = '".$auth_usuario['usuario']."'";
            $result_sql_num_visitas = mysql_query($sql_num_visitas, $db);
          ?>
          <td align="right"><b>N&uacute;mero de visitas:</b> <?php echo mysql_result($result_sql_num_visitas, 0, 'visitas') ?></td>
        </tr>
	<tr><td height="45" vAlign="bottom" style="font: 12px/1.5 tahoma;"><strong>¡Bienvenido al Sistema Administrador de SkyMoney!</strong></td></tr>
	<tr>
          <td>
            <table border="0" cellpadding="0" cellspacing="15" width="100%">
            <tr>
              <td>
            <p style="text-align:justify; font: 12px/1.5 tahoma;">
              Esta herramienta administra la Base de Datos de los sorteos del Melate y Revancha, que utiliza el Sistema SkyMoney.
              As&iacute; como tambi&eacute;n los paquetes y servicios que son utilizados en la promoci&oacute;n del Sistema.<br><br>
              El Sistema Administrador cuenta con un cat&aacute;logo de Clientes el cual servira para tener una mejor organizaci&oacute;n de estos.
              <br><br>
              Cualquier duda favor de consultar el manual que se encuentra en el CD que acompaña este Sistema.
            </p>
              </td>
            </tr>
            </table>
          </td>
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