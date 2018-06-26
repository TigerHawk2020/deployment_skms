<?php
@session_start();
include('../conexion.ph4');
if (session_is_registered("authdata")) {
?>
<head>
 <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
</head>
<body>
<div id="fondometodo" style="position:absolute;">
 <img src="imagenes/fondo_ayuda.gif">
</div>
<div id="metodocontenido" style="position:absolute;">
<table border="0" cellpadding="0" cellspacing="10">
 <tr>
  <td height="50">&nbsp;</td>
 </tr>
 <tr>
  <td>
    <p style="text-align:justify;">    
     Para poder ingresar al sistema <b>Skymoney System</b> &reg;  es necesario contar con un nombre
     de usuario y una contrase&ntilde;a otorgadas por el administrador del mismo, una vez teniendo
     &eacute;stas nos desplazaremos al &aacute;rea de acceso al sistema, en donde  aparecer&aacute; un recuadro 
     que nos solicitar&aacute; dicha informaci&oacute;n. Ingresado el nombre de usuario y su correspondiente 
     contrase&ntilde;a, deber&aacute; hacer Click sobre el bot&oacute;n Entrar que se encuentra situado en la parte 
     inferior del recuadro, como lo muestra la siguiente figura:
    </p>
  </td>
 </tr>
 <tr><td align="center"><img src="imagenes/img_ayuda01.gif"></td></tr>
 <tr>
  <td>
    <p style="text-align:justify;">    
     Hecho esto y dependiendo del paquete que haya adquirido ser&aacute; el men&uacute; que se desplegar&aacute;, 
     el cual cuenta con los siguientes m&oacute;dulos:
    </p>
  </td>
 </tr>
 <tr>
  <td>
    <table border="0" cellpadding="0" cellspacing="10">
      <tr>
        <td>&nbsp;</td>
        <td><b><a href="#modulo1" class="modulo">Inicio</a></b></td>
        <td>Este módulo nos lleva a la página principal del sistema.</td>
      </tr>     
      <tr>
        <td>&nbsp;</td>
        <td><b><a href="#modulo2" class="modulo">M&eacute;todo te&oacute;rico</a></b></td>
        <td>Este m&oacute;dulo nos explica la teor&iacute;a de c&oacute;mo funciona el sistema Skymoney, en s&iacute; c&oacute;mo opera el sistema.</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><b><a href="#modulo3" class="modulo">Ayuda Gr&aacute;fica</a></b></td>
        <td>En &eacute;ste m&oacute;dulo nos ayudan a conocer de manera visual el sistema.</td>
      </tr>     
      <tr>
        <td>&nbsp;</td>
        <td><b><a href="#modulo4" class="modulo">Base de Datos del Melate y Revancha</a></b></td>
        <td>Contiene una recolecci&oacute;n de informaci&oacute;n (historial) de los sorteos del Melate y
            Revancha desde el sorteo N° 556 (1993) y  N°1009 (1997) respectivamente.</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><b><a href="#modulo5" class="modulo">Generador de combinaciones</a></b></td>
        <td>Este es el sistema que saca los c&aacute;lculos de las combinaciones que puedan salir 
            ganadoras según los l&iacute;mites que hayamos ingresado.</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><b>Cerrar sesi&oacute;n</b></td>
        <td>Este m&oacute;dulo cierra la sesi&oacute;n 
            del usuario, es decir, nos saca del sistema.</td>
      </tr>
    </table>
  </td>
 </tr>
 <tr><td align="center"><img src="imagenes/img_ayuda03.gif"></td></tr>
 <tr><td height="50">&nbsp;</td></tr>
 <tr><td align="center"><b style="font: 18px/1.5 Verdana;"><a id="modulo1">M&Oacute;DULO 1: Inicio</a></td></tr>
 <tr>
  <td>
    <p style="text-align:justify;"><img src="imagenes/img_ayuda02.gif" align="right" hspace="30">
     &Eacute;ste m&oacute;dulo es una carta de bienvenida para todos los usuarios del 
     Sistema <b>Skymoney System</b> &reg;.<br><br>
     En la parte superior derecha, se encuentra un bot&oacute;n azul con una flecha, al pasar el 
     puntero del mouse, aparecer&aacute; una leyenda que dice "Avanzar p&aacute;gina", esto significa 
     que al hacer Click sobre él nos cambiar&aacute; a la página consecutiva a esta.
    </p>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td align="center"><b style="font: 18px/1.5 Verdana;"><a id="modulo2">M&Oacute;DULO 2: M&eacute;todo Te&oacute;rico</a></td></tr>
 <tr>
  <td>
    <p style="text-align:justify;"><img src="imagenes/img_ayuda04.gif" align="left" hspace="30">
     El m&eacute;todo te&oacute;rico, no es m&aacute;s que una descripci&oacute;n general de c&oacute;mo est&aacute; basado 
     en s&iacute; el sistema <b>Skymoney System</b> &reg;, sus componentes y el objetivo que persigue.    
    </p>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td align="center"><b style="font: 18px/1.5 Verdana;"><a id="modulo3">M&Oacute;DULO 3: Ayuda Gr&aacute;fica</a></b></td></tr>
 <tr>
  <td>
    <p style="text-align:justify;"><img src="imagenes/img_ayuda05.gif" align="right" hspace="30">
     Es esta breve explicaci&oacute;n que usted esta leyendo de c&oacute;mo utilizar su 
     sistema <b>Skymoney System</b> &reg.
    </p>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td align="center"><b style="font: 18px/1.5 Verdana;"><a id="modulo4">M&Oacute;DULO 4: Base de Datos del Melate y Revancha</a></b></td></tr>
 <tr>
  <td>
    <p style="text-align:justify;"><img src="imagenes/img_ayuda06.gif" align="right" hspace="30">
     Al hacer Click sobre &eacute;ste m&oacute;dulo, se desplegar&aacute; la siguiente interfaz:<br><br>
     &Eacute;ste m&oacute;dulo cuenta con dos opciones, la Base de Datos del Melate y
     la Base de Datos de Revancha.
     Al elegir visualizar la primera opción (Base de Datos del Melate)
     se desplegará la siguiente interfaz:<img src="imagenes/img_ayuda07.gif" align="left" vspace="10" hspace="10">
     <br><br><br><br><br>
     Existen varios Casos para accesar a las graficas de variación, a continuación expondremos los casos mas usuales y como deberá de accesar a dichas graficas, recuerde que dependerá de su tipo de búsqueda en la base de datos:
     <br><br>
     1° CASO: <b>B&uacute;squeda por fecha</b><br><br>
     <img src="imagenes/ayuda_busque_x_fecha.gif"><br><br>
     En este tipo de búsqueda usted podrá ver las graficas de variación de la base de datos de las 6 columnas de NÚMEROS NATURALES                                             ( NAT1,NAT2,NAT3,NAT4,NAT5,NAT6).<br><br>
De la misma forma también podrá accesar a la grafica de la columna “SUMA” la cual desplegara la grafica general de sumas dependiendo del rango de busqueda por fecha que usted haya escogido.<br><br>
En este tipo de búsqueda también podrá accesar a la columna de la base de datos, que es la reduccion de la suma, denominada “DIGITO” donde podra apreciar dicha grafica y su variacion dentro del tiempo que usted haya elegido, (Mes del sorteo y Año del sorteo).<br><br>
     <img src="imagenes/ayuda_tablero_1.gif"><br><br>
     2° CASO: <b>B&uacute;squeda por suma de serie</b><br><br>
     <img src="imagenes/ayuda_busque_x_suma.gif"><br><br>
En este tipo de búsqueda usted deberá primero escoger una suma de serie en particular y dependiendo de ello podrá accesar a las siguientes columnas y a sus respectivas graficas:<br><br>
COLUMNA DE NUMEROS NATURALES:<br><br>
Compuesta por las ya mencionadas 6 columnas (NAT1, NAT2, NAT3, etc.)<br><br>
<b>NOTA.</b>-*** Recuerde que en este tipo de búsqueda por “Suma de Serie” al escoger este filtro no podrá accesar a las  graficas de las columnas “SUMA” y “ DIGITO”   porque si usted eligiera la suma de serie por ejemplo “154“ en esta columna aparecerán únicamente los sorteos en los que haya salido esta suma Y por logica su respectivo Digito ( Para este caso fue el digito 1 ) desde el inicio hasta el ultimo sorteo en que haya resultado dicha suma y Digito,   además el sistema por protección no le permitirá accesar a estas graficas de dichas columnas.<br><br>
     <img src="imagenes/ayuda_tablero_2.gif"><br><br>
     3° CASO: <b>B&uacute;squeda por digito</b><br><br>
     <img src="imagenes/ayuda_busque_x_digito.gif"><br><br>
En este tipo de búsqueda usted deberá primero escoger un “DIGITO”, DEL 1, al 9. y  podra accesar a las siguientes columnas y las graficas respectivas, de variacion de:<br><br>
COLUMNA DE NUMEROS NATURALES:<br><br>
Compuesta por las ya mencionadas 6 columnas (NAT1, NAT2, NAT3, etc.)<br><br>
COLUMNA DE SUMA DE SERIE<br><br>
En esta columna podrá usted apreciar la variación de la Suma de serie , que correspondan al  Digito elegido<br><br>
<b>NOTA.-***</b> Tal y como se explico en el “CASO 2” usted no podra accesar a la columna de “DIGITO” porque usted solo veria una linea recta ya que si por ejemplo usted hubiese escogido el digito: 1, solo veria una linea recta , que correspoderiaa todas las sumas resultantes cuyo digito haya sido 1 ya que no hay variacion, ya que todas las celdas de esa columna estan en el Digito 1 y ademas el sistema no le permitira accesar a dicha grafica.<br><br>
     <img src="imagenes/ayuda_tablero_3.gif"><br><br>
     4° CASO: <b>B&uacute;squeda por a&ntilde;o</b><br><br>
     <img src="imagenes/ayuda_busque_x_year.gif"><br><br>
En este tipo de búsqueda usted podrá escoger el rango de tiempo ( en Años) que usted requiera y podrá accesar a todas las columnas de la Base de Datos y a sus respectivas graficas.<br><br>
COLUMNA DE NUMEROS NATURALES:<br><br>
Compuesta por las ya mencionadas 6 columnas (NAT1, NAT2, NAT3, etc.)<br><br>
COLUMNA DE SUMA DE SERIE<br><br>
En esta columna podrá usted apreciar la variación, en general, de sorteo a sorteo que ha tenido el resultado de la Suma de serie, según el rango de tiempo seleccionado.<br><br>
COLUMNA DE DIGITO<br><br>
En esta columna podrá usted apreciar la variación de los dígitos según el rango de tiempo que haya usted elegido<br><br>
     <img src="imagenes/ayuda_tablero_1.gif"><br><br>
<b>PARA ACCESAR AL FRECUENCIOMETRO:</b><br><br>
Nuestro sistema Skymoney cuenta con un medidor de Frecuencias de aparición de sumas y dígitos de Sorteo a Sorteo el cual se haya situado después de los 4 tipos de búsquedas de la Base de Datos, y es el botón azul con letras blancas recuerde que hay 1 Frecuenciometro , para cada concurso ( uno para Melate y uno para Revancha )<br><br>
<img src="imagenes/ayuda_frecuenciometro.gif"><br><br>
<b>DESCRIPCI&Oacute;N DEL TABLERO DE INFORMACI&Oacute;N DE LA BASE DE DATOS</b><br><br>
     <img src="imagenes/ayuda_tablero_1.gif"><br><br>
Como se puede observar, el encabezado del tablero muestra el t&iacute;tulo, correspondiente a la base de datos en uso y del tipo de b&uacute;queda seleccionada.<br><br>El tablero esta compuesto por diez (10) columnas descritas en la siguiente lista.<br><br>
     <b>1. # SORTEO</b><br><br>
     Esta primer columna del tablero detalla los n&uacute;meros de los sorteos correpondientes a la b&uacute;squeda seleccionada.<br>
   <b>Nota:</b>
   Al pulsar con el puntero del 'mouse' sobre cualquiera de los sorteos, se obtendr&aacute; informaci&oacute;n detallada del sorteo seleccionado.<br><br>
    <b>2. FECHA</b><br><br>
    Esta columna despliega el mes y d&iacute;a en que se realiz&oacute; el sorteo.<br><br>
    <b>3. NAT1</b><br><br>
    Esta columna contiene los datos del primer n&uacute;mero natural correspondiente a cada uno de los sorteos que aparecen en el tablero de resultados.<br>
   <b>Nota:</b> Puede consultar la gr&aacute;fica donde se muestra la variaci&oacute;n del 1° n&uacute;mero natural, pulsando con el puntero del 'mouse' sobre el t&iacute;tulo de la columna.<br>
Y el mismo caso se da para las siguientes 5 columnas (NAT2, NAT3, NAT4, NAT5, NAT6), correspondientes a los 6  n&uacute;meros naturales de los sorteos que aparecen como resultado en el tablero.<br><br>
    <b>4. SUMA</b><br><br>
    Esta columna corresponde a la suma de serie de los 6 n&uacute;meros naturales, de cada uno de los sorteos que aparecen como resultado.<br>
<b>Nota:</b> Puede consultar la gr&aacute;fica donde se muestra la variaci&oacute;n de la suma de serie,pulsando con el puntero del 'mouse' sobre el t&iacute;tulo de la columna.<br><br>
   <b>5. D&Iacute;GITO</b><br><br>
    Esta columna corresponde al d&iacute;gito, de cada uno de los sorteos que aparecen como resultado.
<b>Nota:</b> Puede consultar la gr&aacute;fica donde se muestra la variaci&oacute;n de los d&iacute;gitos, pulsando con el puntero del 'mouse' sobre el t&iacute;tulo de la columna.
    </p>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td align="center"><b style="font: 18px/1.5 Verdana;"><a id="modulo5">M&Oacute;DULO 5: Generador de Combinaciones</a></b></td></tr>
<tr>
  <td>
    <p style="text-align:justify;">
      &Eacute;ste m&oacute;dulo es el sistema  (programa) que le ayudar&aacute; a sacar la(s) combinaci&oacute;n(es) ganadora(s).<br><br>
El &aacute;rea de trabajo del <b>Generador de Combinaciones</b> esta dividida en dos partes:
<br><br>
<b>1.</b> En la primera parte se encuentran las casillas correpondientes al l&iacute;mite inferior y l&iacute;mite superior respectivamente. As&iacute; como tambi&eacute;n la casilla que nos permite introducir la suma total a buscar.<br><br>
<img src="imagenes/limit_inf_sup.gif" align="center" vspace="10" hspace="100">
<br><br>
Como se puede observar tanto el l&iacute;mite inferior como superior, cuentan con seis (6) casillas de color gris, en las cuales se introducir&aacute;n los n&uacute;meros con los cules se generar&aacute;n entre ellos las posibles combinaciones.<br>

Cada uno de los l&iacute;mites cuentan con un bot&oacute;n de ' = ', el cual al dar un click sobre &eacute;l nos dar&aacute; la suma correspondiente al l&iacute;mite escogido. Los botones de ' Limpiar ' que aparecen tanto en la fila del l&iacute;mite inferior como superior, nos ayudan a borrar los n&uacute;meros escritos en las casillas de sus respectivos l&iacute;mites.<br>
En la casilla 'Suma Total a Buscar' se anota la suma que se desea buscar tomando encuenta las consideraciones mencionadas en el M&eacute;todo Te&oacute;rico.<br><br>

<b>2.</b> En la segunda parte del <b>Generador de Combinaciones</b> se encuentran el bot&oacute;n  ' INICIAR ' el cual nos permite generar las posibles combinaciones entre el l&iacute;mite inferior y  l&iacute;mite superior. Tambi&eacute;n se cuenta con dos botones, uno que permite ' LIMPIAR ' el &aacute;rea en donde se despliegan las combinaciones y el bot&oacute;n de ' LIMPIAR TODO ' que nos permite limpiar el &aacute;rea de trabajo del <b>Generador de Combinaciones</b>.<br><br>

El bot&oacute;n de ' DOWNLOAD ', que aparece en la parte inferior del tablero de combinaciones, le permitir&aacute; descargar en su computadora,  las combinaciones generadas ,  en un archivo de texto, el  cual lo podr&aacute;  consultar o imprimir en el momento que ud. lo requiera.<br><br>

Skymoney System Recomienda que para consultar  o  Imprimir  el Archivo de Texto Mencionado utilice preferentemente el Procesador de Textos de Microsoft Word.<br><br>

<b>Nota:</b> Cada vez que usted descargue en su computadora dicho archivo deber&aacute; cambiarle el nombre para que no sobre escriba en alg&uacute;n otro archivo que usted previamente haya guardado con combinaciones anteriores. Y recuerde que tal archivo deber&aacute; de nombrarlo con extensión .TXT
<br><br>
<img src="imagenes/img_ayuda09.gif" align="center" vspace="10" hspace="100"><br><br>
Al oprimir el bot&oacute;n ' DOWNLOAD ' aparecer&aacute; la ventana ' Descarga de archivos '.<br>
<img src="imagenes/img_ayuda11.gif" align="center" vspace="10" hspace="100"><br><br>
Para guardar las combinaciones seleccionaremos la opci&oacute;n: ' Guardar este programa en disco '. Aparecer&aacute; una ventana que nos permitir&aacute; seleccionar la ruta en donde guardaremos nuestro archivo. Como recomendaci&oacute;n, a&ntilde;ada ' <b>.txt</b> ' al nombre del archivo que por default es el mismo que el nombre de usuario.<br>
<img src="imagenes/img_ayuda12.gif" align="center" vspace="10" hspace="100"><br><br>
El archivo, al ser descargado, podr&aacute; ser visto usando cualquier procesador de textos. Como recomendaci&oacute;n podr&iacute;a utilizar el procesador de textos de Microsoft Word.<br><br>
    </p>
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