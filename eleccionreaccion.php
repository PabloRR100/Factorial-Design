<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="eleccionreaccion.js"></script>
    
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
                ¿QUÉ REACCIÓN DESEA ESTUDIAR?
            </h2>
            
            <ul>
                    <li class="lista" id="acet"> BIOREDUCCIÓN DE ACETOFENONA </li>
                    <li class="lista" id="reac2"> REACCIÓN 2 </li>                  
                    <li class="lista" id="reac3"> REACCIÓN 3 </li>                  
                    <li class="lista" id="reac4"> REACCIÓN 4 </li>                 
                    <li class="lista" id="reac5"> REACCIÓN 5 </li>                  
            </ul>
                 
        </div>
        
    </body>
    
</html>
