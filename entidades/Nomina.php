<?php

class Nomina {
    private $idNominaPago;
    private $Empleado_idEmpleado;
    private $diasTrabajados;
    private $fechaPago;
    private $periodoPago;
    private $salario;
    private $totalPago;
    private $totalDeduccion;
    private $totalDevengo;

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @param mixed $salario
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    /**
     * @return mixed
     */
    public function getTotalDeduccion()
    {
        return $this->totalDeduccion;
    }

    /**
     * @param mixed $totalDeduccion
     */
    public function setTotalDeduccion($totalDeduccion)
    {
        $this->totalDeduccion = $totalDeduccion;
    }

    /**
     * @return mixed
     */
    public function getTotalDevengo()
    {
        return $this->totalDevengo;
    }

    /**
     * @param mixed $totalDevengo
     */
    public function setTotalDevengo($totalDevengo)
    {
        $this->totalDevengo = $totalDevengo;
    }

    /**
     * @return mixed
     */
    public function getTotalPago()
    {
        return $this->totalPago;
    }

    /**
     * @param mixed $totalPago
     */
    public function setTotalPago($totalPago)
    {
        $this->totalPago = $totalPago;
    }
    private $observacion;

    /**
     * @return mixed
     */
    public function getIdNominaPago()
    {
        return $this->idNominaPago;
    }

    /**
     * @param mixed $idNominaPago
     */
    public function setIdNominaPago($idNominaPago)
    {
        $this->idNominaPago = $idNominaPago;
    }

    /**
     * @return mixed
     */
    public function getEmpleadoIdEmpleado()
    {
        return $this->Empleado_idEmpleado;
    }

    /**
     * @param mixed $Empleado_idEmpleado
     */
    public function setEmpleadoIdEmpleado($Empleado_idEmpleado)
    {
        $this->Empleado_idEmpleado = $Empleado_idEmpleado;
    }

    /**
     * @return mixed
     */
    public function getDiasTrabajados()
    {
        return $this->diasTrabajados;
    }

    /**
     * @param mixed $diasTrabajados
     */
    public function setDiasTrabajados($diasTrabajados)
    {
        $this->diasTrabajados = $diasTrabajados;
    }

    /**
     * @return mixed
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * @param mixed $fechaPago
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;
    }

    /**
     * @return mixed
     */
    public function getPeriodoPago()
    {
        return $this->periodoPago;
    }

    /**
     * @param mixed $periodoPago
     */
    public function setPeriodoPago($periodoPago)
    {
        $this->periodoPago = $periodoPago;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }
}