use sifarisdb;
CREATE TABLE empleado (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    codigo int(20) UNIQUE,
    nombre VARCHAR(150),
    apellido VARCHAR(100),
     telefono int(8),
     edad int(3),
     direccion VARCHAR(100),
     cargo VARCHAR(50)
     
);

CREATE TABLE examen (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    codigo int(20) UNIQUE,
    tipoexamen VARCHAR(100),
	precio DECIMAL(7,2) NOT NULL CHECK (precio > 0),
    tipomuestra VARCHAR(100)
   
);
CREATE TABLE paciente (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    
    nombre VARCHAR(150),
    edad int(3),
    telefono int(8),
    contacto VARCHAR(100),
     direccion VARCHAR(100),
     dui int(50)
     
);
CREATE TABLE medico (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    
    nombre VARCHAR(150),
  
    telefono int(8),
    contacto VARCHAR(100),
     direccion VARCHAR(100),
     espe VARCHAR(50)
     
);

CREATE TABLE analisis
(
	id   BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idexamen BIGINT UNSIGNED NOT NULL,
    idpaciente BIGINT UNSIGNED NOT NULL,
    idmedico BIGINT UNSIGNED NOT NULL,
    Pago VARCHAR(50),
    Resultado VARCHAR(100),
    FOREIGN KEY (idpaciente) REFERENCES paciente(id),
    FOREIGN KEY (idmedico) REFERENCES medico(id),
    FOREIGN KEY (idexamen) REFERENCES examen(id)
    
) ;
