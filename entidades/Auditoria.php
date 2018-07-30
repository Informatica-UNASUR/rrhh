<?php

class Auditoria {
    private $idAuditoria;
    private $usuarioAuditoria;
    private $fechaHora;
    private $accion;
    private $tabla;
    private $registroNro;

    /**
     * @return mixed
     */
    public function getIdAuditoria()
    {
        return $this->idAuditoria;
    }

    /**
     * @param mixed $idAuditoria
     */
    public function setIdAuditoria($idAuditoria)
    {
        $this->idAuditoria = $idAuditoria;
    }

    /**
     * @return mixed
     */
    public function getUsuarioAuditoria()
    {
        return $this->usuarioAuditoria;
    }

    /**
     * @param mixed $usuarioAuditoria
     */
    public function setUsuarioAuditoria($usuarioAuditoria)
    {
        $this->usuarioAuditoria = $usuarioAuditoria;
    }

    /**
     * @return mixed
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * @param mixed $fechaHora
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
    }

    /**
     * @return mixed
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * @param mixed $accion
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;
    }

    /**
     * @return mixed
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * @param mixed $tabla
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;
    }

    /**
     * @return mixed
     */
    public function getRegistroNro()
    {
        return $this->registroNro;
    }

    /**
     * @param mixed $registroNro
     */
    public function setRegistroNro($registroNro)
    {
        $this->registroNro = $registroNro;
    }
}