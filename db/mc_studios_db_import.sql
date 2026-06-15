-- ============================================================
-- Mc Studios, C.A. — Importar en db4free.net
-- Solo ejecutar CREATE TABLE (sin CREATE DATABASE ni USE)
-- ============================================================

CREATE TABLE IF NOT EXISTS leads_contacto (
  id              INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  nombre          VARCHAR(150)    NOT NULL,
  institucion     VARCHAR(200)    NOT NULL,
  correo          VARCHAR(255)    NOT NULL,
  telefono        VARCHAR(30)         NULL,
  mensaje         TEXT                NULL,
  fecha_registro  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  INDEX idx_correo         (correo),
  INDEX idx_fecha_registro (fecha_registro)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
