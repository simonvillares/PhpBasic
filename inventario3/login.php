<?php
require_once 'funciones_bd.php';

$login = (isset ($_REQUEST['login']))?
        $_REQUEST['login']:"";
$password = (isset ($_REQUEST['password']))?
        $_REQUEST['password']:"";


if ($login == "" || $password == ""){
    $url = "index.php";
    header('Location:'.$url);
}


$bd = conectaBd();

$consulta = "SELECT * FROM usuarios WHERE login = :login and password = :password";
$resultado = $bd -> prepare($consulta);

if (!$resultado-> execute (array(":login" => $login, ":password" => $password))) {
    $url = "error.php?msg_error=error_Consulta_Login";
    header("Location:", $url);
  
} else {
       $registro = $resultado->fetch();
       if(!$registro) {
           $url = "error.php?msg_error=Error_Usuario_inexistente";
           header("Location:".$url);
       } else {
           $_SESSION['usuario'] = $registro['nombre'];
           $url = "listado_software.php";
           header("Location:".$url);
       }
  }
?>