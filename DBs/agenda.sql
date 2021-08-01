CREATE TABLE `usuario` (
  `usu_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `usu_nom` varchar(30) NOT NULL COMMENT 'Nombre de usuario (username)',
  `usu_cla` varchar(255) NOT NULL COMMENT 'Contraseña usuario',
  `usu_sta` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Activo = 1 o inactivo = 0 el usuario',
  `usu_cre` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion',
  `rol_id` int(1) NOT NULL COMMENT 'Relacion con rol',
  PRIMARY KEY (`usu_id`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `rol` (
  `rol_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `rol_nom` varchar(60) NOT NULL COMMENT 'Nombre rol',
  `rol_sta` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Activo = 1 o inactivo = 0 el rol',
  `rol_cre` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `contacto` (
  `con_id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `con_nom` varchar(255) NOT NULL COMMENT 'Nombre del contacto',
  `con_dh` text NOT NULL COMMENT 'Direccion de habitacion',
  `con_dt` text COMMENT 'Direccion de trabajo (opcional)',
  `con_sta` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Activo = 1 o inactivo = 0 el contacto',
  `con_cre` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion',
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci


CREATE TABLE `correo` (
  `cor_id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `cor_dir` varchar(255) NOT NULL COMMENT 'Direccion de correo',
  `cor_des` varchar(255) NOT NULL COMMENT 'Descripcion del correo',
  `cor_sta` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Activo = 1 o inactivo = 0 el contacto',
  `cor_cre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion',
  `con_id` int NOT NULL COMMENT 'Relacion con contacto',
  PRIMARY KEY (`cor_id`),
  KEY `con_id` (`con_id`),
  CONSTRAINT `correo_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contacto` (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci


CREATE TABLE `telefono` (
  `tel_id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `tel_nro` varchar(20) NOT NULL COMMENT 'Nro telefonico',
  `tel_des` varchar(255) NOT NULL COMMENT 'Descriopcion del nro de telefono',
  `tel_sta` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Activo = 1 o inactivo = 0 el contacto',
  `tel_cre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion',
  `con_id` int NOT NULL COMMENT 'Relacion con contacto',
  PRIMARY KEY (`tel_id`),
  KEY `con_id` (`con_id`),
  CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contacto` (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
