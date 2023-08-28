CREATE DATABASE IF NOT EXISTS aerolinea;

USE aerolinea;

CREATE TABLE IF NOT EXISTS viaje (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_aerolinea VARCHAR(25),
    nvuelo VARCHAR(10),
    destino VARCHAR(25)
);