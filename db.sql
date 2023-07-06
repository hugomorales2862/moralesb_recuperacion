
CREATE DATABASE vivienda 
CREATE TABLE viviendas (
    ID SERIAL NOT NULL PRIMARY KEY,
    nombre_condominio VARCHAR(50) NOT NULL,
    numero_vivienda INT NOT NULL,
    propietaria VARCHAR(50) NOT NULL,
    situacion char (1) DEFAULT '1'
);

CREATE TABLE visitas (
    ID SERIAL NOT NULL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    dpi VARCHAR(50) NOT NULL, 
    hora_ingreso DATETIME YEAR TO MINUTE NOT NULL,
    hora_salida DATETIME YEAR TO MINUTE,
    situacion char (1) DEFAULT '1'
);

CREATE TABLE visita_vivienda (
    fecha DATE NOT NULL,
    visita INT,
    vivienda INT NOT NULL,
    situacion char (1) DEFAULT '1',
    PRIMARY KEY (fecha, visita, vivienda),
    FOREIGN KEY (visita) REFERENCES visitas(ID),
    FOREIGN KEY (vivienda) REFERENCES viviendas(ID)
);
