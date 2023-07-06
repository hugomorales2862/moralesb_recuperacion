
CREATE DATABASE vivienda 
CREATE TABLE viviendas (
    ID INT NOT NULL PRIMARY KEY,
    nombre_condominio VARCHAR(50) NOT NULL,
    numero_vivienda INT NOT NULL,
    propietaria VARCHAR(50) NOT NULL
);

CREATE TABLE visitas (
    ID INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    dpi VARCHAR(50) NOT NULL, 
    hora_ingreso DATETIME YEAR TO MINUTE NOT NULL,
    hora_salida DATETIME YEAR TO MINUTE
);

CREATE TABLE visita_vivienda (
    fecha DATE NOT NULL,
    visita INT,
    vivienda INT,
    PRIMARY KEY (fecha, visita, vivienda),
    FOREIGN KEY (visita) REFERENCES visitas(ID),
    FOREIGN KEY (vivienda) REFERENCES viviendas(ID)
);
