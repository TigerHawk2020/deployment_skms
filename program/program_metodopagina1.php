<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];
$xpagina = $_GET["xpagina"];
?>
  <tr>
    <td>
       <p class="contedido"><strong>Citas al respecto.</strong></p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido"><strong>Una razonable probabilidad es la única certeza...</strong> E. W. HOWE</p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido"><strong>Es una verdad cierta que cuando no esta en nuestras manos el determinar lo que es verdad, debemos seguir lo que es mas probable....</strong> RENE  DESCARTES</p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido"><strong>DESCRIPCI&Oacute;N DEL SISTEMA SKYMONEY SYSTEM &reg;</strong></p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido"><strong>Estimado Amigo:</strong></p>
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
El m&eacute;todo que adquiri&oacute; tiene como objetivo  el  de  formar  una  o  varias  combinaciones de  seis n&uacute;meros con posibilidades  de ganar,  en sorteos  o  concursos  como el <strong>"Melate"</strong>  (en M&eacute;xico)  o  los que sean  iguales  o  similares  (en otros pa&iacute;ses).<br><br>
Los sorteos del “MELATE “ y  la  “REVANCHA”  consisten  en acertar a seis números de una serie consecutiva que iva del sorteo N° 556 hasta el sorteo N° 1547,  del numero 1 al numero 44  y a partir del sorteo N° 1548 ira del numero 1,  al  47 ,  es  decir,  le  agregaron a los sorteos los números 45, 46 y 47.
<br><br>
Si   su combinación  concuerda o  es igual  en los seis  números  resultantes UD. será el  ganador del   PRIMER    PREMIO  de dichos  sorteos, si participo en ambos.

       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>