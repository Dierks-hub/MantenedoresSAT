<?php

	//$mis_param = __FILE__;
	$rm_carpeta_app = substr(__FILE__,0,strrpos(__FILE__,"/"));
	$rm_ruta_app = substr($rm_carpeta_app,0,strrpos($rm_carpeta_app,"/") + 1);
	$rm_carpeta_app = substr($rm_ruta_app,strrpos($rm_ruta_app,"/",-2) + 1);
	//echo date("d/m/Y H:i:s")." | Archivo <b>".substr(__FILE__,strrpos(__FILE__,"/") + 1)."</b> | Linea <b>".__LINE__."</b> | ".$mis_param."<br>rm_ruta: ".$rm_ruta_app."<br>rm_carpeta: ".$rm_carpeta_app;
	//die();
	
	include_once "/var/www/SITIOS/apps/academica-web/comun/variables_globales.php"; // Genericas
	
	define('DEF_RAIZAPP'     , $rm_ruta_app);
	define('URL_APP'         , str_replace("/var/www/SITIOS/apps/", RAIZ_WEB, $rm_ruta_app));
	define('RUTA_ARCHIVO'    , '/archivos/sitios/ficha_alumno/');
	define('RUTA_ARCHIVO_SAT', '/archivos/sitios/sat/');
	define('DOMPDF'          , '/home/generalidades/www/lib/dompdf/dompdf_config.inc.php');
	define('PHPEXCEL'        , '/home/generalidades/www/lib/PHPExcel-1.8.1/PHPExcel.php');
	
	if(DESARROLLO == false){
		// En el entorno de producción, NUNCA se debe cambiar el valor de la constante
		/* NO CAMBIAR */ define('BD_ACCESO', 'nativa'); /* NO CAMBIAR */
	}else{
		// Elegir aquí a que base de datos se desea acceder
		define('BD_ACCESO', 'nativa'); // 'nativa' o 'prod'
	}
	
	if(BD_ACCESO == 'nativa'){
		define('DEF_EJECUTA', '/var/www/SITIOS/apps/generalidades/capas/datos/utilidad/class.ejecuta_sql.php');
	}else{
		define('DEF_EJECUTA', '/var/www/SITIOS/apps/generalidades/capas/datos/utilidad/class.ejecuta_sql_prod.php');
	}
	
	define('USERCON_00', ((DESARROLLO == false || BD_ACCESO == "prod") ? "JLf5VB82JOTDVnU" : "JLf5VB82JOTDVnU"));   // User Docencia/Humb
	define('USERCON_01', ((DESARROLLO == false || BD_ACCESO == "prod") ? "Vn4d0n1in32c8b5" : "Vn4d0n1in32c8b5")); // User UnapOl/Fina
	define('USERCON_02', ((DESARROLLO == false || BD_ACCESO == "prod") ? "5y3e8e6p5a9d2d9" : "mLU7w07VAlou8R3v"));  // User Orades2/Humb
	//define('USERCON_02', ((DESARROLLO == false || BD_ACCESO == "prod") ? "5y3e8e6p5a9d2d9" : "mLU7w07VAlou8R3v"));  // User Orades2/Humb
	
	$day 		= date('w');
	$week_start = date('m-d-Y', strtotime('-'.$day.' days'));
	$week_end 	= date('m-d-Y', strtotime('+'.(6-$day).' days'));
	$sem_inicio = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$2-$1-$3",$week_start);
	$sem_fin 	= preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$2-$1-$3",$week_end);
	define('SEMINI', $sem_inicio);
	define('SEMFIN', $sem_fin);
	
	// Correos de prueba
	$correo_test = array(
		'romarin@unap.cl',
		'romarin@estudiantesunap.cl'
	);
	// include_once "presentacion/obtenerConstantes.php";

	define('ERRORES','ini_set("error_reporting",E_ALL & ~E_STRICT & ~E_NOTICE); ini_set("display_errors",1);'); //Muestra errores sin notice ni strict (codigo obsoleto)
	//define('ERRORES','ini_set("error_reporting",E_ALL); ini_set("display_errors",1);'); //Muestra todos los errores

?>