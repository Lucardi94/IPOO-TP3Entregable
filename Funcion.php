<?php
    class Funcion{
        /***
         *  Representacion de la clase Funcion.
         *  - Atributos:
         *      + nombre string
         *      + precio float
         *      + inicio array (mes, dia, hora, minuto)
         *      + duracion array (hora, minuto)
         *  - Fuciones:
         *      + darCosto()
         *      + calcularFin()
         *          - ultimoDiaMes($mes)
         *      + inicioPosible($otraFuncion)
         *          - mismaFecha($fechaA, $fechaB) 
         *          - horarioPosible($otroIni, $otroFin)
         *              + horaMayorFin($hora, $min)
         *              + horaMenorFin($hora, $min)
         *              + dentroHorario($hora1, $min1, $hora2, $min2)
         *              + dentroHorarioDos($hora1, $min1, $hora2, $min2)            
         *      + to_string()
         *          - mostrarFecha($fecha)
         *          - mostrarHora($tiempo)
         * */
        private $nombre;
        private $precio;
        private $inicio; // array (mes, dia, hora, minuto)
        private $duracion; // array (hora, minuto)

        public function __construct($nom, $pre, $ini, $dur)
        {
            $this->nombre = $nom;
            $this->precio = $pre;
            $this->inicio = $ini;
            $this->duracion = $dur;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function getInicio(){
            return $this->inicio;
        }
        public function getDuracion(){
            return $this->duracion;
        }

        public function setNombre($nNom){
            $this->nombre = $nNom;
        }
        public function setPrecio($nPre){
            $this->precio = $nPre;
        }
        public function setInicio($nIni){
            $this->inicio = $nIni;
        }
        public function setDuracion($nDur){
            $this->duracion = $nDur;
        }

        public function darCosto(){
            return $this->getPrecio()*1.45;
        }

        public function calcularFin(){
            // Retorna el calculo de sumar el inicion con las duracion de la pelicula
            $fin = new DateTime($this->getInicio()->format('Y-m-d H:i'));
            $fin->add(new DateInterval('PT'.$this->getDuracion()["hora"].'H'.$this->getDuracion()["minuto"].'M'));
            return $fin;
        }

        public function funcionPosible($otraFuncion){
            /***
             * Retorna un true en caso de que el horario de la funcion sea posible
             * Busca si coiciden las fechas de inicion y fin de ambas.
             * En caso de ser verdadero alguno, Comprueba si los horarios se tocan.
             */
            $iniA = $this->getInicio();
            $iniB = $otraFuncion->getInicio();
            $finA = $this->calcularFin();
            $finB = $otraFuncion->calcularFin();
            
            if (($iniA<$iniB && $finA>$finB) || ($iniA>$iniB && $finA<$finB)){  //Esta Condicion elimina dos errores que imagine
                $posible = FALSE;                                               //Primer es si la funcion comienza antes y termina despues de la otra funcion
            } else{                                                             //Segundo si la funcion comienza y termina durante la otra funcion
                if ($finA<$iniB){
                    $posible = TRUE;
                } elseif ($iniA>$finB){
                    $posible = TRUE;
                } else {
                    $posible = FALSE;
                }
            }
            return $posible;
        }
        
        public function mostrarHora($tiempo){
            // Retorna un string para mostrar el formato de la hora
            return $tiempo["hora"].":".$tiempo["minuto"];
        }

        public function __toString()
        {
            return "Funcion: ".$this->getNombre().
            "\nPrecio: ".$this->getPrecio().
            "\nHora Inicio: ".$this->getInicio()->format('Y-m-d \ H:i').
            "\nDuracion: ".$this->mostrarHora($this->getDuracion());
        }
    }