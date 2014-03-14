<html>
    <head>
        <title>Confirmar borrado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>¿Confirmar borrado?</div>
        
    </body>
</html>



<?php
session_start();
require_once 'funciones_bd.php';


$_SESSION['id'] = (isset ($_REQUEST['id']))?
        $_REQUEST['id']:0;

$bd = conectaBd();
$consulta = "SELECT * FROM software WHERE id=".$_SESSION['id'];
$resultado = $bd ->query($consulta);
if (!$resultado){
    $url = "error.php?msg_error=error_Consulta_Editar";
    header('Location:', $url);
} else {
       $registro = $resultado->fetch();
       if(!$registro) {
           $url = "error.php?msg_error=Error_Registro_Software_inexistente";
           header('Location:'.$url);
       } else {
           $_SESSION['datos'][0] = $registro['titulo'];
           $_SESSION['datos'][1] = $registro['url'];
           echo "<table border=1>";
           echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Titulo</th>";
           echo "<th>URL</th>";
           echo "<tr>";
           echo "<td>";
           echo $_SESSION['id'];
           echo "</td>";
           echo "<td>";
           echo $registro['titulo'];
           echo "</td>";
           echo "<td>";
           echo $registro['url'];
           echo "</td>";
           echo "</table>";
       }
  }
?>
<html>
    <head>
        <title>Confirmar borrado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><a href="listado_software.php">Cancelar</a>
        <a href="borrar_software.php">Continuar</a></div>
    </body>
</html>