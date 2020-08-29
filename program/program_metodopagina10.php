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
de acuerdo al  próximo sorteo que se va efectuar ( que ud. podrá tomar en cuenta) (pero no necesariamente, ya que no siempre el resultado corresponde al que mayor frecuencia tiene) ya que matemáticamente  y de acuerdo a la propiedad aleatoria de los resultados (tendría mayor probabilidad de salir la suma y/o el digito que mas sorteos tenga, sin salir, como  resultado). Una vez  que UD. ya consulto esta tabla que le presenta el  Frecuenciometro , podrá consultar  las graficas de variación de resultados de las sumas por (dígitos) correspondientes      (usando el filtro para los que quiera analizar ) y  así  tomar una  o varias de  ellas,  para su (s)  pronóstico (s) . A continuación  con ayuda de sus  graficas de  variación  estadística de cada uno de los números  de  sorteo a  sorteo (que se podrán accesar sin usar ningún filtro)  UD. deberá formar las combinaciones que serán  sus limites inferior  y superior del campo que quiera abarcar y de acuerdo a la forma de hacer esto (Que le indicamos en las paginas N° 11, 12, y 13) También podrá formar  estas combinaciones de sus limites inf. y  sup. consultando las graficas ( filtradas) de variación de números  de la  suma  que UD. elija y así formar las combinación (es) indicada (s) que delimiten el campo de  la(s) que UD quiera jugar .Esta es la forma que nosotros recomendamos pero con el tiempo y el uso y la practica para manejar nuestro sistema UD. podrá usar o seguir otra secuencia , para establecer o definir sus limites ya que nuestro sistema tiene esa versatilidad., y  ya que :
<br><br>
“EL COMBINADOR DE SKYMONEY SYSTEMMR TIENE UNA CAPACIDAD PARA DARLE A UD. desde  DOS ( que ud, fija o determina, como limites inferior y superior), hasta varios cientos o miles de combinaciones posibles (DENTRO DE ESOS LIMITES)   y   tambien varios cientos o miles de combinaciones  (CON UNA SEPARACIÓN DE HASTA CUATRO UNIDADES DE NUMERO A NUMERO) (En sentido vertical) que “CUMPLEN EL VALOR” que UD. PREVIAMENTE HAYA ESTABLECIDO. “     
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>