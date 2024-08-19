<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once("../variables_globales.php"); // Genericas
include_once(POST);
include_once(GET);
include_once(SEGURIDAD);
include_once(FUNCIONES);
include_once("../negocios/genericoNeg.php");
include_once("obtenerConstantes.php");
$seguridad = new seguridad();
$general = new genericoNeg(USERCON_02);
$general2 = new genericoNeg(USERCON_02);

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

if (isset($caso) && $caso !== '') {
    switch ($caso) {
        case 1:
            $rut = isset($rut) && $rut !== '' ? $rut : '';
            $datosTabla = [];
            $general->buscaUsuarioXrut($rut);
            $estado = 404;
            $rutENCODE = $seguridad->encode($rut);

            if ($general->getFilas() > 0) {
                $estado = 200;

                $general->getSet(0);
                $nombre = $general->getNOMBRE();

                $datosTabla[] = [
                    'nombre' => $nombre,
                    'rut' => $rut,
                    'rutEncode'      => $rutENCODE
                ];
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 2:
            $run = isset($run) && $run !== '' ? $run : '';
            $datosTabla = [];
            $general->obtenerRolUsuario($run);
            $estado = 404;
            $rutENCODE = $seguridad->encode($run);

            if ($general->getFilas() > 0) {
                $estado = 200;

                for ($i = 0; $i < $general->getFilas(); $i++) {
                    $general->getSet($i);
                    $descrol = $general->getDESC_ROL();
                    $codrol = $general->getCODROL();

                    if (!array_key_exists($run, $datosTabla)) {
                        $datosTabla[$run] = [
                            'rutEncode'      => $rutENCODE,
                            'codroles' => [$codrol],
                            'codrolesEncode'   => [$seguridad->encode($codrol)],
                            'descroles' => [$descrol]
                        ];
                    } else {
                        array_push($datosTabla[$run]['codroles'], $codrol);
                        array_push($datosTabla[$run]['descroles'], $descrol);
                        array_push($datosTabla[$run]['codrolesEncode'], $seguridad->encode($codrol));
                    }
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 3:
            $run = isset($run) && $run !== '' ? $run : '';
            $datosTabla = [];
            $general->obtenerVistaUsuario($run, $rol);
            $estado = 404;
            $rutENCODE = $seguridad->encode($run);

            if ($general->getFilas() > 0) {
                $estado = 200;

                for ($i = 0; $i < $general->getFilas(); $i++) {
                    $general->getSet($i);
                    $codvista = $general->getCODVISTA();
                    $titulovista = $general->getTITULO_VISTA();

                    if (!array_key_exists($run, $datosTabla)) {
                        $datosTabla[$run] = [
                            'rutEncode'      => $rutENCODE,
                            'codvistas' => [$codvista],
                            'codvistasEncode'   => [$seguridad->encode($codvista)],
                            'titulovistas' => [$titulovista]
                        ];
                    } else {
                        array_push($datosTabla[$run]['codvistas'], $codvista);
                        array_push($datosTabla[$run]['codvistasEncode'], $seguridad->encode($codvista));
                        array_push($datosTabla[$run]['titulovistas'], $titulovista);
                    }
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 4:
            $datosTabla = [];
            $general->obtenerUsuarios();
            $estado = 404;

            if ($general->getFilas() > 0) {
                $estado = 200;

                for ($i = 0; $i < $general->getFilas(); $i++) {
                    $general->getSet($i);
                    $run = $general->getKNUMERUT();
                    $nombress = $general->getNOMBRESS();
                    $apaterno = $general->getAPATERNO();
                    $amaterno = $general->getAMATERNO();
                    $fechaini = $general->getFECHAINI();
                    $fechafin = $general->getFECHAFIN();
                    $codrol = $general->getCODROL();
                    $descrol = $general->getDESC_ROL();

                    if (!array_key_exists($run, $datosTabla)) {
                        $datosTabla[$run] = [
                            'nombres' => $nombress,
                            'apellidopaterno' => $apaterno,
                            'apellidomaterno' => $amaterno,
                            'fechainicio' => $fechaini,
                            'fechafin' => $fechafin,
                            'codroles' => [$codrol],
                            'descroles' => [$descrol],
                            'rutEncode'      => $seguridad->encode($run),
                            'codrolesEncode'   => [$seguridad->encode($codrol)]
                        ];
                    } else {
                        array_push($datosTabla[$run]['codroles'], $codrol);
                        array_push($datosTabla[$run]['descroles'], $descrol);
                        array_push($datosTabla[$run]['codrolesEncode'], $seguridad->encode($codrol));
                    }
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 5:
            $datosTabla = [];
            $general->obtenerDescripcion($concepto);
            $estado = 404;

            if ($general->getFilas() > 0) {
                $estado = 200;

                for ($i = 0; $i < $general->getFilas(); $i++) {
                    $general->getSet($i);
                    $codconcepto = $general->getCOD_CONCEPTO();
                    $descconcepto = $general->getDESC_CONCEPTO();

                    $datosTabla[] = [
                        'codigo_concepto' => $codconcepto,
                        'codigo_conceptoEncode'   => $seguridad->encode($codconcepto),
                        'descripcion_concepto' => $descconcepto
                    ];
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 6:
            $datosTabla = [];
            $general->obtenerRolXVista($vista);
            $estado = 404;

            if ($general->getFilas() > 0) {
                $estado = 200;

                for ($i = 0; $i < $general->getFilas(); $i++) {
                    $general->getSet($i);
                    $codvista = $general->getCODVISTA();
                    $titvista = $general->getTITULO_VISTA();
                    $codrol = $general->getCODROL();
                    $descrol = $general->getDESC_ROL();
                    $estadorol = $general->getESTADO();
                    $descestado = $general->getDESCESTADO();

                    $datosTabla[] = [
                        'codigo_vista' => $codvista,
                        'codigo_vistaEncode'   => $seguridad->encode($codvista),
                        'titulo_vista' => $titvista,
                        'codigo_rol' => $codrol,
                        'codigo_rolEncode'   => $seguridad->encode($codrol),
                        'descripcion_rol' => $descrol,
                        'estado_rol' => $estadorol,
                        'descripcion_estado' => $descestado,
                    ];
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 7:
            $datosTabla = [];
            $general->obtenerVistaXRol($rol);
            $estado = 404;

            if ($general->getFilas() > 0) {
                $estado = 200;

                for ($i = 0; $i < $general->getFilas(); $i++) {
                    $general->getSet($i);
                    $codvista = $general->getCODVISTA();
                    $titvista = $general->getTITULO_VISTA();
                    $codrol = $general->getCODROL();
                    $descrol = $general->getDESC_ROL();
                    $descestado = $general->getDESCESTADO();
                    $estadorol = $general->getESTADO();


                    $datosTabla[] = [
                        'codvista' => $codvista,
                        'codvistaEncode'   => $seguridad->encode($codvista),
                        'titulo_vista' => $titvista,
                        'codrol' => $codrol,
                        'codrolEncode'   => $seguridad->encode($codrol),
                        'descrol' => $descrol,
                        'descestado' => $descestado,
                        'estadorol' => $estadorol
                    ];
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 8:
            $run = isset($run) && $run !== '' ? $run : '';
            $tipo = isset($tipo) && $tipo !== '' ? $tipo : '';
            $rutENCODE = $seguridad->encode($run);
            $datosTabla[$run] = ['rutEncode'      => $rutENCODE];
            $general->obtenerRolUsuario($run);
            $estado = 404;

            if ($general->getFilas() > 0) {
                $estado = 200;

                if ($tipo == 'agrupado') {
                    for ($i = 0; $i < $general->getFilas(); $i++) {
                        $general->getSet($i);
                        $codrol = $general->getCODROL();
                        $descrol = $general->getDESC_ROL();
                        $fechaini = $general->getFECHAINI();
                        $fechafin = $general->getFECHAFIN();

                        $datosTabla[$run]['roles'][] = [
                            $codrol => [
                                'fecha_inicio'  => $fechaini,
                                'fecha_fin'  => $fechafin,
                                'codrolEncode'   => $seguridad->encode($codrol),
                                'descrol' => $descrol
                            ]
                        ];
                    }
                } else {
                    for ($i = 0; $i < $general->getFilas(); $i++) {
                        $general->getSet($i);
                        $codrol = $general->getCODROL();
                        $descrol = $general->getDESC_ROL();
                        $fechaini = $general->getFECHAINI();
                        $fechafin = $general->getFECHAFIN();

                        $datosTabla[] = [
                            'run' => $run,
                            'rutEncode'      => $rutENCODE,
                            'fecha_inicio'  => $fechaini,
                            'fecha_fin'  => $fechafin,
                            'codrol' => $codrol,
                            'codrolEncode'   => $seguridad->encode($codrol),
                            'descrol' => $descrol,
                        ];
                    }
                }
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla
            ));
            break;

        case 9:

            $datosTabla = [];
            $estado = 404;
            $msg = 'Faltan datos';
            //$rutENCODE = $seguridad->encode($run);

            if ((isset($run) && $run !== '') && (isset($codrol) && $codrol !== '') && ((isset($fechaini) && $fechaini !== '')) && (isset($fechafin) && $fechafin !== '')) {
                $general->registrarUsuario($run, $codrol);
                if (!($general->getFilas() > 0)) {
                    $msg = 'Existe';
                } else {
                    $general2->updateUsuario($run, $nombent, $codrol, $fechaini, $fechafin);
                    if(!$general2->getFilas() > 0){
                        $error++;
                        break;
                    } else {
                        $msg = 'Update correcto';
                    }
                }
            }
            
            if($error==0) {
                $estado = 200;
            }

            http_response_code($estado);


            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array(
                'status' => $estado,
                'datosTabla' => $datosTabla,
                'mensaje' => $msg
            ));
            break;
    }
} else {
    http_response_code(404);
    echo 'recurso no encontrado';
}
