<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
    
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="variablescv.js"></script>
        <title>TFG</title>
    
    </head>
    
    <body>
        
        <div id="profile">
                <b id="welcome">Bienvenido : <i><?php echo $login_session; ?></i></b>
                <b id="logout"><a href="logout.php" class="redireccion">Cerrar sesión</a></b>
                <b id="inicio"><a href="eleccionestudio.php" class="redireccion">Inicio</a></b>
        </div>
    
        <div class="cabeceras">
            <h1 class="encabezados">
                BIENVENIDO AL SIMULADOR VIRTUAL DE OPTIMIZACIÓN DE REACCIONES
                DEL DEPARTAMENTO DE QUÍMICA DE LA E.T.S.I.I.
            </h1>
        </div>
            
        <div class="cuerpo">

                <h2 class="contenidos">
                    DEFINA EL VALOR DE LAS VARIABLES
                </h2>

            
            <div>

                <form method="post" id="formulariovariables" action="<?php echo htmlspecialchars("estudiocv.php");?>">
                    <fieldset>
                        <legend>VALOR DE LAS VARIABLES</legend>
                        
                        TEMPERATURA 
                        <select name="valortemperatura" class="input">
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
                        <select name="valorph" class="input">
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <br>
                        TIEMPO DE RESIDENCIA
                        <select name="valortiempoderesidencia" class="input">
                                <option value="24" id="tiempo" class="select">24</option>
                                <option value="25" id="tiempo" class="select">25</option>
                                <option value="26" id="tiempo" class="select">26</option>
                                <option value="27" id="tiempo" class="select">27</option>
                                <option value="28" id="tiempo" class="select">28</option>
                                <option value="29" id="tiempo" class="select">29</option>
                                <option value="30" id="tiempo" class="select">30</option>
                                <option value="31" id="tiempo" class="select">31</option>
                                <option value="32" id="tiempo" class="select">32</option>
                                <option value="33" id="tiempo" class="select">33</option>
                                <option value="34" id="tiempo" class="select">34</option>
                                <option value="35" id="tiempo" class="select">35</option>
                                <option value="36" id="tiempo" class="select">36</option>
                                <option value="37" id="tiempo" class="select">37</option>
                                <option value="38" id="tiempo" class="select">38</option>
                                <option value="39" id="tiempo" class="select">38</option>
                                <option value="40" id="tiempo" class="select">40</option>
                                <option value="41" id="tiempo" class="select">41</option>
                                <option value="42" id="tiempo" class="select">42</option>
                                <option value="43" id="tiempo" class="select">43</option>
                                <option value="44" id="tiempo" class="select">44</option>
                                <option value="45" id="tiempo" class="select">45</option>
                                <option value="46" id="tiempo" class="select">46</option>
                                <option value="47" id="tiempo" class="select">47</option>
                                <option value="48" id="tiempo" class="select">48</option>
                                <option value="49" id="tiempo" class="select">49</option>
                                <option value="50" id="tiempo" class="select">50</option>
                                <option value="51" id="tiempo" class="select">51</option>
                                <option value="52" id="tiempo" class="select">52</option>
                        </select>
                        <br>
                        CATALIZADOR 
                        <select name="valorcatalizador" class="input">
                            <option value="ZANAHORIA">ZANAHORIA</option>
                            <option value="CEREAL">CEREAL</option>
                        </select>
                        
                    </fieldset>
                    
                    <button type="submit">CALCULAR</button>
                
                </form>
                
            </div>
            
        </div>
        
    </body>
    
</html>
