<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];
$xpagina = $_GET["xpagina"];
?>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
(Como limite inferior de nuestro campo) (l�nea horizontal  superior en el Combinador o generador de Skymoney) como ya indicamos (tres unidades menor que el  total calculado)    igual a 
<br><br>
:  1 + 8 + 19 + 24 + 29 + 41 = 122
<br><br>
Y la SUMA que tendr�amos que determinar (como limite superior de nuestro campo) (l�nea inferior en el COMBINADOR)    de  =  2 + 9 + 20 + 25 + 30 + 42 = 128  ( tres unidades mayor Que el total DETERMINADO (Seis de dif. total) (observe que solo tiene un numero de variaci�n en sentido vert. p/ c/ posici�n) Y en la ventana   que dice (TOTAL A BUSCAR)  anotar�amos = 125, que es la posici�n media, pero puede ser otra suma pr�xima a este campo, una vez que nosotros hallamos establecido  lo anterior,  hacemos �click�  en  la  ventana  de   (Nuestro COMBINADOR, O GENERADOR de COMBINACIONES de  SKYMONEY SYSTEM &reg;) en donde dice: �INICIAR�  y de inmediato aparecer�n  (para este ejemplo y  otros similares) a la izquierda del combinador, la CANTIDAD DE COMBINACIONES POSIBLES (que ser�n = 64   (Para este caso) y La cantidad de combinaciones que cumplen la condici�n(TOTAL A BUSCAR) o de sumar = 125  ser�n = 20   (haciendo �click� en las flechas de control de la barra de desplazamiento vertical (A la derecha de la pantalla del Combinador de Skymoney )  se podr�n ver todas estas veinte combinaciones  y en las que �UNA DE ELLAS SERA LA GANADORA DE DICHO SORTEO�  ya que los n�meros que se consideraron  como limites inferior y superior  del campo  ABARCARON  por decirlo ASI  : El  campo    num�rico de la suma  RESULTANTE GANADORA  que fue = 125.
<br><br>
Pero aun si el resultado no hubiera sido = 125,  pero hubiera resultado en cualquiera de las otras  sumas comprendidas entre  estos limites num�ricos y  sumas  preestablecidas que fueron:� Inferior = 122 �  �Superior  = 128� es decir 123 y 124 asi como:126 y 127 �ESTARIA TAMBIEN  LA COMBINACI�N GANADORA�  Ya que el campo num�rico  preestablecido abarca todas las combinaciones posibles resultantes (si todas se apuestan o se juegan) de la forma siguiente:como ejemplo) pero puede ser similar  con cualquiera otro reesultado, que se de en los limites del campo escogido,  para  las  64 combinaciones tendriamos:

       </p>
    </td>
  </tr>
  <tr>
    <td align="center">
       <p class="contedido" style="text-align:center;">
RESULTADOS EN EL GENERADOR DE COMBINACIONES SKYMONEY SYSTEM &reg;<br>
para  el  ejemplo  con  el  Sorteo N� 1500
       </p>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="imagenes/grafica_tres.gif">
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
Como puede observar en el anterior ejemplo del concurso  1500 en las 64 combinaciones posibles entre esos limites,Ud.abarcar�a  Sumas Resultantes cuyos d�gitos  est�n entre el : 5  y  el  2
<br>
limite inferior = 122= 5  Y el limite superior = 128 = 2  (estos tienen que ser determinados por ud.)  y el resto  de las combines. Los  determinara  el  GENERADOR  de COMBINACIONES DE                        �SKYMONEY  SYSTEM &reg;� : Observe ud. que los d�gitos que abarcaron sus limites num�ricos  en  este  ejemplo   fueron:   Suma = 122 = 5     Suma = 123 = 6       Suma = 124 = 7 ;   Suma = 125 =  8  ;    Suma =  126  =  9 ;  Suma =  127  = 1  y   Suma = 128  =  2   Faltarian  los digitos : 4  y  3   **
<br><br>
**NOTA.-  Ud. puede  ver  que  para que el Campo abarcara  todos  los  D�gitos  del 1 al  9 (En  ese sector  de  la grafica general)  Le faltar�a abarcar las  Sumas cuyos DIGITOS sean   limite  inferior =121 = 4  y  limite Superior = 129 = 3   **
Ahora volviendo a lo anterior si no hubiera salido  el resultado =  1 + 9 + 19 + 25 + 29 + 42 = 125 = 8 y hubiera salido  otro, (en los  limites num�ricos) de las sumas indicadas de  122,  a  128

       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>