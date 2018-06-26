<?php
if (!isset($xpagina)) {
   $xpagina = 1;
}
?>
<html>
<head>
   <LINK REL=STYLESHEET HREF="smprogram_style_explorer.css" TYPE="text/css">
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

<div id="fondo" style="position:absolute;">
  <img src="imagenes/fondo_program.gif">
</div>

<div id="contenido" style="position:absolute;">
  <table border="0" cellpading="0" cellspacing="10" width="100%">
    <tr>
     <td height="70" vAlign="top">
       <table border="0" cellpading="0" cellspacing="8" width="100%">
         <tr>
<?php
  if ($xpagina ==  1) {
?>
           <td align="right" height="30" vAlign="bottom">
	      <img src="imagenes/bottom_next.gif" onMouseOver="this.style.cursor='hand';" alt="Avanzar Página" onClick="location.href='program_pant001.php4?xpagina=2';">
           </td>
<?php
                      }
  else {
?>
            <td align="right" height="30" vAlign="bottom">
	      <img src="imagenes/bottom_prev.gif" onMouseOver="this.style.cursor='hand';" alt="Retroceder Página" onClick="location.href='program_pant001.php4?xpagina=1';">
           </td><?php
       }      
?>
         </tr>
       </table>
     </td>
    </tr>
<?php
  if ($xpagina ==  1) {
?>
    <tr>
      <td>
        <p class="contenido"> 
Estoy convencido que su inquietud y curiosidad al adquirir &eacute;ste m&eacute;todo y su calculador de combinaciones, lo han delatado a usted como un amante apasionado de dichas especialidades de las matem&aacute;ticas, pero adem&aacute;s como un ocasional o ferviente jugador que  se  tiene fe y le  da  posibilidades a su futuro.
<br><br>
Observe, que <strong>deliberadamente</strong> omitimos decir "que tiene <strong>fe en su suerte</strong> ", pues aunque <strong>&eacute;sta  interviene de una manera decisiva</strong>  y muy  importante,  "<strong>Es conveniente ayudarle</strong>" para que ocurra el ¡ <strong>extraordinario suceso</strong> !  que Ud. sea ¡ <strong>El ganador</strong> ! , Sin embargo queremos advertirle, que  por  <strong>el solo hecho</strong> de  <strong>adquirir &eacute;ste m&eacute;todo no le garantizamos</strong>  a  <strong>Ud. de ninguna manera, ganar infaliblemente alg&uacute;n premio</strong> (ya que lo anterior depende de muchas circunstancias y de su aptitud para aplicarlo) <strong>pero, s&iacute; confiamos, en que le ser&aacute;, de una invaluable ayuda</strong>.
<br><br>
El objetivo que tiene el sistema Skymoney que Ud. acaba de adquirir es, precisamente ese, el de "aumentar las posibilidades de su suerte", o  "aumentar las posibilidades de sus aciertos" por no decir  "disminuir las posibilidades de falla ", ya que  todas son aplicables a dicho objetivo, como usted  lo  ver&aacute;  mas adelante.
        </p>
      </td>
    </tr>
<?php
                      }
   else {
?>
    <tr>
      <td>
        <p class="contenido"> 
<strong>¡ No se detenga ! y ! avance !  Ud. ya ha iniciado un "entretenido"</strong> y a la vez <strong>"maravilloso"</strong> recorrido en dichos campos, que   ¿por qué no?, pueden  depararle la brillante sorpresa de tener éxito y  ser uno de los felices ganadores en sorteos                          como el  "<strong>M e l a t e</strong>" en <strong>México</strong>, ó <strong>similares</strong> en <strong>otros países</strong>, lo que como usted sabe es  ! <strong>Difícil</strong> !  más  <strong>confiamos</strong>   en  que   ! <strong>no imposible</strong> !
<br></br>
Nosotros nos sentiremos satisfechos si en alguno de los concursos usted resulta ser uno de los ¡ Felices ganadores !; <strong>lo anterior  es un "gran reto"</strong> para  todo tipo de jugador  eventual o permanente  y  <strong>quizás</strong>, la <strong>oportunidad</strong> para que <strong>Ud.</strong> sea <strong>uno</strong> de <strong>dichos ganadores</strong>, cualquiera que sea la modalidad en  la  que  juegue.
<br></br>
Nuestro entorno actual requiere cada día más de gente como usted <strong>que se tiene fe</strong> y por lo tanto la <strong>tiene en  el futuro</strong> y lo que les <strong>depara el destino</strong>   ! la que cada día  es más difícil de encontrar!  dadas las deplorables condiciones en las que se desenvuelve y en el que conllevamos una gran responsabilidad, pero que <strong>al intervenir en él, podemos también considerar</strong>,  como ! <strong>un gran  reto</strong> !  y un ! <strong>Gran  orgullo</strong> !  
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p class="contenido" style="text-align:center;"><strong>¡ B I E N V E N I D O !</strong></p>
      </td>
    </tr>
    <tr>
      <td align="right">
        <table> 
        <tr>
         <td>
        <p class="contenido" style="text-align:right;"><strong>Ing. Eliseo R&iacute;os Bautista</strong></p>
         </td>
        </tr>
        <tr>
         <td>
        <p class="contenido" style="text-align:right;"><strong>SkyMoney System</strong></p>
         </td>
        </tr>
        </table>
      </td>
    </tr>
<?php
        }
?>
  </table>
</div>
</body>
</html>