<?php
// Leer el estado del envío del formulario (redireccionado desde contacto.php)
$status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Mc Studios, C.A. — Transformación Digital Educativa con Estándares Globales. Ecosistema Smith Core para instituciones educativas en Venezuela." />
  <meta name="keywords" content="Smith Core, EdTech, transformación digital, gestión académica, Venezuela, Mc Studios" />
  <meta property="og:title" content="Mc Studios, C.A. — Innovación EdTech" />
  <meta property="og:description" content="Ecosistema digital Smith Core: Erradica los procesos manuales y centraliza la data académica." />
  <meta property="og:type" content="website" />
  <title>Mc Studios, C.A. — Innovación EdTech | Smith Core</title>

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Font Awesome 6 (iconos) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Hoja de estilos principal -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<!-- ============================================================
     TOAST DE ESTADO (inyectado por PHP tras redirección)
     ============================================================ -->
<?php if ($status === 'success'): ?>
<div class="toast toast--success" id="statusToast" role="alert">
  <i class="fas fa-check-circle"></i>
  <span>¡Solicitud enviada con éxito! Un asesor te contactará en menos de 24 horas.</span>
  <button class="toast__close" onclick="this.parentElement.remove()" aria-label="Cerrar">&times;</button>
</div>
<?php elseif ($status === 'error'): ?>
<div class="toast toast--error" id="statusToast" role="alert">
  <i class="fas fa-exclamation-circle"></i>
  <span>Error al enviar el formulario. Verifica los campos e inténtalo de nuevo.</span>
  <button class="toast__close" onclick="this.parentElement.remove()" aria-label="Cerrar">&times;</button>
</div>
<?php elseif ($status === 'db_error'): ?>
<div class="toast toast--error" id="statusToast" role="alert">
  <i class="fas fa-server"></i>
  <span>Error de servidor. Por favor, inténtalo más tarde o contáctanos por WhatsApp.</span>
  <button class="toast__close" onclick="this.parentElement.remove()" aria-label="Cerrar">&times;</button>
</div>
<?php endif; ?>


<!-- ============================================================
     NAVEGACIÓN
     ============================================================ -->
<nav class="navbar" id="navbar" aria-label="Navegación principal">
  <div class="container navbar__container">

    <a href="#inicio" class="navbar__logo" aria-label="Mc Studios, C.A. — Inicio">
      <img src="assets/img/logo.png" alt="Mc Studios, C.A." class="navbar__logo-img" />
    </a>

    <ul class="navbar__menu" id="navMenu" role="list">
      <li><a href="#inicio"    class="nav-link">Inicio</a></li>
      <li><a href="#nosotros"  class="nav-link">Nosotros</a></li>
      <li><a href="#servicios" class="nav-link">Servicios</a></li>
      <li><a href="#equipo"    class="nav-link">Equipo</a></li>
      <li><a href="#contacto"  class="nav-link">Contacto</a></li>
    </ul>

    <a href="#contacto" class="btn btn--primary navbar__cta">Solicitar Demo</a>

    <button class="navbar__toggle" id="navToggle" aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="navMenu">
      <span></span><span></span><span></span>
    </button>

  </div>
</nav>


<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="hero" id="inicio" aria-labelledby="heroTitle">
  <div class="hero__bg-grid" aria-hidden="true"></div>
  <div class="hero__glow hero__glow--1" aria-hidden="true"></div>
  <div class="hero__glow hero__glow--2" aria-hidden="true"></div>

  <div class="container hero__container">

    <!-- Columna izquierda: Logo centrado -->
    <div class="hero__logo-col">
      <img src="assets/img/logo.png" alt="Mc Studios, C.A." class="hero__logo-img" />
    </div>

    <!-- Columna derecha: Contenido -->
    <div class="hero__text-col">

    <div class="hero__badge" aria-label="Versión actual del ecosistema">
      <span class="badge-dot" aria-hidden="true"></span>
      SmithCore™ Ecosystem &mdash; Versión 2026
    </div>

    <h1 class="hero__title" id="heroTitle">
      Transformación Digital<br />
      <span class="text-orange">Educativa</span> con<br />
      Estándares Globales
    </h1>

    <p class="hero__subtitle">
      Ecosistema digital <strong>Smith Core</strong>: Erradica los procesos manuales
      y centraliza la data académica de tu institución en una sola plataforma inteligente.
    </p>

    <div class="hero__actions">
      <a href="#contacto" class="btn btn--primary btn--lg">
        <i class="fas fa-rocket" aria-hidden="true"></i> Solicitar Demo
      </a>
      <!-- TODO: Reemplaza el número con el de tu empresa -->
      <a href="https://wa.me/584128802686?text=Hola%2C%20deseo%20hablar%20con%20un%20asesor%20de%20Mc%20Studios%20sobre%20Smith%20Core"
         target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--lg">
        <i class="fab fa-whatsapp" aria-hidden="true"></i> Contacto Directo
      </a>
    </div>

    <div class="hero__stats" aria-label="Estadísticas clave">
      <div class="stat">
        <span class="stat__number">+50</span>
        <span class="stat__label">Instituciones</span>
      </div>
      <div class="stat">
        <span class="stat__number">99.9%</span>
        <span class="stat__label">Uptime</span>
      </div>
      <div class="stat">
        <span class="stat__number">24/7</span>
        <span class="stat__label">Soporte</span>
      </div>
      <div class="stat">
        <span class="stat__number">100%</span>
        <span class="stat__label">Personalizable</span>
      </div>
    </div>

    </div><!-- /.hero__text-col -->
  </div>

  <div class="hero__scroll-indicator" aria-hidden="true">
    <div class="scroll-dot"></div>
  </div>
</section>


<!-- ============================================================
     NOSOTROS — Misión, Visión y Objetivo
     ============================================================ -->
<section class="about" id="nosotros">
  <div class="container">
    <div class="about__wrapper">

      <!-- Columna izquierda: Logo y datos de marca -->
      <div class="about__brand reveal">
        <div class="about__logo-box">
          <img src="assets/img/logo.png" alt="Mc Studios, C.A." class="about__logo-img" />
        </div>
        <p class="about__tagline">"Innovación local, estándares globales."</p>
        <div class="about__chips">
          <span class="chip">EdTech</span>
          <span class="chip">Smith Core</span>
          <span class="chip">Consultoría TI</span>
          <span class="chip">Venezuela</span>
        </div>
      </div>

      <!-- Columna derecha: MVV -->
      <div class="about__content">
        <span class="section-label">Quiénes Somos</span>
        <h2 class="section-title about__title">
          Propósito &amp; <span class="text-orange">Dirección</span>
        </h2>

        <div class="mvv-card reveal">
          <div class="mvv-card__icon"><i class="fas fa-bullseye"></i></div>
          <div class="mvv-card__body">
            <h3>Misión</h3>
            <p>Proveemos soluciones tecnológicas y consultoría en transformación digital para instituciones educativas y organizaciones. Convertimos procesos manuales en ecosistemas digitales robustos bajo estándares de ingeniería internacionales, elevando la competitividad regional hacia la excelencia global.</p>
          </div>
        </div>

        <div class="mvv-card reveal">
          <div class="mvv-card__icon mvv-card__icon--orange"><i class="fas fa-eye"></i></div>
          <div class="mvv-card__body">
            <h3>Visión</h3>
            <p>Para 2029, consolidarnos como la empresa líder en soluciones EdTech de la región central de Venezuela, con Smith Core reconocido por su excelencia en gestión institucional integral y proyectando nuestra innovación hacia mercados internacionales.</p>
          </div>
        </div>

        <div class="mvv-card reveal">
          <div class="mvv-card__icon mvv-card__icon--dark"><i class="fas fa-rocket"></i></div>
          <div class="mvv-card__body">
            <h3>Objetivo</h3>
            <p>Transformar la gestión operativa de instituciones educativas mediante el ecosistema Smith Core: erradicar la dependencia de procesos manuales, integrar la información en sistemas unificados y garantizar la seguridad total de la data académica con estándares internacionales.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- ============================================================
     SERVICIOS — Ecosistema Smith Core
     ============================================================ -->
<section class="services" id="servicios" aria-labelledby="serviciosTitle">
  <div class="container">

    <div class="section-header">
      <span class="section-label">Nuestras Soluciones</span>
      <h2 class="section-title" id="serviciosTitle">
        El Ecosistema <span class="text-orange">Smith Core</span>
      </h2>
      <p class="section-desc">
        Una suite completa de herramientas para la gestión académica y administrativa
        de tu institución educativa, construida con tecnología de clase mundial.
      </p>
    </div>

    <div class="services__grid">

      <article class="service-card reveal">
        <div class="service-card__icon" aria-hidden="true">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <h3>Gestión Académica</h3>
        <p>Control integral de matrículas, calificaciones, horarios y expedientes estudiantiles. Todo en tiempo real desde cualquier dispositivo.</p>
      </article>

      <article class="service-card reveal">
        <div class="service-card__icon" aria-hidden="true">
          <i class="fas fa-chart-line"></i>
        </div>
        <h3>Analytics &amp; BI</h3>
        <p>Dashboards inteligentes con KPIs académicos e institucionales. Toma decisiones basadas en datos, no en suposiciones.</p>
      </article>

      <article class="service-card reveal">
        <div class="service-card__icon" aria-hidden="true">
          <i class="fas fa-users-gear"></i>
        </div>
        <h3>Portal Estudiantil</h3>
        <p>Plataforma self-service 24/7 para estudiantes y docentes. Consulta de notas, horarios, constancias y comunicación institucional.</p>
      </article>

      <article class="service-card reveal">
        <div class="service-card__icon" aria-hidden="true">
          <i class="fas fa-file-invoice-dollar"></i>
        </div>
        <h3>Módulo Financiero</h3>
        <p>Automatización de cobros, facturación y reportes contables. Integración con bancas online y sistemas de pago locales.</p>
      </article>

      <article class="service-card reveal">
        <div class="service-card__icon" aria-hidden="true">
          <i class="fas fa-shield-halved"></i>
        </div>
        <h3>Seguridad &amp; Accesos</h3>
        <p>Roles y permisos granulares, auditoría completa de accesos y cumplimiento de normativas venezolanas e internacionales de datos.</p>
      </article>

      <article class="service-card reveal">
        <div class="service-card__icon" aria-hidden="true">
          <i class="fas fa-plug"></i>
        </div>
        <h3>Integraciones API</h3>
        <p>Conexión nativa con plataformas LMS, sistemas de pago y servicios en la nube mediante API REST documentada.</p>
      </article>

    </div>
  </div>
</section>


<!-- ============================================================
     EQUIPO — Directiva Mc Studios
     ============================================================ -->
<section class="team" id="equipo" aria-labelledby="equipoTitle">
  <div class="container">

    <div class="section-header">
      <span class="section-label">Nuestra Directiva</span>
      <h2 class="section-title" id="equipoTitle">
        El Equipo <span class="text-orange">Mc Studios</span>
      </h2>
      <p class="section-desc">
        Profesionales venezolanos con visión global, liderando la transformación
        digital educativa desde San Juan de los Morros, Guárico.
      </p>
    </div>

    <div class="team__grid">

      <!-- 1. Danilo Marín -->
      <article class="team-card reveal">
        <div class="team-card__avatar avatar--1" aria-hidden="true">DM</div>
        <div class="team-card__info">
          <h3 class="team-card__name">Danilo Marín</h3>
          <span class="team-card__role">Director Ejecutivo</span>
          <p class="team-card__dept">Presidencia</p>
          <div class="team-card__socials">
            <!-- TODO: Actualizar URL con perfil real -->
            <a href="https://linkedin.com/in/danilo-marin"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--linkedin"
               aria-label="LinkedIn de Danilo Marín">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/danilo-marin"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--github"
               aria-label="GitHub de Danilo Marín">
              <i class="fab fa-github"></i>
            </a>
          </div>
        </div>
      </article>

      <!-- 2. Carlos Hernández -->
      <article class="team-card reveal">
        <div class="team-card__avatar avatar--2" aria-hidden="true">CH</div>
        <div class="team-card__info">
          <h3 class="team-card__name">Carlos Hernández</h3>
          <span class="team-card__role">Dir. Finanzas y Administración</span>
          <p class="team-card__dept">Tesorería</p>
          <div class="team-card__socials">
            <a href="https://linkedin.com/in/carlos-hernandez"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--linkedin"
               aria-label="LinkedIn de Carlos Hernández">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/carlos-hernandez"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--github"
               aria-label="GitHub de Carlos Hernández">
              <i class="fab fa-github"></i>
            </a>
          </div>
        </div>
      </article>

      <!-- 3. Víctor Misel -->
      <article class="team-card reveal">
        <div class="team-card__avatar avatar--3" aria-hidden="true">VM</div>
        <div class="team-card__info">
          <h3 class="team-card__name">Víctor Misel</h3>
          <span class="team-card__role">Dir. Desarrollo de Negocios</span>
          <p class="team-card__dept">Alianzas Estratégicas</p>
          <div class="team-card__socials">
            <a href="https://linkedin.com/in/victor-misel"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--linkedin"
               aria-label="LinkedIn de Víctor Misel">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/victor-misel"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--github"
               aria-label="GitHub de Víctor Misel">
              <i class="fab fa-github"></i>
            </a>
          </div>
        </div>
      </article>

      <!-- 4. José Sánchez -->
      <article class="team-card reveal">
        <div class="team-card__avatar avatar--4" aria-hidden="true">JS</div>
        <div class="team-card__info">
          <h3 class="team-card__name">José Sánchez</h3>
          <span class="team-card__role">Lead Developer</span>
          <p class="team-card__dept">Ingeniería y Programación</p>
          <div class="team-card__socials">
            <a href="https://linkedin.com/in/jose-sanchez-dev"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--linkedin"
               aria-label="LinkedIn de José Sánchez">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/jose-sanchez-dev"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--github"
               aria-label="GitHub de José Sánchez">
              <i class="fab fa-github"></i>
            </a>
          </div>
        </div>
      </article>

      <!-- 5. Delwuin Zamora -->
      <article class="team-card reveal">
        <div class="team-card__avatar avatar--5" aria-hidden="true">DZ</div>
        <div class="team-card__info">
          <h3 class="team-card__name">Delwuin Zamora</h3>
          <span class="team-card__role">Dir. Consultoría y UX</span>
          <p class="team-card__dept">Experiencia de Usuario</p>
          <div class="team-card__socials">
            <a href="https://linkedin.com/in/delwuin-zamora"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--linkedin"
               aria-label="LinkedIn de Delwuin Zamora">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/delwuin-zamora"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--github"
               aria-label="GitHub de Delwuin Zamora">
              <i class="fab fa-github"></i>
            </a>
          </div>
        </div>
      </article>

      <!-- 6. Aníbal Vilera -->
      <article class="team-card reveal">
        <div class="team-card__avatar avatar--6" aria-hidden="true">AV</div>
        <div class="team-card__info">
          <h3 class="team-card__name">Aníbal Vilera</h3>
          <span class="team-card__role">Dir. Diseño Gráfico</span>
          <p class="team-card__dept">Identidad Visual</p>
          <div class="team-card__socials">
            <a href="https://linkedin.com/in/anibal-vilera"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--linkedin"
               aria-label="LinkedIn de Aníbal Vilera">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/anibal-vilera"
               target="_blank" rel="noopener noreferrer"
               class="social-link social-link--github"
               aria-label="GitHub de Aníbal Vilera">
              <i class="fab fa-github"></i>
            </a>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>


<!-- ============================================================
     FORMULARIO DE CONTACTO Y MARKETING
     ============================================================ -->
<section class="contact" id="contacto" aria-labelledby="contactoTitle">
  <div class="container">
    <div class="contact__wrapper">

      <!-- Info de contacto -->
      <div class="contact__info reveal">
        <span class="section-label">Habla con Nosotros</span>
        <h2 class="section-title" id="contactoTitle">
          ¿Listo para la <span class="text-orange">Transformación</span>?
        </h2>
        <p>
          Cuéntanos sobre tu institución y un asesor de Smith Core se pondrá en
          contacto contigo en menos de 24 horas hábiles.
        </p>
        <ul class="contact__details">
          <li>
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
            San Juan de los Morros, Guárico, Venezuela
          </li>
          <li>
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <!-- TODO: Actualizar con correo real -->
            anibalvilera200531@gmail.com
          </li>
          <li>
            <i class="fab fa-whatsapp" aria-hidden="true"></i>
            +58 412-880-2686
          </li>
          <li>
            <a href="https://www.instagram.com/mc.studios2026/" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-instagram" aria-hidden="true"></i>
              @mc.studios2026
            </a>
          </li>
          <li>
            <a href="https://www.facebook.com/profile.php?id=61590818249568" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-facebook-f" aria-hidden="true"></i>
              Mc Studios, C.A.
            </a>
          </li>
          <li>
            <a href="https://www.tiktok.com/@mc.studios.c.a" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-tiktok" aria-hidden="true"></i>
              @mc.studios.c.a
            </a>
          </li>
        </ul>
      </div>

      <!-- Formulario -->
      <div class="contact__form-wrapper reveal">
        <form class="contact-form"
              action="contacto.php"
              method="POST"
              id="contactForm"
              novalidate
              aria-label="Formulario de solicitud de demo">

          <div class="form-row">
            <div class="form-group">
              <label for="nombre">
                Nombre Completo <span class="required" aria-label="obligatorio">*</span>
              </label>
              <input type="text"
                     id="nombre"
                     name="nombre"
                     placeholder="Ej. Ana Pérez González"
                     required
                     minlength="2"
                     autocomplete="name" />
              <span class="form-error" id="error-nombre" role="alert" aria-live="polite"></span>
            </div>

            <div class="form-group">
              <label for="institucion">
                Institución o Empresa <span class="required" aria-label="obligatorio">*</span>
              </label>
              <input type="text"
                     id="institucion"
                     name="institucion"
                     placeholder="Ej. Universidad Nacional de Guárico"
                     required
                     autocomplete="organization" />
              <span class="form-error" id="error-institucion" role="alert" aria-live="polite"></span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="correo">
                Correo Electrónico <span class="required" aria-label="obligatorio">*</span>
              </label>
              <input type="email"
                     id="correo"
                     name="correo"
                     placeholder="nombre@institucion.edu.ve"
                     required
                     autocomplete="email" />
              <span class="form-error" id="error-correo" role="alert" aria-live="polite"></span>
            </div>

            <div class="form-group">
              <label for="telefono">Teléfono / WhatsApp</label>
              <input type="tel"
                     id="telefono"
                     name="telefono"
                     placeholder="+58 412-880-2686"
                     autocomplete="tel" />
            </div>
          </div>

          <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje"
                      name="mensaje"
                      rows="4"
                      placeholder="Cuéntanos brevemente qué necesita tu institución o empresa..."></textarea>
          </div>

          <button type="submit" class="btn btn--primary btn--full" id="submitBtn">
            <span class="btn-text">
              <i class="fas fa-paper-plane" aria-hidden="true"></i> Enviar Solicitud
            </span>
            <span class="btn-loading hidden" aria-live="polite">
              <i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Enviando...
            </span>
          </button>

          <p class="form-privacy">
            <i class="fas fa-lock" aria-hidden="true"></i>
            Tus datos están protegidos y no serán compartidos con terceros.
          </p>

        </form>
      </div>

    </div>
  </div>
</section>


<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="footer" aria-label="Pie de página">
  <div class="container">
    <div class="footer__grid">

      <!-- Marca y redes sociales -->
      <div class="footer__brand">
        <a href="#inicio" class="footer__logo-link" aria-label="Mc Studios inicio">
          <img src="assets/img/logo.png" alt="Mc Studios, C.A." class="footer__logo-img" />
        </a>
        <p>
          Consultería y Desarrollo de Sistemas de Información / EdTech.
          Transformando la educación venezolana con tecnología de clase mundial.
        </p>
        <div class="footer__socials" aria-label="Redes sociales de Mc Studios">
          <a href="https://www.instagram.com/mc.studios2026/"
             target="_blank" rel="noopener noreferrer"
             class="footer-social"
             aria-label="Instagram de Mc Studios">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.facebook.com/profile.php?id=61590818249568"
             target="_blank" rel="noopener noreferrer"
             class="footer-social"
             aria-label="Facebook de Mc Studios">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.tiktok.com/@mc.studios.c.a"
             target="_blank" rel="noopener noreferrer"
             class="footer-social"
             aria-label="TikTok de Mc Studios">
            <i class="fab fa-tiktok"></i>
          </a>
        </div>
      </div>

      <!-- Links: Plataforma -->
      <nav class="footer__links" aria-label="Links de plataforma">
        <h4>Plataforma</h4>
        <ul>
          <li><a href="#servicios">Smith Core</a></li>
          <li><a href="#servicios">Módulos</a></li>
          <li><a href="#contacto">Demo Gratuita</a></li>
          <li><a href="#contacto">Consultoría</a></li>
        </ul>
      </nav>

      <!-- Links: Empresa -->
      <nav class="footer__links" aria-label="Links de empresa">
        <h4>Empresa</h4>
        <ul>
          <li><a href="#equipo">Equipo Directivo</a></li>
          <li><a href="#contacto">Contacto</a></li>
          <li><a href="#">Política de Privacidad</a></li>
          <li><a href="#">Términos de Servicio</a></li>
        </ul>
      </nav>

    </div>

    <div class="footer__bottom">
      <p>&copy; 2026 Mc Studios, C.A. San Juan de los Morros, Venezuela. Innovación local, estándares globales.</p>
    </div>
  </div>
</footer>


<!-- ============================================================
     BOTÓN FLOTANTE DE WHATSAPP
     ============================================================ -->
<!-- WhatsApp corporativo Mc Studios: +58 412-880-2686 -->
<a href="https://wa.me/584128802686?text=Hola%2C%20me%20interesa%20conocer%20m%C3%A1s%20sobre%20el%20ecosistema%20Smith%20Core%20de%20Mc%20Studios.%20%C2%BFPueden%20brindarme%20m%C3%A1s%20informaci%C3%B3n%3F"
   target="_blank"
   rel="noopener noreferrer"
   class="whatsapp-float"
   aria-label="Hablar con un asesor en tiempo real vía WhatsApp">
  <i class="fab fa-whatsapp" aria-hidden="true"></i>
  <span class="whatsapp-float__tooltip" aria-hidden="true">
    Hablar con un asesor<br>en tiempo real
  </span>
</a>


<!-- Script principal -->
<script src="assets/js/main.js"></script>
</body>
</html>
