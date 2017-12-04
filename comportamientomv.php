<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="comportamientomv.js"></script>
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
        
        <div class="cuerpo">
            
            <h2 class="contenidos">
                COMPORTAMIENTO DE LA VARIABLE MANIPULADA
            </h2>
            
            <form method="post" action="<?php echo htmlspecialchars("variablesmv.php");?>">
                <div id="desplegable">
                    <select name="variablesmanipuladas">
                        <option value="temperatura" id="temperatura" class="select1">TEMPERATURA</option>
                        <option value="ph" id="ph" class="select1">pH</option>
                        <option value="tiempo" id="tiempo" class="select1">TIEMPO DE RESIDENCIA</option>
                        <option value="catalizador" id="catalizador" class="select1">CATALIZADOR</option>
                   </select>
                </div>
                
                <button type="submit">SELECCIONAR VARIABLE</button>
        
            </form>
                
        </div>
        
    </body>
    
</html>
