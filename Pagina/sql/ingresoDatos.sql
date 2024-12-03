--Paciente:
-- nombre
-- AP
-- AM
-- FechaN
-- Edad
-- Municipio
-- Colonia
-- Estado
-- Calle
-- Correo electronico
--
-- Antecedentes Patologicos:
-- 1 Diabetes
-- 2 hipertencion
-- 3 enfermedades cronicas
-- 4 problemas del corazon
-- 5 problemas respiratorios
-- 6 problermas del higado
-- 7 problemas renales
-- 8 problemas digestivos
-- 9 problemas de coagulacion
-- 10 intervenciones quirurgicas
-- 11 alergias
-- 12 convulsiones
-- 13 toma anticonceptivos
-- 14 Embarazo actual
--
-- Antecedentes NO Patologicos:
-- 1 higiene bucal (buena, mala regular)
-- 2 frecuencia de cepillado
-- 3 fuma (cuantos cigarros al dia)
-- 4 consume alcohol
-- 5 aprieta o rechina los dientes
--
-- cita:
-- Motivo
-- Estado
-- Fecha
-- Hora
-- Metodo_Agenda
--
-- INSERT PARA Roles
INSERT INTO Roles (idRol, rol)
VALUES (100, 'Administrador'),
    (10, 'Operador'),
    (1, 'paciente');
-- INSERT PARA Usuarios
INSERT INTO Usuarios (
        idUsuario,
        Contrasenia,
        Correo_Electronico,
        idRol
    )
VALUES (1, 'admin', 'admin@gmail.com', 100),
    (2, 'operador', 'operador@gmail.com', 10),
    (3, 'paciente', 'paciente@gmail.com', 1);
-- INSERT PARA Paciente
INSERT INTO Paciente (
        idPaciente,
        Nombre,
        AP,
        AM,
        Telefono,
        FechaN,
        Municipio,
        Colonia,
        Calle,
        Estado,
        idUsuario
    )
VALUES (
        1,
        'Carlos',
        'Pérez',
        'López',
        1231231231,
        '1985-03-15',
        'Puebla',
        'El Carmen',
        'Av. Hidalgo',
        'Puebla',
        1
    ),
    (
        2,
        'Lucía',
        'Ramírez',
        'Gómez',
        1231231231,
        '1990-07-22',
        'Tlaxcala',
        'Centro',
        'Calle Juárez',
        'Tlaxcala',
        2
    ),
    (
        3,
        'Pedro',
        'Sánchez',
        'Méndez',
        1231231231,
        '2000-05-30',
        'Apizaco',
        'San Pablo',
        'Av. Reforma',
        'Tlaxcala',
        3
    );
INSERT INTO Historial (idPaciente)
VALUES (1),
    (2),
    (3);
---------PATOLOGICOS--------------------------------------------------------------------------------------------------------------------
-- Paciente 1
INSERT INTO Antecedentes_Patologicos (idHistorial, Nombre, Estado, Descripcion)
VALUES (
        1,
        'Diabetes',
        TRUE,
        'Diagnosticado hace 5 años.'
    ),
    (1, 'Hipertensión', FALSE, NULL),
    (1, 'Enfermedades crónicas', FALSE, NULL),
    (1, 'Problemas del corazón', FALSE, NULL),
    (
        1,
        'Problemas respiratorios',
        TRUE,
        'Bronquitis crónica en la infancia.'
    ),
    (1, 'Problemas del hígado', FALSE, NULL),
    (1, 'Problemas renales', FALSE, NULL),
    (1, 'Problemas digestivos', FALSE, NULL),
    (1, 'Problemas de coagulación', FALSE, NULL),
    (
        1,
        'Intervenciones quirúrgicas',
        TRUE,
        'Cirugía de apendicitis a los 20 años.'
    ),
    (1, 'Alergias', TRUE, 'Alergia a la penicilina.'),
    (1, 'Convulsiones', FALSE, NULL),
    (1, 'Toma anticonceptivos', FALSE, NULL),
    (1, 'Embarazo actual', FALSE, NULL);
-- Paciente 2
INSERT INTO Antecedentes_Patologicos (idHistorial, Nombre, Estado, Descripcion)
VALUES (2, 'Diabetes', FALSE, NULL),
    (
        2,
        'Hipertensión',
        TRUE,
        'Hipertensión diagnosticada hace 2 años.'
    ),
    (2, 'Enfermedades crónicas', FALSE, NULL),
    (2, 'Problemas del corazón', FALSE, NULL),
    (
        2,
        'Problemas respiratorios',
        TRUE,
        'Asma leve desde la infancia.'
    ),
    (2, 'Problemas del hígado', FALSE, NULL),
    (2, 'Problemas renales', FALSE, NULL),
    (
        2,
        'Problemas digestivos',
        TRUE,
        'Gastritis ocasional.'
    ),
    (2, 'Problemas de coagulación', FALSE, NULL),
    (
        2,
        'Intervenciones quirúrgicas',
        TRUE,
        'Operación de rodilla hace 3 años.'
    ),
    (2, 'Alergias', TRUE, 'Alergia al polen.'),
    (2, 'Convulsiones', FALSE, NULL),
    (2, 'Toma anticonceptivos', FALSE, NULL),
    (2, 'Embarazo actual', FALSE, NULL);
-- Paciente 3
INSERT INTO Antecedentes_Patologicos (idHistorial, Nombre, Estado, Descripcion)
VALUES (3, 'Diabetes', FALSE, NULL),
    (3, 'Hipertensión', FALSE, NULL),
    (3, 'Enfermedades crónicas', FALSE, NULL),
    (
        3,
        'Problemas del corazón',
        TRUE,
        'Soplo cardíaco controlado.'
    ),
    (3, 'Problemas respiratorios', FALSE, NULL),
    (3, 'Problemas del hígado', FALSE, NULL),
    (
        3,
        'Problemas renales',
        TRUE,
        'Cálculos renales tratados.'
    ),
    (3, 'Problemas digestivos', FALSE, NULL),
    (3, 'Problemas de coagulación', FALSE, NULL),
    (3, 'Intervenciones quirúrgicas', FALSE, NULL),
    (3, 'Alergias', FALSE, NULL),
    (3, 'Convulsiones', FALSE, NULL),
    (3, 'Toma anticonceptivos', FALSE, NULL),
    (3, 'Embarazo actual', FALSE, NULL);
---------NO PATOLOGICOS--------------------------------------------------------------------------------------------------------------------
-- Paciente 1
INSERT INTO Antecedentes_NO_Patologicos (idHistorial, Nombre, Estado, Descripcion)
VALUES (
        1,
        'Higiene bucal',
        TRUE,
        'Buena, cepillado 3 veces al día.'
    ),
    (
        1,
        'Frecuencia de cepillado',
        TRUE,
        '3 veces al día.'
    ),
    (1, 'Fuma', FALSE, 'No fuma.'),
    (
        1,
        'Consume alcohol',
        TRUE,
        'Consumo ocasional los fines de semana.'
    ),
    (
        1,
        'Aprieta o rechina los dientes',
        TRUE,
        'Rechina los dientes durante la noche.'
    );
-- Paciente 2
INSERT INTO Antecedentes_NO_Patologicos (idHistorial, Nombre, Estado, Descripcion)
VALUES (
        2,
        'Higiene bucal',
        TRUE,
        'Regular, cepillado 2 veces al día.'
    ),
    (
        2,
        'Frecuencia de cepillado',
        TRUE,
        '2 veces al día.'
    ),
    (2, 'Fuma', TRUE, 'Fuma 5 cigarrillos al día.'),
    (
        2,
        'Consume alcohol',
        TRUE,
        'Bebe moderadamente los fines de semana.'
    ),
    (
        2,
        'Aprieta o rechina los dientes',
        FALSE,
        'No presenta bruxismo.'
    );
-- Paciente 3
INSERT INTO Antecedentes_NO_Patologicos (idHistorial, Nombre, Estado, Descripcion)
VALUES (
        3,
        'Higiene bucal',
        TRUE,
        'Buena, cepillado 3 veces al día.'
    ),
    (
        3,
        'Frecuencia de cepillado',
        TRUE,
        '3 veces al día.'
    ),
    (3, 'Fuma', FALSE, 'No fuma.'),
    (
        3,
        'Consume alcohol',
        FALSE,
        'No consume alcohol.'
    ),
    (
        3,
        'Aprieta o rechina los dientes',
        TRUE,
        'Bruxismo leve detectado.'
    );
--------FIN ANTECEDENTES--------------------------------------------------------------------
INSERT INTO Cita (
        idHistorial,
        idPaciente,
        Motivo,
        Fecha,
        Hora,
        Metodo_Agenda,
        Estado
    )
VALUES (
        1,
        1,
        'Chequeo de rutina',
        '2024-11-02',
        '10:00:00',
        'Online',
        'Confirmada'
    ),
    (
        2,
        2,
        'Valoracion dental pra brackets',
        '2024-11-06',
        '14:00:00',
        'Presencial',
        'Atendida'
    ),
    (
        3,
        3,
        'Limpieza dental',
        '2024-11-12',
        '16:30:00',
        'Presencial',
        'Programada'
    );
INSERT INTO Tratamiento (
        idCita,
        Tipo,
        Descripcion,
        Estado,
        Fecha_Inicio,
        Fecha_Finalizacion
    )
VALUES (
        1,
        'Ortodoncia',
        'Tratamiento de ortodoncia para corregir alineación dental.',
        'En progreso',
        '2024-11-01',
        '2025-11-01'
    ),
    (
        2,
        'Blanqueamiento',
        'Procedimiento para blanqueamiento dental.',
        'Completado',
        '2024-11-05',
        '2024-11-20'
    ),
    (
        3,
        'Endodoncia',
        'Tratamiento de conductos en molar derecho.',
        'En progreso',
        '2024-11-10',
        '2024-12-01'
    );
INSERT INTO Recordatorio (idPaciente, idCita, Medio_Envio, Estado_Envio)
VALUES (1, 1, 'Correo Electrónico', 'Enviado'),
    (2, 2, 'SMS', 'Pendiente'),
    (3, 3, 'Llamada telefónica', 'Enviado');