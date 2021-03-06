<?php
Class Empleado {
    private $idEmppleado;
    private $nombre;
    private $apellido;
    private $ci;
    private $fechaNacimiento;
    private $sexo;
    private $telefono;
    private $direccion;
    private $email;
    private $numCuenta;
    private $nacionalidad;
    private $nombreConyuge;
    private $foto;
    private $estado;
    private $idHorario;
    private $idEstadoCivil;
    private $idContrato;
    private $salario;
    private $FechaAsume;
    private $Cargo_idCargo;
    private $Departamento_idDepartamento;

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
    public function getFechaAsume()
    {
        return $this->FechaAsume;
    }

    /**
     * @param mixed $FechaAsume
     */
    public function setFechaAsume($FechaAsume)
    {
        $this->FechaAsume = $FechaAsume;
    }

    /**
     * @return mixed
     */
    public function getCargoIdCargo()
    {
        return $this->Cargo_idCargo;
    }

    /**
     * @param mixed $Cargo_idCargo
     */
    public function setCargoIdCargo($Cargo_idCargo)
    {
        $this->Cargo_idCargo = $Cargo_idCargo;
    }

    /**
     * @return mixed
     */
    public function getDepartamentoIdDepartamento()
    {
        return $this->Departamento_idDepartamento;
    }

    /**
     * @param mixed $Departamento_idDepartamento
     */
    public function setDepartamentoIdDepartamento($Departamento_idDepartamento)
    {
        $this->Departamento_idDepartamento = $Departamento_idDepartamento;
    }

    /**
     * @return mixed
     */
    public function getIdEmppleado()
    {
        return $this->idEmppleado;
    }

    /**
     * @param mixed $idEmppleado
     */
    public function setIdEmppleado($idEmppleado)
    {
        $this->idEmppleado = $idEmppleado;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * @param mixed $ci
     */
    public function setCi($ci)
    {
        $this->ci = $ci;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNumCuenta()
    {
        return $this->numCuenta;
    }

    /**
     * @param mixed $numCuenta
     */
    public function setNumCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;
    }

    /**
     * @return mixed
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * @param mixed $nacionalidad
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    /**
     * @return mixed
     */
    public function getNombreConyuge()
    {
        return $this->nombreConyuge;
    }

    /**
     * @param mixed $nombreConyuge
     */
    public function setNombreConyuge($nombreConyuge)
    {
        $this->nombreConyuge = $nombreConyuge;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdHorario()
    {
        return $this->idHorario;
    }

    /**
     * @param mixed $idHorario
     */
    public function setIdHorario($idHorario)
    {
        $this->idHorario = $idHorario;
    }

    /**
     * @return mixed
     */
    public function getIdEstadoCivil()
    {
        return $this->idEstadoCivil;
    }

    /**
     * @param mixed $idEstadoCivil
     */
    public function setIdEstadoCivil($idEstadoCivil)
    {
        $this->idEstadoCivil = $idEstadoCivil;
    }

    /**
     * @return mixed
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * @param mixed $idContrato
     */
    public function setIdContrato($idContrato)
    {
        $this->idContrato = $idContrato;
    }
}