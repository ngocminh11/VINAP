import '../css/app.css';

const $ = s => document.querySelector(s);
const $$ = s => Array.from(document.querySelectorAll(s));

function applyTheme() { document.documentElement.classList.toggle('dark', (localStorage.getItem('theme') || 'light') === 'dark'); }
function toggleTheme() { const n = document.documentElement.classList.contains('dark') ? 'light' : 'dark'; localStorage.setItem('theme', n); applyTheme(); }

function setupProgress() {
    const bar = document.createElement('div'); bar.id = 'scrollProgress'; document.body.appendChild(bar);
    const sync = () => { const h = document.documentElement; const p = h.scrollTop / (h.scrollHeight - h.clientHeight); bar.style.width = `${p * 100}%`; };
    addEventListener('scroll', sync, { passive: true }); sync();
}
function setupReveal() {
    const els = $$('.reveal');
    if (!('IntersectionObserver' in window)) { els.forEach(el => el.classList.add('reveal--show')); return; }
    const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('reveal--show'); io.unobserve(e.target); } }), { rootMargin: '0px 0px -10% 0px' });
    els.forEach(el => io.observe(el));
}
function counters() {
    const io = new IntersectionObserver(es => es.forEach(e => {
        if (!e.isIntersecting) return;
        const el = e.target, end = +el.dataset.to || 0, dur = +el.dataset.dur || 1200, st = performance.now();
        const tick = t => { const p = Math.min((t - st) / dur, 1); el.textContent = Math.round(end * (0.2 + 0.8 * p)); if (p < 1) requestAnimationFrame(tick); };
        requestAnimationFrame(tick); io.unobserve(el);
    }), { threshold: .4 });
    $$('.counter').forEach(el => io.observe(el));
}
function headerUX() {
    const h = $('#siteHeader'); if (!h) return;
    const sync = () => h.classList.toggle('is-scrolled', scrollY > 8);
    addEventListener('scroll', sync, { passive: true }); sync();
    const btn = $('#btnMenu'), menu = $('#mobileMenu');
    if (btn && menu) btn.addEventListener('click', () => menu.classList.toggle('hidden'));
}
function deliveredSlider() {
    const slides = $$('#deliveredSlider .slide');
    const dots = $$('[data-dot]');
    if (!slides.length) return;
    let i = 0;
    const show = idx => { slides.forEach((s, k) => s.classList.toggle('hidden', k !== idx)); dots.forEach((d, k) => d.dataset.active = (k === idx)); };
    dots.forEach((d, k) => d.addEventListener('click', () => { i = k; show(i); }));
    setInterval(() => { i = (i + 1) % slides.length; show(i); }, 4000);
    show(0);
}

window.siteSearch = () => alert('Search mock, không DB.');

addEventListener('DOMContentLoaded', () => {
    applyTheme();
    setupProgress();
    setupReveal();
    counters();
    headerUX();
    deliveredSlider();
    const themeBtn = $('#themeToggle'); if (themeBtn) themeBtn.onclick = toggleTheme;
});
