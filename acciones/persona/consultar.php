<?php

header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../../configuracion/database.php';
require_once 'responses/consultarResponse.php';

$Id = $_GET['Id'];
$r = new ConsultarResponse();
$r->Persona = Persona::Buscar($Id);

echo json_encode($r);
