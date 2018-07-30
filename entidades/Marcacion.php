<?php

class Marcacion {
    private $idMarcacion;
    private $fecha;
    private $entrada;
    private $salida;
    private $entrada2;
    private $salida2;
    private $idEmpleado;

    /**
     * @return mixed
     */
    public function getIdMarcacion()
    {
        return $this->idMarcacion;
    }

    /**
     * @param mixed $idMarcacion
     */
    public function setIdMarcacion($idMarcacion)
    {
        $this->idMarcacion = $idMarcacion;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * @param mixed $entrada
     */
    public function setEntrada($entrada)
    {
        $this->entrada = $entrada;
    }

    /**
     * @return mixed
     */
    public function getSalida()
    {
        return $this->salida;
    }

    /**
     * @param mixed $salida
     */
    public function setSalida($salida)
    {
        $this->salida = $salida;
    }

    /**
     * @return mixed
     */
    public function getEntrada2()
    {
        return $this->entrada2;
    }

    /**
     * @param mixed $entrada2
     */
    public function setEntrada2($entrada2)
    {
        $this->entrada2 = $entrada2;
    }

    /**
     * @return mixed
     */
    public function getSalida2()
    {
        return $this->salida2;
    }

    /**
     * @param mixed $salida2
     */
    public function setSalida2($salida2)
    {
        $this->salida2 = $salida2;
    }

    /**
     * @return mixed
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    /**
     * @param mixed $idEmpleado
     */
    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }
}