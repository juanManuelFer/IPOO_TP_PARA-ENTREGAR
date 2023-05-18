<?php

/*
La empresa de transporte desea gestionar la información correspondiente a los pasajeros de los Viajes que pueden ser: Pasajeros estándares, Pasajeros VIP y Pasajeros con necesidades especiales. 

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.  Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.

Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.


Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
*/

class Viajes{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajero;
    private $objResponsable;
    private $costoViaje;
    private $sumaCostos;


    //funcion constructora
    public function __construct($pcodigo, $pdestino, $pcantMaxPasajeros, $pcolPasajero, $pobjResponsable, $pcostoViaje, $psumaCostos){
        $this -> codigo = $pcodigo;
        $this -> destino = $pdestino;
        $this -> cantMaxPasajeros = $pcantMaxPasajeros;
        $this -> colPasajero = $pcolPasajero;
        $this -> objResponsable = $pobjResponsable;
        $this -> costoViaje = $pcostoViaje;
        $this -> sumaCostos = $psumaCostos;
    }

    //metodos de acceso
    /**
    * Setea el valor de codigo
    * @param $codigo
    */
    public function setCodigo($codigo){
        $this -> codigo = $codigo;
    }

    /**
     * Setea el valor de destino
     * @param $destino
     */
    public function setDestino($destino){
        $this -> destino = $destino;
    }

    /**
     * Setea el valor de cantMaxPasajeros
     * @param $cantMaxPasajeros
     */
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }

    /**
     * Setea el valor de colPasajero
     * @param $colPasajero
     */
    public function setColPasajero($colPasajero){
        $this -> colPasajero = $colPasajero;
    }

    /**
     * Setea el valor de objResponsable
     * @param $objResponsable
     */
    public function setObjResponsable($objResponsable){
        $this -> objResponsable = $objResponsable;
    }

    /**
     * Setea el valor de costoViaje
     * @param $costoViaje
     */
    public function setCostoViaje($costoViaje){
        $this -> costoViaje = $costoViaje;
    }

    /**
     * Setea el valor de sumaCostos
     * @param $sumaCostos
     */
    public function setSumaCostos($sumaCostos){
        $this -> sumaCostos = $sumaCostos;
    }

    /**
    * Obtiene el valor de codigo
    */
    public function getCodigo(){
        return $this -> codigo;
    }

    /**
    * Obtiene el valor de destino
    */
    public function getDestino(){
        return $this -> destino;
    }

    /**
    * Obtiene el valor de cantMaxPasajeros
    */
    public function getCantMaxPasajeros(){
        return $this -> cantMaxPasajeros;
    }

    /**
    * Obtiene el valor de colPasajero
    */
    public function getColPasajero(){
        return $this -> colPasajero;
    }

    /**
    * Obtiene el valor de objResponsable
    */
    public function getObjResponsable(){
        return $this -> objResponsable;
    }

    /**
    * Obtiene el valor de costoViaje
    */
    public function getCostoViaje(){
        return $this -> costoViaje;
    }

    /**
    * Obtiene el valor de sumaCostos
    */
    public function getSumaCostos(){
        return $this -> sumaCostos;
    }

    //toString
    public function __toString(){
        $cadena = "\nCódigo viaje: ".$this->getCodigo()."\nDestino: ".$this->getDestino()."\nCant Máx Pasajeros: ".$this->getCantMaxPasajeros()."\ndatos de los pasajero: ".$this->mostrarPasajero()."\ndatos del responsable: ".$this->getObjResponsable()./*$this->mostrarDatosPasajeros().*/"\ncosto del viaje: ".$this->getCostoViaje()."\nsuma de costos viaje: ".$this->getSumaCostos()."\n\n";
        return $cadena;
    }

    /**
     * Muestra datos de pasajeros
     * @return string 
     */
    public function mostrarPasajero(){
        $colP = $this->getColPasajero();
        $texto = "\n\nLos pasajeros son: \n";
        $cantidad = count($colP);
        for($i = 0; $i < $cantidad; $i++){
            $texto = $texto.$colP[$i];
        }
        return $texto;
    }


    /**
     * Debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible).
     * Actualizar los costos abonados.
     * Retornar el costo final que deberá ser abonado por el pasajero.
     * @param  $objPasajero 
     * @return float $costoFinal
     */
    public function venderPasaje($objPasajero){
        $hayLugar = $this->hayPasajesDisponible();
        $costo = $this->getCostoViaje();
        $porcentajeAumento = $objPasajero->darPorcentajeIncremento();

        if($hayLugar){
            $aumento = $porcentajeAumento / 100;
            $costoFinal = $costo + ($costo * $aumento);
            $texto = $costoFinal;
        }else{
            $texto = "No hay lugar disponible.";
        }
        return $texto;
    }


    /**
     * Verifica si hay espacio disponible para agregar un pasajero.
     *  Retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario.
     * @return boolean 
     */
    public function hayPasajesDisponible(){
        $cantMaxPasajeros = $this->getCantMaxPasajeros();
        $colPasajero = $this->getColPasajero();

        //verifico si hay espacio disponible
        $cant = count($colPasajero);
        
        if($cant >= 0 && $cant < $cantMaxPasajeros){
            $hayLugar = true;
        }else{
            $hayLugar = false;
        }
        return $hayLugar;
    }



/**
 * @param int
 * @return boolean 
 */
    public function buscarPasajero($dni){
        $colP = $this->getColPasajero();
        //Inicializo
        $i = 0;
        $cant = count($colP);
        $encontro = false;
        //while para recorrido parcial
        while($i < $cant && !$encontro){
            if($colP[$i]->getNroDoc() == $dni){
                $encontro = true;
            }
            $i++;
        }
        return $encontro;
    }

}