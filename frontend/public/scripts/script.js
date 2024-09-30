const menuMobile = document.querySelector(".nav--menu");
const overlay = document.querySelector(".overlay-nav-mobile");

function openMenuMobile() {
    menuMobile.classList.add("open");
    console.log(overlay);
    overlay.classList.add("open");
  }
function closeMenuMobile() {
   menuMobile.classList.remove("open");
   overlay.classList.remove("open");
 }
  
  document.querySelector(".nav--burger").addEventListener("click", openMenuMobile);

  document.querySelector(".nav--menu__close").addEventListener("click", closeMenuMobile);
  overlay.addEventListener("click", closeMenuMobile);

  const passwordInput = document.getElementById('password');
  const showPasswordCheckbox = document.getElementById('show-password');

  showPasswordCheckbox.addEventListener('change', function () {
    if (this.checked) {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });