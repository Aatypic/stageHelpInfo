// Ajoute l'ombre sur la navbar quand on descend la roulette.

window.addEventListener('scroll',(e)=>{
    const nav = document.querySelector('.navbar');
    if(window.pageYOffset>0){
      nav.classList.add("add-shadow");
    }else{
      nav.classList.remove("add-shadow");
    }
  });



// Quand le User scroll en bas la bannière se réduit, titre banner h1.
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//     if (document.body.scrollTop >) {
        
//     }
// }