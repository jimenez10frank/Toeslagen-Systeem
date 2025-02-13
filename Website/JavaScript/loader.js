// for fun  :D

// maak een div container voor preloader, met basis achtergrond voor de gif
const preloader = document.createElement('div');

// geparametiseerde styling 
Object.assign(preloader.style, {
    backgroundColor: 'white',
    position: 'fixed',
    top: '0',
    left: '0',
    width: '100%',
    height: '100%',
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center',
    zIndex: '9999'
});


// maakt een img element met preloader gif daarin en voegt hem in div container van boven
const spinner = document.createElement('img');
spinner.src = './../Assets/Images/preloader.gif';
spinner.alt = 'Bezig met laden...';
preloader.appendChild(spinner);
document.body.appendChild(preloader);


// als body geladen is haal preloader weg
window.onload = function () {
    document.body.removeChild(preloader);
};