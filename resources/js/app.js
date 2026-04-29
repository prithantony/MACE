const reveal = () => {
    document.querySelectorAll('.fade-up').forEach((element) => {
        const rect = element.getBoundingClientRect();
        if (rect.top < window.innerHeight - 80) {
            element.classList.add('is-visible');
        }
    });
};

window.addEventListener('scroll', reveal, { passive: true });
window.addEventListener('load', reveal);
reveal();

const menuButton = document.querySelector('[data-mobile-menu]');
const menuPanel = document.querySelector('[data-mobile-panel]');

menuButton?.addEventListener('click', () => {
    menuPanel?.classList.toggle('hidden');
});

const loginMenu = document.querySelector('[data-login-menu]');
const loginToggle = document.querySelector('[data-login-toggle]');
const loginDropdown = document.querySelector('[data-login-dropdown]');

const closeLoginMenu = () => {
    loginDropdown?.setAttribute('data-open', 'false');
    loginToggle?.setAttribute('aria-expanded', 'false');
};

loginToggle?.addEventListener('click', (event) => {
    event.stopPropagation();
    const isOpen = loginDropdown?.getAttribute('data-open') === 'true';
    loginDropdown?.setAttribute('data-open', isOpen ? 'false' : 'true');
    loginToggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
});

document.addEventListener('click', (event) => {
    if (!loginMenu?.contains(event.target)) {
        closeLoginMenu();
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        closeLoginMenu();
    }
});

const slides = [...document.querySelectorAll('[data-hero-slide]')];
let activeSlide = 0;

const showSlide = (index) => {
    slides.forEach((slide, slideIndex) => {
        slide.classList.toggle('is-active', slideIndex === index);
        slide.setAttribute('aria-hidden', slideIndex === index ? 'false' : 'true');
    });
};

if (slides.length > 0) {
    showSlide(activeSlide);

    window.setInterval(() => {
        activeSlide = (activeSlide + 1) % slides.length;
        showSlide(activeSlide);
    }, 5500);
}
