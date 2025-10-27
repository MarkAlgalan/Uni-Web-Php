create database
videoteca;

USE videoteca;

DROP TABLE IF EXISTS pelicula;
CREATE TABLE pelicula(
  id_pelicula INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(64) NOT NULL,
  director VARCHAR(128) NOT NULL,
  actor VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS clientes;
CREATE TABLE clientes(
  id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  cliente VARCHAR(64) NOT NULL
);

DROP TABLE IF EXISTS rentas;
CREATE TABLE rentas(
  fecha_inicio date NOT NULL,
  fecha_fin date NOT NULL,
  id_cliente INT NOT NULL, 
  id_pelicula INT NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_pelicula) REFERENCES pelicula(id_pelicula) ON DELETE CASCADE ON UPDATE CASCADE, PRIMARY KEY(id_cliente,id_pelicula, fecha_inicio)
);

ALTER TABLE pelicula ADD COLUMN categoria  Varchar(20) ;

ALTER TABLE clientes ADD COLUMN year  INT(4) ;

Use Videoteca;
INSERT INTO pelicula (titulo, director, actor) VALUES( 'Blade Runner', 'Ridley Scott', 'Harrison Ford' ); 
INSERT INTO pelicula (titulo, director, actor) VALUES( 'Alien', 'Ridley Scott', 'Sigourney Weaver' ); 
INSERT INTO pelicula (titulo, director, actor) VALUES( 'Doce monos', 'Terry Gilliam', 'Bruce Willis' ); 
INSERT INTO pelicula (titulo, director, actor) VALUES( 'Contact', 'Robert Zemeckis', 'Jodie Foster' ); 
INSERT INTO pelicula (titulo, director, actor) VALUES( 'Tron', 'Steven Lisberger', 'Jeff Bridges' ); 
INSERT INTO pelicula (titulo, director, actor) VALUES( 'La guerra de las galaxias', 'George Lucas', 'Harrison Ford' ); 

Use Videoteca;
INSERT INTO clientes (cliente, year) VALUES( 'Jorge Perez', 1980); 
INSERT INTO clientes (cliente, year) VALUES( 'Juan Dominguez', 1950);
INSERT INTO clientes (cliente, year) VALUES( 'Jose Luis Lopez', 1967);

Use Videoteca;
INSERT INTO rentas (id_cliente, id_pelicula, fecha_inicio,fecha_fin) select clientes.id_cliente,pelicula.id_pelicula,CURDATE(),CURDATE()+2 from clientes,pelicula where clientes.cliente='Jorge Perez' and pelicula.titulo='Tron'; 
INSERT INTO rentas (id_cliente, id_pelicula, fecha_inicio,fecha_fin) select clientes.id_cliente,pelicula.id_pelicula,CURDATE(),CURDATE()+2 from clientes,pelicula where clientes.cliente='Jorge Perez' and pelicula.titulo='Doce monos';
INSERT INTO rentas (id_cliente, id_pelicula, fecha_inicio,fecha_fin) select clientes.id_cliente,pelicula.id_pelicula,CURDATE(),CURDATE()+2 from clientes,pelicula where clientes.cliente='Jorge Perez' and pelicula.titulo='Contact';
INSERT INTO rentas (id_cliente, id_pelicula, fecha_inicio,fecha_fin) select clientes.id_cliente,pelicula.id_pelicula,CURDATE(),CURDATE()+2 from clientes,pelicula where clientes.cliente='Juan Dominguez' and pelicula.titulo='Contact';

insert into rentas(id_cliente, id_pelicula, fecha_inicio, fecha_fin) values(3,6,"2024-01-22","2024-01-29");

USE videoteca; 

SELECT * FROM pelicula; 

SELECT * FROM pelicula WHERE director='Ridley Scott'; 

SELECT titulo FROM pelicula WHERE director='Ridley Scott'  ORDER BY titulo; 

Select pelicula.titulo from pelicula,rentas where id_cliente=1 and 
pelicula.id_pelicula=rentas.id_pelicula;


USE videoteca; 
UPDATE pelicula 
SET titulo='Star Wars' 
WHERE titulo='La guerra de las galaxias'; 

DELETE  FROM pelicula where director='Ridley Scott';
 
select * from pelicula;

ALTER TABLE clientes
ADD COLUMN usuario VARCHAR(30),
ADD COLUMN password VARCHAR(30),
ADD COLUMN tipo INT(1);

UPDATE clientes SET tipo = 1 WHERE id_cliente = 1;
UPDATE clientes SET tipo = 1 WHERE id_cliente = 2;
UPDATE clientes SET tipo = 1 WHERE id_cliente = 3;

INSERT INTO clientes (cliente, year, usuario, password, tipo ) VALUES( 'Jose A', 2033, 'ADM','1234',0 );

ALTER TABLE clientes
DROP COLUMN usuario;


UPDATE clientes SET usuario='jorge', password='1234' WHERE id_cliente = 1;