<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];
$xpagina = $_POST["xpagina"];
?>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
         Por lo que le recomendamos a nuestro apreciable usuario que al hacer la elecci�n de sus respectivos seis n�meros, la sumas de estos, la(s) ubique de preferencia dentro de estos valores, ya que de esta forma eliminara, aproximadamente el 66% del total de combinaciones posibles, que no saldr�n, o No resultaran frecuentemente = (33% arriba de la suma 192 + 33% abajo de la suma 96.= 66% del total.   De esta forma ubicara sus pron�sticos  dentro del 34% restante del 100%,   de  la banda de combinaciones posibles, en que real y estad�sticamente SI salen o se dan los resultados, con lo que aumentara a no dudarlo de esta forma, sus posibilidades de <b>GANAR</b>  el  <b>PRIMER  PREMIO</b>.<br><br>
         Por lo que, para que ud. tenga mayores posibilidades ganadoras deber�  ubicar  una suma de seis n�meros Viendo o consultando sus graficas de variaci�n estad�stica de sorteo a sorteo, denominada: �<b>B�squeda por A&ntilde;o</b>�, de cada uno  de los n�meros resultantes <b>anteriores actualizada</b>, (Le recomendamos lea el modulo de Ayuda Grafica, para que sepa como utilizar  la Base de  Datos), <b>hasta el ultimo</b> resultado del sorteo inmediato anterior) al que ud  va a intervenir y que estan arreglados en orden ascendente y de izquierda a derecha, es decir: resultado y variaci�n del: primer numero,  del  2� numero ,  del 3� ,  etc,  hasta el  6� numero ;   una vez  que UD  ya  eligi�  o selecciono, (con ayuda de esas  graficas) cada uno de esos  seis n�meros que ud crea o pronostique  que resultaran, en el sorteo, en el que ud. vaya a participar, col�quelos  en sus lugares respectivos en la parte Superior de su GENERADOR de COMBINACIONES  y haga un� click� en el signo =  y le dara  automaticamente el resultado de esta SUMA , que sera  o constituira el Limite INFERIOR del �Campo � Ahora a continuacion elija para cada una de dichas posiciones, y  con aumento de una , dos,  o  mas unidades (**) en cada una de ellas y coloquelas en sus respectivos lugares en la linea de de abajo de su GENERADOR de COMBINACIONES y tambien haga un �click� en el signo = y le dara automaticamente el resultado de esta suma que sera el LIMITE Superior del CAMPO(**)  a continuacion coloque en  la ventana del combinador que dice �TOTAL A BUSCAR� una SUMA que se ubique o se encuentre entre estas dos SUMAS establecidas por ud. y a continuacion haga un�click � en la palabra �INICIAR� de su GENERADOR y aparecera la CANTIDAD TOTAL de COMBINACIONES POSIBLES, dentro del  Campo Elegido y las combinaciones  posibles      ( dentro de ese Campo)  que satisfacen la que ud eligi�. Pero lo mas INTERESANTE de nuestro M�todo y   su GENERADOR de COMBINACIONES, es que Si el resultado del los n�meros del sorteo , se da  dentro de los limites de los n�meros que UD. selecciono, para   sus sumas , en cualquiera de estas combinaciones, estar�   la  COMBINACIONGANADORA*** �Muy Intere$$ante, verdad?<br><br>
       </p>
    </td>
  </tr>
  <tr>
     <td><a class="navegador" href="program_skyquick.php4?xpagina=3">Ver Notas.-</a></td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>