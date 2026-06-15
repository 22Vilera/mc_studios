-- ============================================================
-- Mc Studios, C.A. — Script de Base de Datos de Marketing
-- Motor: MySQL 8.x | Charset: utf8mb4
-- ============================================================

CREATE DATABASE IF NOT EXISTS mc_studios_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE mc_studios_db;

CREATE TABLE IF NOT EXISTS leads_contacto (
  id              INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  nombre          VARCHAR(150)    NOT NULL COMMENT 'Nombre completo del prospecto',
  institucion     VARCHAR(200)    NOT NULL COMMENT 'Institución educativa o empresa',
  correo          VARCHAR(255)    NOT NULL COMMENT 'Correo electrónico de contacto',
  telefono        VARCHAR(30)         NULL COMMENT 'Teléfono o WhatsApp',
  mensaje         TEXT                NULL COMMENT 'Mensaje o requerimiento del prospecto',
  fecha_registro  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora de captación del lead',

  PRIMARY KEY (id),
  INDEX idx_correo        (correo),
  INDEX idx_fecha_registro (fecha_registro)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Tabla de leads captados desde el formulario web de marketing';
