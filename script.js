let menuVisible = false;

//Función que oculta y muestra el menú
function mostrarOcultarMenu() {
    if(menuVisible) {
        document.getElementById("nav").classList="";
        menuVisible = false;
    } else {
        document.getElementById("nav").classList="responsive";
        menuVisible = true;
    }
}

function seleccionar() {
    //Una vez selecciono una opción, oculto el menú
    document.getElementById("nav").classList="";
    menuVisible = false;
}

//Función que aplica las animaciones de las skills
function efectoSkills() {
    var skills = document.getElementById("skills");
    var distanciaSkills = window.innerHeight - skills.getBoundingClientRect().top;
    if(distanciaSkills >= 300) {
        let habilidades = document.getElementsByClassName("progreso");
        habilidades[0].classList.add("javascript");
        habilidades[1].classList.add("react");
        habilidades[2].classList.add("node");
        habilidades[3].classList.add("express");
        habilidades[4].classList.add("postgresql");
        habilidades[5].classList.add("htmlcss");
        habilidades[6].classList.add("ibm");
        habilidades[7].classList.add("aprendizaje");
        habilidades[8].classList.add("trabajo");
        habilidades[9].classList.add("responsabilidad");
        habilidades[10].classList.add("resolucion");
        habilidades[11].classList.add("comunicacion");
        habilidades[12].classList.add("constancia");
    }
}

//Detecto el scrolling para activar la animación de las barras de skills
window.onscroll = function() {
    efectoSkills();
}