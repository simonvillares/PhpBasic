
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        /* 
        *>Mostrar cadenas
        */
        $saludo="Hola";
        $DESTINO="Mundo";

        echo "¡".$saludo." ".$DESTINO."!";
        echo "<br>";
        echo "¡$saludo $DESTINO!";
        echo "<br>";
        echo "¡Hola Mundo!";
        echo "<br>";
        
        $saludo_total = "¡";
        $saludo_total .= $saludo;
        $saludo_total .= " ";
        $saludo_total .= $DESTINO;
        $saludo_total .= "!";
        echo $saludo_total;
        ?>
    </body>
</html>