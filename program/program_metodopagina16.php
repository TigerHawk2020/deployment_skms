<?php
@session_start();
include('../conexion.php');
if (isset($_SESSION["authdata"])) {
$authdata = $_SESSION["authdata"];
$xpagina = $_GET["xpagina"];
?>  
  <tr>
    <td>
       <p class="contedido" style="text-align:center;">
GENERADOR DE COMBINACIONES SKYMONEY SYSTEM &reg;
       </p>
    </td>
  </tr>
  <tr>
    <td align="center">
       <img src="imagenes/img_generador.gif">
    </td>
  </tr>
  <tr>
    <td>
       <p class="contedido" style="text-align:justify;">
Y así  cuantas veces quiera. “Esta es la forma de usar  su combinador  y  puede  estar seguro, de que si ESCOGE correctamente sus LIMITES NUMERICOS y el RESULTADO del CONCURSO se DA  dentro  de  esos limites UNA y solo UNA de dichas SERIES sera la GANADORA y SIEMPRE APARECERA en nuestro CALCULADOR  O  GENERADOR  DE   COMBINACIONES ESTA entre OTRAS caracteristicas, son las partes mas INTERESANTES que le ofrece Nuestro “SISTEMA SKYMONEY &reg;” y las que lo hacen “DIFERENTE” a otros metodos o  sistemas  que existen por “ahí”  y que  por medio de una funcion llamada “RANDOM”  eligen de “una” en “una” y al AZAR las combinaciones (Pero no le “indican” como y en que parte de las posibilidades numericas estan ACTUANDO como se los INDICA el NUESTRO  y otros basados en estadisticas de  c iertos GRUPOS de numeros un poco raras, como las  de los numeros Compuestos y no Compuestos o  imperfectos y perfectos , etc, etc.
<br><br>
 Muy RESPETABLES pero que NO se BASAN en un análisis estrictamente  matemático y estadístico  y que NO le muestran al  USUARIO CONCISA Y CLARAMENTE las posibilidades que tiene  y en donde se ubican o  están  esas posibilidades y  sobre  todo no le indican como: acotar o reducir,  esas PROBABILIDADES en CONTRA, como se los indica Skymoney System &reg;., para que tengan unas POSIBLES, aunque DIFÍCILES  PROBABILIDADES  de ÉXITO ;   por  lo  que:
<br><br>
Con lo anterior no le queremos “PRESUMIR” y mucho menos “ASEGURAR” de que con “NUESTRO METODO” UD. SERA un SEGURO  y ABSOLUTO GANADOR (Porque depende de su ACERTADA ELECCION), pero ESTARA mas CERCA QUE MUCHOS OTROS  y  de RESULTAR  en un MOMENTO dado, la SUMA en  los LIMITES por UD. ESCOGIDOS, en un CONCURSO o SORTEO en el QUE PARTICIPE, TENGA LA SEGURIDAD, DE QUE  “DEJARA DE PREOCUPARSE” por “NO TENER DINERO”, para “PASAR a PREOCUPARSE” de cómo “CONSERVAR  el  que GANO”,  PERO ¡BUENO!  !ESTO!  ¡YA  SERA OTRA  COSA!    ¡ MUCHO ÉXITO !  Y
¡ FELICIDADES  !      SU  AMIGO   QUE   LO   APRECIA :   
       </p>
    </td>
  </tr>
<tr>
    <td>
       <p class="contedido" style="text-align:right;">
ING. ELISEO RIOS BAUTISTA 
       </p>
    </td>
  </tr>
<tr>
    <td>
       <p class="contedido" style="text-align:right;">
AUTOR SKYMONEY SYSTEM &reg;
       </p>
    </td>
  </tr>
<?php
        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>