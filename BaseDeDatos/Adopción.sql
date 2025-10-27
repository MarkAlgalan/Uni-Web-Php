create database AdopcionMascotas;

USE AdopcionMascotas;

DROP TABLE IF EXISTS mascotas;
CREATE TABLE mascotas(
  id_mascota INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(64) NOT NULL,
  raza VARCHAR(128) NOT NULL,
  edad INT NOT NULL
);

DROP TABLE IF EXISTS dueños;
CREATE TABLE dueños(
  id_dueños INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(64) NOT NULL,
  apellido VARCHAR(64) NOT NULL,
  telefono VARCHAR(10) NOT NULL
);

DROP TABLE IF EXISTS adopción;
CREATE TABLE adopción(
  fecha date NOT NULL,
  id_dueños INT NOT NULL, 
  id_mascota INT NOT NULL,
FOREIGN KEY(id_mascota) REFERENCES mascotas(id_mascota) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_dueños) REFERENCES dueños(id_dueños) ON DELETE CASCADE ON UPDATE CASCADE, 
PRIMARY KEY(id_dueños,id_mascota)
);


INSERT INTO mascotas (nombre, raza, edad) VALUES( 'Firulais', 'Pastor Aleman', 2);
INSERT INTO mascotas (nombre, raza, edad) VALUES( 'Rex', 'Pitbull', 3);
INSERT INTO mascotas (nombre, raza, edad) VALUES( 'Luna', 'Labrador', 1);
INSERT INTO mascotas (nombre, raza, edad) VALUES( 'Max', 'Chihuahua', 4);
INSERT INTO mascotas (nombre, raza, edad) VALUES( 'Toby', 'Bulldog', 5);
Insert INTO mascotas (nombre, raza, edad) VALUES( 'Luna', 'Pitbull', 1);

INSERT INTO dueños (nombre, apellido,telefono) VALUES( 'Juan', 'Perez', '1234567890');
INSERT INTO dueños (nombre, apellido,telefono) VALUES( 'Juan',' Dominguez',  '0987654321');
INSERT INTO dueños (nombre, apellido,telefono) VALUES( 'Jose', 'Luis Lopez', '2134657980');
INSERT INTO dueños (nombre, apellido,telefono) VALUES( 'Maria', 'Gonzalez', '2224567892');

insert into adopción (fecha, id_dueños, id_mascota ) values (CURDATE(), 1, 1);
INSERT INTO adopción (fecha, id_dueños, id_mascota ) VALUES(CURDATE(), 2, 2);
INSERT INTO adopción (fecha, id_dueños, id_mascota ) select CURDATE(),dueños.id_dueños,mascotas.id_mascota from dueños,mascotas where dueños.nombre='Jose' and dueños.apellido='Luis Lopez'and mascotas.nombre='Toby';
insert into adopción (fecha, id_dueños, id_mascota ) select CURDATE(),dueños.id_dueños,mascotas.id_mascota from dueños,mascotas where dueños.nombre='Juan' and dueños.apellido='Perez'and mascotas.nombre='Max';

SELECT * FROM mascotas; 
SELECT * FROM dueños;
SELECT * FROM adopción;
SELECT * FROM dueños WHERE nombre='Juan'; 
SELECT nombre FROM mascotas WHERE raza='Pitbult'  ORDER BY edad; 

select mascotas.nombre from mascotas,adopción where id_dueños=1 and mascotas.id_mascota=adopción.id_mascota;

ALTER table mascotas add column imagen varchar(64);

UPDATE mascotas set imagen='imagen1.jpg' where id_mascota=1;
UPDATE mascotas set imagen='imagen2.jpg' where id_mascota=2;
UPDATE mascotas set imagen='imagen3.jpg' where id_mascota=3;
UPDATE mascotas set imagen='imagen4.jpg' where id_mascota=4;
UPDATE mascotas set imagen='imagen5.jpg' where id_mascota=5;
UPDATE mascotas set imagen='imagen6.jpg' where id_mascota=6;
