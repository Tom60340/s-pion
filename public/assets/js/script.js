let sidenav = document.getElementById('mySidenav');
let openBtn = document.getElementById('openBtn');
let closeBtn = document.getElementById('closeBtn');
let hr = document.getElementById('hr_main');

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add('active');
  hr.hidden = true;
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove('active');
  hr.hidden = false;
}

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;
