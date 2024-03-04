

  export function hamburgerMenu() {
  const hamButton = document.querySelector('.hamburger-button');
  const burgerCon = document.querySelector('#burger-con');

  function toggleMenu() {
    burgerCon.classList.toggle('slide-toggle');
    hamButton.classList.toggle('expanded');
  }

  hamButton.addEventListener('click', toggleMenu, false);
}
    
