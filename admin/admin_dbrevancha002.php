<?php
@session_start();
include('../conexion.php');
if (session_is_registered("auth_usuario")) {
    
  $xsorteo = filter_input(INPUT_GET, 'xsorteo', FILTER_SANITIZE_SPECIAL_CHARS);
 $x_mes = filter_input(INPUT_GET, 'x_mes', FILTER_SANITIZE_SPECIAL_CHARS);
 $x_dia = filter_input(INPUT_GET, 'x_dia', FILTER_SANITIZE_SPECIAL_CHARS);
 $x_anno = filter_input(INPUT_GET, 'x_anno', FILTER_SANITIZE_SPECIAL_CHARS);
 $xnat1 = filter_input(INPUT_GET, 'xnat1', FILTER_SANITIZE_SPECIAL_CHARS);
 $xnat2 = filter_input(INPUT_GET, 'xnat2', FILTER_SANITIZE_SPECIAL_CHARS);
 $xnat3 = filter_input(INPUT_GET, 'xnat3', FILTER_SANITIZE_SPECIAL_CHARS);
 $xnat4 = filter_input(INPUT_GET, 'xnat4', FILTER_SANITIZE_SPECIAL_CHARS);
 $xnat5 = filter_input(INPUT_GET, 'xnat5', FILTER_SANITIZE_SPECIAL_CHARS);
 $xnat6 = filter_input(INPUT_GET, 'xnat6', FILTER_SANITIZE_SPECIAL_CHARS);
 $xadicional = filter_input(INPUT_GET, 'xadicional', FILTER_SANITIZE_SPECIAL_CHARS);
 $xbolsa = filter_input(INPUT_GET, 'xbolsa', FILTER_SANITIZE_SPECIAL_CHARS);
   
 $accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_SPECIAL_CHARS);

 $xcomp1 = 57 - $xnat6;
 $xcomp2 = 57 - $xnat5;
 $xcomp3 = 57 - $xnat4;
 $xcomp4 = 57 - $xnat3;
 $xcomp5 = 57 - $xnat2;
 $xcomp6 = 57 - $xnat1;
 $xsumacomp = $xcomp1 + $xcomp2 + $xcomp3 + $xcomp3 + $xcomp4 + $xcomp5 + $xcomp6;
    
 switch($accion) {
    case 1:    $sql_busca_sorteo = "select sorteo from smdbrevancha where sorteo = $xsorteo";
               $result_sql = mysql_query($sql_busca_sorteo);
               if (mysql_num_rows($result_sql)) {
                 header("Location: admin_dbrevancha001.php?error=2&tmp_sorteo=$xsorteo");
               } else {

               if (checkdate($x_mes, $x_dia, $x_anno)) {
               $xfecha_tmp = $x_anno.'-'.$x_mes.'-'.$x_dia;                
               $xsuma = $xnat1 + $xnat2 + $xnat3 + $xnat4 + $xnat5 + $xnat6;
               $xnumero = $xsuma;
               settype($xnumero,'string');
               $tmp_suma = 0;     
               for ($i=0; $i<strlen($xnumero); $i++) {
                    $xnum = $xnumero[$i];
                    settype($xnum, 'integer');
                    $tmp_suma = $tmp_suma + $xnum;
                  }             
               $xnumero = $tmp_suma;
               settype($xnumero,'string');
               if (strlen($xnumero) > 1) {
               $tmp_suma = 0;
               for ($i=0; $i<strlen($xnumero); $i++) {
                   $xnum = $xnumero[$i];
                   settype($xnum, 'integer');
                   $tmp_suma = $tmp_suma + $xnum;
                 }        
               }
               //-------- Obtener el digito de la suma complementario
               $xnumero = $xsumacomp;
               settype($xnumero,'string');
               $tmp_sumacomp = 0;     
               for ($i=0; $i<strlen($xnumero); $i++) {
                    $xnum = $xnumero[$i];
                    settype($xnum, 'integer');
                    $tmp_sumacomp = $tmp_sumacomp + $xnum;
                  }             
               $xnumero = $tmp_sumacomp;
               settype($xnumero,'string');
               if (strlen($xnumero) > 1) {
               $tmp_sumacomp = 0;
               for ($i=0; $i<strlen($xnumero); $i++) {
                   $xnum = $xnumero[$i];
                   settype($xnum, 'integer');
                   $tmp_sumacomp = $tmp_sumacomp + $xnum;
                 }        
               }
               //--------
               $sql_insert = "insert into smdbrevancha set ";
               $sql_insert .= "sorteo = $xsorteo, ";
               $sql_insert .= "fecha = '$xfecha_tmp', ";
               $sql_insert .= "nat1 = $xnat1, ";
               $sql_insert .= "nat2 = $xnat2, ";
               $sql_insert .= "nat3 = $xnat3, ";
               $sql_insert .= "nat4 = $xnat4, ";
               $sql_insert .= "nat5 = $xnat5, ";
               $sql_insert .= "nat6 = $xnat6, ";
               $sql_insert .= "bolsa = '$xbolsa', ";
               $sql_insert .= "suma = $xsuma, ";
               $sql_insert .= "digito = $tmp_suma,";
               $sql_insert .= "comp1 = $xcomp1, ";
               $sql_insert .= "comp2 = $xcomp2, ";
               $sql_insert .= "comp1 = $xcomp1, ";
               $sql_insert .= "comp1 = $xcomp1, ";
               $sql_insert .= "comp1 = $xcomp1, ";
               $sql_insert .= "comp1 = $xcomp1, ";
               $sql_insert .= "sumacomp = $xcomp1, ";
               $sql_insert .= "digitocomp = $tmp_sumacomp ";
               mysql_query($sql_insert, $db);
               header("Location: admin_dbrevancha001.php");             
                
               }
               else { header("Location: admin_dbrevancha001.php?error=1"); }
               }
               break;
    case 2: 
               if (checkdate($x_mes, $x_dia, $x_anno)) {

               $xfecha_tmp = $x_anno.'-'.$x_mes.'-'.$x_dia;                
               $xsuma = $xnat1 + $xnat2 + $xnat3 + $xnat4 + $xnat5 + $xnat6;
               $xnumero = $xsuma;
               settype($xnumero,'string');
               $tmp_suma = 0;     
               for ($i=0; $i<strlen($xnumero); $i++) {
                    $xnum = $xnumero[$i];
                    settype($xnum, 'integer');
                    $tmp_suma = $tmp_suma + $xnum;
                  }             
               $xnumero = $tmp_suma;
               settype($xnumero,'string');
               if (strlen($xnumero) > 1) {
               $tmp_suma = 0;
               for ($i=0; $i<strlen($xnumero); $i++) {
                   $xnum = $xnumero[$i];
                   settype($xnum, 'integer');
                   $tmp_suma = $tmp_suma + $xnum;
                 }        
               }
               //-------- Obtener el digito de la suma complementario
               $xnumero = $xsumacomp;
               settype($xnumero,'string');
               $tmp_sumacomp = 0;     
               for ($i=0; $i<strlen($xnumero); $i++) {
                    $xnum = $xnumero[$i];
                    settype($xnum, 'integer');
                    $tmp_sumacomp = $tmp_sumacomp + $xnum;
                  }             
               $xnumero = $tmp_sumacomp;
               settype($xnumero,'string');
               if (strlen($xnumero) > 1) {
               $tmp_sumacomp = 0;
               for ($i=0; $i<strlen($xnumero); $i++) {
                   $xnum = $xnumero[$i];
                   settype($xnum, 'integer');
                   $tmp_sumacomp = $tmp_sumacomp + $xnum;
                 }        
               }
               //--------
               $sql_update = "update smdbrevancha set ";
               $sql_update .= "fecha = '$xfecha_tmp', ";
               $sql_update .= "nat1 = $xnat1, ";
               $sql_update .= "nat2 = $xnat2, ";
               $sql_update .= "nat3 = $xnat3, ";
               $sql_update .= "nat4 = $xnat4, ";
               $sql_update .= "nat5 = $xnat5, ";
               $sql_update .= "nat6 = $xnat6, ";
               $sql_update .= "bolsa = '$xbolsa', ";
               $sql_update .= "suma = $xsuma, ";
               
               $sql_update .= "comp1 = $xcomp1, ";
               $sql_update .= "comp2 = $xcomp2, ";
               $sql_update .= "comp1 = $xcomp1, ";
               $sql_update .= "comp1 = $xcomp1, ";
               $sql_update .= "comp1 = $xcomp1, ";
               $sql_update .= "comp1 = $xcomp1, ";
               $sql_update .= "sumacomp = $xcomp1, ";
               $sql_update .= "digitocomp = $tmp_sumacomp ";
               
               $sql_update .= "digito = $tmp_suma where sorteo=$xsorteo";
               mysql_query($sql_update, $db);
               header("Location: admin_dbrevancha001.php");             
                
               }
               else { header("Location: admin_dbrevancha001.php?error=1"); }
               break;
     case 3:
               $sql_delete = "delete from smdbrevancha where sorteo = $xsorteo";
               mysql_query($sql_delete, $db);
               header("Location: admin_dbrevancha001.php");
               break;
 }
                                                        }
  else { header("Location: http://192.100.213.51/~SM/"); }
?>