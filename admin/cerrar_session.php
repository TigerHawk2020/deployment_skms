<?php
@session_start();
@session_unset('auth_usuario');
@session_unregister('auth_usuario');
header("Location: admin_index.php?logout=si");
?>
