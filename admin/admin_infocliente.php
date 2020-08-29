<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
?>
<html>
<head>
<script type="text/javascript" src="funciones_admin.js"></script>
<title>Informaci&oacute;n del Cliente:</title>
<LINK REL=STYLESHEET HREF="smadmin_style_explorer.css" TYPE="text/css">
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

<div id="fondoinfo" style="position:absolute;">
  <img src="imagenes/fondo_infocliente.gif">
</div>

<div id="contenidoinfo" style="position:absolute;">
<?php
  $sql_busca_cliente = "select * from smclientes where idcliente = ".$xid;
  $result_sql = mysql_query($sql_busca_cliente, $db);
  while ($fila = mysql_fetch_array($result_sql)) {
?>
  <table border="0" cellpadding="0" cellspacing="5" width="100%">
    <tr>
      <td width="40"><strong>NOMBRE:</strong></td>
      <td width="10">&nbsp;</td>
      <td width="210"><?php echo $fila['nombre_s'] . ' ' . $fila['apellido_pat'] . ' ' . $fila['apellido_mat']; ?></td>
    </tr>
    <tr>
      <td><strong>LOGIN:</strong></td>
      <td>&nbsp;</td>
      <td><?php echo $fila['login']; ?></td>
    </tr>
    <tr>
      <td><strong>CONTRASE&Ntilde;A:</strong></td>
      <td>&nbsp;</td>
      <td><?php echo $fila['password']; ?></td>
    </tr>
    <tr>
      <td><strong>TEL&Eacute;FONO:</strong></td>
      <td>&nbsp;</td>
      <td><?php echo $fila['telefono']; ?></td>
    </tr>
    <tr>
      <td><strong>E-m@il:</strong></td>
      <td>&nbsp;</td>
      <td><?php echo $fila['email']; ?></td>
    </tr>
    <tr><td colspan="3" align="center"><b>Detalles del Servicio SkyMoney</b></td></tr>
<?php
  $sql_busca_servicios = "select a1.fecha_inicio fecha_inicio, a1.fecha_termina, a2.paq_nombre paq_nombre  from smservicios a1, smpaquetes a2 where idusuario = ".$fila[idcliente]." and a1.idpaquete = a2.idpaquete";
  $result_sql_servicios = mysql_query($sql_busca_servicios, $db);
  if (mysql_num_rows($result_sql_servicios)) {
  while ($servicio = mysql_fetch_array($result_sql_servicios)) {
?>   
    <tr>
      <td vAlign="top" colspan="3">
        <table border="0" cellpadding="0" cellspacing="3" width="100%">
          <tr>
            <td width="150"><b>Paquete Adquirido:</b></td>
            <td bgcolor="#ffffff">&nbsp;<?php echo $servicio['paq_nombre']; ?></td>
          </tr>
          <tr>
            <td><b>Fecha de Inicio:</b></td>
            <td bgcolor="#ffffff">&nbsp;<?php 

                include('../fecha.php');
                list ($A, $m, $d) = split("-", $servicio['fecha_inicio']);
                $xfecha = mktime(0,0,0,$m, $d, $A);
                $fecha = getdate($xfecha);
                echo $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;

                                        ?></td>
          </tr>
          <tr>
            <td><b>Fecha de Termina:</b></td>
            <td bgcolor="#ffffff">&nbsp;<?php 

                include('../fecha.php');
                list ($A, $m, $d) = split("-", $servicio['fecha_termina']);
                $xfecha = mktime(0,0,0,$m, $d, $A);
                $fecha = getdate($xfecha);
                echo $semana[$fecha['wday']].', '.$d.' de '.$mes[$m-1].' del '.$A;

                                        ?></td>
          </tr>          
        </table>
      </td>
    </tr>
<?php
     }
  } else {
?>
    <tr><td colspan="3" align="center"><b style="color:red;">Por el momento tiene dado de alta ningun servicio.</b></td></tr>
<?php
  }
?>
  </table>
<?php
  }
?>
</div>
</body>
</html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>