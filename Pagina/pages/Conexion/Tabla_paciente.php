<?php
require_once("Connect.php");

class Tabla_paciente
{
    private $connect;
    //private $table = "paciente;";
    private $primary_key = "idPaciente";

    public function __construct()
    {
        $db = new Connect();
        $this->connect = $db->connect;
    }
    public function GetPaciente($idPaciente)
    {
        $sql = "SELECT *
        FROM
            cita c
            JOIN tratamiento t
            JOIN paciente p ON c.idTratamiento = t.idTratamiento
            AND t.idPaciente = p.idPaciente
        WHERE
            c.idCita = :idPaciente;";

        try {
            //Preparate the query
            $stmt = $this->connect->prepare($sql);

            //Bind parameters to sql
            $stmt->bindValue("idPaciente", $idPaciente);

            //specific fetch mode before calling fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecute the query
            $stmt->execute();

            //return 
            $user = $stmt->fetch();

            return $user ?: [];
        } catch (Exception $e) {
            echo "Error" . $e->getMessage() . "";
            return array();
        }
    }
}
