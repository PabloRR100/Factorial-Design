<?php
    include('session.php');
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
            
        <div class="cuerpo">

            <h1 class="contenidos">
                AQUÍ USTED PUEDE INTRODUCIR SUS RESULTADOS EXPERIMENTALES 
            </h1>

            <h2>
                INTRODUZCA LAS CONDICIONES Y EL RESULTADO
            </h2>
            
            <form method="post" action="<?php echo htmlspecialchars("database.php");?>">
                
                <fieldset>
                        <legend>VALOR DE LAS VARIABLES</legend>
                        
                        TEMPERATURA 
                        <select name="temperatura" class="input">
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                        </select>
                        <br>
                        pH
                        <select name="ph" class="input">
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <br>
                        TIEMPO DE RESIDENCIA
                        <select name="tiempo" class="input">
                            <option value="24">24</option>
                            <option value="28">28</option>
                            <option value="32">32</option>
                            <option value="36">36</option>
                            <option value="40">40</option>
                            <option value="44">44</option>
                            <option value="48">48</option>
                            <option value="52">52</option>
                        </select>
                        <br>
                        CATALIZADOR 
                        <select name="catalizador" class="input">
                            <option value="ZANAHORIA">ZANAHORIA</option>
                            <option value="CEREAL">CEREAL</option>
                        </select>
                        <br>
                        RENDIMIENTO
                            <input name="rendimiento" class="input">
                        <br>
                        EXCESO DE ENANTIÓMERO
                            <input name="excesodeenantiomero" class="input">
                        <br
                            
                </fieldset>
                
                <button type="submit">INTRODUCIR DATOS</button>
                
            </form>
        </div>
        
    </body>
    
</html>

