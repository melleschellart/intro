// We pakken het canvas element en de 2D context
let canvas = document.getElementById('Canvas');
let draw = canvas.getContext('2d');

// We stellen de grootte van het canvas in
canvas.width = screen.width;
canvas.height = screen.height + 100;

function reportWindowSize() {
  heightOutput.textContent = window.innerHeight;
  widthOutput.textContent = window.innerWidth;
}

window.onresize = reportWindowSize;
// We maken een array om onze sterren in op te slaan
let starField = [];
for (let teller = 0; teller < 1000; teller++) {
  let x = Math.random() * canvas.width;
  let y = Math.random() * canvas.height - 50; // Laat sterren ook net buiten het zicht starten
  let starSize = Math.random() * 5;
  let speed = 1 / starSize;
  let Opacity = Math.random();
  let targetOpacity = Math.random();

  // We maken een ster-object en stoppen die in onze sterren array
  starField.push({ x, y, starSize, speed, Opacity, targetOpacity });
}

// Functie om de doorzichtigheid van de sterren te updaten
function changeOpacityzichtigheidAan(ster) {
  // Lerp functie voor vloeiende overgangen
  const interpoleren = (begin, eind, factor) => (1 - factor) * begin + factor * eind;
  let factor = 0.05;
  
  ster.Opacity = interpoleren(ster.Opacity, ster.targetOpacity, factor);

  // Af en toe veranderen we het doel van de doorzichtigheid
  if (Math.random() < 0.01) {
    ster.targetOpacity = Math.random() * 0.9 + 0.1;
  }
}

// De animatieloop
function animeerSterren() {
  requestAnimationFrame(animeerSterren);

  // We wissen het canvas voor de nieuwe tekening
  draw.clearRect(0, 0, canvas.width, canvas.height);

  // We gaan elke ster af en tekenen deze
  for (let ster of starField) {
    changeOpacityzichtigheidAan(ster);
    draw.fillStyle = `rgba(255, 255, 255, ${ster.Opacity})`;
    
    // We maken de ster een cirkel
    draw.beginPath();
    draw.arc(ster.x, ster.y, ster.starSize / 2, 0, Math.PI * 2);
    draw.fill();

    // De ster beweegt naar boven
    ster.y -= ster.speed;

    // Als de ster buiten het canvas valt, komt deze weer onderaan
    if (ster.y < -100) {
      ster.y = canvas.height;
    }
  }
}

// We starten de animatie.
animeerSterren();