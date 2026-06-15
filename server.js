/**
 * Mc Studios, C.A. — Smith Core Microservice
 * ─────────────────────────────────────────────────────────────
 * Servidor Node.js / Express preparado para integración
 * en tiempo real con el ecosistema Smith Core.
 *
 * Puerto: 3000 (sobreescribible con variable PORT)
 * Endpoint principal: GET /api/smithcore-status
 *
 * Instalación:  npm install
 * Desarrollo:   npm run dev
 * Producción:   npm start
 */

'use strict';

const express = require('express');
const cors    = require('cors');

const app  = express();
const PORT = process.env.PORT || 3000;

// ── Middleware ────────────────────────────────────────────────
app.use(cors());
app.use(express.json());

// ── GET /api/smithcore-status ─────────────────────────────────
// Devuelve el estado en tiempo real de los módulos del ecosistema Smith Core.
// Este endpoint será el punto de integración para dashboards institucionales.
app.get('/api/smithcore-status', (req, res) => {
  const uptimeSeconds = process.uptime();

  res.json({
    status:    'online',
    ecosystem: 'Smith Core',
    company:   'Mc Studios, C.A.',
    version:   '2.0.1',
    region:    'VE-GUA',
    uptime_seconds: Math.floor(uptimeSeconds),

    modules: {
      academic_management: {
        status:      'active',
        uptime:      '99.8%',
        description: 'Gestión académica integral (matrículas, calificaciones, expedientes)',
      },
      student_portal: {
        status:      'active',
        uptime:      '99.5%',
        description: 'Portal estudiantil self-service 24/7',
      },
      billing_system: {
        status:      'active',
        uptime:      '99.9%',
        description: 'Módulo financiero y de cobros automatizados',
      },
      analytics_dashboard: {
        status:      'active',
        uptime:      '98.7%',
        description: 'Business Intelligence y dashboards en tiempo real',
      },
      access_control: {
        status:      'active',
        uptime:      '99.9%',
        description: 'Seguridad, roles y auditoría de accesos',
      },
      api_gateway: {
        status:      'maintenance',
        uptime:      '97.2%',
        description: 'Gateway de integraciones externas y APIs de terceros',
      },
    },

    timestamp: new Date().toISOString(),

    meta: {
      docs:    'https://docs.smithcore.mcstudios.com.ve',
      support: 'soporte@mcstudios.com.ve',
      note:    'Endpoint de integración para arquitectura universitaria Smith Core',
    },
  });
});

// ── GET /health ───────────────────────────────────────────────
app.get('/health', (req, res) => {
  res.json({
    status:    'ok',
    service:   'smithcore-microservice',
    timestamp: new Date().toISOString(),
  });
});

// ── 404 fallback ──────────────────────────────────────────────
app.use((req, res) => {
  res.status(404).json({
    error:     'Endpoint no encontrado',
    available: ['/api/smithcore-status', '/health'],
  });
});

// ── Arranque del servidor ─────────────────────────────────────
app.listen(PORT, () => {
  console.log(`\n[Smith Core] Microservicio activo`);
  console.log(`[Smith Core] → http://localhost:${PORT}/api/smithcore-status\n`);
});

module.exports = app;
