<?php
class genericoSQL
{
    public $query;

    public function __construct() {}

    public function buscaUsuarioXrut()
    {
        $this->query = "SELECT  p.NOMBRESS || ' '|| P.APATERNO || ' '|| P.AMATERNO  NOMBRE
                        FROM    PERSONAL P
                        WHERE   P.KNUMERUT = :v_rut";
    }

    public function obtenerRolUsuario()
    {
        $this->query = "SELECT KNUMERUT, CODROL, 
                        OBTIENE_DESCRIPCION_SAT(CODROL) DESC_ROL, 
                        TO_CHAR(FECHAINI, 'DD-MM-YYYY') FECHAINI,
                        TO_CHAR(FECHAFIN, 'DD-MM-YYYY') FECHAFIN
                        FROM SAT_USUARIO_PERFIL
                        WHERE KNUMERUT=:v_run
                        and sysdate between FECHAINI and fechafin";
    }

    public function obtenerVistaUsuario()
    {
        $this->query = "SELECT R.CODVISTA, OBTIENE_DESCRIPCION_SAT(R.CODVISTA) TITULO_VISTA
                        FROM SAT_USUARIO_PERFIL P
                        INNER JOIN SAT_VISTA_X_ROL R ON P.CODROL=R.CODROL
                        WHERE P.KNUMERUT=:v_run
                        AND P.CODROL=:v_rol
                        and sysdate between FECHAINI and fechafin
                        UNION
                        SELECT V.CODVISTA, OBTIENE_DESCRIPCION_SAT(V.CODVISTA) TITULO_VISTA
                        FROM SAT_VISTA_X_USUARIO V
                        WHERE V.KNUMERUT=:v_run AND V.CODROL=:v_rol
                        AND V.ESTADO='00030001'";
    }

    public function obtenerUsuarios()
    {
        $this->query = "SELECT U.KNUMERUT, P.NOMBRESS, P.APATERNO, P.AMATERNO, U.CODROL,
                        TO_CHAR(U.FECHAINI, 'YYYY-MM-DD HH24:MI:SS') FECHAINI,
                        TO_CHAR(U.FECHAFIN, 'YYYY-MM-DD HH24:MI:SS') FECHAFIN,
                        OBTIENE_DESCRIPCION_SAT(U.CODROL) DESC_ROL
                        FROM SAT_USUARIO_PERFIL U
                        INNER JOIN PERSONAL P ON U.KNUMERUT=P.KNUMERUT
                        WHERE SYSDATE BETWEEN FECHAINI and fechafin";
    }

    public function obtenerDescripcion()
    {
        $this->query = "SELECT ID_CONCEPTO||ID_DESCRIPCION CODIGO, DESCRIPCION
                        FROM GES_DESCRIPCION
                        WHERE id_concepto=:v_concepto";
    }

    public function obtenerConceptoConstantes()
    {
        $this->query = "SELECT  ID_CONCEPTO CODIGO,
                                'C_'||translate(REPLACE(UPPER(CONCEPTO), ' ',''), 'ÁÉÍÓÚ', 'AEIOU') NOMBRE
                        FROM    GES_CONCEPTO";
    }


    public function obtenerRolXVista()
    {
        $this->query = "SELECT ID_VROL, CODVISTA, CODROL, OBTIENE_DESCRIPCION_SAT(CODROL) DESC_ROL, ESTADO, OBTIENE_DESCRIPCION_SAT(ESTADO) DESC_ESTADO, OBTIENE_DESCRIPCION_SAT(CODVISTA) TITULO_VISTA
                        FROM SAT_VISTA_X_ROL
                        WHERE CODVISTA=:v_vista";
    }

    public function obtenerVistaXRol()
    {
        $this->query = "SELECT ID_VROL, CODVISTA, CODROL, OBTIENE_DESCRIPCION_SAT(CODROL) DESC_ROL, ESTADO, OBTIENE_DESCRIPCION_SAT(ESTADO) DESC_ESTADO, OBTIENE_DESCRIPCION_SAT(CODVISTA) TITULO_VISTA
                        FROM SAT_VISTA_X_ROL
                        WHERE CODROL=:v_rol";
    }

    public function selectUsuario()
    {
        $this->query = "SELECT * from SAT_USUARIO_PERFIL
                        WHERE KNUMERUT =:v_run
                        AND CODROL =:v_codrol";
    }

    public function insertUsuario()
    {
        $this->query = "INSERT INTO SAT_USUARIO_PERFIL (KNUMERUT, NOMB_ENT, CODROL, FECHAREG, USUARIO, FECHAINI, FECHAFIN)
                        values (:v_knumerut, :v_nombent, :v_codrol, sysdate, :v_usuario, :v_fechaini, :v_fechafin)";                        
    }

    public function updateUsuario()
    {
        $this->query = "UPDATE SAT_USUARIO_PERFIL
                        SET nomb_ent = :v_nombent, codrol=:v_codrol, fechaini=:v_fechaini, fechafin=:v_fechafin
                        WHERE knumerut=:v_knumerut";

                        
    }

}
