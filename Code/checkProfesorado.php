<?php

    $nombre=$_POST["username"];
    $contraseña=$_POST["password"];
    
    if($nombre == "ASCENSIÓN" && $contraseña == "ETSIIM")
    {
        
                header("location: profesorado.php");
            
        }        
        else
        {
            ?>

                        <!DOCTYPE html>
                        <html>

                            <head>

                                <meta charset="UTF-8">
                                <link rel="stylesheet" type="text/css" href="estilo.css">
                                <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
                                <script type="text/javascript" src="comportamientocv.js"></script>
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
                        
            echo "USTED NO TIENE PERMISO PARA MODIFICAR LA BASE DE DATOS";
        }
?>