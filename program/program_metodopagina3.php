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
cosas   ¿ que  hacer ? ¿ entre un  CAMPO  tan grande de probabilidades?  Estará ud.  de acuerdo: que lo mejor  será ¡reducir!  lo  mas  que  podamos, ¡ese campo!  para  ¡aumentar nuestras posibilidades¡ bueno, el campo numérico(sumas)  donde van  a  resultar, moverse, o a interactuar,  todas  las posibles combinaciones  de seis números,  desde el  numero  1 al  numero 47.   es el siguiente:
<br><br>
1°).- UD  convendra con nosotros  de que  la  MENOR  y la MAYOR  combinaciones (SUMAS) de seis números en dicho sorteo serian :(en el caso muy improbable de que salieran) (aunque matemáticamente  posible , en ese orden) las siguientes:
<br><br>
 ***.- Nota .- ver mas adelante en  Pág., Nº 7 y 8  Breve explicación
<br><br>
LA MENOR  ES: SUMA  =<br>  1 +  2 +  3 +  4 +  5 +  6  =  21 =  2  +  1 =  3   (digito)*** y  
<br><br>
LA  MAYOR  ES:    SUMA =<br> 42 + 43 + 44 + 45 + 46 + 47 = 267 = 2 + 6 + 7 = 15 = 1 + 5  = 6  digito)***
<br><br>
luego entonces  todas  las demás series resultantes de los  concursos van a estar interactuando (en dicho campo) o sea resultando. entre el   limite   menor   S = 21 = 2 + 1 = 3  (digito )  y  el  limite   mayor :
<br>
S = 267= =2 + 6 + 7 = 15 = 6 (digito ) en sumas de  valores diferentes y (a veces iguales) (en dígitos de las sumas diferentes y  a veces iguales, pero que irán apareciendo a intervalos diferentes y algunas veces repetitivos, que llamaremos FRECUENCIA  de  aparición, esta ultima, con  valores   iguales o muy  aproximados, por ejemplo, a los  dos o tres  sorteos después,  o  a  los  diez  o  doce  sorteos  después  etc,  Ver  grafica N° 1 , en la siguiente pagina: 
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>