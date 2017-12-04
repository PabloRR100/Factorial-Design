
<?php


class Datoscv1
{
    private $t3;
    private $ph3;
    private $tiempo3;
    private $catalizador;
    
    private $r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12, $r13, $r14;
    private $A, $B, $C, $D, $A2, $B2, $C2, $D2;
    private $rA, $rB, $rC, $rD, $rA2, $rB2, $rC2, $rD2;
    private $eA, $eB, $eC, $eD, $eA2, $eB2, $eC2, $eD2;
    


    private $t1, $t2, $ph1, $ph2, $tiempo1, $tiempo2;
    
    public function __construct($temperatura3, $ph3, $tiempo3, $catalizador) 
    {
        
        $this->t3 = $temperatura3;
        $this->ph3 = $ph3;
        $this->tiempo3 = $tiempo3;
        $this->catalizador = $catalizador;       
  
    }

    public function obtenerCubo()
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
    
                    //Algoritmo de calculo --> Interpolator 2.0 

            for ($this->t1=$this->t3; $this->t1<=35; $this->t1++) //Genero plano S1 y no avanzo hasta realizar comprobaciones
            {

                for ($this->ph1=$this->ph3; $this->ph1>=6; $this->ph1--) //Me desplazo sobre e1 y no avanzo hasta realizar comprobaciones
                {

                    for ($this->tiempo1=$this->tiempo3; $this->tiempo1>=24; $this->tiempo1--) //Me desplazo sobre el e2 hasta encontrar punto
                    {

                        $consulta = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='$this->t1' and ph='$this->ph1' and tiempo='$this->tiempo1' and catalizador='$this->catalizador'");
                        $consulta->execute();
                        
                            if ($consulta->rowCount() > 0)
                            {
                            $this->rA = floatval($consulta->fetchAll(PDO::FETCH_COLUMN)[0]);

                            $consulta2 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='$this->t1' and ph='$this->ph1' and tiempo='$this->tiempo1' and catalizador='$this->catalizador'");
                            $consulta2->execute();

                            $this->eA = floatval($consulta2->fetchAll(PDO::FETCH_COLUMN)[0]);
                            }

                            else  { $this->rA = $this->eA = 0; }
                        
                        if( $this->rA != 0 ) //(Que la base de datos tenga valor en el cuadrante C1 y saco punto A)
                        {
                            $this->A = array($this->t1, $this->ph1, $this->tiempo1, $this->rA, $this->eA, $this->catalizador); //genero ejes e3 y e4  

                            //Comprobar que hay dato en el cuadrante C2
                            for ($this->tiempo2=$this->tiempo3; $this->tiempo2<=52; $this->tiempo2++) //Me desplazo sobre e3 y busco punto
                            {

                                $consulta = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='$this->t1' and ph='$this->ph1' and tiempo='$this->tiempo2' and catalizador='$this->catalizador'");
                                $consulta->execute();
                                
                                if ($consulta->rowCount() > 0)
                                {
                                    $this->rB = floatval($consulta->fetchAll(PDO::FETCH_COLUMN)[0]);

                                    $consulta2 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='$this->t1' and ph='$this->ph1' and tiempo='$this->tiempo2' and catalizador='$this->catalizador'");
                                    $consulta2->execute();

                                    $this->eB = floatval($consulta2->fetchAll(PDO::FETCH_COLUMN)[0]);
                                }
                                else { $this->rB = $this->eB = 0; }
                                    
                                if( $this->rB != 0 ) //Que encuentre punto en el e3 y saco B
                                {
                                    $this->B = array ($this->t1, $this->ph1, $this->tiempo2, $this->rB, $this->eB, $this->catalizador); //genero eje e5
                                    
                                    for ($this->ph2=$this->ph3; $this->ph2<=8; $this->ph2++) //Que encuentre punto en C3 avanzando por e4 (TIEMPO=T1) y saco el punto C
                                    {

                                        $consulta = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='$this->t1' and ph='$this->ph2' and tiempo='$this->tiempo1' and catalizador='$this->catalizador'");
                                        $consulta->execute();

                                        if ($consulta->rowCount() > 0)
                                        {
                                            $this->rC = floatval($consulta->fetchAll(PDO::FETCH_COLUMN)[0]);

                                            $consulta2 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='$this->t1' and ph='$this->ph2' and tiempo='$this->tiempo1' and catalizador='$this->catalizador'");
                                            $consulta2->execute();

                                            $this->eC = floatval($consulta2->fetchAll(PDO::FETCH_COLUMN)[0]);
                                        }
                                        else { $this->rC = $this->eC = 0; }
                                        
                                        if ( $this->rC != 0 ) 
                                        {
                                            $this->C = array ($this->t1, $this->ph2, $this->tiempo1, $this->rC, $this->eC, $this->catalizador); //genero eje e6
                                        
                                            for ($this->tiempo2=$this->tiempo3; $this->tiempo2<=52; $this->tiempo2++)
                                            {

                                                $consulta = $conn->prepare("SELECT rendimiento FROM datos WHERE temp='".$this->t1."' and ph='".$this->C[1]."' and tiempo='".$this->tiempo2."' and catalizador='".$this->catalizador."'");  
                                                $consulta->execute();
                                                
                                                if ($consulta->rowCount() > 0)
                                                {
                                                    $this->rD = floatval($consulta->fetchAll(PDO::FETCH_COLUMN)[0]);

                                                    $consulta2 = $conn->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='".$this->t1."' and ph='".$this->C[1]."' and tiempo='".$this->tiempo2."' and catalizador='".$this->catalizador."'");  
                                                    $consulta2->execute();

                                                    $this->eD = floatval($consulta2->fetchAll(PDO::FETCH_COLUMN)[0]);
                                                }
                                                else { $this->rD = $this->eD = 0; }


                                                if ( $this->rD != 0 ) // Si el rendimineto es conocido ya tengo determinado el cuadrado
                                                {

                                                    $this->D = array ($this->t1, $this->C[1], $this->B[2], $this->rD, $this->eD, $this->catalizador); //Defino el punto D por coordenadas (TIEMPO=T2; PH=PH2) y miro su rendimiento

                                                    for ($this->t2=($this->t3); $this->t2>=25; $this->t2--) // Compruebo si existe el mismo cuadrado en otro plano para formar el cubo
                                                    {
                                                       $this->rA2 = $this->obtenerValor($conn,$this->t2,$this->A[1],$this->A[2],$this->catalizador);
                                                       $this->rB2 = $this->obtenerValor($conn,$this->t2,$this->B[1],$this->B[2],$this->catalizador);
                                                       $this->rC2 = $this->obtenerValor($conn,$this->t2,$this->C[1],$this->C[2],$this->catalizador);
                                                       $this->rD2 = $this->obtenerValor($conn,$this->t2,$this->D[1],$this->D[2],$this->catalizador);
                                                       
                                                       $this->eA2 = $this->obtenerValor2($conn,$this->t2,$this->A[1],$this->A[2],$this->catalizador);
                                                       $this->eB2 = $this->obtenerValor2($conn,$this->t2,$this->B[1],$this->B[2],$this->catalizador);
                                                       $this->eC2 = $this->obtenerValor2($conn,$this->t2,$this->C[1],$this->C[2],$this->catalizador);
                                                       $this->eD2 = $this->obtenerValor2($conn,$this->t2,$this->D[1],$this->D[2],$this->catalizador);

                                                        if ( $this->rA2 != 0 && $this->rB2 != 0 && $this->rC2 != 0 && $this->rD2 != 0 )
                                                        {
                                                            $this->A2 = array($this->t2, $this->A[1], $this->A[2], $this->rA2, $this->eA2, $this->catalizador);
                                                            $this->B2 = array($this->t2, $this->B[1], $this->B[2], $this->rB2, $this->eB2, $this->catalizador);
                                                            $this->C2 = array($this->t2, $this->C[1], $this->C[2], $this->rC2, $this->eC2, $this->catalizador);
                                                            $this->D2 = array($this->t2, $this->D[1], $this->D[2], $this->rD2, $this->eD2, $this->catalizador);
                                                            
                                                            return 1; // Señal de que se puede empezar a interpolar
                                                        }
                                                        
                                                    }
                                                    
                                                }

                                            }

                                        }
                                        
                                    }   
                                    
                                    break;
                                    
                                }
                                
                            }

                        }
                                
                    }
                        // Si no forma cuadrado: $tiempo1-- y sigo desplazandome por e2 para buscar el siguiente más grande    
                }
                //Si no forma cuadrado: $ph1-- y sigo desplazandome por e1 para buscar el siguiente más grande
            }
            // Si no forma cuadrado: $t1++ y genero nuevo plano S2 sobre el que se repetiran las mismas operaciones para buscar en el siguiente más grande    
        
                                                        }
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
            
    }
    
    public function obtenerRendimiento() // Esta función se ejecuta cuando tengo los 8 puntos
    {
        $this->r0 = $this->A2;
        $this->r1 = $this->A;
        $this->r2 = $this->B2;
        $this->r3 = $this->B;
        $this->r4 = $this->C2;
        $this->r5 = $this->C;
        $this->r6 = $this->D2;
        $this->r7 = $this->D;
        
        if ($this->A == $this->A2 && $this->A == $this->C && $this->A == $this->B)
        {
            $rendimiento = $this->A[3];
            return $rendimiento;
        }
        else
        {
            if ($this->A == $this->B && $this->A == $this->C )
            {
                $this->r14[3] = ( ( ( $this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) * $this->r1[3]) + ( ( ( $this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) * $this->r0[3]) ) );
                $rendimiento = $this->r14[3];
                return $rendimiento;
                
            }
            else if ($this->A == $this->B && $this->A == $this->A2 )
            {
                $this->r14[3] = ( ( ( $this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) * $this->r4[3]) + ( ( ( $this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) * $this->r0[3]) ) );
                $rendimiento = $this->r14[3];
                return $rendimiento;
            }
            else if ($this->A == $this->A2 && $this->A == $this->C )
            {
                $this->r14[3] = ( ( ( $this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) * $this->r2[3]) + ( ( ( $this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) * $this->r0[3]) ) );
                $rendimiento = $this->r14[3];
                return $rendimiento;
            }
            else
            {    
                if($this->A == $this->A2)
                {           
                    $this->r12[3] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r4[3] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r0[3]  );
                    $this->r13[3] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r6[3] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r2[3] );

                        // R14        =               (TIEMPO2-TIEMPO3)     /       (TIEMPO2-TIEMPO1)         *     R13         +           (TIEMPO3-TIEMPO1)         /         (TIEMPO2-TIEMPO1)       *       R12         
                        $this->r14[3] = ( ( ($this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) ) * $this->r13[3] ) + ( ( ($this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) ) * $this->r12[3] );
                        $rendimiento = $this->r14[3];
                        return $rendimiento;
                }
                if($this->A == $this->C)
                {
                    $this->r8[3] = ( ( ($this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) ) * $this->r1[3] ) + ( ( ($this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) ) * $this->r0[3] );            
                    $this->r9[3] = ( ( ($this->r3[0] - $this->t3) / ($this->r3[0] - $this->r2[0]) ) * $this->r3[3] ) + ( ( ($this->t3 - $this->r2[0]) / ($this->r3[0] - $this->r2[0]) ) * $this->r2[3] );

                        $this->r14[3] = ( ( ($this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) ) * $this->r10[3] ) + ( ( ($this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) ) * $this->r8[3] );
                        $rendimiento = $this->r14[3];
                        return $rendimiento;
                }
                if( $this->A == $this->B)
                {
                    $this->r8[3]  = ( ( ($this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) ) * $this->r1[3] ) + ( ( ($this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) ) * $this->r0[3] );
                    $this->r10[3] = ( ( ($this->r5[0] - $this->t3) / ($this->r5[0] - $this->r4[0]) ) * $this->r5[3] ) + ( ( ($this->t3 - $this->r4[0]) / ($this->r5[0] - $this->r4[0]) ) * $this->r4[3] );   

                        $this->r14[3] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r10[3] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r8[3] );
                        $rendimiento = $this->r14[3];
                        return $rendimiento;
                }

                else
                {
                    //                      (T2-T3)                /             (T2-T1)             *        R1      +         (T3-T1)                /        (T2-T1)                  *  R0             
                     $this->r8[3] = ( ( ($this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) ) * $this->r1[3] ) + ( ( ($this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) ) * $this->r0[3] );
                     $this->r9[3] = ( ( ($this->r3[0] - $this->t3) / ($this->r3[0] - $this->r2[0]) ) * $this->r3[3] ) + ( ( ($this->t3 - $this->r2[0]) / ($this->r3[0] - $this->r2[0]) ) * $this->r2[3] );
                    $this->r10[3] = ( ( ($this->r5[0] - $this->t3) / ($this->r5[0] - $this->r4[0]) ) * $this->r5[3] ) + ( ( ($this->t3 - $this->r4[0]) / ($this->r5[0] - $this->r4[0]) ) * $this->r4[3] );
                    $this->r11[3] = ( ( ($this->r7[0] - $this->t3) / ($this->r7[0] - $this->r6[0]) ) * $this->r7[3] ) + ( ( ($this->t3 - $this->r6[0]) / ($this->r7[0] - $this->r6[0]) ) * $this->r6[3] );

                            // R12        =               (PH2-PH3)         /            (PH2-PH1)            *      R9         +           (PH3-PH1)             /            (PH2-PH1)            *      R8
                            $this->r12[3] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r10[3] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r8[3]  );
                            $this->r13[3] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r11[3] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r9[3] );

                                // R14        =               (TIEMPO2-TIEMPO3)     /       (TIEMPO2-TIEMPO1)         *     R13         +           (TIEMPO3-TIEMPO1)         /         (TIEMPO2-TIEMPO1)       *       R12         
                                $this->r14[3] = ( ( ($this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) ) * $this->r13[3] ) + ( ( ($this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) ) * $this->r12[3] );
                                $rendimiento = $this->r14[3];
                                return $rendimiento;
                }
            }
        }
    }
    
    public function obtenerExceso() // Esta función se ejecuta cuando tengo los 8 puntos
    {
        $this->r0 = $this->A2;
        $this->r1 = $this->A;
        $this->r2 = $this->B2;
        $this->r3 = $this->B;
        $this->r4 = $this->C2;
        $this->r5 = $this->C;
        $this->r6 = $this->D2;
        $this->r7 = $this->D;
        
        if ($this->A == $this->A2 && $this->A == $this->C && $this->A = $this->B)
        {
            $rendimiento = $this->A[3];
            return $rendimiento;
        }
        else
        {
            if ($this->A == $this->B && $this->A == $this->C )
            {
                $this->r14[4] = ( ( ( $this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) * $this->r1[4]) + ( ( ( $this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) * $this->r0[4]) ) );
                $exceso = $this->r14[4];
                return $exceso;               
            }
            else if ($this->A == $this->B && $this->A == $this->A2 )
            {
                $this->r14[4] = ( ( ( $this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) * $this->r4[4]) + ( ( ( $this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) * $this->r0[4]) ) );
                $exceso = $this->r14[4];
                return $exceso;
            }
            else if ($this->A == $this->A2 && $this->A == $this->C )
            {
                $this->r14[4] = ( ( ( $this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) * $this->r2[4]) + ( ( ( $this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) * $this->r0[4]) ) );
                $exceso = $this->r14[4];
                return $exceso;
            }
            else
            {
                if($this->A == $this->A2)
                {

                    $this->r12[4] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r4[4] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r0[4]  );
                    $this->r13[4] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r6[4] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r2[4] );

                        // R14        =               (TIEMPO2-TIEMPO3)     /       (TIEMPO2-TIEMPO1)         *     R13         +           (TIEMPO3-TIEMPO1)         /         (TIEMPO2-TIEMPO1)       *       R12         
                        $this->r14[4] = ( ( ($this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) ) * $this->r13[4] ) + ( ( ($this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) ) * $this->r12[4] );
                        $exceso = $this->r14[4];
                        return $exceso;
                }
                else if($this->A == $this->C)
                {
                    $this->r8[4] = ( ( ($this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) ) * $this->r1[4] ) + ( ( ($this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) ) * $this->r0[4] );            
                    $this->r9[4] = ( ( ($this->r3[0] - $this->t3) / ($this->r3[0] - $this->r2[0]) ) * $this->r3[4] ) + ( ( ($this->t3 - $this->r2[0]) / ($this->r3[0] - $this->r2[0]) ) * $this->r2[4] );

                        $this->r14[4] = ( ( ($this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) ) * $this->r10[4] ) + ( ( ($this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) ) * $this->r8[4] );
                        $exceso = $this->r14[4];
                        return $exceso;
                }
                else if( $this->A == $this->B)
                {
                    $this->r8[4]  = ( ( ($this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) ) * $this->r1[4] ) + ( ( ($this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) ) * $this->r0[4] );
                    $this->r10[4] = ( ( ($this->r5[0] - $this->t3) / ($this->r5[0] - $this->r4[0]) ) * $this->r5[4] ) + ( ( ($this->t3 - $this->r4[0]) / ($this->r5[0] - $this->r4[0]) ) * $this->r4[4] );   

                        $this->r14[4] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r10[4] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r8[4] );
                        $exceso = $this->r14[4];
                        return $exceso;
                }
                else
                {
                    //                      (T2-T3)                /             (T2-T1)             *        R1      +         (T3-T1)                /        (T2-T1)                  *  R0             
                     $this->r8[4] = ( ( ($this->r1[0] - $this->t3) / ($this->r1[0] - $this->r0[0]) ) * $this->r1[4] ) + ( ( ($this->t3 - $this->r0[0]) / ($this->r1[0] - $this->r0[0]) ) * $this->r0[4] );
                     $this->r9[4] = ( ( ($this->r3[0] - $this->t3) / ($this->r3[0] - $this->r2[0]) ) * $this->r3[4] ) + ( ( ($this->t3 - $this->r2[0]) / ($this->r3[0] - $this->r2[0]) ) * $this->r2[4] );
                    $this->r10[4] = ( ( ($this->r5[0] - $this->t3) / ($this->r5[0] - $this->r4[0]) ) * $this->r5[4] ) + ( ( ($this->t3 - $this->r4[0]) / ($this->r5[0] - $this->r4[0]) ) * $this->r4[4] );
                    $this->r11[4] = ( ( ($this->r7[0] - $this->t3) / ($this->r7[0] - $this->r6[0]) ) * $this->r7[4] ) + ( ( ($this->t3 - $this->r6[0]) / ($this->r7[0] - $this->r6[0]) ) * $this->r6[4] );

                            // R12        =               (PH2-PH3)         /            (PH2-PH1)            *      R9         +           (PH3-PH1)             /            (PH2-PH1)            *      R8
                            $this->r12[4] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r10[4] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r8[4]  );
                            $this->r13[4] = ( ( ($this->r4[1] - $this->ph3) / ($this->r4[1] - $this->r0[1]) ) * $this->r11[4] ) + ( ( ($this->ph3 - $this->r0[1]) / ($this->r4[1] - $this->r0[1]) ) * $this->r9[4] );

                                // R14        =               (TIEMPO2-TIEMPO3)     /       (TIEMPO2-TIEMPO1)         *     R13         +           (TIEMPO3-TIEMPO1)         /         (TIEMPO2-TIEMPO1)       *       R12         
                                $this->r14[4] = ( ( ($this->r2[2] - $this->tiempo3) / ($this->r2[2] - $this->r0[2]) ) * $this->r13[4] ) + ( ( ($this->tiempo3 - $this->r0[2]) / ($this->r2[2] - $this->r0[2]) ) * $this->r12[4] );
                                $exceso = $this->r14[4];
                                return $exceso;
                }
            }
        }
    }
    
    
    private function obtenerValor($conexion, $temp, $ph, $tiempo, $catalizador)
    {
        $consulta = $conexion->prepare("SELECT rendimiento FROM datos WHERE temp='".$temp."' and ph='".$ph."' and tiempo='".$tiempo."' and catalizador='".$catalizador."'");
        $consulta->execute();
        if ($consulta->rowCount() > 0)
        {
            return floatval($consulta->fetchAll(PDO::FETCH_COLUMN)[0]);
        }
        else { return 0; }    
    }
    
    private function obtenerValor2($conexion, $temp, $ph, $tiempo, $catalizador)
    {
        $consulta = $conexion->prepare("SELECT excesodeenantiomero FROM datos WHERE temp='".$temp."' and ph='".$ph."' and tiempo='".$tiempo."' and catalizador='".$catalizador."'");
        $consulta->execute();
        if ($consulta->rowCount() > 0)
        {
            return floatval($consulta->fetchAll(PDO::FETCH_COLUMN)[0]);
        }
        else { return 0; }
    }
    
    public function showCalculos()
    {
        
       if ($this->A == $this->A2 && $this->A == $this->C && $this->A = $this->B)
        {
                $calculos = array( $this->r14);
                
        }
        else
        {
            if ($this->A == $this->B && $this->A == $this->C )
            {
                $calculos = array( $this->r0, $this->r1);
            }
            else if ($this->A == $this->B && $this->A == $this->A2 )
            {
                $calculos = array( $this->r0, $this->r4);               
            }
            else if ($this->A == $this->A2 && $this->A == $this->C )
            {
                $calculos = array( $this->r0, $this->r2);
            }
            else
            {
                if($this->A == $this->A2)
                {
                    $calculos = array( $this->r0, $this->r2, $this->r4, $this->r6);

                }
                else if($this->A == $this->C)
                {
                    $calculos = array( $this->r0, $this->r1, $this->r2, $this->r3);

                }
                else if( $this->A == $this->B)
                {
                    $calculos = array( $this->r0, $this->r1, $this->r4,  $this->r5);

                }
                else
                {
                    $calculos = array( $this->r0, $this->r1, $this->r2, $this->r3, $this->r4,  $this->r5, $this->r6,);
                }
            }
        

        }
        return $calculos;
    }
        
};

?>
