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
La siguiente Grafica ilustra el Campo anterior para 44 n�meros   (s/ escala).  En color rojo  las sumas equivalentes al digito = 6  �nicamente  como  ejemplo  y  antecedente:
       </p>
    </td>
  </tr>
  <tr>
    <td align="center">
       <img src="imagenes/grafica_uno.gif">
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
(Lo que se puede comprobar al ver los resultados y compararlos unos con otros) en el valor de su suma y su aparici�n  desde sorteos N� 556  al  1547 ( Que se  jugaba con 44 N�meros)  y (La que  seguiremos  tomando como base ya que de no hacerlo  as�  no  tendr�amos ning�n dato estad�stico  en el que basarnos  y tendr�amos que partir pr�cticamente de cero, lo que �relativamente� �no debe ser asi�  ya que para la aplicaci�n de nuestro Metodo, al  agregar los N�s 45, 46 y 47, unicamente el campo  aumento y logicamente aumentaron las probabilidades en contra del jugador , como se indicara mas  adelante en la Gr�fica  N� 2.
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>