<?php
require_once 'funciones_bd.php';
require_once 'head.php';
?>


<html>
    <head>
        <title>Favoritos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Listado de Software</div>
        <div><a href="formulario_nuevo_software.php">
                Agregar nuevo Software</a>
        </div>
        
             <?php
        $bd = conectaBd();
        $consulta = 'SELECT * FROM software';
        $resultado = $bd ->query($consulta);
        if (!$resultado){
            echo 'Error en la consulta';
        } else {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Titulo</th>";
            echo "<th>url</th>";
            echo "<th></th>";
            echo "<th></th>";
            echo "</tr>";
        foreach ($resultado as $registro){
            echo "<tr>";
            echo "<td>";
            echo $registro['titulo'];
            echo "</td>";
            echo "<td>";
            echo $registro['url'];
            echo "</td>";
            $irEditar = "editar_software.php?id=".$registro['id'];
            echo "<td><a href=".$irEditar.">Editar</a></td>";
            $irBorrar = "confirmar_eliminar_software.php?id=".$registro['id'];
            echo "<td><a href=".$irBorrar.">Eliminar</a></td>";
            echo "</tr>";
            
                    }
                    echo "</table>";
        }
        
        
        
        $bd = null;
        ?>
    </body>
    <div></div>
</html>
