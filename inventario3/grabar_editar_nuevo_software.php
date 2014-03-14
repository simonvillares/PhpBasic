<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';
require_once 'head.php';


function validarDatosRegistro() {
    // Recuperar datos Enviados desde formulario_nuevo_equipo.php
    $datos = Array();
    $datos[0] = (isset($_REQUEST['titulo']))?
            $_REQUEST['titulo']:"";
    $datos[0] = limpiar($datos[0]);
    $datos[1] = (isset($_REQUEST['url']))?
            $_REQUEST['url']:"";

    //-----validar ---- //
    $errores = Array();
    $errores[0] = !validarTitulo($datos[0]);
    $errores[1] = !validarURL($datos[1]);

    // ----- Asignar a variables de Sesión ----//
    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;  
    $_SESSION['hayErrores'] = 
            ($errores[0] || $errores[1]);
    
}


// PRINCIPAL //
validarDatosRegistro();
if ($_SESSION['hayErrores']) {
    $url = "editar_software.php";
    header('Location:'.$url);
} else {
    
    $db = conectaBd();
    $titulo = $_SESSION['datos'][0];
    $url = $_SESSION['datos'][1];
    $id = $_SESSION['id'];
    
    
    $consulta = "UPDATE software SET
        titulo = :titulo,
        url= :url
        WHERE id= :id";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":titulo" => $titulo, 
        ":url" => $url,
        ":id" => $id))) {
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

}
?>