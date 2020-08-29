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
         Por lo que le recomendamos a nuestro apreciable usuario que al hacer la elección de sus respectivos seis números, la sumas de estos, la(s) ubique de preferencia dentro de estos valores, ya que de esta forma eliminara, aproximadamente el 66% del total de combinaciones posibles, que no saldrán, o No resultaran frecuentemente = (33% arriba de la suma 192 + 33% abajo de la suma 96.= 66% del total.   De esta forma ubicara sus pronósticos  dentro del 34% restante del 100%,   de  la banda de combinaciones posibles, en que real y estadísticamente SI salen o se dan los resultados, con lo que aumentara a no dudarlo de esta forma, sus posibilidades de <b>GANAR</b>  el  <b>PRIMER  PREMIO</b>.<br><br>
         Por lo que, para que ud. tenga mayores posibilidades ganadoras deberá  ubicar  una suma de seis números Viendo o consultando sus graficas de variación estadística de sorteo a sorteo, denominada: “<b>Búsqueda por A&ntilde;o</b>”, de cada uno  de los números resultantes <b>anteriores actualizada</b>, (Le recomendamos lea el modulo de Ayuda Grafica, para que sepa como utilizar  la Base de  Datos), <b>hasta el ultimo</b> resultado del sorteo inmediato anterior) al que ud  va a intervenir y que estan arreglados en orden ascendente y de izquierda a derecha, es decir: resultado y variación del: primer numero,  del  2° numero ,  del 3° ,  etc,  hasta el  6° numero ;   una vez  que UD  ya  eligió  o selecciono, (con ayuda de esas  graficas) cada uno de esos  seis números que ud crea o pronostique  que resultaran, en el sorteo, en el que ud. vaya a participar, colóquelos  en sus lugares respectivos en la parte Superior de su GENERADOR de COMBINACIONES  y haga un” click” en el signo =  y le dara  automaticamente el resultado de esta SUMA , que sera  o constituira el Limite INFERIOR del “Campo “ Ahora a continuacion elija para cada una de dichas posiciones, y  con aumento de una , dos,  o  mas unidades (**) en cada una de ellas y coloquelas en sus respectivos lugares en la linea de de abajo de su GENERADOR de COMBINACIONES y tambien haga un “click” en el signo = y le dara automaticamente el resultado de esta suma que sera el LIMITE Superior del CAMPO(**)  a continuacion coloque en  la ventana del combinador que dice “TOTAL A BUSCAR“ una SUMA que se ubique o se encuentre entre estas dos SUMAS establecidas por ud. y a continuacion haga un”click “ en la palabra “INICIAR” de su GENERADOR y aparecera la CANTIDAD TOTAL de COMBINACIONES POSIBLES, dentro del  Campo Elegido y las combinaciones  posibles      ( dentro de ese Campo)  que satisfacen la que ud eligió. Pero lo mas INTERESANTE de nuestro Método y   su GENERADOR de COMBINACIONES, es que Si el resultado del los números del sorteo , se da  dentro de los limites de los números que UD. selecciono, para   sus sumas , en cualquiera de estas combinaciones, estará   la  COMBINACIONGANADORA*** ¿Muy Intere$$ante, verdad?<br><br>
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