CREATE TABLE usuario(
id_usuario int AUTO_INCREMENT PRIMARY KEY,
cedula varchar(20),
apellido varchar(100),
nombre varchar(100),
mail varchar(100),
telefono varchar(100),
tipo varchar(100),
pass varchar(100)
);
INSERT INTO usuario (cedula,apellido,nombre,mail,telefono,tipo,pass) VALUES ('','','','','','','');

CREATE TABLE menu(
id_menu int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(50),
descripcion varchar(200),
url varchar(500),
tipo varchar(500),
orden int
);

CREATE TABLE fotos(
id_foto int AUTO_INCREMENT PRIMARY KEY,
id_usuario bigint,
foto blob,
huella_izq blob,
huella_der blob,
audio blob
);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('hmatricula','Hoja Matricula','inicio/ir/hoja_matricula','ESTUDIANTES',0);


INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('hojavida','Hoja de vida','inicio/ir/Hoja_de_vida','DOCENTES',1);


INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('gradosnivel','Grados por nivel','inicio/ir/grados_nivel','INFORMACION ACADEMICA',2);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('asignaturassub','Asignaturas y Subasignaturas','inicio/ir/asignaturas_sub','INFORMACION ACADEMICA',2);


INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('notasparciales','Notas Parciales','inicio/ir/Notas_parciales','CAPTURA DE NOTAS',3);


INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('logrosperdidos','Asignaturas con logros perdidos','inicio/ir/asignaturas_logros','RECUPERACIONES',4);


INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('perfil','Perfil','inicio/ir/perfil','INSTITUCION',5);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('sedes','Sedes','inicio/ir/sedes','INSTITUCION',5);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('jornadas','Jornadas','inicio/ir/jornadas','INSTITUCION',5);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('niveles','Niveles','inicio/ir/niveles','INSTITUCION',5);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('areas','Areas Academicas','inicio/ir/areas','INSTITUCION',5);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('valoracion','Escala de valoracion','inicio/ir/valoracion','INSTITUCION',5);










CREATE TABLE producto(
id_producto int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(300),
unidad varchar(300)
);
INSERT INTO producto (nombre,unidad) VALUES ('Nokia n95','unidad');

CREATE TABLE tipo_carroceria(
id int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(300),
imagen varchar(300),
precio varchar(300)
);

INSERT INTO tipo_carroceria (nombre,imagen,precio) VALUES ('','','');


CREATE TABLE inventario(
id int AUTO_INCREMENT PRIMARY KEY,
consecutivo bigint,
fecha date,
cantidad int,
id_producto int,
valor double,
id_cliente int,
tipo_transaccion varchar(100)
);


CREATE TABLE carroceria(
id int AUTO_INCREMENT PRIMARY KEY,
marca text,
tipo text,
dedida text,
precio text,
foto text
);

CREATE TABLE partes(
id int AUTO_INCREMENT PRIMARY KEY,
nombre text,
tipo text,
carroceria text,
precio text,
foto text
);
CREATE TABLE accesorios(
id int AUTO_INCREMENT PRIMARY KEY,
nombre text,
precio text,
foto text
);
CREATE TABLE contrato(
id int AUTO_INCREMENT PRIMARY KEY,
consecutivo bigint,
formato text,
fecha date,
vendedor varchar(50),
cliente varchar(50),
vrcarroceria varchar(50),
vradicional varchar(50),
base varchar(50)
);
CREATE TABLE transaccion(
id int AUTO_INCREMENT PRIMARY KEY,
consecutivo bigint,
formato text,
fecha date,
tipo varchar(100),
vrpagado double,
tercero bigint,
realizado bigint
);
CREATE TABLE texto_carroceria(
id int AUTO_INCREMENT PRIMARY KEY,
tipo varchar(100),
parte varchar(100),
m0_3 text,
m3_6 text,
m6_9 text
);
CREATE TABLE valor_adicional(
id int AUTO_INCREMENT PRIMARY KEY,
medida varchar(200),
tipo varchar(100),
adicional  text,
valor varchar(200)
);
CREATE TABLE precio_carroceria(
id int AUTO_INCREMENT PRIMARY KEY,
tipo varchar(200),
medida varchar(100),
valor varchar(200)
);
CREATE TABLE adicionales(
id int AUTO_INCREMENT PRIMARY KEY,
medida varchar(200),
tipo varchar(100),
descripcion varchar(200),
valor varchar(200)
);
CREATE TABLE cotizacion(
id int AUTO_INCREMENT PRIMARY KEY,
consecutivo bigint,
fecha date,
datos text,
vendedor bigint,
cliente bigint,
vista text
);
CREATE TABLE reporte_cliente(
id int AUTO_INCREMENT PRIMARY KEY,
fecha date,
nombre text,
carroceria text,
quien bigint
);
drop table chasis;
CREATE TABLE chasis(
id_chasis int AUTO_INCREMENT PRIMARY KEY,
fecha date,
contrato bigint,
contratista bigint,
no_chasis varchar(200),
ano bigint,
color varchar(200),
obs text,
placa varchar(100)
);


LOAD DATA INFILE 'd:/pre.csv' INTO TABLE precio_carroceria FIELDS TERMINATED BY ';'  LINES TERMINATED BY '\n';
SELECT * FROM `puc` where cuenta LIKE '110%'