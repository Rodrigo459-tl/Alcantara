<?php
require_once(__DIR__ . "./Connect.php");

class Tabla_usuarios
{
    private $connect;
    private $table = "usuarios";
    private $primary_key = "id_usuario";

    public function __construct()
    {
        $db = new Connect();
        $this->connect = $db->connect;
    }
    public function login($email, $password)
    {
        $sql = "SELECT * FROM " . $this->table . "
        WHERE email_usuario = :email 
        AND password_usuario = :pass;";
        try {
            //Preparate the query
            $stmt = $this->connect->prepare($sql);

            //Bind parameters to sql
            $stmt->bindValue("email", $email);
            $stmt->bindValue("pass", $password);

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
