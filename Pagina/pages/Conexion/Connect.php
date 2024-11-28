<?php
class Connect
{
    //modificar el tipo de accesso
    private $host = 'localhost';
    private $db = 'ExpedienteMedico';
    private $user = 'root';
    private $pass = '';

    public $connect = null;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";
            $this->connect = new PDO($dsn, $this->user, $this->pass);
            $this->connect->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
