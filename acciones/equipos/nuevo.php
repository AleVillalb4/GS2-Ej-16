<?php

header('Content-Type: application/json');

require_once '../../modelo/jugador.php';
require_once '../equipos/responses/nuevoResponse.php';
require_once '../equipos/request/nuevoRequest.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$resp = new nuevoResponse();
$resp->IsOk = true;
$cantjug = 0;

foreach ($req->ListJugadores as $jug) {
    $cantjug = $cantjug + 1;
}

if ($cantjug >= 1 && $cantjug <= 5) {
    $resp->Mensaje = '';
} else {
    $resp->IsOk = false;
    $resp->Mensaje = 'El equipo posee ' . $cantjug . ' jugadores y debe poseer entre 1 y 5 jugadores';
}

echo json_encode($resp);
