<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="eleccionestudio.js"></script>
        <title>TFG</title>
    
    </head>
    
    <body>
    
        <div id="profile">
                <b id="welcome">Bienvenido : <i><?php echo $login_session; ?></i></b>
                <b id="logout"><a href="logout.php" class="redireccion">Cerrar sesión</a></b>
        </div>

        <div class="cabeceras">
            <h1 class="encabezados">
                BIENVENIDO AL SIMULADOR VIRTUAL DE OPTIMIZACIÓN DE REACCIONES
                DEL DEPARTAMENTO DE QUÍMICA DE LA E.T.S.I.I.
            </h1>
        </div>
        
        <div>
            
            <h2 class="contenidos">
                ¿QUÉ ESTUDIO DESEA REALIZAR?
            </h2>
            
            <div class="opcion" id="opcion1">
                1 <br><br>
                CONOCER EL RESULTADO DE LAS VARIABLES CONTROLADAS                
            </div>
            
            <div class="opcion" id="opcion2">
                2 <br><br>
                OBSERVAR EL COMPORTAMIENTO DE UNA DE LAS VARIABLES MANIPULADAS
            </div>
            
            <div class="opcion" id="opcion3">
                3 <br><br>
                INTRODUCIR INFORMACIÓN DE MI EXPERIMENTO A LA BASE DE DATOS
            </div>
            
        </div>
        
    </body>
    
</html>
