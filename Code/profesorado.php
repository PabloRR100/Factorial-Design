<?php

    include ('classProfesorado.php');
    
        $nombreAlumno = "";
        $numAlumno = "";
        $permisos = "";
        
    $lista = new profesorado();
    $listado = $lista->recogerListado();
    
    /// PARA QUE NO DETECTE LA FILA AFECTADA HASTA QUE ESTA NO SE HAYA SELECCIONADO
    if( isset($_POST['fila']))
    {
        $filaAfectada = $_POST['fila'];
    }
    ///////////////////////////////////////////////////////////////////////////////
    
    /// PARA QUE NO HAGA LOS POST HASTA QUE LAS VARIABLES ESTÉN DEFINIDAS
    if ( isset($_POST['nombreAlumno'])) 
    {

        $nombreAlumno = $_POST['nombreAlumno'];
        $numAlumno = $_POST['numAlumno'];
        $permisos = $_POST['permisos'];
    
    }
    /////////////////////////////////////////////////////////////////////
    
    /// PARA QUE NO HAGA EL AÑADIR ALUMNO HASTA QUE SE HAYA INTRODUCIDO LA INFORMACIÓN DE ESTE
    if ( isset($_POST['nombreAlumno'])) 
    {
        $nuevoAlumno = $lista->addAlumno($nombreAlumno, $numAlumno, $permisos);
        $listado = $lista->recogerListado();        
    }
    
    /// PARA QUE NO EDITE EL ALUMNO HASTA QUE SE HAYA CONFIRMADO LA OPERACION
    if ( isset($_POST['nombreAlumno']) && isset($_POST['fila']))
    {
        $alumnoEditado = $lista->editarAlumno($nombreAlumno, $numAlumno, $permisos, $filaAfectada);
        $listado = $lista->recogerListado();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    
    /// PARA QUE NO ELIMINE EL ALUMNNO HASTA QUE SE HAYA CONFIRMADO LA DECISION
    if ( isset($_POST['decision'])) 
    {
        $nuevoAlumno = $lista->eliminarAlumno($filaAfectada);
        $listado = $lista->recogerListado();
    }
    ///////////////////////////////////////////////////////////////////////////
    
?>
        <!DOCTYPE html>
        <html>

            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" type="text/css" href="estilo.css">
                <link rel="stylesheet" type="text/css" href="jquery-ui-1.11.4.custom/jquery-ui.min.css">
                <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
                <script type="text/javascript" src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
                <script type="text/javascript" src="profesorado.js"></script>

            </head>

            <body>

                <div class="cabeceras">
                    <h1 class="encabezados">
                        BIENVENIDO AL SIMULADOR VIRTUAL DE OPTIMIZACIÓN DE REACCIONES
                        DEL DEPARTAMENTO DE QUÍMICA DE LA E.T.S.I.I.
                    </h1>
                </div>
                 <b id="logout"><a href="eleccionestudio.php" class="redireccion">Inicio</a></b>
                
                <div class="cuerpo">    
                    
                    <button id="crearAlumno">INTRODUCIR NUEVO ALUMNO</button>
                    <div id="dialogo1">
                        <form id="formularioRegistro" action="" method="post">
                            <fieldset id="datosAlumno">
                                <label for="nombreAlumno">Nombre</label>
                                <input type="text" id="nombreAlumno" name="nombreAlumno" value="NOMBRE APELLIDO1 APELLIDO2">
                                <br>
                                <label for="numAlumno">Número</label>
                                <input type="number" id="numAlumno" name="numAlumno" value="*****">
                                <br>
                                <label for="permisos">Permisos</label>
                                <select id="permisos" name="permisos">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </fieldset>
                            <button type="submit">crear</button>
                        </form>
                        <button type="submit" form="formularioRegistro">AÑADIR USUARIO</button>
                    </div>
                    <br><br>
                   
                    <div id="alumnosExistentes">
                        <table id="tablaAlumnos">
                            <tr>
                                <th>NOMBRE</th>
                                <th>NÚMERO</th>
                                <th>PERMISOS</th>
                                <th>ACCIONES</th>
                            </tr>
                        <?php

                            foreach ($listado as $fila)
                            {
                                ?>
                                <tr>
                                    <td data-alumno="<?php echo $fila["id"]?>" class="nombre_alumno" id="<?php echo $fila["id"]?>" ><?php echo $fila["username"]?></td>
                                    <td data-alumno="<?php echo $fila["id"]?>" class="num_alumno" id="<?php echo $fila["id"]?>"><?php echo $fila["password"]?></td>
                                    <td id="permisosde<?php echo $fila["id"]?>" class="permisos"><?php echo $fila["permisos"]?></td>
                                    <td><button id= "eliminar<?php echo $fila["id"]?>" data-alumno="<?php echo $fila["id"]?>" class="eliminar">ELIMINAR</button><button data-alumno="<?php echo $fila["id"]?>" class="editar">EDITAR</button></td>
                                </tr>
                                <?php
                            }
                        ?>

                        </table>
                    </div>
                    
                    <br><br>
                    
                    <div id="dialogo2">
                        <form id="formularioEdicion" action="" method="post">
                            <fieldset id="datosAlumno">
                                <label for="nombreAlumnoEdit">Nombre</label>
                                <input type="text" id="nombreAlumnoEdit" value="">
                                <br>
                                <label for="numAlumnoEdit">Número</label>
                                <input type="number" id="numAlumnoEdit" name="numAlum" value="">
                                <br>
                                <label for="permisos">Permisos</label>
                                <select id="permisos" name="permisos">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                                <input id="dilogEditarAlumno" type="hidden" name="fila" value="">
                            </fieldset>
                            <button type="submit">crear</button>
                        </form>
                        <button type="submit" form="formularioEdicion">OK</button>
                    </div>
                    
                    <div id="dialogo3">
                        <h1>
                            ¿ESTÁ SEGURO DE QUE DESEA ELIMINAR?
                        </h1>
                        <form id="eleccionEliminar" action="" method="post">
                            <input type="hidden" name="decision" value="SI">
                            <input id="dilogElimAlumno" type="hidden" name="fila" value="">
                            <button id="seguroEliminar" type="submit">SI</button>                           
                        </form>
                    </div>
                    
                <button id="vuelta">INICIO DE SESIÓN</button>
            </body>
        </html>
    
    <?php

?>