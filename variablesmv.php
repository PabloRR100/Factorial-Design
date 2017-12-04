<?php
    include('session.php');
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
            
        <div class="cuerpo">

                <h2 class="contenidos">
                    DEFINA EL RESTO DE VARIABLES
                </h2>

            
            <div>

                <form id="formulariovariables" method="post" action="<?php echo htmlspecialchars("estudiomv.php");?>">
                    <fieldset>
                        <legend>VALOR DE LAS VARIABLES </legend>
                        
                        <?php 
                        
                        $variableelegida = $_POST["variablesmanipuladas"];
                        
                        
                        switch ($variableelegida){
                        
                            case "temperatura":
                        ?>
                            <input type="hidden" name="temperatura" value="indefinido">                        
                            pH 
                            <select name="ph" class="input">
                                <option value="6" id="ph" class="select">6</option>
                                <option value="7" id="ph" class="select">7</option>
                                <option value="8" id="ph" class="select">8</option>
                            </select><br>
                            TIEMO DE RESIDENCIA 
                            <select name="tiempo" class="input">
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
                            </select><br>
                                
                            TIPO DE CATALIZADOR 
                            <select name="catalizador" class="input">
                                <option value="ZANAHORIA" id="zanahoria" class="select">ZANAHORIA</option>
                                <option value="cereal" id="cereal" class="select">CEREAL</option>
                            </select> <br>
                            <input type="hidden" name="variableelegida" value="<?php echo $variableelegida ?>">
                        <?php break;
                    
                            case "ph":
                        ?>
                            <input type="hidden" name="ph" value="indefinido">
                            TEMPERATURA 
                            <select name="temperatura" class="input">
                                <option value="25" id="temperatura" class="select">25</option>
                                <option value="26" id="temperatura" class="select">26</option>
                                <option value="27" id="temperatura" class="select">27</option>
                                <option value="28" id="temperatura" class="select">28</option>
                                <option value="29" id="temperatura" class="select">29</option>
                                <option value="30" id="temperatura" class="select">30</option>
                                <option value="31" id="temperatura" class="select">31</option>
                                <option value="32" id="temperatura" class="select">32</option>
                                <option value="33" id="temperatura" class="select">33</option>
                                <option value="34" id="temperatura" class="select">34</option>
                                <option value="35" id="temperatura" class="select">35</option>
                            </select><br>
                            TIEMO DE RESIDENCIA 
                            <select name="tiempo" class="input">
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
                            </select> <br>
                            TIPO DE CATALIZADOR 
                            <select name="catalizador" class="input">
                                <option value="ZANAHORIA" id="zanahoria" class="select">ZANAHORIA</option>
                                <option value="CEREAL" id="cereal" class="select">CEREAL</option>
                            </select> <br>
                            <input type="hidden" name="variableelegida" value="<?php echo $variableelegida ?>">
                        <?php break;
                    
                            case "tiempo":
                        ?>
                            <input type="hidden" name="tiempo" value="indefinido">
                            TEMPERATURA 
                            <select name="temperatura" class="input">
                                <option value="25" id="temperatura" class="select">25</option>
                                <option value="26" id="temperatura" class="select">26</option>
                                <option value="27" id="temperatura" class="select">27</option>
                                <option value="28" id="temperatura" class="select">28</option>
                                <option value="29" id="temperatura" class="select">29</option>
                                <option value="30" id="temperatura" class="select">30</option>
                                <option value="31" id="temperatura" class="select">31</option>
                                <option value="32" id="temperatura" class="select">32</option>
                                <option value="33" id="temperatura" class="select">33</option>
                                <option value="34" id="temperatura" class="select">34</option>
                                <option value="35" id="temperatura" class="select">35</option>
                            </select><br>
                            pH 
                            <select name="ph" class="input">
                                <option value="6" id="ph" class="select">6</option>
                                <option value="7" id="ph" class="select">7</option>
                                <option value="8" id="ph" class="select">8</option>
                            </select><br>
                            TIPO DE CATALIZADOR 
                            <select name="catalizador" class="input">
                                <option value="ZANAHORIA" id="zanahoria" class="select">ZANAHORIA</option>
                                <option value="cereal" id="cereal" class="select">CEREAL</option>                                       
                            </select> <br>
                            <input type="hidden" name="variableelegida" value="<?php echo $variableelegida ?>">
                        <?php break;
                                
                            case "catalizador":
                        ?>
                            <input type="hidden" name="catalizador" value="indefinido">
                            TEMPERATURA 
                            <select name="temperatura" class="input">
                                <option value="25" id="temperatura" class="select">25</option>
                                <option value="26" id="temperatura" class="select">26</option>
                                <option value="27" id="temperatura" class="select">27</option>
                                <option value="28" id="temperatura" class="select">28</option>
                                <option value="29" id="temperatura" class="select">29</option>
                                <option value="30" id="temperatura" class="select">30</option>
                                <option value="31" id="temperatura" class="select">31</option>
                                <option value="32" id="temperatura" class="select">32</option>
                                <option value="33" id="temperatura" class="select">33</option>
                                <option value="34" id="temperatura" class="select">34</option>
                                <option value="35" id="temperatura" class="select">35</option>
                            </select><br>
                            pH 
                            <select name="ph" class="input">
                                <option value="6" id="ph" class="select">6</option>
                                <option value="7" id="ph" class="select">7</option>
                                <option value="8" id="ph" class="select">8</option>
                            </select><br>
                            TIEMO DE RESIDENCIA 
                            <select name="tiempo" class="input">
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
                            </select><br>
                            <input type="hidden" name="variableelegida" value="<?php echo $variableelegida ?>">
                        <?php break;
                        } ?>
                        
                    </fieldset>
                    
                    <button type="submit">ESTUDIAR</button>
                </form>
                
            </div>
            
        </div>
        
    </body>
    
</html>
