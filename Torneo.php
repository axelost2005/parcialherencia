<?php
include_once ("PartidoBasquet.php");
include_once ("PartidoFutbol.php");
include_once ("Equipo.php");

class Torneo{

    private $coleccionPartidos;
    private $importePremio;

    public function __construct($importePremioC)
    {
        $this->coleccionPartidos = [];
        $this->importePremio= $importePremioC;
    }
    public function getColecPartidos(){
        return $this->coleccionPartidos;
    }
    public function setColecPartidos($colecPArtidos){
        $this->coleccionPartidos = $colecPArtidos;
    }
    public function getImporte(){
       return $this->importePremio;
    }


    
    public function ingresarPartido($OBJEquipo1,$OBJEquipo2, $fecha, $tipoPartido){
        $cantJugadores1=$OBJEquipo1->getCantJugadores();
        $tipoCategoria1= $OBJEquipo1->getObjCategoria()->getDescripcion();
        $cantJugadores2= $OBJEquipo2->getCantJugadores();
        $tipoCategoria2= $OBJEquipo2->getObjCategoria()->getDescripcion();
        $colecPartidos= $this->getColecPartidos();
        $idPartido= 0 ;
        $partido=null;
        if($tipoPartido == "futbol"){
           
            if($tipoCategoria1 == $tipoCategoria2 && $cantJugadores1 == $cantJugadores2){
                $idPartido= $idPartido + 1;
                $partido = new PartidoFutbol($idPartido,$fecha,$OBJEquipo1,0,$OBJEquipo2,0,$tipoCategoria1);
                array_push($colecPartidos,$partido);
            }
        }elseif($tipoPartido == "basquetbol"){
            if($cantJugadores1 == $cantJugadores2 && $OBJEquipo1 != $OBJEquipo2){
                $idPartido= $idPartido +1;
                $partido = new PartidoBasquet($idPartido,$fecha,$OBJEquipo1,0,$OBJEquipo2,0,0);
                array_push($colecPartidos,$partido);
            }
        }
        return $partido;
    }

    public function darGanadores($deporte)  {  
        $colPartidos = $this->getColecPartidos();
        $colPartidosBasquet = [];
        $colPartidosFutbol = [];
        $colGanadores = [];
        foreach ($colPartidos as $partido) {
            if ( $deporte == "futbol") {
                if ($partido instanceof PartidoFutbol) {
                    array_push($colPartidosFutbol , $partido);
                }
            } else {
                if ($deporte == "basquet") {
                    if ($partido instanceof PartidoBasquet) {
                        array_push($colPartidosBasquet , $partido);
                    }
                }
            }
        }
        foreach ($colPartidosFutbol as $partido) {
            $equipoGanador = $partido->darEquipoGanador(); 
            array_push($colGanadores , $equipoGanador);
        }
        foreach ($colPartidosBasquet as $partido) {
            $equipoGanador = $partido->darEquipoGanador(); 
            array_push($colGanadores , $equipoGanador);
        }
        return $colGanadores;
    }

    public function calcularPremioPartido($objPartido) {

        $coefPartido = $objPartido->coeficientePartido();

        $premioPartido = $this->getImporte() * $coefPartido;

        $ganadorPartido = $objPartido->darEquipoGanador();

        $premio = ["equipoGanador" => $ganadorPartido , "premioPartido" =>$premioPartido];

        return $premio;
    }


    public function __toString()
    {
        return 
        "Colecion partidos: ".$this->getColecPartidos()."\n".
        "importe Premio: ".$this->getImporte()."\n";
    }

}