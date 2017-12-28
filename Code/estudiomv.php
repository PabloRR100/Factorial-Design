<?php
    include('session.php');
    include('estudiomvinterpolador.php');
?>

<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="estudiomv.js"></script>
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
                    ESTUDIO DE LA VARIABLE 
                </h2>


        </div>
        
<?php 

    $temperatura=$_POST["temperatura"];
    $ph=$_POST["ph"];
    $tiempo=$_POST["tiempo"];
    $catalizador=$_POST["catalizador"];
    $variableelegida=$_POST["variableelegida"];

    $valores = new Datosmv ($temperatura, $ph, $tiempo, $catalizador, $variableelegida);
    if($valores->numeroDatosSacados() >= 4)
    {
        $relacion = $valores->obtenerRelacion();
?>
         
        <table id="tabla1">
            <tr><th><?php echo strtoupper($variableelegida) ?></th><th>RENDIMIENTO</th><th>EXCESO DE ENANTIÓMERO</th></tr>
        </table>
        <script>
                
                var resultadosjs = '<?php echo json_encode($relacion) ?>';
                var results = JSON.parse(resultadosjs);

                for (i=0; i<= results.length; i++)
                {   
                    var variableelegida = "<?php echo $variableelegida ?>";
                    switch ( variableelegida )
                    {
                        case "temperatura": $("#tabla1").append("<tr><td>"+results[i].temp+"</td><td>"+results[i].rendimiento+"</td><td>"+results[i].excesodeenantiomero+"</td></tr>"); break;
                        case "ph": $("#tabla1").append("<tr><td>"+results[i].ph+"</td><td>"+results[i].rendimiento+"</td><td>"+results[i].excesodeenantiomero+"</td></tr>"); break;
                        case "tiempo": $("#tabla1").append("<tr><td>"+results[i].tiempo+"</td><td>"+results[i].rendimiento+"</td><td>"+results[i].excesodeenantiomero+"</td></tr>"); break;
                        case "catalizador": $("#tabla1").append("<tr><td>"+results[i].catalizador+"</td><td>"+results[i].rendimiento+"</td><td>"+results[i].excesodeenantiomero+"</td></tr>"); break;
                    }
                }
              
        </script>
<?php
            
    }
    else 
    {
        switch ($variableelegida)
            {
                case "temperatura": 
                    
                    $relacion2 = $valores->relacionTemperatura();
                    $eje = $valores->ejeTemperatura();

                    ?>                    
                    <table id="tablaTemp">
                        <tr><th><?php echo strtoupper($variableelegida) ?></th><th>RENDIMIENTO</th><th>EXCESO DE ENANTIÓMERO</th></tr>
                    </table>
                    <script>

                            var resultadosjs = '<?php echo json_encode($eje) ?>';
                            var results = JSON.parse(resultadosjs);

                            for (i=0; i<= results.length; i++)
                            {   
                                var variableelegida = "<?php echo $variableelegida ?>";
                                switch ( variableelegida )
                                {
                                    case "temperatura": $("#tablaTemp").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "ph": $("#tablaTemp").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "tiempo": $("#tablaTemp").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] + "</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "catalizador": $("#tablaTemp").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                }
                            }

                    </script>
                    <?php
                    
                    break;

                case "ph": 
                    $relacion2 = $valores->relacionPh();
                    $eje = $valores->ejePh();
                    
                    ?>                    
                    <table id="tablaPh">
                        <tr><th><?php echo strtoupper($variableelegida) ?></th><th>RENDIMIENTO</th><th>EXCESO DE ENANTIÓMERO</th></tr>
                    </table>
                    <script>

                            var resultadosjs = '<?php echo json_encode($eje) ?>';
                            var results = JSON.parse(resultadosjs);

                            for (i=0; i<= results.length; i++)
                            {   
                                var variableelegida = "<?php echo $variableelegida ?>";
                                switch ( variableelegida )
                                {
                                    case "temperatura": $("#tablaPh").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "ph": $("#tablaPh").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "tiempo": $("#tablaPh").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] + "</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "catalizador": $("#tablaPh").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                }
                            }

                    </script>
                    <?php

                    break;
                
                case "tiempo": 
                    $relacion2 = $valores->relacionTiempo();
                    $eje = $valores->ejeTiempo();

                    ?>                    
                    <table id="tablaTiempo">
                        <tr><th><?php echo strtoupper($variableelegida) ?></th><th>RENDIMIENTO</th><th>EXCESO DE ENANTIÓMERO</th></tr>
                    </table>
                    <script>

                            var resultadosjs = '<?php echo json_encode($eje) ?>';
                            var results = JSON.parse(resultadosjs);

                            for (i=0; i<= results.length; i++)
                            {   
                                var variableelegida = "<?php echo $variableelegida ?>";
                                switch ( variableelegida )
                                {
                                    case "temperatura": $("#tablaTiempo").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "ph": $("#tablaTiempo").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "tiempo": $("#tablaTiempo").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] + "</td><td>"+results[i][2] +"</td></tr>"); break;
                                    case "catalizador": $("#tablaTiempo").append("<tr><td>"+results[i][0] +"</td><td>"+results[i][1] +"</td><td>"+results[i][2] +"</td></tr>"); break;
                                }
                            }

                    </script>
                    <?php

                    break;

                case "catalizador":
                    $relacion2 = $valores->relacionCatalizador();

                    break;
            }
    }

    if($valores->numeroDatosSacados() <= 4 && $valores->metodoCalculo() == 1)
    {
        echo "Los valores de los extremos han sido recogidos de la tabla de datos.";
    }
    else if($valores->numeroDatosSacados() <= 4 && $valores->metodoCalculo() == 0)
    {
        echo "Los valores de los extremos han necesitado ser calculados mediante interpolación por no tener su valor en la base de datos.";
    }
    
?>    

    </body>
    
</html>
