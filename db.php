<?php 
//Iniciar sesion
session_start();

$conn = mysqli_connect(
    'localhost',
    'usuario-local-host',
    'contraseña',
    'php_mysql_crud'
);
/*
if (isset($conn)) {
    echo "esta conectada la aplicacvion con la base de datos";
}
*/

?>