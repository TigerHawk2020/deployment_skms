<?php
@session_start();
include('../conexion.php');
//echo nl2br(print_r($_POST, true));
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];
?>
<html>
<head>
   <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">   
   <script type="text/javascript" src="funciones_program.js"></script>  
   
<script language="JavaScript">
  function funcSelectMesAnnio(oForm) {
    oForm.submit();
  }
  function nuevaposicion() {
    window.scrollTo(100,400);
  }
  function validar_datos(xforma) {
    if (xforma.xyear1.value == 0) {
       alert("Seleccione el Año de Inicio.");    
    }
    else {
            if (xforma.xyear2.value == 0) {
               alert("Seleccione el Año Final.");
            }
            else {
                   if (xforma.xyear2.value >= xforma.xyear1.value) {
                      xforma.submit();
                   }
                   else {
                           alert("Años no Coinciden.");
                        }
                 }
         }
  }
</script>
  
</head>
<?php
 
  if (isset($_POST['xyear']) || isset($_POST['xsumaSerie']) || isset($_POST['xdigito']) || isset($_POST['xyear1'])) {
     echo '<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0" onload="nuevaposicion();">';
  } else {
     echo '<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">';
  }
?>
 <table border="0" cellpaddign="0" cellspacing="0" width="100%">
   <tr><td>&nbsp;</td></tr>
   <tr>
      <td align="center"><img align="center" src="imagenes/titulo_consultadb.gif"></td>
   </tr>
   <tr><td>&nbsp;</td></tr>
   <tr>
      <td align="center">
         <table border="0" cellpadding="0" cellspacing="5">
           <form action="program_db_melate_revancha.php" method="post">
            <tr><td colspan="3"><b>Para realizar su consulta:</b></td></tr>
            <tr>
               <td rowspan="2" vAlign="top"><b>Elija la Base de Datos</b></td>
               <td>
                  <input type="radio" name="xsorteodb" value="1" checked>
               </td>
               <td><b>Melate</b></td>
            </tr>
            <tr>
               <td>
                  <input type="radio" name="xsorteodb" value="2">
               </td>
               <td><b>Revancha</b></td>
            </tr>
            <tr><td colspan="3" height="30" align="center"><input type="submit" class="classinput" value="Visualizar B.D."</td></tr>
           </form>
         </table>
      </td>
   </tr>
<?php
if (isset($_POST['xsorteodb'])) {
   $xsorteodb = $_POST['xsorteodb'];
   switch ($xsorteodb) {
     case 1: $nombreBD = 'smdbmelate';
             $nombreIMG = 'titulo_dbmelate.gif';
             $tituloBD = 'MELATE ';
             break;
     case 2: $nombreBD = 'smdbrevancha';
             $nombreIMG = 'titulo_dbrevancha.gif';
             $tituloBD = 'REVANCHA ';
             break;
   }
   
?>
   <tr>
     <td align="center">      
     <form name="selectMesAnnio" id="selectMesAnnio" action="program_db_melate_revancha.php" method="post">
     <input type="hidden" name="xsorteodb" value="<?php echo $xsorteodb; ?>"> 
     <table border="0" cellpadding="5" cellspacing="4">
         <tr><td colspan="3" align="center"><img align="center" src="imagenes/<?php echo $nombreIMG; ?>"></td></tr>
         
         <tr>                
                <td width="150"><img src="imagenes/busque_x_fecha.gif" align="right"></td>
                <td width="260">
	         <table border="0" cellpadding="0" cellspacing="4">
			  <tr>
                             <td>Mes del Sorteo:</td>
                             <td>&nbsp;</td>
                             <td>
                              <select name="xmonth">
                               <option value="0">--MES--
                              <?php 
	                    		$mes[0] = "Enero";
	               				$mes[1] = "Febrero";
						        $mes[2] = "Marzo";
						        $mes[3] = "Abril";
						        $mes[4] = "Mayo";
						        $mes[5] = "Junio";
						        $mes[6] = "Julio";	
						        $mes[7] = "Agosto";
						        $mes[8] = "Septiembre";
						        $mes[9] = "Octubre";
						        $mes[10] = "Noviembre";
						        $mes[11] = "Diciembre";
								for ($i=1; $i < 13; $i++) {   
                              ?>
                               <option value="<?php echo $i; ?>"><?php echo $mes[$i-1]; } ?>
	                       </select>
                             </td>
                          </tr>
                          <tr>
                               <td>A&ntilde;o del Sorteo:</td>
                               <td>&nbsp;</td>
                               <td>
                                   <select name="xyear" onChange="funcSelectMesAnnio(this.form)">	
			<option value="0">Elija el a&ntilde;o por favor
<?php
   $sql_busca_year = "select year(fecha) as year from ".$nombreBD." group by year(fecha)";
   $resultado_sql = mysql_query($sql_busca_year, $db);
   while ($fila = mysql_fetch_array($resultado_sql, MYSQL_ASSOC)) {
?>
			<option value="<?php echo $fila['year']; ?>"><?php echo $fila['year']; ?>
<?php } ?>
		                           </select>
                               </td>
                          </tr>
               </table>
               </form>
            </td>
          </tr>
          <form action="program_db_melate_revancha.php" method="post">
          <input type="hidden" name="xsorteodb" value="<?php echo $xsorteodb; ?>">
          <tr>                
            <td width="150"><img src="imagenes/busque_x_suma.gif" align="right"></td>
            <td width="260">
               <table border="0" cellpadding="0" cellspacing="4">
                <tr>
                  <td>
                    <select name="xsumaSerie" onChange="this.form.submit()">
                       <option value="0">Elija la suma de serie                             
<?php
   $sql_busca_suma = "select suma from ".$nombreBD." group by suma";
   $resultado_sql = mysql_query($sql_busca_suma, $db);
   while ($fila = mysql_fetch_array($resultado_sql, MYSQL_ASSOC)) {
?>
			<option value="<?php echo $fila['suma']; ?>"<?php if (isset($xsumaSerie)) { if ($xsumaSerie == $fila['suma']) { echo ' selected'; } }?>><?php echo $fila['suma']; ?>
<?php } ?>
                    </select>
                  </td>
                </tr> 
               </table>
            </td>
          </tr>
         </form>
         <form action="program_db_melate_revancha.php" method="post">
         <input type="hidden" name="xsorteodb" value="<?php echo $xsorteodb; ?>">
          <tr>                
            <td width="150"><img src="imagenes/busque_x_digito.gif" align="right"></td>
            <td width="260">
               <table border="0" cellpadding="0" cellspacing="4">
                <tr>
                  <td>
                    <select name="xdigito" onChange="this.form.submit()">
                       <option value="0">Elija el digito                             
<?php
   $sql_busca_suma = "select digito from ".$nombreBD." group by digito";
   $resultado_sql = mysql_query($sql_busca_suma, $db);
   while ($fila = mysql_fetch_array($resultado_sql, MYSQL_ASSOC)) {
?>
			<option value="<?php echo $fila['digito']; ?>"><?php echo $fila['digito']; ?>
<?php } ?>
                    </select>
                  </td>
                </tr> 
               </table>
            </td>
          </tr>
         </form>
         <form action="program_db_melate_revancha.php" method="post">
         <input type="hidden" name="xsorteodb" value="<?php echo $xsorteodb; ?>">
          <tr>                
            <td width="150"><img src="imagenes/busque_x_year.gif" align="right"></td>
            <td width="260">
               <table border="0" cellpadding="0" cellspacing="4">
                <tr>
                               <td>A&ntilde;o:</td>
                               <td>&nbsp;</td>
                               <td>
                                   <select name="xyear1">	
			<option value="0">Inicio
<?php
   $sql_busca_year = "select year(fecha) as year from ".$nombreBD." group by year(fecha)";
   $resultado_sql = mysql_query($sql_busca_year, $db);
   while ($fila = mysql_fetch_array($resultado_sql, MYSQL_ASSOC)) {
?>
			<option value="<?php echo $fila['year']; ?>"><?php echo $fila['year']; ?>
<?php } ?>
		         </select>
                               </td>
                 </tr> 
                 <tr>
                               <td>A&ntilde;o:</td>
                               <td>&nbsp;</td>
                               <td>
                                   <select name="xyear2" onChange="validar_datos(this.form)">	
			<option value="0">Final
<?php
   $sql_busca_year = "select year(fecha) as year from ".$nombreBD." group by year(fecha)";
   $resultado_sql = mysql_query($sql_busca_year, $db);
   while ($fila = mysql_fetch_array($resultado_sql, MYSQL_ASSOC)) {
?>
			<option value="<?php echo $fila['year']; ?>"><?php echo $fila['year']; ?>
<?php } ?>
		         </select>
                               </td>
                          </tr>
               </table>
            </td>
          </tr>
          </form>
       </table>
     </td>
   </tr>
   <tr> 
      <td align="center">
        <table border="0" cellpadding="0" cellspacing="5">
         <tr>
           <td>
              <input type="button" class="classinput" value="Consultar Secuencias Lógicas" onClick="OpenAWindowInfo('program_secuenciometro.php?xdb=<?php echo $xsorteodb; ?>&sorteo=0','ShowSecuenciometro',350,420)">
           </td> 
           <td>
              <input type="button" class="classinput" value="Consultar Frecuenciómetro" onClick="OpenAWindowInfo('program_frecuenciometro.php?xdb=<?php echo $xsorteodb; ?>&sorteo=0','ShowFrecuenciometro',360,420)">
           </td>         
           <td>
              <input type="button" class="classinput" value="Consultar Coeficientes" onClick="OpenAWindowInfo2('program_coeficientes.php?xdb=<?php echo $xsorteodb; ?>&sorteo=0','ShowCoeficientes',350,500)">
           </td>
         </tr>
        </table>         
      </td>
   </tr>
<?php
}
?>     
   <tr><td>&nbsp;</td></tr>
<?php
if (isset($_POST['xyear']) || isset($_POST['xsumaSerie']) || isset($_POST['xdigito']) || isset($_POST['xyear1'])) {
$xyear      = isset($_POST['xyear']) ? $_POST['xyear'] : 0;
$xsumaSerie = isset($_POST['xsumaSerie']) ? $_POST['xsumaSerie'] : 0;
$xdigito    = isset($_POST['xdigito']) ? $_POST['xdigito'] : 0;
$xyear1     = isset($_POST['xyear1']) ? $_POST['xyear1'] : 0;
$xyear2     = isset($_POST['xyear2']) ? $_POST['xyear2'] : 0;
$xmonth     = isset($_POST['xmonth']) ? $_POST['xmonth'] : 0;
	
$sql_lista_bd = "select * from ".$nombreBD;
if (isset($xyear) && $xyear > 0) {
  $sql_lista_bd .= " where year(fecha) = ".$xyear;
  $sql_datos_grafica = " where year(fecha) = ".$xyear;
  $tituloBD .=  "A&ntilde;o: ".$xyear;
  if ($xmonth > 0) {
     $sql_lista_bd .= " and month(fecha) = ".$xmonth;     $sql_datos_grafica .= " and month(fecha) = ".$xmonth;
     $tituloBD .=  ", Mes: ".$mes[$xmonth-1];
  }
}
if (isset($xsumaSerie) && $xsumaSerie > 0) {
  $sql_lista_bd .= " where suma = ".$xsumaSerie;
  $sql_datos_grafica = " where suma = ".$xsumaSerie;
  $tituloBD .= ": Suma de Serie";
}
if (isset($xdigito) && $xdigito > 0) {
  $sql_lista_bd .= " where digito = ".$xdigito;
  $sql_datos_grafica = " where digito = ".$xdigito;
  $tituloBD .= ": Digito";
}
if (isset($xyear1) && $xyear1 > 0 && $xyear2 > 0) {
  $sql_lista_bd .= " where year(fecha) >= ".$xyear1;
  $sql_lista_bd .= " and year(fecha) <= ".$xyear2;
  $sql_datos_grafica .= " where year(fecha) >= ".$xyear1;
  $sql_datos_grafica .= " and year(fecha) <= ".$xyear2;
  $tituloBD .=  "A&ntilde;o: ".$xyear1."-".$xyear2;
}
$result_lista = mysql_query($sql_lista_bd, $db);
if (mysql_num_rows($result_lista)) {
?>
     <tr>
      <td>
         <table border="0" cellpadding="0" cellspacing="0" width="100%">         
          <tr>
             <td vAlign="top" align="center">
                   <table border="0" cellpadding="0" cellspacing="0" bordercolor="#aaaaaa" bgcolor="#dddddd">                    
                    <tr><td>
                         <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_izq.gif"></td>
                             <td colspan="11" bgcolor="#ffcc00" align="center"><b>BASE DE DATOS <?php echo $tituloBD; ?></b></td>
                             <td bgcolor="#ffcc00" width="5" vAlign="top"><img src="imagenes/top_der.gif"></td>
                           </tr>                         
                         </table>
                    </td></tr>
	            <tr>
                        <td>
                          <table border="0" cellpadding="0" cellspacing="1" width="100%">
                          <tr>
                              <td colspan="2">&nbsp;</td>
                              <td colspan="8" align="center">S E R I E S&nbsp;&nbsp;&nbsp;R E S U L T A N  T E S</td>
                              <td bgcolor="#ffffff" width="20">&nbsp;</td>
                              <td colspan="8" align="center">S E R I E S&nbsp;&nbsp;&nbsp;C O M P L E M E N T A R I A S</td>
                          </tr>
                          <tr>
                           <td align="center" width="60" bgcolor="#ffffff" style="font-weight:bold;">#SORTEO</td>  
                           <td align="center" width="80" bgcolor="#ffffff" style="font-weight:bold;">FECHA</td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 1° Num. Natural" src="imagenes/img_nat1.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=1&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 2° Num. Natural" src="imagenes/img_nat2.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=2&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 3° Num. Natural" src="imagenes/img_nat3.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=3&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 4° Num. Natural" src="imagenes/img_nat4.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=4&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 5° Num. Natural" src="imagenes/img_nat5.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=5&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 6° Num. Natural" src="imagenes/img_nat6.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=6&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,500)"></td>  
<?php
  if (isset($xsumaSerie)) {
?>
                           <td align="center" width="50" bgcolor="#ffffff"><image alt="Ver Gráfica Suma de Serie" src="imagenes/img_gsuma.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_suma.php?xcampo=suma&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,400)"></td>  
                           <td align="center" width="60" bgcolor="#ffffff"><image alt="Ver Gráfica Digito" src="imagenes/img_gdigito.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_digito.php?xcampo=digito&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,400)"></td>
<?php
  } else if (isset($xdigito)) {
?> 
                           <td align="center" width="50" bgcolor="#ffffff"><image alt="Ver Gráfica Suma de Serie" src="imagenes/img_gsuma.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_suma.php?xcampo=suma&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,400)"></td>  
                           <td align="center" width="60" bgcolor="#ffffff"><image src="imagenes/img_gdigito.gif"></td>                          
<?php
  } else {
?>
                           <td align="center" width="50" bgcolor="#ffffff"><image alt="Ver Gráfica Suma de Serie" src="imagenes/img_gsuma.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_suma.php?xcampo=suma&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,400)"></td>  
                           <td align="center" width="60" bgcolor="#ffffff"><image alt="Ver Gráfica Digito" src="imagenes/img_gdigito.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_digito.php?xcampo=digito&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=1','ShowGrafica',700,400)"></td>
<?php
    }
?>
                           <td bgcolor="#ffffff" width="20">&nbsp;</td>
                           <td align="center" width="60" bgcolor="#ffffff"><image alt="Ver Gráfica Digito" src="imagenes/img_gdigito.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_digito.php?xcampo=digitocomp&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,400)"></td>
                           <td align="center" width="50" bgcolor="#ffffff"><image alt="Ver Gráfica Suma de Serie" src="imagenes/img_gsuma.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_suma.php?xcampo=sumacomp&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,400)"></td>
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 1° Num. Complementaria" src="imagenes/img_nat1.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=1&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 2° Num. Complementaria" src="imagenes/img_nat2.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=2&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 3° Num. Complementaria" src="imagenes/img_nat3.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=3&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 4° Num. Complementaria" src="imagenes/img_nat4.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=4&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 5° Num. Complementaria" src="imagenes/img_nat5.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=5&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,500)"></td>  
                           <td align="center" width="50" bgcolor="#aaaaaa"><image alt="Ver Gráfica 6° Num. Complementaria" src="imagenes/img_nat6.gif" onMouseOver="this.style.cursor='hand';" onClick="OpenAWindowGrafica('program_graficos_vertical.php?xcampo=6&xtitulo=<?php echo $tituloBD; ?>&xsql=<?php echo $sql_datos_grafica; ?>&bd=<?php echo $xsorteodb; ?>&tipo=2','ShowGrafica',700,500)"></td>
                           </tr>

<?php
 while($fila = mysql_fetch_array($result_lista)) {
?>
	            <tr>
                           <td align="center" width="60" bgcolor="#ffffff"><a href="javascript:OpenAWindowInfo('program_secuenciometro.php?xdb=<?php echo $xsorteodb; ?>&sorteo=<?php echo $fila['sorteo']; ?>','ShowSecuenciometro',350,420);" class="sorteo" ><?php echo $fila['sorteo']; ?></a></td>  
                           <td align="center" width="80" bgcolor="#ffffff">
                                <?php 
		          $mes[0] = "Ene";
		          $mes[1] = "Feb";
		          $mes[2] = "Mar";
		          $mes[3] = "Abr";
		          $mes[4] = "May";
		          $mes[5] = "Jun";
		          $mes[6] = "Jul";	
		          $mes[7] = "Ago";
		          $mes[8] = "Sep";
		          $mes[9] = "Oct";
		          $mes[10] = "Nov";
		          $mes[11] = "Dic";
                  //list ($A, $m, $d) = split("-", $fila['fecha']);
                  list ($A, $m, $d) = preg_split('/-/', $fila['fecha']);
		          echo $mes[$m-1].'-'.$d;
                                ?>
                           </td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#eeeeee"); ?>" style="color:blue;"><?php echo $fila['nat1']; ?></td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#eeeeee"); ?>" style="color:blue;"><?php echo $fila['nat2']; ?></td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#eeeeee"); ?>" style="color:blue;"><?php echo $fila['nat3']; ?></td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#eeeeee"); ?>" style="color:blue;"><?php echo $fila['nat4']; ?></td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#eeeeee"); ?>" style="color:blue;"><?php echo $fila['nat5']; ?></td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#eeeeee"); ?>" style="color:blue;"><?php echo $fila['nat6']; ?></td>  
                           <td align="center" width="50" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#fff"); ?>" style="color:blue;"><?php echo $fila['suma']; ?></td>  
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 1 ? "#99CCFF" : "#fff"); ?>" style="color:blue;"><?php echo $fila['digito']; ?></td>
                           <td bgcolor="#ffffff" width="20">&nbsp;</td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#fff"); ?>" style="color:red;"><?php echo $fila['digitocomp']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#fff"); ?>" style="color:red;"><?php echo $fila['sumacomp']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#eeeeee"); ?>" style="color:red;"><?php echo $fila['comp1']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#eeeeee"); ?>" style="color:red;"><?php echo $fila['comp2']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#eeeeee"); ?>" style="color:red;"><?php echo $fila['comp3']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#eeeeee"); ?>" style="color:red;"><?php echo $fila['comp4']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#eeeeee"); ?>" style="color:red;"><?php echo $fila['comp5']; ?></td>
                           <td align="center" width="60" bgcolor="<?php echo ($fila['resultado'] == 2 ? "#FF9999" : "#eeeeee"); ?>" style="color:red;"><?php echo $fila['comp6']; ?></td>
                         </tr>
                                           
                       </td>
                    </tr>
<?php
                                                 }
?>
                    <tr><td height="5" bgcolor="#ffcc00" colspan="19"></td></tr>
                    
         </table>
      </td>
     </tr>
<?php
 } else {
?>
   <tr><td align="center"><b style="color:red;">No hay datos que coincidan con su b&uacute;squeda.</b></td></tr>
<?php
        }
}
?>
   <tr><td>&nbsp;</td></tr>
 </table>
</body></html>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>