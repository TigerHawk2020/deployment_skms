<?php
@session_start();
if (isset($_SESSION["auth_usuario"])) {
?>
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr><td><img onMouseOver="this.style.cursor='hand';" onCLick="javascript:OpenAWindow('cerrar_session.php','ShowInfo',650,450);" src="../imagenes/cerrar_session.gif"</td></tr>
	    <tr>
              <td vAlign="top">
                <table border="0" cellpadding="0" cellspacing="0">
		  <tr><td align="center" hieght="20" bgcolor="#003366"><b><a href="#" onClick="javascript:document.getElementById('xcontenido').src='admin_pant001.php'" class="ini">INICIO</a></b></td></tr>
<!--
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_dbrevancha001.php';">Cambiar Password</a>
                    </td>
                  </tr>
-->
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_dbmelate001.php';">Sorteo Melate</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_premiosmelate001.php';">Premios y Ganadores del Melate</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_dbrevancha001.php';">Sorteo Revancha</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_premiosrevancha001.php';">Premios y Ganadores de Revancha</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_clientes001.php';">Administrador de Clientes SkyMoney</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
                  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_guest001.php';">Administrador de Membresias Guest</a>
                    </td>
                  </tr>
		  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_servicios001.php';">Administrador de Servicios SkyMoney</a>
                    </td>
                  </tr>
		  <tr><td height="1" bgcolor="#00ccff"></td></tr>		  
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_opciones001.php';">Administrador de Opciones</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_paquetes001.php';">Administrador de Paquetes SkyMoney</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
                  <tr>
                    <td height="15" width="100" bgcolor="#0099cc" align="center" onClick="CambiarColorClick(this,'#0099cc');" onMouseOut="CambiarColorOut(this,'#0099cc');" onMouseOver="CambiarColorIn(this,'#003366');">
                     <a href="#" class="menu" onClick="javascript:document.getElementById('xcontenido').src='admin_guestbook001.php';">Administrador del Libro de Visitas</a>
                    </td>
                  </tr>
                  <tr><td height="1" bgcolor="#00ccff"></td></tr>
		  <tr><td align="center" hieght="25"><img src="imagenes/bottom_menu_admin.gif"</td></tr>
                </table>
	      </td>
            </tr>
          </table>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>