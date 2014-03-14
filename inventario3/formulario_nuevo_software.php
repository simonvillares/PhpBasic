
<?php
session_start();
require_once 'head.php';
require_once 'funciones.php';

$_SESSION['datos'] = (isset ($_SESSION['datos']))?
        $_SESSION['datos']:Array ("", "");
$_SESSION['errores'] = (isset ($_SESSION['errores']))?
        $_SESSION['errores']:Array (FALSE, FALSE);
$_SESSION['hayErrores'] = (isset ($_SESSION['hayErrores']))?
        $_SESSION['hayErrores']:FALSE;

?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>TODO write content</div>
        <form action="grabar_nuevo_software.php" method="GET">
            <div>Titulo: <input type="text" name="titulo" value="<?php echo $_SESSION['datos'][0]; ?>" /></div>
            <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_TITULO."</div>";
                }
            ?>
            
            
            <div>Url <input type="text" name="url" value="<?php echo $_SESSION['datos'][1]; ?>" /></div>
            <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_URL."</div>";
                }
            ?>
            
            
            <p><input type="submit" value="Enviar" /></p>
        </form>
    </body>
</html>