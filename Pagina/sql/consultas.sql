------------------Consultas--------------------------------------
----Tratamientos y citas en base a la cita---------------
SELECT *
FROM cita c
    JOIN tratamiento t ON c.idTratamiento = t.idTratamiento
WHERE c.idCita = 2;
----Datos de Paciente, Tratamiento, Cita en base a la cita--------------
SELECT CONCAT (p.Nombre, " ", p.AP, " ", p.AM) as NombreCompleto
FROM cita c
    JOIN tratamiento t
    JOIN paciente p ON c.idTratamiento = t.idTratamiento
    AND t.idPaciente = p.idPaciente
WHERE c.idCita = 1;
----Datos de paciente recolectando correo de usuarios
SELECT concat(p.Nombre, ' ', p.AP, ' ', p.AM) as NombreCompleto,
    u.Correo_Electronico as Email
FROM paciente p
    JOIN usuarios u ON u.idUsuario = p.idUsuario
where Nombre = 'carlos';