<?php require_once 'funcionesIMC_1.php'; ?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Resultado IMC</div>
        <?php
            $peso = $_REQUEST['peso'];
            $estatura = $_REQUEST['estatura'];
            $errores = "?";

             if (!validarPeso($peso)) {
                $errores .= "error_peso";
            }
             if (!validarEstatura($estatura)) {
                 if(count ($errores)>0) errores .= '&';
                $errores .= "error_estatura";
            }
            
            if (count($errores)>0) {
                $url = 
                }
            } else {
                //Cálculo
                $imc = calculoIMC($peso, $estatura);
                $clasificacion = clasificacionIMC($imc);
                //presentación
                echo "IMC = ".$imc;
                echo "<br>";
                echo "Clasificación = ".$clasificacion;
            }
        ?>
    </body>
</html>