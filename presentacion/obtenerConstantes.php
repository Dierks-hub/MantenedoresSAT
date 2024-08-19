<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once("../variables_globales.php"); // Genericas
include_once(POST);
include_once(GET);
include_once(SEGURIDAD);
include_once(FUNCIONES);
include_once("../negocios/genericoNeg.php");

$seguridad = new seguridad();
$general = new genericoNeg(USERCON_02);

$datosTabla = [];
$general->obtenerConceptoConstantes();


if ($general->getFilas() > 0) {
    $estado = 200;

    for ($i = 0; $i < $general->getFilas(); $i++) {
        $general->getSet($i);
        $nombre = acentos($general->getNOMBRE());
        $CODIGO = $general->getCODIGO();

        //  echo $nombre.'<br>';

        if(!defined($nombre)){
            define($nombre,$CODIGO);

        }
        
    }
}

function acentos($cadena) 
{
   $search = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,ÃÃ¡,ÃÃ©,ÃÃ­,ÃÃ³,ÃÃº,ÃÃ±,Ã“,Ã ,Ã‰,Ã ,Ãš,â€œ,â€ ,Â¿,ü");
   $replace = explode(",","a,e,i,o,u,ñ,A,E,I,O,U,Ñ,\",\",¿,&uuml;");
//    $replace = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ó,Á,É,Í,Ú,\",\",¿,&uuml;");

   $cadena= str_replace($search, $replace, $cadena);

   return $cadena;
}
// echo C_ESTADOGESTIÓN;

