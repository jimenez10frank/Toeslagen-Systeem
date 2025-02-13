// toast boxje
const toastbox = document.getElementById('toastbox');

// Bouwt een toast op
function getToast(msg, icon){
    let toast = document.createElement('div');
    let wrap = document.createElement('i');
    let img = document.createElement('img');
    let para = document.createElement('p');
    
    // element opbouw
    toast.classList.add('toast');
    img.src = `./../Assets/Icons/${icon}.png`
    para.innerText = msg;
    wrap.appendChild(img);
    toast.appendChild(wrap)
    toast.appendChild(para)
    toastbox.append(toast);


    setTimeout(() => {
        toast.style.opacity = 0; // toast verdwijnen
    }, 8000);

    setTimeout(() => {
        toast.remove(); // toast verwijderen va html
    }, 10000);
}


// even listener op de telefoon nummer input element
document.getElementById('telefoonNummer').addEventListener('input', (e) => {
    // nieuwe inp opvangen en controleren ...
    let value = e.target.value; 

    // alles verwijderen die geen '+' teken, getal of spatie zijn
    value = value.replace(/[^+\d\s]/g, "");

    // Nederlandse nummer met '+31 6' moet in totaal 13 tekens lang zijn met spaties 
    if (value.length > 13) {
        value = value.slice(0, 13); // haal alles weg na 13e teken
    }

    // om te voorkomen dat mensen andere nummers gebruiken dan Nederlandse
    if (!value.startsWith('+31 6 ')) { 
        value = "+31 6 ";
    }

    // verwijder spaties na 5e index
    if (value.startsWith('+31 6 ')) {
        value = '+31 6 ' + value.slice(5).replace(/\s+/g, ''); 
    }

    e.target.value = value; // value bijwerken
})



// form controleren
document.querySelector('form').addEventListener('submit', (e) => {
    let geslacht = document.getElementById('geslacht').value;
    let email = document.getElementById('email').value.toLowerCase();

    // geldige email pattern
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    


    // geldige email controle
    if(!regex.test(email)){
        e.preventDefault();
        return getToast('Ongeldig e-mailadres. Voer een correct e-mailadres in.', 'cross');
    }
    

    // geslacht niet geselecteerd of waarde veranderd? ^._.^
    if(geslacht != "man" && geslacht != "vrouw" && geslacht != "anders"){
        e.preventDefault()
        return getToast('Selecteer alstublieft een geslacht voordat u verdergaat', 'information');
    }
})
