
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- localidad
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `localidad`;


CREATE TABLE `localidad`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50)  NOT NULL,
	`distancia` INTEGER,
	`capital` TINYINT,
	`ciudadReferencia` TINYINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `localidad_U_1` (`nombre`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- zona
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `zona`;


CREATE TABLE `zona`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(50)  NOT NULL,
	`localidad_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `zona_U_1` (`descripcion`),
	INDEX `zona_FI_1` (`localidad_id`),
	CONSTRAINT `zona_FK_1`
		FOREIGN KEY (`localidad_id`)
		REFERENCES `localidad` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- chofer
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `chofer`;


CREATE TABLE `chofer`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100)  NOT NULL,
	`DocID` VARCHAR(20),
	`domicilio` VARCHAR(100),
	`libConducir` VARCHAR(100),
	PRIMARY KEY (`id`),
	UNIQUE KEY `chofer_U_1` (`DocID`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vehicxorden
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vehicxorden`;


CREATE TABLE `vehicxorden`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`idOrden` INTEGER  NOT NULL,
	`idVehiculo` INTEGER  NOT NULL,
	`horaDesde` DATETIME  NOT NULL,
	`horahasta` DATETIME,
	`cantPasajeros` INTEGER,
	`chofer` INTEGER,
	`proveedor` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `vehicxorden_FI_1` (`idVehiculo`),
	CONSTRAINT `vehicxorden_FK_1`
		FOREIGN KEY (`idVehiculo`)
		REFERENCES `vehiculo` (`id`),
	INDEX `vehicxorden_FI_2` (`chofer`),
	CONSTRAINT `vehicxorden_FK_2`
		FOREIGN KEY (`chofer`)
		REFERENCES `chofer` (`id`),
	INDEX `vehicxorden_FI_3` (`proveedor`),
	CONSTRAINT `vehicxorden_FK_3`
		FOREIGN KEY (`proveedor`)
		REFERENCES `proveedor` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- cliente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;


CREATE TABLE `cliente`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100)  NOT NULL,
	`razon_soc` VARCHAR(150),
	`rut` VARCHAR(150),
	`direccion` VARCHAR(150)  NOT NULL,
	`telefono` INTEGER,
	`celular` VARCHAR(20),
	`mail` VARCHAR(80),
	`es_empresa` TINYINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `cliente_U_1` (`nombre`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- proveedor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `proveedor`;


CREATE TABLE `proveedor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100)  NOT NULL,
	`razon_soc` VARCHAR(150),
	`rut` VARCHAR(150),
	`direccion` VARCHAR(150)  NOT NULL,
	`telefono` INTEGER,
	`celular` VARCHAR(20),
	`mail` VARCHAR(80),
	`es_empresa` TINYINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `proveedor_U_1` (`nombre`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vehiculo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vehiculo`;


CREATE TABLE `vehiculo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(100)  NOT NULL,
	`marca` VARCHAR(100)  NOT NULL,
	`modelo` VARCHAR(150)  NOT NULL,
	`ano` INTEGER  NOT NULL,
	`matricula` VARCHAR(150)  NOT NULL,
	`capacidad` INTEGER,
	`proveedor` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `vehiculo_U_1` (`matricula`),
	INDEX `vehiculo_FI_1` (`proveedor`),
	CONSTRAINT `vehiculo_FK_1`
		FOREIGN KEY (`proveedor`)
		REFERENCES `proveedor` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- moneda
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `moneda`;


CREATE TABLE `moneda`
(
	`numref` INTEGER,
	`moneda` VARCHAR(100)  NOT NULL,
	`tipocambio` DECIMAL(20,2),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `moneda_U_1` (`moneda`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- parametros
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `parametros`;


CREATE TABLE `parametros`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`numref` INTEGER,
	`nombre` VARCHAR(40),
	`valor` VARCHAR(40),
	PRIMARY KEY (`id`),
	UNIQUE KEY `parametros_U_1` (`nombre`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- orden
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orden`;


CREATE TABLE `orden`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`cliente` INTEGER  NOT NULL,
	`descripcion` VARCHAR(100)  NOT NULL,
	`fecha_desde` DATE  NOT NULL,
	`fecha_hasta` DATE  NOT NULL,
	`contacto` VARCHAR(100)  NOT NULL,
	`tel_contacto` INTEGER  NOT NULL,
	`horas` INTEGER,
	`kilometros` INTEGER,
	`importe` DECIMAL(20,2),
	`moneda` INTEGER,
	`liquidada` TINYINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `orden_U_1` (`descripcion`),
	INDEX `orden_FI_1` (`cliente`),
	CONSTRAINT `orden_FK_1`
		FOREIGN KEY (`cliente`)
		REFERENCES `cliente` (`id`),
	INDEX `orden_FI_2` (`moneda`),
	CONSTRAINT `orden_FK_2`
		FOREIGN KEY (`moneda`)
		REFERENCES `moneda` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pasajero
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pasajero`;


CREATE TABLE `pasajero`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100)  NOT NULL,
	`direccion` VARCHAR(150)  NOT NULL,
	`telefono` INTEGER  NOT NULL,
	`mail` VARCHAR(80),
	`hora` DATETIME  NOT NULL,
	`zona_id` INTEGER  NOT NULL,
	`vehiculo` INTEGER  NOT NULL,
	`orden` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `pasajero_FI_1` (`zona_id`),
	CONSTRAINT `pasajero_FK_1`
		FOREIGN KEY (`zona_id`)
		REFERENCES `zona` (`id`),
	INDEX `pasajero_FI_2` (`vehiculo`),
	CONSTRAINT `pasajero_FK_2`
		FOREIGN KEY (`vehiculo`)
		REFERENCES `vehiculo` (`id`),
	INDEX `pasajero_FI_3` (`orden`),
	CONSTRAINT `pasajero_FK_3`
		FOREIGN KEY (`orden`)
		REFERENCES `orden` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- factura
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `factura`;


CREATE TABLE `factura`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`num_fac` INTEGER,
	`cliente` INTEGER  NOT NULL,
	`fecha_fact` DATE  NOT NULL,
	`desc_generica` TEXT,
	`iva` INTEGER,
	`subtotal` DECIMAL(20,2),
	`total` DECIMAL(20,2),
	`moneda` INTEGER,
	`formapago` VARCHAR(80)  NOT NULL,
	`fechaPago` DATE,
	PRIMARY KEY (`id`),
	INDEX `factura_FI_1` (`cliente`),
	CONSTRAINT `factura_FK_1`
		FOREIGN KEY (`cliente`)
		REFERENCES `cliente` (`id`),
	INDEX `factura_FI_2` (`moneda`),
	CONSTRAINT `factura_FK_2`
		FOREIGN KEY (`moneda`)
		REFERENCES `moneda` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- lineafact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lineafact`;


CREATE TABLE `lineafact`
(
	`factura_id` INTEGER  NOT NULL,
	`orden_id` INTEGER  NOT NULL,
	`descripcion` TEXT,
	PRIMARY KEY (`factura_id`,`orden_id`),
	CONSTRAINT `lineafact_FK_1`
		FOREIGN KEY (`factura_id`)
		REFERENCES `factura` (`id`)
		ON DELETE CASCADE,
	INDEX `lineafact_FI_2` (`orden_id`),
	CONSTRAINT `lineafact_FK_2`
		FOREIGN KEY (`orden_id`)
		REFERENCES `orden` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tmpfactura
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tmpfactura`;


CREATE TABLE `tmpfactura`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`num_fac` INTEGER,
	`cliente` INTEGER  NOT NULL,
	`fecha_fact` DATE  NOT NULL,
	`desc_generica` TEXT,
	`iva` INTEGER,
	`subtotal` DECIMAL(20,2),
	`total` DECIMAL(20,2),
	`moneda` INTEGER,
	`formapago` VARCHAR(80)  NOT NULL,
	`fechaPago` DATE,
	PRIMARY KEY (`id`),
	INDEX `tmpfactura_FI_1` (`cliente`),
	CONSTRAINT `tmpfactura_FK_1`
		FOREIGN KEY (`cliente`)
		REFERENCES `cliente` (`id`),
	INDEX `tmpfactura_FI_2` (`moneda`),
	CONSTRAINT `tmpfactura_FK_2`
		FOREIGN KEY (`moneda`)
		REFERENCES `moneda` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tmplineafact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tmplineafact`;


CREATE TABLE `tmplineafact`
(
	`factura_id` INTEGER  NOT NULL,
	`orden_id` INTEGER  NOT NULL,
	`descripcion` TEXT,
	PRIMARY KEY (`factura_id`,`orden_id`),
	CONSTRAINT `tmplineafact_FK_1`
		FOREIGN KEY (`factura_id`)
		REFERENCES `tmpfactura` (`id`)
		ON DELETE CASCADE,
	INDEX `tmplineafact_FI_2` (`orden_id`),
	CONSTRAINT `tmplineafact_FK_2`
		FOREIGN KEY (`orden_id`)
		REFERENCES `orden` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipoGasto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipoGasto`;


CREATE TABLE `tipoGasto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tipoGasto_U_1` (`descripcion`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- gasto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `gasto`;


CREATE TABLE `gasto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tipoGasto` INTEGER  NOT NULL,
	`vehiculo` INTEGER  NOT NULL,
	`fechaGasto` DATE  NOT NULL,
	`importe` DECIMAL(20,2)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `gasto_FI_1` (`tipoGasto`),
	CONSTRAINT `gasto_FK_1`
		FOREIGN KEY (`tipoGasto`)
		REFERENCES `tipoGasto` (`id`),
	INDEX `gasto_FI_2` (`vehiculo`),
	CONSTRAINT `gasto_FK_2`
		FOREIGN KEY (`vehiculo`)
		REFERENCES `vehiculo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tarifa
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tarifa`;


CREATE TABLE `tarifa`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(50)  NOT NULL,
	`valor` DECIMAL(20,2)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tarifa_U_1` (`descripcion`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`first_name` VARCHAR(20),
	`last_name` VARCHAR(20),
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- remito
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `remito`;


CREATE TABLE `remito`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_orden` INTEGER  NOT NULL,
	`idVehiculo` INTEGER  NOT NULL,
	`fecha` DATE  NOT NULL,
	`horasTrab` INTEGER,
	`km_ini` DOUBLE,
	`km_fin` DOUBLE,
	`moneda` INTEGER,
	`total` DECIMAL(20,2)  NOT NULL,
	`detalle` VARCHAR(100)  NOT NULL,
	`liquidada` TINYINT,
	`proveedor` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `remito_FI_1` (`id_orden`),
	CONSTRAINT `remito_FK_1`
		FOREIGN KEY (`id_orden`)
		REFERENCES `orden` (`id`),
	INDEX `remito_FI_2` (`idVehiculo`),
	CONSTRAINT `remito_FK_2`
		FOREIGN KEY (`idVehiculo`)
		REFERENCES `vehiculo` (`id`),
	INDEX `remito_FI_3` (`moneda`),
	CONSTRAINT `remito_FK_3`
		FOREIGN KEY (`moneda`)
		REFERENCES `moneda` (`id`),
	INDEX `remito_FI_4` (`proveedor`),
	CONSTRAINT `remito_FK_4`
		FOREIGN KEY (`proveedor`)
		REFERENCES `proveedor` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
