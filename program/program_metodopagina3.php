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
cosas   � que  hacer ? � entre un  CAMPO  tan grande de probabilidades?  Estar� ud.  de acuerdo: que lo mejor  ser� �reducir!  lo  mas  que  podamos, �ese campo!  para  �aumentar nuestras posibilidades� bueno, el campo num�rico(sumas)  donde van  a  resultar, moverse, o a interactuar,  todas  las posibles combinaciones  de seis n�meros,  desde el  numero  1 al  numero 47.   es el siguiente:
<br><br>
1�).- UD  convendra con nosotros  de que  la  MENOR  y la MAYOR  combinaciones (SUMAS) de seis n�meros en dicho sorteo serian :(en el caso muy improbable de que salieran) (aunque matem�ticamente  posible , en ese orden) las siguientes:
<br><br>
 ***.- Nota .- ver mas adelante en  P�g., N� 7 y 8  Breve explicaci�n
<br><br>
LA MENOR  ES: SUMA  =<br>  1 +  2 +  3 +  4 +  5 +  6  =  21 =  2  +  1 =  3   (digito)*** y  
<br><br>
LA  MAYOR  ES:    SUMA =<br> 42 + 43 + 44 + 45 + 46 + 47 = 267 = 2 + 6 + 7 = 15 = 1 + 5  = 6  digito)***
<br><br>
luego entonces  todas  las dem�s series resultantes de los  concursos van a estar interactuando (en dicho campo) o sea resultando. entre el   limite   menor   S = 21 = 2 + 1 = 3  (digito )  y  el  limite   mayor :
<br>
S = 267= =2 + 6 + 7 = 15 = 6 (digito ) en sumas de  valores diferentes y (a veces iguales) (en d�gitos de las sumas diferentes y  a veces iguales, pero que ir�n apareciendo a intervalos diferentes y algunas veces repetitivos, que llamaremos FRECUENCIA  de  aparici�n, esta ultima, con  valores   iguales o muy  aproximados, por ejemplo, a los  dos o tres  sorteos despu�s,  o  a  los  diez  o  doce  sorteos  despu�s  etc,  Ver  grafica N� 1 , en la siguiente pagina: 
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>