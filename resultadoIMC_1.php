<?php require_once 'funcionesIMC.php'; ?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>resultado IMC</div>
        <?php
        //Prueba inicial
            //print_r($_REQUEST);
       //Entrada datos 
            $masa = $_REQUEST['masa'];
            $estatura = $_REQUEST['estatura'];
            //Tratamiento de errores para peso y estatura.
            $errores = array(); 
            if (!validarPeso ($masa)) {
                $errores[] = MSG_ERR_PESO;
            }
            if (!validarEstatura ($estatura)) {
                $errores[] = MSG_ERR_ESTATURA;
            }
            if (count($errores)>0){
                echo "Errores<br>";
                foreach ($errores as $error){
                    echo $error."</br>";
                }
            }else{
                 //Cálculo 
                       $imc = calculoIMC($masa, $estatura);
                      $clasificación = clasificacionIMC($imc);
            
                //presentacion
                     echo "IMC = ".$imc;
                      echo "<br>";
                     echo "Clasificación = ".clasificacionIMC($imc);
            }
        ?>
    </body>
</html>
