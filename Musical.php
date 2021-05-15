<?php
    class Musical extends Funcion{
        /***
         *  Representacion de la clase Musical.
         *  - Atributos:
         *      + nombre string
         *      + precio float
         *      + inicio array (mes, dia, hora, minuto)
         *      + duracion array (hora, minuto)
         *      + director String
         *      + cantidad de personas en escena int
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
        private $director;
        private $cantidadPersonas;

        public function __construct($nom, $pre, $ini, $dur, $dir, $canPer){
            parent::__construct($nom, $pre, $ini, $dur);
            $this->director = $dir;
            $this->cantidadPersonas = $canPer;
        }

        public function getDirector(){
                return $this->director;
        }
        public function getCantidadPersonas(){
                return $this->cantidadPersonas;
        }

        public function setDirector($nDir){
                $this->director = $nDir;
        }
        public function setCantidadPersonas($nCanPer){
                $this->cantidadPersonas = $nCanPer;
        }

        public function darCosto(){
            return $this->getPrecio()*1.12;
        }

        public function __toString(){
            $text = parent::__toString();
            $text.="\nDirector: ".$this->getDirector().
            "\nCantidad de Personas en escenas: ".$this->getCantidadPersonas();
            return $text;
        }
    }