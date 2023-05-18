<?php

/*
Enunciado:
(Lo pegue en todos los archivos...)
La empresa de transporte desea gestionar la información correspondiente a los pasajeros de los Viajes que pueden ser: Pasajeros estándares, Pasajeros VIP y Pasajeros con necesidades especiales. 

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.  Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.

Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.

Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
*/

class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDoc;
    private $telefono;
    private $nroAsiento;
    private $nroTicket;

    public function __construct($pnombre, $papellido, $pnroDoc, $ptelefono, $pnroAsiento, $pnroTicket){
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
        $this->nroDoc = $pnroDoc;
        $this->telefono = $ptelefono;
        $this->nroAsiento = $pnroAsiento;
        $this->nroTicket = $pnroTicket;
    }

    /**
     * Obtiene el valor de nombre
     * @param $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el valor de apellido
     * @param $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Obtiene el valor de nroDoc
     * @param $nroDoc
     */
    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }

    /**
     * Obtiene el valor de telefono
     * @param $telefono
     */
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    /**
     * setea valor de nroAsiento
     * @param $nroAsiento
     */
    public function setNroAsiento($nroAsiento){
        $this->nroAsiento = $nroAsiento;
    }

    /**
     * Obtiene el valor de nroTicket
     * @param $nroTicket
     */
    public function setNroTicket($nroTicket){
        $this->nroTicket = $nroTicket;
    }

    /**
     * Obtiene el valor de nombre
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de apellido
     */
    public function getApellido(){
        return $this->apellido;
    }
    
    /**
     * Obtiene el valor de nroDoc
     */
    public function getNroDoc(){
        return $this->nroDoc;
    }

    /**
     * Obtiene el valor de telefono
     */
    public function getTelefono(){
        return $this->telefono;
    }

    /**
     * Obtiene el valor de nroAsiento
     */
    public function getNroAsiento(){
        return $this->nroAsiento;
    }

    /**
     * Obtiene el valor de nroTicket
     */
    public function getNroTicket(){
        return $this->nroTicket;
    }

    //To String
    public function __toString(){
        $msjToString = "\nNombre pasajero : ".$this->getNombre()."\nApellido pasajero : ".$this->getApellido()."\nnúmero  documento: ".$this->getNroDoc()."\nteléfono pasajero : ".$this->getTelefono()."\nnúmero de asiento: ".$this->getNroAsiento()."\nnúmero ticket : ".$this->getNroTicket()."\n\n";
        return $msjToString;
    }

    /**
     * Incrementa el monto del pasaje y retorna el porcentaje que debe aplicarse como incremento según las características del pasajero.
     * STANDAR: Para los pasajeros comunes el porcentaje de incremento es del 10 %
     * VIP: Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%
     * ESPECIAL: Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
     * @return int 
     */
    public function darPorcentajeIncremento(){
        $porcentajeAumento = 10;
        return $porcentajeAumento;
    }

}