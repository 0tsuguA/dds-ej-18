<?php

header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../../configuracion/database.php';
require_once 'responses/agregarResponse.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$personaAgregar = new Persona();
$personaAgregar->Nombre = $req->Nombre;
$personaAgregar->Apellido = $req->Apellido;
$personaAgregar->NroDocumento = $req->NroDocumento;
$personaAgregar->Direccion = $req->Direccion;
$personaAgregar->Email = $req->Email;
$personaAgregar->Agregar();

$r = new AgregarResponse();
$r->IsOk = true;

echo json_encode($r);
