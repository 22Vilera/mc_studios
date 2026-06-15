/* ============================================================
   Mc Studios, C.A. — JavaScript Principal
   ============================================================ */

(() => {
  'use strict';

  /* ── Navbar: efecto de scroll ──────────────────────────── */
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
    highlightActiveSection();
  }, { passive: true });

  /* ── Navbar: menú móvil ────────────────────────────────── */
  const navToggle = document.getElementById('navToggle');
  const navMenu   = document.getElementById('navMenu');

  navToggle?.addEventListener('click', () => {
    const isOpen = navMenu.classList.toggle('open');
    navToggle.setAttribute('aria-expanded', String(isOpen));
  });

  navMenu?.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
    });
  });

  /* ── Navbar: resaltar sección activa ───────────────────── */
  const sectionIds = ['inicio', 'nosotros', 'servicios', 'equipo', 'contacto'];
  const navLinks   = document.querySelectorAll('.nav-link');

  function highlightActiveSection() {
    let current = '';
    sectionIds.forEach(id => {
      const el = document.getElementById(id);
      if (el && window.scrollY >= el.offsetTop - 90) current = id;
    });
    navLinks.forEach(link => {
      link.classList.toggle('active', link.getAttribute('href') === '#' + current);
    });
  }
  highlightActiveSection();

  /* ── Scroll Reveal con IntersectionObserver ────────────── */
  const revealEls = document.querySelectorAll('.reveal');
  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry, idx) => {
        if (!entry.isIntersecting) return;
        setTimeout(
          () => entry.target.classList.add('visible'),
          idx * 90
        );
        revealObserver.unobserve(entry.target);
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
  );
  revealEls.forEach(el => revealObserver.observe(el));

  /* ── Toast: auto-cierre a los 6 segundos ──────────────── */
  const toast = document.getElementById('statusToast');
  if (toast) {
    setTimeout(() => {
      toast.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
      toast.style.opacity    = '0';
      toast.style.transform  = 'translateX(120%)';
      setTimeout(() => toast.remove(), 400);
    }, 6000);
  }

  /* ── Validación del formulario de contacto ─────────────── */
  const form = document.getElementById('contactForm');
  if (!form) return;

  const validators = {
    nombre:      v => v.trim().length >= 2   ? '' : 'Ingresa tu nombre completo (mínimo 2 caracteres).',
    institucion: v => v.trim().length >= 2   ? '' : 'Ingresa el nombre de tu institución o empresa.',
    correo:      v => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim()) ? '' : 'Ingresa un correo electrónico válido.',
  };

  function validateField(field) {
    const rule = validators[field.name];
    if (!rule) return true;
    const msg = rule(field.value);
    const errEl = document.getElementById('error-' + field.name);
    field.classList.toggle('is-invalid', !!msg);
    if (errEl) errEl.textContent = msg;
    return !msg;
  }

  Object.keys(validators).forEach(name => {
    const field = form.elements[name];
    if (field) field.addEventListener('blur', () => validateField(field));
    if (field) field.addEventListener('input', () => {
      if (field.classList.contains('is-invalid')) validateField(field);
    });
  });

  form.addEventListener('submit', (e) => {
    let allValid = true;
    Object.keys(validators).forEach(name => {
      const field = form.elements[name];
      if (field && !validateField(field)) allValid = false;
    });

    if (!allValid) {
      e.preventDefault();
      form.querySelector('.is-invalid')?.focus();
      return;
    }

    /* Estado de carga del botón */
    const btnText    = form.querySelector('.btn-text');
    const btnLoading = form.querySelector('.btn-loading');
    const submitBtn  = document.getElementById('submitBtn');
    if (btnText && btnLoading && submitBtn) {
      btnText.classList.add('hidden');
      btnLoading.classList.remove('hidden');
      submitBtn.disabled = true;
    }
  });

})();
