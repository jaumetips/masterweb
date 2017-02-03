<?php
function connDB()
{
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'miriate';


$con = mysqli_connect($DB_HOST , $DB_USER , $DB_PASS, $DB_NAME);

if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

return $con;
}

//create db disconect function
function discDB($con)
{
mysqli_close($con);
}

?>