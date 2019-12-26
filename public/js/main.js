window.onload = function() {
/* var i = 100;

var counterBack = setInterval(function() {
        i--;
    if (i > 0) {
       $('.progress-bar').css('width', i + '%');
    } else {
        clearInterval(counterBack);
    }

}, 100); */
var portada = document.querySelector('#portada');
var elSection = document.querySelector('section');
var elBody = document.querySelector('body');
var elMain = document.querySelector('main');
var elBoton = document.querySelector('#elBoton');
var elBoton2 = document.querySelector('#elBoton2');
elBoton.onclick = function(){
    portada.style.backgroundColor = 'white';
    elBody.style.filter = 'grayscale(100%)';
    elBody.style.backgroundColor = 'white';
    elMain.style.filter = 'grayscale(100%)';
    elSection.style.filter = 'grayscale(100%)';
}
elBoton2.onclick = function(){
    portada.style.backgroundColor = 'rgb(255, 152, 52)';
    elBody.style.filter = 'grayscale(0)';
    elBody.style.backgroundColor = 'rgb(255, 152, 52)';
    elMain.style.filter = 'grayscale(0)';
    elSection.style.filter = 'grayscale(0)';
}
}