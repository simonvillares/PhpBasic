<?php require_once 'validacionesRegistro.php';
require_once 'errores_registro.php';
/**
 * Verifica que los datos recibidos por $_REQUEST son correctos.
 * @return bool true si son válidos, False en caso contrario.
 */
function validarDatosRegistro(){
    /**
     * validar login
     * validar password
     * validar passwordr es igual a password
     * validar email
     */
    $errores = array();
    
    $login = (isset($_REQUEST['login']))? $_REQUEST['login']:"";
    $password = (isset($_REQUEST['password']))? $_REQUEST['password']:"";
    $passwordr = (isset($_REQUEST['passwordr']))? $_REQUEST['passwordr']:"";
    $email = (isset($_REQUEST['email']))? $_REQUEST['email']:"";
    
    if (!validarLogin($login)){
        $resultadoValidacion [] = MSG_ERR_LOGIN ;
    }
    if (!validarPassword($password)){
         $resultadoValidacion [] = MSG_ERR_PASSWORD ;
    }else{
        if($password != $passwordr){
          $resultadoValidacion [] = MSG_ERR_PASSWORD2 ;
        }
    }
    if (!validarEmail($email)){
        $resultadoValidacion [] = MSG_ERR_EMAIL;
    }
    
    return $resultadoValidacion;
}
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Resultado registro</div>
        <?php
        //Prueba inicial //print_r($_REQUEST);
       //Entrada datos
 
             
      //Salida
        $errores = validarDatosRegistro();
        
        If (count($errores)==0) {
            echo "Datos correctos.Se puede registrar"."</Br>";
        }else {
            echo "Error en los datos:"."</Br>";
            foreach ($errores as $error) {
                echo $error."</Br>";
            }
            echo "<a href='javascript:history.go(-1);'>Volver al formulario</a>";
        }
        ?>
    </body>
</html>