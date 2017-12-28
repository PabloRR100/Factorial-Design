<?php
    include('login.php'); // Incluye el Login Script

    if(isset($_SESSION['login_user']))
    {
        header("location: eleccionreaccion.php");
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="index.js"></script>
    </head>
    
    <body>
        
        <div class="cabeceras">
            <h1 class="encabezados">
                BIENVENIDO AL SIMULADOR VIRTUAL DE OPTIMIZACIÓN DE REACCIONES
                DEL DEPARTAMENTO DE QUÍMICA DE LA E.T.S.I.I.
            </h1>
        </div>
          
        <div class="cuerpo">    

            <div class="contenidos">
                <p>
                    En esta plataforma podrás evaluar el comportamiento de diferentes
                    reacciones químicas a partir de la estimación con una sólida
                    base de datos.
                </p>
            </div>
            <div class="contenidos">
                <p>
                    Aquí podrás analizar la respuesta del comportamiento de una
                    reacción ante cambios en las condiciones de operación así como
                    estudiar su rendimiento.
                </p>
            </div>
            
            <button id="loginalumnos">ALUMNOS</button><button id="loginprofesores">PROFESORES</button>

            <div id="login">
                <h2>IDENTIFÍQUESE PARA ACCEDER A LA APLICACIÓN POR FAVOR</h2>
                <form action="" method="post">
                    <label>NOMBRE :</label>
                    <input id="name" name="username" placeholder="Nombre y Apellido" type="text">
                    <label>Nº MATRÍCULA :</label>
                    <input id="password" name="password" placeholder="*****" type="password">
                    <input name="submit" type="submit" value=" Login ">
                </form>
            </div>
            <div class="error"><?php echo $error; ?></div>
            
            <div id="loginprof">
                <h2>IDENTIFÍQUESE COMO PROFESOR</h2>
                <form action="<?php echo htmlspecialchars("profesorado.php");?>" method="post">
                    <label>NOMBRE :</label>
                    <input id="name" name="username" placeholder="Nombre" type="text">
                    <label>CONTRASEÑA :</label>
                    <input id="password" name="password" placeholder="*****" type="password">
                    <input name="submit" type="submit" value="Contraseña">
                </form>
            </div>
            
        </div>
    </body>
</html>