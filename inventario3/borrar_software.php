<?php
session_start();
require_once 'funciones_bd.php';
require_once 'head.php';


$db = conectaBd();
   $id = $_SESSION['id'];
    
    
    $consulta = "DELETE FROM software 
        WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":id" => $id))) {
        //vaciamos las variables de sesión si todo va bien.
        unset ($_SESSION['datos']);
        unset ($_SESSION['errores']);
        unset ($_SESSION['hayErrores']);
       // redirigimos a la página del listado 
        $destino = "listado_software.php";
        header('Location:'.$destino);
    } else {
        print "<p>Error al crear el registro.</p>\n";
    }

    $db = null;

