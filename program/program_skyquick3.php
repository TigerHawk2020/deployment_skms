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
         <b>*** Nota.-</b> Por favor compruebe esto analizando los ejemplos anotados en las paginas N°s 13 y 14  de nuestro  METODO TEORICO , o con cualquier otro resultado, en que ud  quiera verificar lo   mencionado arriba.Atn° Muy importante que ud  lo verifique.<br><br>
         <b>** Nota.-</b> Recuerde que entre mas unidades de separación elija entre c/u de los números, obviamente  mas combinaciones.  con posibilidades ganadoras resultaran,  pero aumentara su costo.<br><br>
         <b>* Nota.-</b> Cuando UD. vaya a elegir limites continuos es decir únicamente como ejemplo : numero 4  para el primer numero de   su combinación, numero 5 para el segundo y 6 para el tercero, deberá tener cuidado en como ubicar dichos limites, en el GENERADOR (le recomendamos leer cuidadosamente la pagina N° 15 de nuestro Método) ya que si no lo hace correctamente, en el GENERADOR de COMBINACIONES le saldrá una leyenda que le dirá que estos “RANGOS estan en CONFLICTO “y se bloquearan los resultados,hasta que ud  ubique  y  coloque los limites correcta y adecuadamente y vuelva a hacer “click” en INICIAR, en su GENERADOR.<br><br>         
       </p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
         En dado caso de que usted tenga dudas, le recomendamos que lea las 16 paginas del Método Teórico, pero si aun usted tiene dudas después de leer el método por favor escribanos a la dirección:<br><br>
       </p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:center;">
            ing_eliseo_rios_bautist@skymoneysystem.com<br><br>
            Para aclarárselas, estamos a sus apreciables ordenes<br><br>
            <b>Atte. Grupo Skymoney System</b>
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>