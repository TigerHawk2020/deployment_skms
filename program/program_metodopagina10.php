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
de acuerdo al  pr�ximo sorteo que se va efectuar ( que ud. podr� tomar en cuenta) (pero no necesariamente, ya que no siempre el resultado corresponde al que mayor frecuencia tiene) ya que matem�ticamente  y de acuerdo a la propiedad aleatoria de los resultados (tendr�a mayor probabilidad de salir la suma y/o el digito que mas sorteos tenga, sin salir, como  resultado). Una vez  que UD. ya consulto esta tabla que le presenta el  Frecuenciometro , podr� consultar  las graficas de variaci�n de resultados de las sumas por (d�gitos) correspondientes      (usando el filtro para los que quiera analizar ) y  as�  tomar una  o varias de  ellas,  para su (s)  pron�stico (s) . A continuaci�n  con ayuda de sus  graficas de  variaci�n  estad�stica de cada uno de los n�meros  de  sorteo a  sorteo (que se podr�n accesar sin usar ning�n filtro)  UD. deber� formar las combinaciones que ser�n  sus limites inferior  y superior del campo que quiera abarcar y de acuerdo a la forma de hacer esto (Que le indicamos en las paginas N� 11, 12, y 13) Tambi�n podr� formar  estas combinaciones de sus limites inf. y  sup. consultando las graficas ( filtradas) de variaci�n de n�meros  de la  suma  que UD. elija y as� formar las combinaci�n (es) indicada (s) que delimiten el campo de  la(s) que UD quiera jugar .Esta es la forma que nosotros recomendamos pero con el tiempo y el uso y la practica para manejar nuestro sistema UD. podr� usar o seguir otra secuencia , para establecer o definir sus limites ya que nuestro sistema tiene esa versatilidad., y  ya que :
<br><br>
�EL COMBINADOR DE SKYMONEY SYSTEMMR TIENE UNA CAPACIDAD PARA DARLE A UD. desde  DOS ( que ud, fija o determina, como limites inferior y superior), hasta varios cientos o miles de combinaciones posibles (DENTRO DE ESOS LIMITES)   y   tambien varios cientos o miles de combinaciones  (CON UNA SEPARACI�N DE HASTA CUATRO UNIDADES DE NUMERO A NUMERO) (En sentido vertical) que �CUMPLEN EL VALOR� que UD. PREVIAMENTE HAYA ESTABLECIDO. �     
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>