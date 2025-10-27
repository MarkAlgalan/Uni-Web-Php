create database gameScrapping;

USE gameScrapping;

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    apellido VARCHAR(30),
    usuario VARCHAR(30),
    password VARCHAR(30),
    tipo INT(1)
);

DROP TABLE IF EXISTS juego;
CREATE TABLE juego(
    appid INT PRIMARY KEY,
    nombre VARCHAR(30),
    genero VARCHAR(30),
    popularidad INT DEFAULT 0
);



DROP TABLE IF EXISTS buscar;
CREATE TABLE buscar(
    id_buscar INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    id_usuario INT NOT NULL,
    appid INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (appid) REFERENCES juego(appid)
    
);



INSERT INTO buscar (id_usuario, appid , fecha) VALUES ( , ,CURDATE()) ;
delimiter //

CREATE PROCEDURE asociarJuego(IN id_usuario INT, IN appid INT)
    BEGIN
    INSERT INTO buscar (id_usuario, appid, fecha) VALUES (id_usuario, appid, CURDATE());
END//

CREATE PROCEDURE verJuegosUsuario(IN id_usuario INT)
    BEGIN
    SELECT * FROM juego WHERE appid IN (SELECT appid FROM buscar WHERE id_usuario = id_usuario);
END//


CREATE TRIGGER after_insert_buscar AFTER INSERT ON buscar
FOR EACH ROW
BEGIN 
    UPDATE juego SET popularidad = popularidad + 1 WHERE appid = NEW.appid;
END//

delimiter;