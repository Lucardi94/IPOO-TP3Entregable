<?php
    class Cine extends Funcion {
        /***
         *  Representacion de la clase Cine.
         *  - Atributos:
         *      + nombre string
         *      + precio float
         *      + inicio array (mes, dia, hora, minuto)
         *      + duracion array (hora, minuto)
         *      + género String 
         *      + país de origen String 
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
         */ 
        private $genero;
        private $paisOrigen;

        public function __construct($nom, $pre, $horIni, $dur, $gen, $paiOri){
            parent::__construct($nom, $pre, $horIni, $dur);
            $this->genero = $gen;
            $this->paisOrigen = $paiOri;
        }
        
        public function getGenero(){
            return $this->genero;
        }
        public function getPaisOrigen(){
            return $this->paisOrigen;
        }
 
        public function setGenero($nGen){
            $this->genero = $nGen;
        }
        public function setPaisOrigen($nPaiOri){
            $this->paisOrigen = $nPaiOri;
        }

        public function darCosto(){
            return $this->getPrecio()*1.65;
        }

        public function __toString(){
            $text = parent::__toString();
            $text.="\nGenero: ".$this->getGenero().
            "\nPais de Origen: ".$this->getPaisOrigen();
            return $text;
        }
    }
