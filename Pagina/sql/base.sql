DROP DATABASE IF EXISTS ExpedienteMedico;
CREATE DATABASE IF NOT EXISTS ExpedienteMedico DEFAULT CHARACTER
SET utf8 COLLATE utf8_general_ci;
USE ExpedienteMedico;
CREATE USER 'admin' @'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON ExpedienteMedico.* TO 'admin' @'localhost';
-- ROLES
CREATE TABLE Roles (
    idRol INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(20) NOT NULL
);
-- USUARIOS
CREATE TABLE Usuarios (
    idUsuario INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Contrasenia VARCHAR(10) NOT NULL,
    Correo_Electronico VARCHAR(100) NOT NULL,
    idRol INT NOT NULL,
    FOREIGN KEY (idRol) REFERENCES roles (idRol) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Paciente
CREATE TABLE Paciente (
    idPaciente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    AP VARCHAR(50) NOT NULL,
    AM VARCHAR(50) NOT NULL,
    Telefono BIGINT NOT NULL,
    FechaN DATE NOT NULL,
    Municipio VARCHAR(50) NOT NULL,
    Colonia VARCHAR(50) NOT NULL,
    Calle VARCHAR(50) NOT NULL,
    Estado VARCHAR(50) NOT NULL,
    idUsuario INT(5) NULL,
    FOREIGN KEY (idUsuario) REFERENCES Usuarios (idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Historial
CREATE TABLE Historial (
    idHistorial INT AUTO_INCREMENT PRIMARY KEY,
    idPaciente INT NOT NULL,
    FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Antecedentes Patológicos
CREATE TABLE Antecedentes_Patologicos (
    idAntecedenteP INT AUTO_INCREMENT PRIMARY KEY,
    idHistorial INT NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Estado BOOLEAN NOT NULL,
    Descripcion TEXT NULL,
    FOREIGN KEY (idHistorial) REFERENCES Historial (idHistorial) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Antecedentes No Patológicos
CREATE TABLE Antecedentes_NO_Patologicos (
    idAntecedenteNP INT AUTO_INCREMENT PRIMARY KEY,
    idHistorial INT NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Estado BOOLEAN NOT NULL,
    Descripcion TEXT NULL,
    FOREIGN KEY (idHistorial) REFERENCES Historial (idHistorial) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Cita
CREATE TABLE Cita (
    idCita INT AUTO_INCREMENT PRIMARY KEY,
    idHistorial INT NULL,
    idPaciente INT NULL,
    Motivo VARCHAR(200) NOT NULL,
    Fecha DATE NULL,
    Hora TIME NULL,
    Metodo_Agenda VARCHAR(50) NOT NULL,
    Estado VARCHAR(50) NOT NULL,
    FOREIGN KEY (idHistorial) REFERENCES Historial (idHistorial) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idPaciente) REFERENCES Paciente (idPaciente) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Tratamiento
CREATE TABLE Tratamiento (
    idTratamiento INT AUTO_INCREMENT PRIMARY KEY,
    idCita INT NOT NULL,
    Tipo VARCHAR(50) NOT NULL,
    Descripcion TEXT NOT NULL,
    Estado VARCHAR(50) NOT NULL,
    Fecha_Inicio DATE NOT NULL,
    Fecha_Finalizacion DATE NOT NULL,
    FOREIGN KEY (idCita) REFERENCES Cita (idCita) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Recordatorio
CREATE TABLE Recordatorio (
    idRecordatorio INT AUTO_INCREMENT PRIMARY KEY,
    idCita INT NOT NULL,
    Medio_Envio VARCHAR(50) NOT NULL,
    Estado_Envio VARCHAR(50) NOT NULL,
    FOREIGN KEY (idCita) REFERENCES Cita (idCita) ON DELETE CASCADE ON UPDATE CASCADE
);