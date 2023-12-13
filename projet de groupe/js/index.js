let socialLinks = document.querySelectorAll(".social-media");

function socialHover(x) {
    if (x===0) {
       socialLinks[0].src = "../img/youtubeHover.png"; 
    } else if (x===1) {
        socialLinks[1].src = "../img/instagramHover.png";
    } else if (x===2) {
        socialLinks[2].src = "../img/twitterHover.png";
    }
}

let menuHeader = document.querySelector('.menu-header');
let headerSize = document.querySelector('.header-size');
let header = document.querySelector('.header');
function burger() {
    if (menuHeader.style.display !=="none") {
        menuHeader.style.display ="none";
        headerSize.classList.remove('burger-animation'); 
        headerSize.classList.add('burger-back-animation'); 
        header.style.height ="215px";
    } else {
        menuHeader.style.display ="flex";
        headerSize.classList.remove('burger-back-animation'); 
        headerSize.classList.add('burger-animation');
        header.style.height ="100vh";   
    }
}

let subscribeBox = document.querySelector(".inscription");
subscribeBox.style.display = "none";

function subscribe() {
    if (subscribeBox.style.display == "none") {
        subscribeBox.style.display = "flex";
    } else {
        subscribeBox.style.display = "none";
    }
}

let connectBox = document.querySelector(".connexion");
connectBox.style.display = "none";

function connect() {
    if (connectBox.style.display == "none") {
        connectBox.style.display = "flex";
    } else {
        connectBox.style.display = "none";
    }
}connectBox