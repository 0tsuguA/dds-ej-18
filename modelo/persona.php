<?php
class Persona
{
    public $Id;
    public $Nombre;
    public $Apellido;
    public $NroDocumento;
    public $Direccion;
    public $Email;

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from personas";
        $queryPersonas = $con->db->prepare($sql);
        $queryPersonas->execute();
        $queryPersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');

        $listPersonasADevolver = array();

        foreach ($queryPersonas as $m) {
            $listPersonasADevolver[] = $m;
        }

        return $listPersonasADevolver;
    }

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from personas where Id = :p1";
        $queryPersonas = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryPersonas->execute($params);
        $queryPersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');
        foreach ($queryPersonas as $m) {
            return $m;
        }
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into personas (Nombre, Apellido, NroDocumento, Direccion, Email) values (:p1,:p2,:p3,:p4,:p5)";
        $Persona = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDocumento, "p4" => $this->Direccion, "p5" => $this->Email,);
        $Persona->execute($params);
    }

    public function Modificar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE personas
                    SET
                    Nombre = :p1,
                    Apellido = :p2,
                    NroDocumento = :p3,
                    Direccion = :p4,
                    Email = :p5
                    WHERE Id = :p6";
        $Persona = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDocumento, "p4" => $this->Direccion, "p5" => $this->Email, "p6" => $this->Id);
        $Persona->execute($params);
    }
}
