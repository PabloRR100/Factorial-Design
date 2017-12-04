<?php
    include('session.php');
    include('estudiocvinterpolador.php');
?>

<?php
// RECOGIDA DE LAS VARIABLES PEDIDAS

$temperatura3=$_POST['valortemperatura'];
$ph3=$_POST['valorph'];
$tiempo3=$_POST['valortiempoderesidencia'];
$catalizador=$_POST['valorcatalizador'];


$valoresUsuario = new Datoscv1 ($temperatura3, $ph3, $tiempo3, $catalizador);
$valoresInterpolador = $valoresUsuario -> obtenerCubo();
if ( $valoresInterpolador == 1)
{
    $rendimiento = $valoresUsuario -> obtenerRendimiento();
    $excesodeenantiomero = $valoresUsuario -> obtenerExceso();
}

else 
{
    echo "NO HAY VALORES SUFICIENTES EN LA BASE DE DATOS PARA ESAS CONDICIONES";
}
?>
      
<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="estudiocv.js"></script>
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

            <div>

                <h3> RENDIMIENTO </h3>
                <div id="resultadorendimiento" class="resultado">
                    <h1> <?php echo number_format($rendimiento, 2)  ?> </h1>
                </div> 
                <h3> EXCESO DE ENANTIÓMERO </h3>
                <div id="resultadorendimiento" class="resultado">
                    <h1> <?php echo number_format($excesodeenantiomero, 2) ?> </h1>
                </div>
                
                <button id="showResults">MOSTRAR CÁLCULOS</button>
                
                <div id="showCalculos">
                    
                    <h1>LOS VALORES UTILIZADOS DE LA BASE DE DATOS HAN SIDO LOS SIGUIENTES</h1>
                    <table id="calculos">
                        <tr><th>TEMPERATURA</th><th>PH</th><th>TIEMPO</th><th>RENDIMIENTO</th><th>EXCESO DE ENANTIÓMERO</th><th>CATALIZADOR</th></tr>
                    </table>
                    
                    <script>    
                        
                            <?php $resultados = $valoresUsuario-> showCalculos(); ?>
                        
                            var resultadosjs = '<?php echo json_encode($resultados) ?>';
                            var results = JSON.parse(resultadosjs);

                            for (i=0; i<= results.length ; i++)
                            {  
                                $("#calculos").append("<tr><td>"+results[i][0]+"</td><td>"+results[i][1]+"</td><td>"+results[i][2]+"</td><td>"+results[i][3]+"</td><td>"+results[i][4]+"</td><td>"+results[i][5]+"</td></tr>");
                            }
                       
                    </script>
                    
                </div>
                
            </div>

        </div>
        
    </body>
    
</html>


