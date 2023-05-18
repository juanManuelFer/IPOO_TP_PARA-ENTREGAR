<?php

//Indico que archivos incluyo
include_once ("Pasajero.php");
include_once ("PasajeroVIP.php");
include_once ("PasajeroNecesidadesEsp.php");
include_once ("Responsable.php");
include_once ("Viaje.php");
//--------------------------------------------------------------------

$objPasajero1 = new Pasajero("jusn", "Fernandez", 11111111, 111, "A-1", "T-101");
$objPasajero2 = new PasajeroVIP("luis", "Vasquez", 3333333, 333, "A-2", "T-102", "VF-01", 1500);
$objPasajero3 = new PasajeroNecesidad("manuel", "Castillo", 5555555, 555, "A-3", "T-103", true, true, true);

//Array de objetos Pasajero
$colP[0] = $objPasajero1;
$colP[1] = $objPasajero2;
$colP[2] = $objPasajero3;

//--------------------------------------------------------------------

//Creo mi coleccion de Responsable
//($pnroEmpleado, $pnroLicencia, $pnombre, $papellido)
$objResponsable1 = new Responsable("N° 3", "Lic-3", "Leandro", "Spalletti");
$objResponsable2 = new Responsable("N° 6", "Lic-6", "Alan", "Aguirre");

//Array de objetos Responsable
$colR[0] = $objResponsable1;
$colR[1] = $objResponsable2;

//--------------------------------------------------------------------

//Creo mi coleccion de Viaje
//($codigo, $destino, $cantMaxPasajeros, $colPasajero, $objResponsable, $costoViaje, $sumaCostos)
$objViaje1 = new Viaje("Código-1", "Buenos Aires", 4, $colP, $objResponsable1, 1000, 999);
$objViaje2 = new Viaje("Código-2", "Neuquén", 2, $colP, $objResponsable2, 2000, 888);

//Array de objetos Viaje
$colV[0] = $objViaje1;
$colV[1] = $objViaje2;

//Invoco a la funcion venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.

//*****************************/
//aca pido por consola los datos 
echo "Ingrese el nombre: ";
$nombre = trim(Fgets(STDIN));

echo "Ingrese el apellido: ";
$apellido = trim(Fgets(STDIN));

echo "Ingrese el nroDoc: ";
$nroDoc = trim(Fgets(STDIN));

echo "Ingrese el teléfono: ";
$telefono = trim(Fgets(STDIN));

echo "Ingrese el nroAsiento: ";
$nroAsiento = trim(Fgets(STDIN));

echo "Ingrese el nroTicket: ";
$nroTicket = trim(Fgets(STDIN));

//Para PASAJERO VIP
echo "Ingrese el nroViajeroFrec y si no corresponde ponga N: ";
$nroViajeroFrec = trim(Fgets(STDIN));

echo "Ingrese el cantMillas y si no corresponde ponga N: ";
$cantMillas = trim(Fgets(STDIN));

//Para PASAJERO NECESIDAD
echo "Ingrese el silla (Si necesita ingrese 1, si no necesita deje en blanco (pulse ENTER)) y si no corresponde ponga N: ";
$silla = trim(Fgets(STDIN));

echo "Ingrese el asistencia (Si necesita ingrese 1, si no necesita deje en blanco (pulse ENTER)) y si no corresponde ponga N: ";
$asistencia = trim(Fgets(STDIN));

echo "Ingrese el comida (Si necesita ingrese 1, si no necesita deje en blanco (pulse ENTER)) y si no corresponde ponga N: ";
$comida = trim(Fgets(STDIN));


//*******************/
//CREACION DE OBJETOS

//Creo el obj PASAJERO STANDAR
$objPasajeroStandar = new Pasajero($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket);

//Creo el obj PASAJERO VIP
$objPasajeroVIP = new PasajeroVIP($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrec, $cantMillas);

//Creo el obj PASAJERO NECESIDAD
$objPasajeroNecesidad = new PasajeroNecesidadesEsp($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket, $silla, $asistencia, $comida);
$encontro = $objViaje1->buscarPasajero($nroDoc);

//Verifico tipo de pasajero
if($nroViajeroFrec == "N" || $cantMillas == "N"){
    if($silla == "N" || $asistencia == "N" || $comida == "N"){
        $texto = $objViaje1->venderPasaje($objPasajeroStandar);
    }else{
        if($silla != "N" || $asistencia != "N" || $comida != "N"){
            $texto = $objViaje1->venderPasaje($objPasajeroNecesidad);
        }
    }
}else{
    $texto = $objViaje1->venderPasaje($objPasajeroVIP);
}

//Resultado
if($encontro){
    echo "No se puede agregar al pasajero";
}else{
    if($hayLugar){
        echo "El monto a abonar $".$texto;
    }else{
        echo $texto;
    }
}
