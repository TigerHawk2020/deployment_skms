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
Por  lo explicado  y representado en la grafica anterior  Nº 1 de Skymoney (para las variaciones  anteriores con 44    números ) UD. puede ver que en la Grafica del Campo podemos distinguir (al compararlas con los datos estadísticos de los resultados) que Normalmente el valor de las Sumas Resultantes (En el total = 959 de Sorteos, desde el sorteo Nº 556 hasta el sorteo Nº 1547 (91% de ellos = 873) resultaron entre el valor = 90 y 180  así vemos que este valor del Campo (real) en dicha grafica  fue de:Cr=180 – 90 = 90  Ahora en  forma similar en la siguiente grafica Nº2  de ”SKYMONEY” se representara el aumento del  campo o banda donde se espera se daran o actuaran las sumas resultantes al  agregar los numeros: 45 , 46 y 47 al sorteo y que se representara a continuacion:  (En linea roja y numeros azules  para el digito (1)  s/esc. unicamente  como ejemplo:  (puede ser con otro digito) Y ya que la serie maxima aumento de:
<br><br>
39+40+41+42+43+44= 249  a: 42 + 43 + 44 + 45 + 46 + 47= 267
       </p>
    </td>
  </tr>
  <tr>
    <td align="center">
       <img src="imagenes/grafica_dos.gif">
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>