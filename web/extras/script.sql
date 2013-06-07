CREATE TABLE usuario(
id_usuario int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(100),
mail varchar(100),
tipo bigint,
pass varchar(100)
);
INSERT INTO usuario (nombre,mail,tipo,pass) VALUES ('German Paez','germanp28@gmail.com',1,'german');

CREATE TABLE menu(
id_menu int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(50),
descripcion varchar(200),
url varchar(500),
tipo varchar(500),
orden int
);
CREATE TABLE galeria(
id_galeria int AUTO_INCREMENT PRIMARY KEY,
id_seccion int,
tipo int,
titulo text,
txtpregaleria blob,
txtposgaleria blob,
txtboton text,
urlboton text
);

CREATE TABLE archivo(
id_archivo int AUTO_INCREMENT PRIMARY KEY,
id_galeria int,
ruta text,
titulo text,
text_alt text,
contenido blob
);
drop table imgen;
CREATE TABLE imagen(
id_imagen int AUTO_INCREMENT PRIMARY KEY,
tipo int,
ruta text,
titulo text,
text_alt text
);

drop table slide;
CREATE TABLE slide(
id_slide int AUTO_INCREMENT PRIMARY KEY,
id_seccion int,
nombre text
);
CREATE TABLE img_slide(
id_img int AUTO_INCREMENT PRIMARY KEY,
id_slide int,
titulo text,
contenido blob,
imagen text,
orden int,
txtboton text,
urlboton text
);
CREATE TABLE img(
id_img int AUTO_INCREMENT PRIMARY KEY,
tipo int,
titulo text,
text_alt text,
archivo text
);




INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('crear_usuario','Usuario Nuevo','admin/ir/new_user','usuarios',0);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('eliminar_usuario','Eliminar Nuevo','admin/ir/del_user','usuarios',1);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('editar_usuario','Editar Nuevo','admin/ir/update_user','usuarios',2);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('crear_producto','Producto Nuevo','admin/ir/producto_nuevo','Producto',0);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('editar_producto','Editar Producto','admin/ir/editar_producto','Producto',1);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_seccion','Nueva Seccion','admin/ir/nueva_seccion','Seccion',0);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_pagina','Pagina Nueva','admin/ir/nueva-pagina','Pagina',0);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('editar_pagina','Editar Nueva','admin/ir/Editar-pagina','Pagina',1);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('eliminar_pagina','Eliminar Nueva','admin/ir/Eliminar-pagina','Pagina',2);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_galeria','Galeria Nueva','admin/ir/nueva-galeria','Contenido',0);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_bloque','Bloque Nuevo','admin/ir/nueva-Bloque','Contenido',1);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_baner','Baner Nuevo','admin/ir/nueva-Baner','Contenido',2);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_contacto','Contacto Nuevo','admin/ir/nueva-Contactenos','Contenido',3);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('archivo_nuevo','Subir imagenes galeria','admin/ir/subir-imagen','Contenido',4);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('slide_nuevo','Nuevo Slide','admin/ir/nuevo-slide','Contenido',5);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('contenido_slide','Cargar Contenido Slide','admin/ir/nuevo-cotenido-slide','Contenido',6);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('subir_imagen','Subir Imagen','admin/ir/subir-imagen-sola','Contenido',7);

CREATE TABLE reset(
id int AUTO_INCREMENT PRIMARY KEY,
id_usuario bigint,
pin text
);

CREATE TABLE idioma(
id_idioma int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(100),
icono varchar(200)
);


CREATE TABLE seccion(
id_seccion int AUTO_INCREMENT PRIMARY KEY,
nombre text,
idioma bigint,
slu_seccion
);

CREATE TABLE pagina(
id_pagina int AUTO_INCREMENT PRIMARY KEY,
id_seccion bigint,
slu text,
titulo text,
texto_destacado text,
imagen text,
contenido_body_wisi
);
CREATE TABLE bloque(
id_bloque int AUTO_INCREMENT PRIMARY KEY,
titulo text,
contenido blob,
txt_boton text,
imagen text
);

LOAD DATA INFILE 'd:/pre.csv' INTO TABLE precio_carroceria FIELDS TERMINATED BY ';'  LINES TERMINATED BY '\n';
SELECT * FROM `puc` where cuenta LIKE '110%'