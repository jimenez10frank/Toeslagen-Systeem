// toast boxje
const toastbox = document.getElementById('toastbox');

// Bouwt een toast op
function getToast(msg, icon) {
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


// swiper //
const swiper = new Swiper(".swiper", {
    speed: 500,

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
// ------ //





// gezinssituatie
const aantalKinderen = document.getElementById('kinderen_aantal');
const verwijzer = document.getElementById('tAantalK');
const opvangUren = document.querySelector('.tOpvanguren');


// geeft aantal kinderen input om in te vullen indien van toepassing
const tInputs = document.querySelectorAll('input[name="gezinssituatie"]').forEach(radio => {
    radio.addEventListener('change', () => {
        aantalKinderen.style.display = radio.value === "met_kinderen" ? "block" : "none";

        if (aantalKinderen.style.display == 'block') {
            // kinderopvangtoeslag form weergeven
            opvangUren.style.display = 'block';
            setTimeout(() => {
                aantalKinderen.style.opacity = '1';
            }, 200);
            verwijzer.textContent = 'Vul Aantal Kinderen in';
        } else {
            aantalKinderen.style.opacity = '0';
            opvangUren.style.display = 'none';
            verwijzer.textContent = 'Kies of u alleenstaand bent, een partner heeft of kinderen heeft.';
        }
    })
});







// Form contorle 
document.querySelector('.tFbutton').addEventListener('click', (e) => {
    let inkomen = document.querySelector('.inkomen').value;
    let gezin = document.querySelector('input[name="gezinssituatie"]:checked');
    let aantalKind;
    let huurprijs = document.querySelector("#huurprijs").value;
    let typeVerzekering = document.querySelector('#verzekering').value;
    let kinderopvanguren = document.querySelector('#kinderopvanguren').value;

    if (inkomen <= 0 || gezin == undefined || huurprijs <= 0 || typeVerzekering == '') {
        
        return getToast('Vul alle verplichte velden in om door te gaan.', 'information');
    }

    if (gezin.value == 'met_kinderen') {
        aantalKind = document.querySelector('#aantal_kinderen').value;
    }

    if (aantalKind <= 0) {
        return getToast('Vul juiste aantal kinderen in', 'information');
    }

    if(kinderopvanguren > 40){
        return getToast('Kinderopvangtoeslag is beschikbaar voor maximaal 40 uur per maand.', 'information');
    }


    // ---------------------------Zorgtoeslag--------------------------
    let zorgtoeslag;

    // berekening
    switch (gezin.value) {
        //partner wordt mee berekend 
        case 'met_kinderen':
            zorgtoeslag = 243 - (0.056 * (inkomen - 39719));
            zorgtoeslag = zorgtoeslag > 243 ? 243 : zorgtoeslag
            if (aantalKind > 0) {
                zorgtoeslag += 20 * aantalKind;
            }

            break;
        // zonder kinderen
        case 'met_partner':
            zorgtoeslag = 243 - (0.056 * (inkomen - 50206));
            zorgtoeslag = zorgtoeslag > 243 ? 243 : zorgtoeslag;
            break
        // alleen
        case 'alleenstaand':
            zorgtoeslag = 127 - (0.056 * (inkomen - 25000));
            zorgtoeslag = zorgtoeslag > 127 ? 127 : zorgtoeslag;
            break;
        default:
            zorgtoeslag = 0;
            break;
    }

    zorgtoeslag = zorgtoeslag < 0 ? 0 : zorgtoeslag;



    // ------------------------------------------------------------------




    // ------------------------Huurtoeslag----------------------------
    let huurtoeslag;
    let inkomensgrens = 34000;
    let maxToeslag = 600;
    let drempel = 0.05;

    // berekening
    huurtoeslag = maxToeslag - (drempel * (inkomen - inkomensgrens));
    if (huurtoeslag > maxToeslag) {
        huurtoeslag = maxToeslag;
    }

    huurtoeslag = huurtoeslag < 0 ? 0 : huurtoeslag;
    // ------------------------------------------------------------------


    // ------------------------Kinderopvangtoeslag-----------------------------
    let kinderopvangtoeslag;

    // berekening
    if (aantalKind > 0 && kinderopvanguren > 0) {
        let maxUurtarief = 9.65;
        let vergoedingsPercentage = 0.75 + (aantalKind * 0.05);

        vergoedingsPercentage = vergoedingsPercentage > 1 ? 1 : vergoedingsPercentage;
        kinderopvangtoeslag = kinderopvanguren * maxUurtarief * vergoedingsPercentage;
    }

    // ------------------------Kinderopvangtoeslag-----------------------------

    displayOverview(zorgtoeslag, huurtoeslag, kinderopvangtoeslag);


});


function displayOverview(zorgtoeslag, huurtoeslag, kinderopvangtoeslag) {
    let aanvragen = false;
    let knop;
    if (zorgtoeslag > 0 || huurtoeslag > 0 || kinderopvangtoeslag > 0) {
        aanvragen = true;
        knop = `<a href="dashboard.php" class="tGoed"><button>Direct aanvragen</button></a>`;
    } else {
        knop = `<a href="dashboard.php" class="tPass"><button>Terug Naar Dashboard</button></a>`;
    }

    let Ztoeslag = zorgtoeslag > 0 ? `Je hebt recht op zorgtoeslag: €${zorgtoeslag}` : 'Je komt niet in aanmerking voor zorgtoeslag.';
    let Htoeslag = huurtoeslag > 0 ? `Je hebt recht op huurtoeslag: €${huurtoeslag}` : 'Je komt niet in aanmerking voor huurtoeslag.';
    let KToeslag = kinderopvangtoeslag > 0 ? `Je hebt recht op kinderopvangtoeslag: €${parseInt(kinderopvangtoeslag)}` : 'Je komt niet in aanmerking voor kinderopvangtoeslag.';
    const display = `
    <div class="swiper-slide tRes toeslagen-overview">
                            <img src="./../Assets/Images/monitoring.png" alt="foto">
                            <div class="tResTitel">
                                <h2>Controle</h2>
                                <h3 class="curv cSpec">Op basis van uw gegevens hebben we de volgende toeslagen
                                    berekend.
                                    Dit is een indicatie en kan afwijken van de definitieve beslissing van de
                                    Belastingdienst.</h3>
                                <h4 class="curv">slide naar volgende</h4>
                            </div>
                        </div>
                        <div class="swiper-slide toeslagen-overview">
                            <div class="toeslag-item">
                                <img src="./../Assets/Images/insurance.png" alt="foto">
                                <h2>Zorgtoeslag</h2>
                                <h3 class="curv cSpec">${Ztoeslag}</h3>
                            </div>
                            
                            <div class="toeslag-item">
                                <img src="./../Assets/Images/management.png" alt="foto">
                                <h2>Huurtoeslag</h2>
                                <h3 class="curv cSpec">${Htoeslag}</h3>
                            </div>
                            
                            <div class="toeslag-item">
                                <img src="./../Assets/Images/boy.png" alt="foto">
                                <h2>Kinderopvangtoeslag</h2>
                                <h3 class="curv cSpec">${KToeslag}</h3>
                            </div>
                            ${knop}
                        </div>
                        `;
    const wrapper = document.querySelector('.swiper-wrapper');
    wrapper.innerHTML = display;



}