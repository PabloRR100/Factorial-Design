<?php

class Datosmv
{
    private $temperatura;
    private $ph;
    private $tiempo;
    private $catalizador;
    private $variableelegida;
    
    //////////////////////////////Extremos del Cubo////////////////////////////////////////
    private $r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12, $r13, $r14;
    private $e0, $e1, $e2, $e3, $e4, $e5, $e6, $e7, $e8, $e9, $e10, $e11, $e12, $e13, $e14;
    private $metodoCalculo = 0;
    
    public function __construct($temperatura, $ph, $tiempo , $catalizador, $variableelegida) 
    {
        
        $this->temperatura = $temperatura;
        $this->ph = $ph;
        $this->tiempo = $tiempo;
        $this->catalizador = $catalizador;       
        $this->variableelegida = $variableelegida;


                //Obtener datos de los extremos del cubo
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $consulta0 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='25' and ph='6' and tiempo='24' and catalizador='".$this->catalizador."'");
            $consulta0->execute(); 
            
            if ($consulta0->rowCount() > 0)
            {
                $this->r0 = floatval($consulta0->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta00 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='25' and ph='6' and tiempo='24' and catalizador='".$this->catalizador."'");
                    $consulta00->execute(); 
                    $this->e0 = floatval($consulta00->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r0 = $this->e0 = 0; }
            
            $consulta1 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='25' and ph='8' and tiempo='24' and catalizador='".$this->catalizador."'");
            $consulta1->execute(); 
            
            if ($consulta1->rowCount() > 0)
            {
                $this->r1 = floatval($consulta1->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta10 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='25' and ph='8' and tiempo='24' and catalizador='".$this->catalizador."'");
                    $consulta10->execute(); 
                    $this->e1 = floatval($consulta10->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r1 = $this->e1 = 0; }
            
            $consulta2 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='35' and ph='6' and tiempo='24' and catalizador='".$this->catalizador."'");
            $consulta2->execute(); 
            
            if ($consulta2->rowCount() > 0)
            {
                $this->r2 = floatval($consulta2->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta20 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='35' and ph='6' and tiempo='24' and catalizador='".$this->catalizador."'");
                    $consulta20->execute(); 
                    $this->e2 = floatval($consulta20->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r2 = $this->e2 = 0; }
                
            $consulta3 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='35' and ph='8' and tiempo='24' and catalizador='".$this->catalizador."'");
            $consulta3->execute(); 
            
            if ($consulta3->rowCount() > 0)
            {
                $this->r3 = floatval($consulta3->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta30 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='35' and ph='8' and tiempo='24' and catalizador='".$this->catalizador."'");
                    $consulta30->execute(); 
                    $this->e3 = floatval($consulta30->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r3 = $this->e3 = 0; }
            
            $consulta4 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='25' and ph='6' and tiempo='52' and catalizador='".$this->catalizador."'");
            $consulta4->execute(); 
            
            if ($consulta4->rowCount() > 0)
            {
                $this->r4 = floatval($consulta4->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta40 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='25' and ph='6' and tiempo='52' and catalizador='".$this->catalizador."'");
                    $consulta40->execute(); 
                    $this->e4 = floatval($consulta40->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r4 = $this->e4 = 0; }
            
            $consulta5 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='25' and ph='8' and tiempo='52' and catalizador='".$this->catalizador."'");
            $consulta5->execute(); 
            
            if ($consulta5->rowCount() > 0)
            {
                $this->r5 = floatval($consulta5->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta50 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='25' and ph='8' and tiempo='52' and catalizador='".$this->catalizador."'");
                    $consulta50->execute(); 
                    $this->e5 = floatval($consulta50->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r5 = $this->e5 = 0; }
            
            $consulta6 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='35' and ph='6' and tiempo='52' and catalizador='".$this->catalizador."'");
            $consulta6->execute(); 
            
            if ($consulta6->rowCount() > 0)
            {
                $this->r6 = floatval($consulta6->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta60 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='35' and ph='6' and tiempo='52' and catalizador='".$this->catalizador."'");
                    $consulta60->execute(); 
                    $this->e6 = floatval($consulta60->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r6 = $this->e6 = 0; }
            
            $consulta7 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='35' and ph='8' and tiempo='52' and catalizador='".$this->catalizador."'");
            $consulta7->execute(); 
            
            if ($consulta7->rowCount() > 0)
            {
                $this->r7 = floatval($consulta7->fetchAll(PDO::FETCH_COLUMN)[0]);

                    $consulta70 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='35' and ph='8' and tiempo='52' and catalizador='".$this->catalizador."'");
                    $consulta70->execute(); 
                    $this->e7 = floatval($consulta70->fetchAll(PDO::FETCH_COLUMN)[0]);
            }
            else{ $this->r7 = $this->e7 = 0; }
            
        }
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }
    

    public function numeroDatosSacados()
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";

            //Conexión a la base de datos
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            switch ($this->variableelegida)
            {
              //--Consulta selectiva
                
                case "temperatura":                    
                    
                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE ph='$this->ph' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
                    $consulta->execute(); 

                    $resultados = $consulta->rowCount();
                    return $resultados;

                case "ph":

                    $consulta = $conn->prepare("SELECT rendimiento,excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
                    $consulta->execute(); 

                    $resultados = $consulta->rowCount();
                    return $resultados;

                case "tiempoderesidencia":

                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and catalizador='$this->catalizador'");
                    $consulta->execute(); 

                    $resultados = $consulta->rowCount();
                    return $resultados;

                case "catalizador":

                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='$this->tiempo'");
                    $consulta->execute(); 

                    $resultados = $consulta->rowCount();
                    return $resultados;

            }
        }
        
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function obtenerRelacion()
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";

            //Conexión a la base de datos
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            switch ($this->variableelegida)
            {
              //--Consulta selectiva
                
                case "temperatura":                    
                    
                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero, temp FROM varaibles WHERE ph='$this->ph' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
                    $consulta->execute();

                    $resultados = $consulta->fetchAll();
                    return $resultados;
        
                    
                    break;

                case "ph":

                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero, ph FROM varaibles WHERE temp='$this->temperatura' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
                    $consulta->execute(); 

                    $resultados = $consulta->fetchAll();
                    return $resultados;
                    
                    break;

                case "tiempoderesidencia":

                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero, tiempo FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and catalizador='$this->catalizador'");
                    $consulta->execute(); 

                    $resultados = $consulta->fetchAll();
                    return $resultados;
                    
                    break;

                case "catalizador":

                    $consulta = $conn->prepare("SELECT rendimiento, excesodeenantiomero, catalizador FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='$this->tiempo'");
                    $consulta->execute(); 

                    $resultados = $consulta->fetchAll();
                    return $resultados;
                    
                    break;
            }
        }
        
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
    }
    
                //////// ESTAS FUNCIONES SOLO SE EJECUTAN SI NO HABIA AL MENOS CUATRO DATOS EN LA BASE DE DATOS (SWITCH) //////////

    
    public function relacionTemperatura() // El eje con el rango de valores de la variable que quiero estudiar para hacer el gráfico
    {
        
         $this->r8 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r1 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r0 );
         $this->r9 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r3 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r2 );
        $this->r10 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r5 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r4 );
        $this->r11 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r7 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r6 );
                
                $this->r12 = ( ( (52 - $this->tiempo) / (52 - 24) ) * $this->r10 ) + ( ( ($this->tiempo - 24)/(52 - 24) ) * $this->r8 );
                $this->r12 = number_format($this->r12, 2);
                $this->r13 = ( ( (52 - $this->tiempo) / (52 - 24) ) * $this->r11 ) + ( ( ($this->tiempo - 24)/(52 - 24) ) * $this->r9 );
                $this->r13 = number_format($this->r13, 2);
                
         $this->e8 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e1 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e0 );
         $this->e9 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e3 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e2 );
        $this->e10 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e5 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e4 );
        $this->e11 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e7 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e6 );
                
                $this->e12 = ( ( (52 - $this->tiempo) / (52 - 24) ) * $this->e10 ) + ( ( ($this->tiempo - 24)/(52 - 24) ) * $this->e8 );
                $this->e12 = number_format($this->e12, 2);
                $this->e13 = ( ( (52 - $this->tiempo) / (52 - 24) ) * $this->e11 ) + ( ( ($this->tiempo - 24)/(52 - 24) ) * $this->e9 );
                $this->e13 = number_format($this->e13, 2);
     
    }
    
    public function relacionTiempo() // El eje con el rango de valores de la variable que quiero estudiar para hacer el gráfico
    {
        
         $this->r8 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r1 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r0 );
         $this->r9 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r3 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r2 );
        $this->r10 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r5 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r4 );
        $this->r11 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->r7 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->r6 );
                
                $this->r12 = ( ( (35 - $this->temperatura) / (35 - 25) ) * $this->r9   ) + ( ( ($this->temperatura - 25) / (35 - 25) ) * $this->r8  );
                $this->r13 = ( ( (35 - $this->temperatura) / (35 - 25) ) * $this->r11  ) + ( ( ($this->temperatura - 25) / (35 - 25) ) * $this->r10 );
                
         $this->e8 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e1 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e0 );
         $this->e9 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e3 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e2 );
        $this->e10 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e5 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e4 );
        $this->e11 = ( ( (8 - $this->ph) / (8 - 6) ) * $this->e7 ) + ( ( ($this->ph - 6) / (8 - 6) ) * $this->e6 );
                
                $this->e12 = ( ( (35 - $this->temperatura) / (35 - 25) ) * $this->e9   ) + ( ( ($this->temperatura - 25) / (35 - 25) ) * $this->e8  );
                $this->e13 = ( ( (35 - $this->temperatura) / (35 - 25) ) * $this->e11  ) + ( ( ($this->temperatura - 25) / (35 - 25) ) * $this->e10 );
                
        
    }
    
    public function relacionPh() // El eje con el rango de valores de la variable que quiero estudiar para hacer el gráfico
    {
        
         $this->r8 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->r2 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->r0 );
         $this->r9 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->r3 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->r1 );
        $this->r10 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->r6 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->r4 );
        $this->r11 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->r7 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->r5 );
                
                $this->r12 = ( ( (52-$this->tiempo)/(52-24) ) * $this->r10 ) + ( ( ($this->tiempo-24)/(52-24) ) * $this->r8 );
                $this->r13 = ( ( (52-$this->tiempo)/(52-24) ) * $this->r11 ) + ( ( ($this->tiempo-24)/(52-24) ) * $this->r9 );
                
         $this->e8 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->e2 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->e0 );
         $this->e9 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->e3 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->e1 );
        $this->e10 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->e6 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->e4 );
        $this->e11 = ( ( (35 -$this->temperatura)/(35-25) ) * $this->e7 ) + ( ( ($this->temperatura-25)/(35-25) ) * $this->e5 );
                
                $this->e12 = ( ( (52-$this->tiempo)/(52-24) ) * $this->e10 ) + ( ( ($this->tiempo-24)/(52-24) ) * $this->e8 );
                $this->e13 = ( ( (52-$this->tiempo)/(52-24) ) * $this->e11 ) + ( ( ($this->tiempo-24)/(52-24) ) * $this->e9 );
        
    }

    public function ejeTemperatura()
    {
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
        
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $ejeTemperatura = array();
            
            $consulta1 = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='25' and ph='$this->ph' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
            $consulta1->execute();

            $resultado = $consulta1->fetchAll();
            
            if ($consulta1->rowCount() > 0)
            {
                $this->r12 = floatval($resultado[0][0]);
                $this->e12 = floatval($resultado[0][1]);
                $this->metodoCalculo = 1;
            }
            
            $consulta2 = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='35' and ph='$this->ph' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
            $consulta2->execute();

            $resultado2 = $consulta2->fetchAll();
            
            if ($consulta2->rowCount() > 0)
            {
                $this->r13 = floatval($resultado2[0][0]);
                $this->e13 = floatval($resultado2[0][1]);
            }

            $primero = [25, $this->r12, $this->e12];
            $ultimo = [35, $this->r13, $this->e13];
            
            $ejeTemperatura[0] = $primero;
            
            $puntero = 26;
            $i=1;
            while( $puntero < 35 )
            {
                
                $consulta = $conn->prepare("SELECT temp, rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$puntero' and ph='$this->ph' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
                $consulta->execute(); 
                $rendimiento = $consulta->fetchAll();
                
                
                if ( count($rendimiento) != 0)
                {
                    
                    $ejeTemperatura[$i][0] = floatval($rendimiento[0][0]);
                    $ejeTemperatura[$i][1] = floatval($rendimiento[0][1]);
                    $ejeTemperatura[$i][2] = floatval($rendimiento[0][2]);
                    $i++;
                }

                $puntero++;
                
            }
            
            $ejeTemperatura[$i]= $ultimo;
            
            return $ejeTemperatura;
                
        }    
        
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    
   public function ejePh()
    {
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
        
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $ejePh = array();
                                        ///COMPROBAR EXTREMOS///
            $consulta100 = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temp' and ph='6' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
            $consulta100->execute();

            $resultado00 = $consulta100->fetchAll();
            
            if ($$consulta100->rowCount() > 0)
            {
                $this->r12 = floatval($resultado00[0][0]);
                $this->e12 = floatval($resultado00[0][1]);
                $this->metodoCalculo = 1;
            }
            
            $consulta200 = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temp' and ph='8' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
            $consulta200->execute(); 

            $resultado200 = $consulta200->fetchAll();
            
            if ($consulta200->rowCount() > 0)
            {
                $this->r13 = floatval($resultado[0][0]);
                $this->e13 = floatval($resultado[0][1]);   
            }
            
            $primero = [6, $this->r12, $this->e12];
            $ultimo =  [8, $this->r13, $this->e13];
            
            $ejePh[0] = $primero;
            
            $puntero = 7;
            $i=1;
            while( $puntero < 8 )
            {
                
                $consulta = $conn->prepare("SELECT ph, rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and ph='$puntero' and tiempo='$this->tiempo' and catalizador='$this->catalizador'");
                $consulta->execute(); 
                $rendimiento = $consulta->fetchAll();
                
                
                if ( count($rendimiento) != 0)
                {
                    
                    $ejePh[$i][0] = floatval($rendimiento[0][0]);
                    $ejePh[$i][1] = floatval($rendimiento[0][1]);
                    $ejePh[$i][2] = floatval($rendimiento[0][2]);
                    $i++;
                }

                $puntero++;
                
            }
            
            $ejePh[$i]= $ultimo;
            
            return $ejePh;
                
        }
        
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function ejeTiempo()
    {
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
        
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $ejeTiempo = array();
                                            ////COMPROBAR EXTREMOS///
            $consulta1000 = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='24' and catalizador='$this->catalizador'");
            $consulta1000->execute(); 
            
            $resultado000 = $consulta1000->fetchAll();
            
            if ($consulta1000->rowCount() > 0)
            {
                $this->r12 = floatval($resultado000[0][0]);
                $this->e12 = floatval($resultado000[0][1]);
                $this->metodoCalculo = 1;
            }
            
            $consulta2000 = $conn->prepare("SELECT rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='52' and catalizador='$this->catalizador'");
            $consulta2000->execute(); 
            
            $resultado2000 = $consulta2000->fetchAll();
            
            if ($consulta2000->rowCount() > 0)
            {
                $this->r13 = floatval($resultado000[0][0]);
                $this->e13 = floatval($resultado000[0][1]);   
            }
            
            $primero = [24, $this->r12, $this->e12];
            $ultimo =  [52, $this->r13, $this->e13];
            
            $ejeTiempo[0] = $primero;

            $puntero = 28;
            $i=1;
            while( $puntero < 52 )
            {
                
                $consulta = $conn->prepare("SELECT tiempo, rendimiento, excesodeenantiomero FROM varaibles WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='$puntero'");
                $consulta->execute(); 
                $rendimiento = $consulta->fetchAll();
                
                
                if ( count($rendimiento) != 0)
                {
                    
                    $ejeTiempo[$i][0] = floatval($rendimiento[0][0]);
                    $ejeTiempo[$i][1] = floatval($rendimiento[0][1]);
                    $ejeTiempo[$i][2] = floatval($rendimiento[0][2]);
                    $i++;
                }

                $puntero++;
                
            }
            
            $ejeTiempo[$i]= $ultimo;
            
            return $ejeTiempo;
                
        }
        
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function metodoCalculo() 
    {
        if ($this->metodoCalculo == 1) { return 1; }
        else {return 0; }
    }
    
    
    ///////////////// ¿¿TENDRIA QUE CALCULAR LOS PUNTOS PARA LOS DOS CATALIZADORES Y ENSEÑARLOS POR PATANTALLA SIMPLEMENTE NO?? /////////////////////////////
/*    
    public function ejeCatalizador()
    {
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
        
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);       
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consulta1 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='$this->tiempo'and catalizador='ZANAHORIA'");
            $consulta1->execute();
            $rZanahoria = $consulta1->fetchAll();
            
            $consulta2 = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='$this->temperatura' and ph='$this->ph' and tiempo='$this->tiempo'and catalizador='CEREAL'");
            $consulta2->execute();
            $rCereal = $consulta2->fetchAll();
            
            echo "Zanahoria: El rendimiento es de $rZanahoria";
            echo "Cereal: El rendimiento es de $rCereal";

        }
        
        catch (Exception $ex)
        {
            echo "Error: " . $e->getMessage();
        }
    }
*/            
}

//////////////////////////// HE HECHO CAMBIOS PARA PILLARTE CABRONA /////////////////////////////////

?>
