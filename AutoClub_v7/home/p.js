
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', () => {
      alert('Pacote selecionado!');
    });
    
  });
/*    */
VanillaTilt.init(document.querySelector(".logo"), {
  max: 25,
  speed: 400
});