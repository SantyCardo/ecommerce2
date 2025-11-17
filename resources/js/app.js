import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('.mobile-toggle');
  const nav = document.querySelector('.main-nav');
  const header = document.querySelector('.header');
  if (toggle && nav) {
    toggle.addEventListener('click', () => nav.classList.toggle('open'));
  }
  if (header) {
    const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 5);
    onScroll();
    window.addEventListener('scroll', onScroll);
  }
});