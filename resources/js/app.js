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
