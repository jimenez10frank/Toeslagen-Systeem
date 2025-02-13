// navbalk elementen
const navBar = document.querySelector("nav");
const burger = document.querySelector(".checkbtn") // menu knop
const hamburgerMenu = document.getElementById('check'); // menu label
const mediaQuery = window.matchMedia("(min-width: 890px)"); // media query voor klenere schermen
const unsortedList = document.querySelector("nav ul"); // nav links
const regButton = document.querySelector(".registerKnop");




// registratie pagina knop
const listItem = document.createElement('li');
const link = document.createElement('a');
listItem.classList.add('registerHyp');
link.href = './sign_up.php';
link.textContent = 'Registreren';
listItem.appendChild(link);

// uitgebreede styling voor registerLink
Object.assign(link.style, {
    backgroundColor: '#01689b',
    borderRadius: '1vh',
    color: '#fff',
    padding: '1vh',
    borderRadius: '0.3vh',
    border: 'none',
    transition: 'all .3s',
    cursor: 'pointer'
});
// ---------------------------------------------------------------


// effect voor navbar 
hamburgerMenu.addEventListener('change', function () {
    if (this.checked && window.innerWidth >= 890) {
        navBar.style.backgroundColor = "rgb(21 66 115)";
        burger.style.color = "white";
    } else {
        navBar.style.backgroundColor = "";
        burger.style.color = "black";
    }
    // als het menu open is en gebruiker door scroolt, dan sluit het venster af
    window.addEventListener('scroll', () => {
        if (this.checked) {
            this.checked = false;
            navBar.style.backgroundColor = "";
            burger.style.color = "black";
        }
    });
});




// registratie knop verzetten in de UL
mediaQuery.addEventListener("change", (event) => {
    if (!event.matches) {
        regButton.remove();
        unsortedList.appendChild(listItem);
    } else {
        burger.before(regButton);
        unsortedList.removeChild(document.querySelector('.registerHyp'));
    }
});
