<?php

include_once "Partido.php";
include_once "Categoria.php";

class PartidoFutbol extends Partido{

    private $coefMenor;
    private $coefJuvenil;
    private $coefMayor;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent:: __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenor=0.13;
        $this->coefJuvenil=0.19;
        $this->coefMayor=0.27;
    }

    public function setCoefMenor($coefMenor) {
        $this->coefMenor = $coefMenor;
    }

    public function getCoefMenor() {
        return $this->coefMenor;
    }

    public function setCoefJuvenil($coefJuvenil) {
        $this->coefJuvenil = $coefJuvenil;
    }

    public function getCoefJuvenil() {
        return $this->coefJuvenil;
    }

    public function setCoefMayor($coefMayor) {
        $this->coefMayor = $coefMayor;
    }

    public function getCoefMayor() {
        return $this->coefMayor;
    }

    public function coeficientePartido() {
        $categoriaEquipo1 = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        if ($categoriaEquipo1 == "Menores") {
            $coef = $this->getCoefMenor();
        } elseif ($categoriaEquipo1 == "juveniles") {
            $coef = $this->getCoefJuvenil();
        } elseif ($categoriaEquipo1 == "Mayores") {
            $coef = $this->getCoefMayor();
        }
        $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
        $cantGolesTotal = $this->getCantGolesE1() + $this->getCantGolesE2();
        $coeficientePartido = $coef * $cantJugadores * $cantGolesTotal;
        return $coeficientePartido;
    }

    public function __toString()
    {
        $cadena= parent :: __toString();
        $cadena.= "coeficiente menor: ".$this->getCoefMenor()."\n"."Coeficiente juvenil: ".$this->getCoefJuvenil()."\n"."Coeficiente Mayor".$this->getCoefMayor();
        return $cadena;
        
    }


}