
CREATE DATABASE votaciones;

USE votaciones;

CREATE TABLE candidatos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    numero_votos INT DEFAULT 0
);

CREATE TABLE votantes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    ine VARCHAR(255) NOT NULL,
    edad INT NOT NULL
);

CREATE TABLE partido (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    id_candidato INT NOT NULL,
    numero_votos INT DEFAULT 0,
    FOREIGN KEY (id_candidato) REFERENCES candidatos(id)
);

CREATE TABLE votos (
    id_votante INT NOT NULL,
    id_partido INT NOT NULL,
    FOREIGN KEY (id_votante) REFERENCES votantes(id),
    FOREIGN KEY (id_partido) REFERENCES partido(id),
    PRIMARY KEY (id_votante, id_partido)
);

INSERT INTO candidatos (nombre) VALUES ('Bertha Xóchitl Gálvez Ruiz “Xóchitl Gálvez”');
INSERT INTO candidatos (nombre) VALUES ('Claudia Sheinbaum Pardo');
INSERT INTO candidatos (nombre) VALUES ('Jorge Álvarez Máynez');
INSERT INTO candidatos (nombre) VALUES ('NULO');

INSERT INTO partido (nombre, id_candidato) VALUES ('Partido Acción Nacional', 1);
INSERT INTO partido (nombre, id_candidato) VALUES ('Partido Revolucionario Institucional', 1);
INSERT INTO partido (nombre, id_candidato) VALUES ('PRD', 1);
INSERT INTO partido (nombre, id_candidato) VALUES ('MORENA', 2);
INSERT INTO partido (nombre, id_candidato) VALUES ('Partido Verde Ecologista', 2);
INSERT INTO partido (nombre, id_candidato) VALUES ('Partido del Trabajo', 2);
INSERT INTO partido (nombre, id_candidato) VALUES ('Movimiento Ciudadano', 3);
INSERT INTO partido (nombre, id_candidato) VALUES ('NULO', 4);

INSERT INTO votantes (nombre, ine, edad) VALUES ('Juan Sanchez', 'XZD123', 25);
INSERT INTO votantes (nombre, ine, edad) VALUES ('María Jose', 'XZD124', 30);
INSERT INTO votantes (nombre, ine, edad) VALUES ('José Rodríguez', 'XZD125', 30);
INSERT INTO votantes (nombre, ine, edad) VALUES ('Ana Karen', 'XZD126', 41);
INSERT INTO votantes (nombre, ine, edad) VALUES ('Marco Tenoch', 'XZD127', 42);

delimiter //

CREATE PROCEDURE vota(IN id_votante INT, IN id_partido INT)
    BEGIN
    INSERT INTO votos (id_votante, id_partido) VALUES (id_votante, id_partido);
END//


CREATE PROCEDURE actualizar_voto_partido (IN id_partido INT)
    BEGIN
    UPDATE partido SET numero_votos = numero_votos + 1 WHERE id = id_partido;
END//

CREATE PROCEDURE mostrar_votos(IN id_partido INT)
    BEGIN
    SELECT * FROM votos WHERE votos.id_partido = partido.id;
END//

CREATE TRIGGER after_insert_voto_maynez AFTER INSERT ON votos
FOR EACH ROW
    BEGIN
    IF New.id_partido = 7 THEN 

        UPDATE partido SET numero_votos = numero_votos + 1 WHERE id = 1;
        UPDATE candidatos SET numero_votos = numero_votos + 1 WHERE id = 1;
    END IF;
    
END//

CREATE TRIGGER actualizar_voto_candidato AFTER INSERT ON votos
FOR EACH ROW
    BEGIN
    UPDATE candidatos SET numero_votos = numero_votos + 1 WHERE id = New.id_partido;
END//

delimiter;


