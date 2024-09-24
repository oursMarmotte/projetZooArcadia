/*Traitement des actions depuis la page rechercher/modifier un animal*/
var rechercheAnimal = document.getElementById('containeur');
var compteurAni =0;

rechercheAnimal.addEventListener('change',function(event){

alert("containeur");

let button =document.createElement('button');
button.className="btn btn-primary";
button.id="envoie";
button.innerText="Envoyez";
let contenerForm = document.getElementById('form-animal');
contenerForm.appendChild(button);

button.addEventListener('mouseover',function(event){
    compteurAni ++;
    alert("bouton");
    if(event.target.id ==="envoie"){
        
        let animalName= $("#animal-recherche").val();
       alert(animalName);
        const xhttp = new XMLHttpRequest();
        xhttp.open('POST','/backend/controllerGestionAnimaux.php',true);
        xhttp.onreadystatechange = function(){
         
        
         if(xhttp.readyState== 4 || xhttp ==200){
         
         
            
                  
        affichAnimalForm(this.responseText);
         
       
         }
     
        }
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("animalName="+animalName);
        if(compteurAni >0){
            /*si bouton clicquer une fois et data transmises le bouton ainsi que le champ de saisie disparaissent*/
     contenerForm.remove(button);
        }
     }

})});

function affichAnimalForm(reponse){
alert('affichAnimalForm');
    const formulaire = reponse ;
    
       if(reponse){
      var conteneurC = document.createElement('p');
       conteneurC.innerHTML="nom de l'animal à modifier" ;
       
   var conteneurB = document.createElement('div');
   conteneurB.className="mb-3 card bg-secondary mx-auto ";
   conteneurB.innerHTML=formulaire;
       var conteneurDiv = document.createElement('div');
       conteneurDiv.className="mb-3 card bg-secondary  justify-content-center align-items-center ";
       conteneurDiv.id="form-saisie";
       var conteneurA = document.getElementById('recherche-animal');
   
       conteneurA.append(conteneurDiv);
       conteneurDiv.appendChild(conteneurB);

       }else{
        alert("erreur serveur");
       }
       
       
   }


   /* fonctions de suppression d'animaux*/


   var deleteAnimal = document.getElementById('containeur');

deleteAnimal.addEventListener('mouseenter',function(event){
    

    let tabAnimal = document.getElementById('tbAnimal');
    /*variable activ permet d'identifier la page d'ou vient la requete*/
    if(activ===3){
        
       
tabAnimal.addEventListener('click',function(event){
    
alert("success liste animal "+activ);

    if(event.target.id){
        let nombre = parseInt(event.target.id);
        
    
     let idAnimal = identificationNumberAnimal(nombre);
    
     supprimerAnimal(idAnimal);
    
        
    }
    activ =0;
    
});
}
  /*  event.preventDefault();*/
 



}
);



/*fonction d'identification de l'id de la liste*/
function identificationNumberAnimal( count){
    let identifiant='animal-name'+count;
    let elem = document.getElementById(identifiant);
    return elem.innerHTML;
}


/*fonction de suppressionde services*/
function supprimerAnimal(animId){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backend/controllerGestionAnimaux.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange =  function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){
       
 alert(this.responseText);

        
 

    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("supr-animal="+animId);

}
let clickRapport=0;

let contentRapport = document.getElementById('containeur');
contentRapport.addEventListener('click',function(event){
    clickRapport++;
    if(event.type==='click'&& activ === 10){
        let rapportid = event.target.id;
        alert('Mesclics'+clickRapport);
        
        




if(clickRapport >= 1){
clickRapport = 0;
alert("fonction affich Fenetre 2");
reloadRapport(rapportid);
}else{
    alert("fonction affich Fenetre 1");
   
    rechercherRapport(rapportid);
}

    }

});


function reloadRapport(idreport){
  
    
    let fenetre = document.getElementById('containeur');
        let script = document.createElement("script");
        script.type="text/javascript";
        /*rechargement de la page */
        fenetre.append(script);
        script.innerHTML='navigation("/frontEnd/gestionAnimaux/formListRapports.php")';
       
       setTimeout(() => {
        rechercherRapport(idreport)  ;
      }, "3000");
       
}




function rechercherRapport(rapportId){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backend/controllerGestionRapports.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange =  function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){
       
 alert(this.responseText);
let reponse = this.responseText;
 affichFenetre(reponse);
       

       
 


    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("recherche-rapport="+rapportId);

}

function affichFenetre(reponse){



        alert("fonction affich Fenetre");
        let conteneurdiv=  document.createElement('div');
    let contentMessage = document.createElement('p');
    
    contentMessage.innerHTML=reponse;
    conteneurdiv.className="alert alert-success role='alert'";
   conteneurdiv.append(contentMessage);
   let resultRapport =  document.getElementById('containeur');
    resultRapport.appendChild(conteneurdiv);


}

   
 