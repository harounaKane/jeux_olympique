let btn_ajout = document.getElementsByClassName("btn_ajouter");
let ajout = document.getElementById("ajouter");

for(let i=0; i<btn_ajout.length; i++) {
     
     btn_ajout[i].addEventListener('click', () => {
          ajout.classList.toggle('d-none');
     });
};
