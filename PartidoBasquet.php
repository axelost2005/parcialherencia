<?php
include_once "Partido.php";
class PartidoBasquet extends Partido{

    private $cantInfracciones;
    private $coeficientePenalizacion;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantInfracciones){
        parent :: __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->coeficientePenalizacion = 0.75;
    }
    public function getInfraccion(){
        return $this->cantInfracciones;
    }
    public function getCoeficientePenalizacion(){
        return $this->cantInfracciones;
    }
    public function setInfraccion($infraccion){
        $this->cantInfracciones = $infraccion;
    }
    
    public function coeficientePartido() {
        $coeficienteRestar = $this->getInfraccion() * $this->getCoeficientePenalizacion();
        $coeficienteBase = $this->getCoefBase();
        $coeficientePartido = $coeficienteBase - $coeficienteRestar;
        return $coeficientePartido;
    }

    public function __toString()
    {
        $cadena = parent :: __toString();
        $cadena .= "Infracciones: " .$this->getInfraccion()."\n"."Coeficiente Penalizacion: ".$this->getCoeficientePenalizacion()."\n";
        return $cadena;
    }
}