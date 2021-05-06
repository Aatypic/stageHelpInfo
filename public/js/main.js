






// Ajoute l'ombre sur la navbar quand on descend la molette souris.

window.addEventListener('scroll',(e)=>{
    const nav = document.querySelector('.navbar');
    if(window.pageYOffset>0){
      nav.classList.add("add-shadow");
    }else{
      nav.classList.remove("add-shadow");
    }
  });


// Ajout la couleur en arrière plan sur notre cadre de login, quand on descend avec la souris

  window.addEventListener('scroll',(e)=>{
    const nav = document.querySelector('.logged-in');
    if(window.pageYOffset>0){
      nav.classList.add("add-background");
    }else{
      nav.classList.remove("add-background");
    }
  });
