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

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('crear_usuario','Usuario Nuevo','admin/ir/new_user','usuarios',0);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('eliminar_usuario','Eliminar Nuevo','admin/ir/del_user','usuarios',1);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('editar_usuario','Editar Nuevo','admin/ir/update_user','usuarios',2);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('crear_producto','Producto Nuevo','admin/ir/producto_nuevo','Producto',0);
INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('editar_producto','Editar Producto','admin/ir/editar_producto','Producto',1);

INSERT INTO menu (nombre,descripcion,url,tipo,orden) VALUES ('nueva_seccion','Nueva Seccion','admin/ir/nueva_seccion','Seccion',0);

CREATE TABLE reset(
id int AUTO_INCREMENT PRIMARY KEY,
id_usuario bigint,
pin text
);


LOAD DATA INFILE 'd:/pre.csv' INTO TABLE precio_carroceria FIELDS TERMINATED BY ';'  LINES TERMINATED BY '\n';
SELECT * FROM `puc` where cuenta LIKE '110%'