document.getElementById('mode-toggle').addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');
    const currentMode = document.body.classList.contains('dark-mode') ? 'Escuro' : 'Claro';
});


let fontSize = 16;

document.getElementById('increase-font').addEventListener('click', function () {
    fontSize += 2;
    document.body.style.fontSize = fontSize + 'px';
});

document.getElementById('decrease-font').addEventListener('click', function () {
    fontSize -= 2;
    document.body.style.fontSize = fontSize + 'px';
});
