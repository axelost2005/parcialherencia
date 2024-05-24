<?php
include ("Torneo.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$torneo = new Torneo(100.000);

$parPartidoBasq1 = new PartidoBasquet(11 , "2024-05-05", $objE7, 80 , $objE8 , 120 , 7);
$parPartidoBasq2 = new PartidoBasquet(12, "2024-05-0" , $objE10 , 81 , $objE10 , 110 , 8); 
$parPartidoBasq3 = new PartidoBasquet(13 , "2024-05-07" , $objE11 , 115 , $objE12 , 85 , 9);

$partidoFutbol1 = new PartidoFutbol(14 , "2024-05-07" , $objE1 , 3 , $objE2 , 2);
$partidoFutbol2 = new PartidoFutbol(15 , "2024-05-08" , $objE3 , 0 , $objE4 , 1);
$partidoFutbol3 = new PartidoFutbol(16 , "2024-05-09" , $objE5 , 2 , $objE6 , 3);


$varible1= $torneo -> ingresarPartido($objE5, $objE11, '2024-05-23', "Futbol");
if($varible1 == null){
    echo "No se pudo ingresar partido"."\n";
}else{
    echo "Se pudo ingresar su partido"."\n";
}

$variable2= $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');

if($variable2 == null){
    echo "No se pudo ingresar partido"."\n";
}else{
    echo "Se pudo ingresar su partido"."\n";
}

$variable2= $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');

if($variable2 == null){
    echo "No se pudo ingresar partido"."\n";
}else{
    echo "Se pudo ingresar su partido"."\n";
}

$variable3 = $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
if($variable3 == null){
    echo "No se pudo ingresar partido"."\n";
}else{
    echo "Se pudo ingresar su partido"."\n";
}

$ganadorBasquet= $torneo->darGanadores("basquet");
$ganadorFutbol= $torneo->darGanadores("futbol");

$torneo->calcularPremioPartido($variable1);
$torneo->calcularPremioPartido($variable2);
$torneo->calcularPremioPartido($variable3);



?>
