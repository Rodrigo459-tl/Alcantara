<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la conexión a la base de datos
class Connect
{
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
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}

// Funciones relacionadas con pacientes
class FuncionesTablas
{
    private $connect;

    public function __construct()
    {
        $db = new Connect();
        $this->connect = $db->connect;
    }

    public function buscarPaciente($name)
    {
        $sql = "SELECT idPaciente, concat(p.Nombre,' ',p.AP,' ',p.AM) as NombreCompleto, Telefono, u.Correo_Electronico as Correo 
                FROM paciente p JOIN usuarios u ON u.idUsuario = p.idUsuario 
                WHERE Nombre = :name;";
        try {
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue("name", $name);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $datos = $stmt->fetch();
            return $datos ?: [];
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

// Comprueba si se recibe el nombre por POST
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    // Crea una instancia de la clase y busca el paciente
    $pacienteObj = new FuncionesTablas();
    $resultado = $pacienteObj->buscarPaciente($name);

    // Verificar si la variable resultado está correctamente definida
    if ($resultado) {
        echo json_encode($resultado);
    } else {
        echo json_encode(["error" => "No se encontraron resultados"]);
    }
} else {
    // Si no se recibe el nombre, devolver un error
    echo json_encode(["error" => "No se recibió el nombre"]);
}
