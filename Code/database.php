<?php
    include('session.php');
?>

<?php

    $temperatura = $_POST['temperatura'];
    $ph = $_POST['ph'];
    $tiempo = $_POST['tiempo'];
    $catalizador = $_POST['catalizador'];
    $rendimiento = $_POST['rendimiento'];
    $excesodeenantiomero = $_POST['excesodeenantiomero'];

?>

<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <title>TFG</title>
    
    </head>
    
    <body>

        <div id="profile">
                <b id="welcome">Bienvenido : <i><?php echo $login_session; ?></i></b>
                <b id="logout"><a href="logout.php" class="redireccion">Cerrar sesión</a></b>
                <b id="logout"><a href="eleccionestudio.php" class="redireccion">Inicio</a></b>
        </div>

        <div class="cabeceras">
            <h1 class="encabezados">
                BIENVENIDO AL SIMULADOR VIRTUAL DE OPTIMIZACIÓN DE REACCIONES
                DEL DEPARTAMENTO DE QUÍMICA DE LA E.T.S.I.I.
            </h1>
        </div>
    </body>
    
</html>



<?php

    $servername = "localhost";
    $username = "profesor";
    $password = "etsiim";
    $dbname = "company";
    
    //Conexión a la base de datos

    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
  
        $nuevosdatos = "INSERT INTO datos (temp, ph, tiempo, catalizador, rendimiento, excesodeenantiomero)
        VALUES ($temperatura, $ph, $tiempo, '$catalizador', $rendimiento, $excesodeenantiomero )";

        $conn->exec($nuevosdatos);
        echo "SE HAN ALMACENADO LOS VALORES EN LA BASE DE DATOS, GRACIAS";        
    }
    
    catch(PDOException $e) 
    {
        echo "FALLO EN LA CONEXIÓN A LA BASE DE DATOS: " . $e->getMessage();
    }

?>