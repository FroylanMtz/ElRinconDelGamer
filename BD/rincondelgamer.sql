DROP DATABASE IF EXISTS rincondelgamer;
CREATE DATABASE IF NOT EXISTS rincondelgamer;
USE rincondelgamer;

CREATE TABLE socios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    fecha_nacimiento DATE,
    genero CHAR(1),
    telefono CHAR(10),
    correo VARCHAR(100),
    contrasena VARCHAR(100),
    tag VARCHAR(20),
    foto VARCHAR(40),
    monedas DECIMAL(9,2)
);

CREATE TABLE redes_sociales(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

CREATE TABLE redsocial_socio(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_socio INT,
    id_redsocial INT,
    usuario VARCHAR(70),
    link VARCHAR(255),

    FOREIGN KEY (id_socio) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_redsocial) REFERENCES redes_sociales(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE plataformas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

CREATE TABLE consolas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_plataforma INT(11),
    numero INT(11),
    serial VARCHAR(50),
    costo_renta DECIMAL(4,1),
    total_monedas INT(9),

    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE juegos(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    imagen VARCHAR(50)

);

CREATE TABLE juegos_plataformas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_juego INT(11),
    id_plataforma INT(11),

    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE juegos_consolas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_consola INT(11),
    id_juego INT(11),
    fecha DATE,

    FOREIGN KEY (id_consola) REFERENCES consolas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE torneos(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    id_juego INT(11),
    fecha DATE,
    hora TIME,
    modalidad VARCHAR(50),
    forma VARCHAR(60),
    cantidad_jugadores INT(3),
    descripcion VARCHAR(255),
    estatus VARCHAR(30),

    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE premios_torneos(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    posicion INT(3),
    premio VARCHAR(255),
    id_torneo INT(11),

    FOREIGN KEY (id_torneo) REFERENCES torneos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE socio_torneo(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_torneo INT(11),
    id_socio INT(11),


    FOREIGN KEY (id_torneo) REFERENCES torneos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_socio) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE premios_ganadores(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_premio INT(11),
    id_socio INT(11),

    FOREIGN KEY (id_premio) REFERENCES premios_torneos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_socio) REFERENCES  socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE rentas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
    hora TIME,
    id_consola INT(11),
    id_juego INT(11),
    id_socio INT(11),
    numero_horas INT(4),
    tipo_pago VARCHAR(20),

    FOREIGN KEY (id_consola) REFERENCES consolas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_socio) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE accesorios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    descripcion VARCHAR(255),
    costo_renta DECIMAL(5,2)
);

CREATE TABLE renta_accesorios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_renta INT(11),
    id_accesorio INT(11),
    numero_horas DECIMAL(5,2),

    FOREIGN KEY (id_accesorio) REFERENCES accesorios(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_renta) REFERENCES rentas(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE dulces(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio DECIMAL(5,2),
    descripcion VARCHAR(255),
    total_monedas INT(9)

);

CREATE TABLE rentas_dulces(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_renta INT(11),
    id_dulce INT(11),
    cantidad INT(4),

    FOREIGN KEY (id_renta) REFERENCES rentas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_dulce) REFERENCES dulces(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE referencias(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_referido INT(11),
    fecha DATE,
    hora TIME,
    estatus VARCHAR(30),
    correo VARCHAR(50),
    
    FOREIGN KEY (id_referido) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE ganancias_monedas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_renta INT(11),
    id_referencia INT(11),
    estatus VARCHAR(40),

    FOREIGN KEY (id_renta) REFERENCES rentas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_referencia) REFERENCES referencias(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE invitacion_torneo(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    host INT(11),
    invitado INT(11),
    estatus VARCHAR(50),
    id_torneo int(11),

    FOREIGN KEY (host) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (invitado) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE usuarios(
	usuario_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(100) NOT NULL,
	rol varchar(50) NOT NULL,
	correo varchar(50) NOT NULL,
	contrasena char(32) NOT NULL
);
