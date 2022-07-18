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


/* searchbar */

function search_card() {
	let input = document.getElementById('searchBar').value
	input=input.toLowerCase();
	let x = document.getElementsByClassName('mission');
	
	for (i = 0; i < x.length; i++) {
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="block";
		}
	}
}
