// navigatie/scroll elementen om navbar te uitvouwen.
const navbar = document.querySelector(".navb");
let laatsteScrollTop = 0;

// navbalk verbergen als je de pagina beneden scroolt
window.addEventListener("scroll", (e) => {
    let scrollTop = document.documentElement.scrollTop;

    if (scrollTop > laatsteScrollTop) {
        navbar.style.top = '-30vh';
        // als je pagina boven scroolt dan verschijnt de navbalk 
    } else {
        navbar.style.top = '0';
    }
    laatsteScrollTop = scrollTop;
});
