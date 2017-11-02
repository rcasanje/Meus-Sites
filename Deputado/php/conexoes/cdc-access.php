<?php
//$link = mysqli_connect("localhost", "root", "vertrigo", "clinica");
$link = mysqli_connect("mysql.hostinger.com.br", "u171462015_deput", "R@f@el2010", "u171462015_deput");

if (!$link) {
    echo "Erro: Incapaz de conectar com o MySQL de usuário." . PHP_EOL . "<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . "<br>";
    exit;
}

//echo "Sucesso: Uma conexão apropriada foi feita! O banco de dados é bom." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL . "<br>";
?>