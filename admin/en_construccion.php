<?php
@session_start();
if (session_is_registered("auth_usuario")) {
?>
<html>
<head>
<style type="text/css">
body{
 font-family:Tahoma,Verdana;
 font-size:12px;
}
</style>
</head>
<body>
 <center>
  <h1>Disculpe las molestias</h1>
  <img src="../imagenes/x_constr5.gif">
 </center>
</body>
</html>
<?php
        }
  else { header("Location: http://www.skms.com.mx/"); }
?>