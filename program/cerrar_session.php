<?php
@session_start();
$xruta = "$DOCUMENT_ROOT/program/download/" . $authdata['login'];
@unlink($xruta);
@session_unset('authdata');
@session_unregister('authdata');
header("Location: program_index.php");
?>
