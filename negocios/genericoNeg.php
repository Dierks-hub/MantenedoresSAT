<?php
include_once "../variables_globales.php"; // Genericas
include_once DEF_EJECUTA;
include_once '../datos/genericoSQL.php';
include_once 'GetSetter.php';


class genericoNeg extends GetSetter
{
    // Variables y funciones básicas de la clase

    public function __construct($usercon)
    {
        $this->sql = new genericoSQL();
        $this->ejecuta = new ejecuta_sql($usercon);
    }

    public function getFilas()
    {
        $this->filas = count($this->vector_resultado);
        return $this->filas;
    }

    public function buscaUsuarioXrut($p_rut)
    {
        $parametros = get_defined_vars();
        $this->sql->buscaUsuarioXrut();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerRolUsuario($p_run)
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerRolUsuario();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerVistaUsuario($p_run, $p_rol)
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerVistaUsuario();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerUsuarios()
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerUsuarios();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerDescripcion($p_concepto)
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerDescripcion();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerConceptoConstantes()
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerConceptoConstantes();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerRolXVista($p_vista)
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerRolXVista();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function obtenerVistaXRol($p_rol)
    {
        $parametros = get_defined_vars();
        $this->sql->obtenerVistaXRol();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function selectUsuario($p_run, $p_codrol)
    {
        $parametros = get_defined_vars();
        $this->sql->selectUsuario();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function insertUsuario($p_knumerut, $p_nombent, $p_codrol, $p_usuario, $p_fechaini, $p_fechafin)
    {
        $parametros = get_defined_vars();
        $this->sql->insertUsuario();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function updateUsuario($p_knumerut, $p_nombent, $p_codrol, $p_fechaini, $p_fechafin)
    {
        $parametros = get_defined_vars();
        $this->sql->updateUsuario();
        $consulta = $this->sql->query;
        $this->ejecuta->ejecuta_query($consulta, $parametros);
        return $this->vector_resultado = $this->ejecuta->resultado;
    }

    public function getKNUMERUT()
    {
        return $this->KNUMERUT;
    }

    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }

    public function getNOMBRESS()
    {
        return $this->NOMBRESS;
    }

    public function getAPATERNO()
    {
        return $this->APATERNO;
    }

    public function getAMATERNO()
    {
        return $this->AMATERNO;
    }

    public function getFECHAINI()
    {
        return $this->FECHAINI;
    }

    public function getFECHAFIN()
    {
        return $this->FECHAFIN;
    }

    public function getDESC_ROL()
    {
        return $this->DESC_ROL;
    }

    public function getCODROL()
    {
        return $this->CODROL;
    }

    public function getCODVISTA()
    {
        return $this->CODVISTA;
    }

    public function getTITULO_VISTA()
    {
        return $this->TITULO_VISTA;
    }

    public function getCOD_CONCEPTO()
    {
        return $this->CODIGO;
    }

    public function getDESC_CONCEPTO()
    {
        return $this->DESCRIPCION;
    }

    public function getESTADO()
    {
        return $this->ESTADO;
    }

    public function getDESCESTADO()
    {
        return $this->DESC_ESTADO;
    }

    public function getCODIGO()
    {
        return $this->CODIGO;
    }
}
