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
Muy RESPETABLES pero que NO se BASAN en un an�lisis estrictamente  matem�tico y estad�stico  y que NO le muestran al  USUARIO CONCISA Y CLARAMENTE las posibilidades que tiene  y en donde se ubican o  est�n  esas posibilidades y  sobre  todo no le indican como: acotar o reducir,  esas PROBABILIDADES en CONTRA, para que tengan unas POSIBLES, aunque DIF�CILES  PROBABILIDADES  de �XITO ;   por  lo  que:
<br><br>
Con lo anterior no le queremos "PRESUMIR" y mucho menos "ASEGURAR" de que con nuestro sistema, ud. ser� un seguro  y absoluto ganador (porque depende de su acertada elecci�n), pero estar� m�s cerca que muchos otros  y  de resultar  en un momento dado, la suma en  los l�mites por ud. escogidos, en un concurso o sorteo en el que participe, tenga la seguridad, de que  "dejar� de preocuparse" por "no tener dinero", para "pasar a preocuparse" de c�mo "conservar  el  que gan�",  pero �bueno!  !esto!  �ya  sera otra  cosa!    � mucho �xito!   y
� FELICIDADES  !      su  amigo   que   lo   aprecia :
                                                            
		Ing. Eliseo R�os Bautista
Autor de SkyMoney System

       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>