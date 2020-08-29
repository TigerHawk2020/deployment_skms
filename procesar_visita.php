<?php
include('conexion.php');
if (isset($_POST['xnombre']) && isset($_POST['xapellidos']) && ($_POST['xnombre'] != '') && ($_POST['xemail'] != '') && ($_POST['xcomentario'] != '') )  {
	$xfecha = date('Y-m-d H:i:s');
	$sql_insert = "insert into smlibrovisitas set ";
	$sql_insert .= "nombre = '".$_POST['xnombre']."', ";
	$sql_insert .= "apellidos = '".$_POST['xapellidos']."', ";
	$sql_insert .= "email = '".$_POST['xemail']."', ";
	$sql_insert .= "comentario = '".$_POST['xcomentario']."', ";
	$sql_insert .= "fecha = '".$xfecha."'";
	if (mysql_query($sql_insert,$db)) {
	   header("Location: index.php?xopcion=8&msg=1");
	}

} else {
         header("Location: index.php?xopcion=8&msg=2");
}
?>
