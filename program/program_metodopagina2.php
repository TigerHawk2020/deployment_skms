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
Ud. también puede jugar una modalidad  llamada MÚLTIPLE           (marcar en un boleto mas de seis números), ”La cual NO recomendamos a no ser de que se analicen cuidadosamente los campos o (sumas) que se quieran abarcar”
<br><br>
Nota.- Ver mas adelante en pag. n° 8,  breve explicacion.
<br><br>
Únicamente en el “ Melate”, incluyen un numero  extra dentro de dicha serie,  al que le llaman numero adicional y que ayuda al jugador que lo marco, en sus combinaciones, en algunas series ganadoras para ( 2° s, 4°s y  6ºS  premios ),  pero para nuestro propósito “Que es el  de formar la serie de seis numeros naturales ganadora, para  el  primer premio”, no lo tomaremos en cuenta.
<br><br>
¡ Lo  que   es  obvio  por que ¡  sin embargo si este numero  lo  incluimos junto con otros  cinco, cuatro o tres  de la  serie de seis, en el resultado  de algun sorteo, ya seremos ganadores de alguno de esos premios, segun corresponda.
<br><br>
A continuación  nos referiremos al Campo que abarcan  las posibilidades de combinaciones de seis números  de  entre  la  serie  ahora  del  ( N° 1  al  N° 47 )  que son los que intervendrán en este tipo de sorteos, las cuales como ud. sabe  son  muy grandes  de 10,737,573  de posibilidades, por una combinación de ud. o, de 5,368,786 (la mitad, por dos combinaciones de ud ) y así  sucesivamente, esta claro que entre mas  combinaciones  juegue ud. mas aumentan sus posibilidades de ganar, sin embargo, aun así participando con un numero muy grande de combinaciones, sigue siendo una proporción desfavorable,  en contra del jugador,  por lo que consideramos   difícil  el salir GANADOR y el hecho de que lo logremos seria un SUCESO EXTRAORDINARIO, pero al mismo tiempo  posible. el Método Skymoney System &reg; que le proponemos persigue este objetivo,  ya que jugar una gran cantidad de combinaciones o (Una modalidad en múltiple muy  grande)  no le  asegura  dentro de su  numero  grande de posibilidades,  que sea UD. el ganador  y esta forma de jugar seria muy costosa  y probablemente, a quien así  lo hiciera,  lo llevaría a la ruina. y si jugamos  ¡al  hay  se va¡  o sea totalmente al ¡AZAR¡  y  ¡no dudamos¡ que esta seria  y de hecho es la forma, en que la mayoría de los concursantes juega, como  tampoco dudamos que exista por ahí  el  súper afortunado  que gane  y  ( a  la primera ves que juegue en el sorteo, en esta forma, pero entonces creemos NO seria  UD. el tipo de jugador  serio  que aplica su inteligencia y que se respeta así   mismo ,  así  las

       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>