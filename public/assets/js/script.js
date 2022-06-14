let sidenav = document.getElementById('mySidenav');
let openBtn = document.getElementById('openBtn');
let closeBtn = document.getElementById('closeBtn');
let hr = document.getElementById('header');

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add('active');
  hr.classList.remove('header');
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove('active');
  hr.classList.add('header');
}

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;
