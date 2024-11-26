DROP DATABASE IF EXISTS ExpedienteMedico;

CREATE DATABASE IF NOT EXISTS ExpedienteMedico DEFAULT CHARACTER
SET
    utf8 COLLATE utf8_general_ci;

USE ExpedienteMedico;

-- USUARIOS
CREATE USER 'doctora'@'localhost' IDENTIFIED BY 'doctora';
CREATE USER 'recepcion'@'localhost' IDENTIFIED BY 'recepcion';
CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'usuario';

-- PRIVILEGIOS
GRANT ALL PRIVILEGES ON ExpedienteMedico.* TO 'doctora'@'localhost';
GRANT UPDATE, INSERT, SELECT ON ExpedienteMedico.* TO 'recepcion'@'localhost';
GRANT UPDATE, SELECT ON ExpedienteMedico.* TO 'usuario'@'localhost';

-- ROLES
CREATE TABLE Roles (
    id_rol INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(10) NOT NULL
);

-- Paciente
CREATE TABLE
    Paciente (
        idPaciente INT AUTO_INCREMENT PRIMARY KEY,
        Nombre VARCHAR(50) NOT NULL,
        AP VARCHAR(50) NOT NULL,
        AM VARCHAR(50) NOT NULL,
        Correo_Electronico VARCHAR(100) NOT NULL,
        Contrasenia VARCHAR(255) NOT NULL,
        FechaN DATE NOT NULL,
        Municipio VARCHAR(50) NOT NULL,
        Colonia VARCHAR(50) NOT NULL,
        Calle VARCHAR(50) NOT NULL,
        Estado VARCHAR(50) NOT NULL,
        idRol INT NOT NULL,
        FOREIGN KEY (idRol) REFERENCES roles (idRol) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Historial
CREATE TABLE
    Historial (
        idHistorial INT AUTO_INCREMENT PRIMARY KEY,
        idPaciente INT NOT NULL,
        FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Tratamiento
CREATE TABLE
    Tratamiento (
        idTratamiento INT AUTO_INCREMENT PRIMARY KEY,
        idPaciente INT NOT NULL,
        Tipo VARCHAR(50) NOT NULL,
        Descripcion TEXT NOT NULL,
        Estado VARCHAR(50) NOT NULL,
        Fecha_Inicio DATE NOT NULL,
        Fecha_Finalizacion DATE NOT NULL,
        FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Antecedentes Patológicos
CREATE TABLE
    Antecedentes_Patologicos (
        idAntecedenteP INT AUTO_INCREMENT PRIMARY KEY,
        idHistorial INT NOT NULL,
        Nombre VARCHAR(50) NOT NULL,
        Estado BOOLEAN NOT NULL,
        Descripcion TEXT NULL,
        FOREIGN KEY (idHistorial) REFERENCES Historial (idHistorial) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Antecedentes No Patológicos
CREATE TABLE
    Antecedentes_NO_Patologicos (
        idAntecedenteNP INT AUTO_INCREMENT PRIMARY KEY,
        idHistorial INT NOT NULL,
        Nombre VARCHAR(50) NOT NULL,
        Estado BOOLEAN NOT NULL,
        Descripcion TEXT NULL,
        FOREIGN KEY (idHistorial) REFERENCES Historial (idHistorial) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Factura
CREATE TABLE
    Factura (
        idFactura INT AUTO_INCREMENT PRIMARY KEY,
        idPaciente INT NOT NULL,
        Fecha_Emision DATE NOT NULL,
        Monto_Total DECIMAL(10, 2) NOT NULL,
        Estado_Pago VARCHAR(50) NOT NULL,
        FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Cita
CREATE TABLE
    Cita (
        idCita INT AUTO_INCREMENT PRIMARY KEY,
        idTratamiento INT NOT NULL,
        idHistorial INT NOT NULL,
        idPaciente INT NOT NULL,
        Fecha DATE NOT NULL,
        Hora TIME NOT NULL,
        Metodo_Agenda VARCHAR(50) NOT NULL,
        Estado VARCHAR(50) NOT NULL,
        FOREIGN KEY (idHistorial) REFERENCES Historial (idHistorial) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (idTratamiento) REFERENCES Tratamiento (idTratamiento) ON DELETE CASCADE ON UPDATE CASCADE
    );

-- Recordatorio
CREATE TABLE
    Recordatorio (
        idRecordatorio INT AUTO_INCREMENT PRIMARY KEY,
        idPaciente INT NOT NULL,
        idCita INT NOT NULL,
        Medio_Envio VARCHAR(50) NOT NULL,
        Estado_Envio VARCHAR(50) NOT NULL,
        FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (idCita) REFERENCES Cita (idCita) ON DELETE CASCADE ON UPDATE CASCADE
    );