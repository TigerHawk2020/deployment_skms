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
         Estimado usuario sabemos de antemano que UD. es una persona  muy ocupada  y que quiz�s no tenga  tiempo para  leer completo y con detenimiento nuestro m�todo (Aunque le recomendamos,  que en cuanto pueda lo haga). Bien, as� que especialmente para ud..que es una de esas personas  y  adem�s  le gusta  ser  muy  practico, a  continuaci�n le daremos una explicaci�n, lo mas sencilla posible, de c�mo aplicarlo, concisa y r�pidamente, con posibilidades ganadoras:<br><br>
        <b>1�</b> Para ganar el Primer Premio del  sorteo del  �MELATE� Es necesario marcar y acertar  a   seis numeros, llamados  naturales,  que resulten  en dicho sorteo,de una serie consecutiva que va del N�1 al N� 47 y si ud quiere participar con esa(s) misma (s) combinacion (es) de (6) en un sorteo extra que se hace a continuacion, de este, al que le denominan  �La REVANCHA� debera pagar   $ 5 .00 extras a los $ 10. 00 que cuestan los seis del  �MELATE�  Unicamente  en el del MELATE, dan  el resultado de un numero mas, al que le denominan numero adicional  y que sirve al que lo marco, para asignarle otros premios, pero NO el Primer Premio, este se  obtiene  UNICAMENTE, como ya   lo  indicamos, acertando a los seis numeros naturales resultantes en cada uno, de los mencionados sorteos.<br><br>
        Ahora bien, si ud acierta a los seis n�meros naturales  de alguno de dichos sorteos, l�gicamente tambi�n acertara a la suma  de sus seis n�meros, seg�n sea en el que acierte �verdad ?. Bueno nuestro Sistema con su Generador de Combinaciones con mayores posibilidades ganadoras, es b�sicamente la ubicaci�n mas adecuada de los seis n�meros, que constituyen esas SUMAS, ,a las que  denominamos, o llamamos : Campos. <br><br>
        Estad�sticamente, los resultados de las SUMAS de los seis n�meros, en estos sorteos, frecuente o normalmente, se dan o resultan entre los valores( Campos ) de la(s) :<br><br>
SUMA m�nima = 96  y   la  SUMA m�xima =192

       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>