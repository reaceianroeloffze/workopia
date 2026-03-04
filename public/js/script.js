const hamburgerBtn = document.querySelector('#hamburger');

hamburgerBtn.addEventListener('click', () => {
    const menu = document.querySelector('#mobile-menu');
    menu.classList.toggle('hidden')
});