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
Ahora y  como ejemplo vamos a referirlo al  primer sorteo que incluyo 47 n�meros y que fue el N� 1548  y cuyo resultado fue :  9 + 13 + 14 + 25 + 41 + 47 = 149 = 1 + 4 + 9 = 14 = 5  Supongamos  que  nosotros mediante nuestro apoyo grafico de sumas y d�gitos hubi�ramos elegido (por su variaci�n estad�stica)   la suma = 148  o su digito = 4  y que coloc�ramos los limites num�ricos como ya lo indicamos ( 6 n�meros de diferencia total) es decir ( 145 ) suma  tres n�meros  menos (para 64 combinaciones en total ) entonces 145 va a ser el limite inferior del campo  ( colocarla en el rengl�n superior de Combinador) y de acuerdo a dichos limites podr�amos haber seleccionado : 8 +12 + 14 + 25 + 40 + 46 = 145 y  en la l�nea de abajo del Combinador (limite superior del campo) debemos poner : 9 + 13 + 15 + 26 + 41 + 47 =  151  tres n�meros mayor que la suma buscada ( 6 en total de dif.)   y  en la ventana  de  TOTAL A BUSCAR  del  COMBINADOR  pondr�amos  148   a  continuaci�n hacemos � Click�   en  �INICIAR� en  nuestro combinador  y  se desplegaran 20  combinaciones de las 64 posibles para dichos limites (las que podremos ver  utilizando la barra de control vertical , localizada a la derecha de esa pantalla) y observaremos que en las veinte combs. Correspondientes para esta suma  NO esta obviamente la combinacion  GANADORA ya que esta sumo 149  lo anterior  lo hemos expuesto deliberadamente, as�, en este ejemplo, para que ud se de cuenta, de que si el resultado del sorteo, se da dentro de los limites que ud  Eligio,  ud podr� ser el  GANADOR porque, aunque dicho resultado, no apareci�, en las 20 combinaciones que satisfacen el valor 148, que ud deliberadamente eligi�, de todos modos, la combinaci�n ganadora estar�  ah� dentro de las 64 posibles, ya que estas se desplegaran en una forma similar a las de la tabla expuesta en la P�g.. N� 23 (por favor anal�cela) ya que  el total de combinaciones  se dar�n  como  sigue :

       </p>
    </td>
  </tr>
  <tr>
    <td align="center">
     <table border="0" cellpadding="4" cellspacing="0" width="560">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">SUMA<br>TOTAL</td>
        <td>&nbsp;</td>        
        <td align="center">TOTAL<br>COMBS</td>
      </tr>
      <tr>
        <td align="left"><b>Combin. elegida por ud limite infer. del campo</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center"><b>145</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center" width="50"><b>una</b></td>
      </tr>
      <tr>
        <td align="left">Combins. Sigts. Generdas. por el Combinador</td>
        <td align="center" width="50">=</td>
        <td align="center">146</td>
        <td align="center" width="50">=</td>
        <td align="center" width="50">seis</td>
      </tr>
      <tr>
        <td align="left">Combins. Sigts. Generdas. por el Combinador</td>
        <td align="center" width="50">=</td>
        <td align="center">147</td>
        <td align="center" width="50">=</td>
        <td align="center" width="50">quince</td>
      </tr>
      <tr>
        <td align="left">Combins. Sigts. Generdas por  el Combinador</td>
        <td align="center" width="50">=</td>
        <td align="center">148</td>
        <td align="center" width="50">=</td>
        <td align="center" width="50">veinte</td>
      </tr>
      <tr>
        <td align="left"><b>Combs. Sigts. Generdas por  el Combinador</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center"><b>149</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center" width="50"><b>quince</b></td>
      </tr>
      <tr>
        <td colspan="5" align="center">
          <p class="contedido" style="font-size=10">
           (En esta serie estar� la ganadora ,3�  de abajo hacia arriba en el  Combinador) ya que la GANADORA sumo  149  c/ dichos limits.
        </td>
      </tr>
      <tr>
        <td align="left">Combins. Sigts. Generdas por  el Combinador</td>
        <td align="center" width="50">=</td>
        <td align="center">150</td>
        <td align="center" width="50">=</td>
        <td align="center" width="50">seis</td>
      </tr>
      <tr>
        <td align="left"><b>Combins. Sigts. Generdas por  el Combinador</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center"><b>151</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center" width="50"><b>una</b></td>
      </tr>
      <tr>
        <td align="right" colspan="3"><b>TOTAL  COMBINACIONES</b></td>
        <td align="center" width="50"><b>=</b></td>
        <td align="center" width="50"><b>64</b></td>
      </tr>
     </table>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
El anterior ejemplo se lo expusimos deliberadamente en esta forma para que ud se de cuenta de que si elige unos limites num�ricos determinados para su(s) suma(s) elegida(s) y el resultado se da dentro de esos limites y si ud jug�  la(s) suma(s) que resulte(n) dentro de dichos limites entonces en una de estas combinaciones con toda seguridad estar� la GANADORA DEL SORTEO  Y UD. SERA UN  GANADOR.<br><br>
    NOTA ).� La �nica recomendaci�n que le hacemos, es que cuando establezca  sus limites  num�ricos en su combinador de Skymoney System &reg; , si estos limites num�ricos son continuos , es decir : 3 +12 + 19 + 20 + 21 + 33 = 108 = 9, como ejemplo, continuos  en : ( 19 + 20 + 21 )   Ud.  �nicamente podr� establecer  limite inf. 18  o menor y limite superior 19 ; as� como en  limite inf. 21  y limite superior 22  o mayor, No as� en  20  ya que debajo de  el esta  19  que ya se tomo como limite superior en la posici�n anterior  y tampoco  como  20 inf. Y 21 sup. Ya que 21 se tomo como limite inf. En la siguiente posici�n, por lo que en este caso y similares para anotar en la pantalla del combinador se deber� anotar limite inf.=20,limite superior=20 reduci�ndose con esto el  �CAMPO�, ya que ese limite num�rico, no tiene ninguna otra posibilidad y tendr� que ser exacto=20.  De no hacerlo as� y establecer sus limites num�ricos como lo indicamos, al hacer �click� en �INICIAR� (en  su  combinador de Skymoney SystemMR ) les saldr� una leyenda que dir�: <b>�RANGOS EN CONFLICTO �</b>
<br><br>
Que le indicara a Ud. que deber� de reconsiderar sus limites num�ricos de una manera  adecuada, una vez corregidos dichos limites num�ricos, verificar en su Combinador, que la suma    que   � CUMPLE   O   SATISFACE   LA   CONDICION � �QUE UD. ELIGIO� este anotada en la ventana correspondiente a : (TOTAL A BUSCAR)   de  su  COMBINADOR, entonces volver a hacer  �click� en  �INICIAR�  para volver a ver la  cantidad de COMBINACIONES POSIBLES   y  la  cantidad  de combinaciones  que �CUMPLEN   la  CONDICION� o �SATISFACEN  LA  SUMA�    que   UD.  busca. 
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>