
/*variable activ initialisé a 0 état modifié pour chaque page affichant une liste*/
let activ =0;
/*variable activEnr initialisé a 0 état modifié pour chaque page avec formulaire d'enregistrement*/

let activEnr =0;
/*variable activMod initialisé a 0 état modifié pour chaque page avec formulaire de modification*/
let activMod=0;

const route = ['/frontEnd/gestionEmployés/formulaireEmploye.php',
    '/frontEnd/gestionEmployés/listeEmployés2.php','/frontEnd/gestionEmployés/formulaireRechercheEmployé.php'];

/*chemin page enregistrer un employé*/

let employéEnr = document.getElementById('employé-enr');
employéEnr
.addEventListener("click",function(event){
    if(event.type ==='click'){
var chemin = route[0];
    navigation(chemin);
    
    }
});

/*chemin page liste des employés*/
let employéList = document.getElementById('employé-list');
employéList.addEventListener("click",function(event){
    if(event.type ==='click'){
        activ=1;
    var chemin = route[1];
    navigation(chemin);
    
    
                                                                                                                            
}
});

/*chemin page modifié un employé*/

let employéModification = document.getElementById('employé-modif');

employéModification.addEventListener("click",function(event){
    if(event.type==='click'){
        var chemin = route[2];
        navigation(chemin);
        
    }
});



function AffichEmployé(){
 
    const contentEmployé = document.getElementById('containeur');


     contenuA = document.createElement('div');
     contenuC = document.createElement('p');
     contenuA.appendChild(contenuC);


    contenuA.innerHTML= "liste des employés";
    contentEmployé.appendChild(contenuA);
    

}

/*fonction de navigation */
function navigation(chemin){
     
   
    alert(chemin);
     const xhttp = new XMLHttpRequest();
     xhttp.onload = function(){
         document.getElementById('containeur').innerHTML= this.responseText;
     }
 
     xhttp.open('GET',chemin);
     xhttp.send();
 
 }

/*-------------------------------------------GESTION---DES---ANIMAUX---------------------------------------------------*/ 

const routeAnimaux = ['/frontEnd/gestionAnimaux/formAjout.php' ,'/frontEnd/gestionAnimaux/formListSuppr.php','/frontEnd/gestionAnimaux/formRechercheModif.php'];


    /*chemin page enregistrer un animal*/

let animalEnregistrer = document.getElementById('animal-enr');
animalEnregistrer.addEventListener("click",function(event){
    
    if(event.type ==='click'){
        
var chemin = routeAnimaux[0];
    navigation(chemin);
    
    }
});


/*chemin page liste des animaux*/
let animauxList = document.getElementById('animal-list');
animauxList.addEventListener("click",function(event){
    if(event.type ==='click'){
    activ = 3;
    var chemin = routeAnimaux[1];
    navigation(chemin);
    
    
                                                                                                                            
}
});

/*chemin page modifié un animal*/

let animalModification = document.getElementById('animal-modif');

animalModification.addEventListener("click",function(event){
    if(event.type==='click'){
        var chemin = routeAnimaux[2];
        navigation(chemin);
        
    }
});

/*-------------------------------------------GESTION---DES--HABITATS---------------------------------------------------*/

const routeHabitat = ['/frontEnd/gestionHabitats/formAjout.php' ,'/frontEnd/gestionHabitats/formListSuppr.php','/frontEnd/gestionHabitats/formRechercheModif.php'];

  /*chemin page enregistrer un habitat*/

  let habitatEnregistrer = document.getElementById('habitat-enr');
  habitatEnregistrer.addEventListener("click",function(event){
    
      if(event.type ==='click'){
        activEnr = 3;
  var chemin = routeHabitat[0];
      navigation(chemin);
      
      }
  });


  /*chemin page liste des habitats*/
let habitatList = document.getElementById('habitat-list');
habitatList.addEventListener("click",function(event){
    if(event.type ==='click'){
        activ =4;
    var chemin = routeHabitat[1];
    navigation(chemin);
    
    
                                                                                                                            
}
});

/*chemin page modifier un habitat*/

let habitatModification = document.getElementById('habitat-modif')
habitatModification.addEventListener("click",function(event){
    if(event.type==='click'){
        activMod = 2;
        var chemin = routeHabitat[2];
        navigation(chemin);
        
    }
});


/*-------------------------------------------GESTION---DES--SERVICES---------------------------------------------------*/

const routeServices = ['/frontEnd/gestionServices/formAjout.php' ,'/frontEnd/gestionServices/formListSuppr.php','/frontEnd/gestionServices/formRechercheModif.php'];

 /*chemin page enregistrer un service*/
let menuEspaceréservé = document.getElementById('menu-espacereservé');
menuEspaceréservé.addEventListener('click',(event)=>{
    alert(event.target.id);
})
 let listEnregistrer = document.getElementById('service-enr');
 listEnregistrer.addEventListener("click",function(event){
     
     if(event.type ==='click'){
         
 var chemin = routeServices[0];
     navigation(chemin);
     
     }
 });

 /*chemin page modifier un service*/

let listModification = document.getElementById('service-modif')
listModification.addEventListener("click",function(event){
    alert("list-modif");
    if(event.type==='click'){
    activMod =3;
        var chemin = routeServices[2];
        navigation(chemin);
        
    }
});

 /*chemin page liste des services*/
 let serviceList = document.getElementById('service-list');
 serviceList.addEventListener("click",function(event){
     if(event.type ==='click'){
    activ=2;
     var chemin = routeServices[1];
     navigation(chemin);
     
     
                                                                                                                             
 }
 });
 