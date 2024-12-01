<?php
require_once("Connect.php");

class Tabla_paciente
{
    private $connect;
    private $table = "paciente;";
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
            $datos = $stmt->fetch();

            return $datos ?: [];
        } catch (Exception $e) {
            echo "Error" . $e->getMessage() . "";
            return array();
        }
    }

    public function buscarPaciente($name)
    {
        $sql = "SELECT idPaciente, concat(p.Nombre,' ',p.AP,' ',p.AM) as NombreCompleto, Telefono, u.Correo_Electronico as Correo 
        FROM paciente p JOIN usuarios u ON u.idUsuario = p.idUsuario 
        where Nombre = :name;";

        try {
            //Preparate the query
            $stmt = $this->connect->prepare($sql);

            //Bind parameters to sql
            $stmt->bindValue("name", $name);

            //specific fetch mode before calling fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecute the query
            $stmt->execute();

            //return 
            $datos = $stmt->fetch();

            return $datos ?: [];
        } catch (Exception $e) {
            echo "Error" . $e->getMessage() . "";
            return array();
        }
    }
}
