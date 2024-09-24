/*Traitement des actions depuis la page rechercher/modifier un animal*/
var rechercheAnimal = document.getElementById('containeur');
var compteurAni =0;

rechercheAnimal.addEventListener('change',function(event){


let button =document.createElement('button');
button.className="btn btn-primary";
button.id="envoie";
button.innerText="Envoyez";
let contenerForm = document.getElementById('form-animal');
contenerForm.appendChild(button);

button.addEventListener('mouseover',function(event){
    compteurAni ++;
    
    if(event.target.id ==="envoie"){
        
        let animalName= $("#animal-recherche").val();
       
        const xhttp = new XMLHttpRequest();
        xhttp.open('POST','/backEnd/controllerGestionAnimaux.php',true);
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



  /*gestion des appels et récupération des données depuis la page modification */

   var modif = document.getElementById('containeur');
   
   modif.addEventListener('click',function(event){
     
     
     
   if(event.target.id =="modif-animal" && activMod ==2){
    
       let animalName= $("#name-change").val();
       let buttonName= $("#modif-animal").val();
       let idAnimal =$("#animal-id").val();
   
       let data= "animal-update="+buttonName+"&&animal-name="+animalName+"&animal-id="+idAnimal;
       updateAnimal(data);
   }
   });
   
   /*envoi données vers serveur pour Update*/
   
   function updateAnimal(data){
       
      
   const xhttp = new XMLHttpRequest();
   xhttp.open('POST','/backEnd/controllerGestionAnimaux.php',true);
   xhttp.onreadystatechange= function(){
   
       if(xhttp.readyState== 4 || xhttp == 200){

        let reponse = this.responseText;
           

           affichFenetre(reponse);
           
   
   
       }
       
   }
   xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   
       xhttp.send(data);
   }














   /* fonctions de suppression d'animaux*/


   var deleteAnimal = document.getElementById('containeur');

deleteAnimal.addEventListener('mouseenter',function(event){
    
    let tabAnimal = document.getElementById('tbAnimal');
    /*variable activ permet d'identifier la page d'ou vient la requete*/
    if(activ===25){
        
       
tabAnimal.addEventListener('click',function(event){
    


    if(event.target.id){
        let nombre = parseInt(event.target.id);
        
    
     let idAnimal = identificationNumberAnimal(nombre);
    
     supprimerAnimal(idAnimal);
    
        
    }
    
    
});
}

 



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
    
    xhttp.open('POST','/backEnd/controllerGestionAnimaux.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange =  function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){

 let reponse = this.responseText;
 affichFenetre(reponse);

        
 

    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("supr-animal="+animId);

}
let clickRapport=0;
/* ecouteur d évenements page rapports santé animaux*/
let contentRapport = document.getElementById('containeur');
contentRapport.addEventListener('click',function(event){
    clickRapport++;
    if(event.type==='click'&& activ === 10){
        let rapportid = event.target.id;
        

if(clickRapport >= 1){
clickRapport = 0;

reloadRapport(rapportid);
}else{
    
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
    
    xhttp.open('POST','/backEnd/controllerGestionRapports.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange =  function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){
       

let reponse = this.responseText;
 affichFenetre(reponse);
       

       
 


    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("recherche-rapport="+rapportId);

}
/*fenetre d'affichage reponse requete*/
function affichFenetre(reponse){



    
        let conteneurdiv=  document.createElement('div');
    let contentMessage = document.createElement('p');
    
    contentMessage.innerHTML=reponse;
    conteneurdiv.className="alert alert-success role='alert'";
   conteneurdiv.append(contentMessage);
   let resultRapport =  document.getElementById('containeur');
    resultRapport.appendChild(conteneurdiv);


}



/* ecouteur d'evement page rapport vétérinaire*/
   
 const breport = document.getElementById('containeur');

breport.addEventListener('mouseover',function(event){

    
if(event.target.id ==="ajout-rapport-veterinaire" && activEnr === 5){
    

    let champDetail = $("#rapport_Detail").val();
    let champSanté = $("#etat_de_santé_animal").val();
    let buttonReport = $("#ajout-rapport-veterinaire").val();
    let selectedAnimal = $("#Id_Animal").val();
    let selectedUser = $("#Id_Employé").val();


    let data = "id-user="+selectedUser +"&champ-detail="+champDetail+"&id_animal="+selectedAnimal+"&rapport-santé="+champSanté+"&ajout-rapport-veterinaire="+buttonReport;

    recordFormVeto(data);
}
});


function recordFormVeto(data){



const xhttp =new XMLHttpRequest();
xhttp.open('POST','/backEnd/controllerGestionRapports.php',true);

xhttp.onreadystatechange =function(){

    if(xhttp.readyState == 4 || xhttp == 200){
        let reponse =this.responseText;
      affichFenetre(reponse);
    }
}
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send(data);

}





/* ecouteur d'evenement page ajouter un animal*/
   
const ajoutAnim= document.getElementById('containeur');

ajoutAnim.addEventListener('click',function(event){


if(event.target.id ==="ajout-animal" && activEnr === 1){
    let formData =new FormData();
let fichier = $('#animal-picture')[0].files[0];

formData.append('file',fichier);
    let anName = $("#animal-name").val();
    let idRace= $("#id_Race").val();
    let idHab = $("#habitat_id").val();
    let btnEnr = $("#ajout-animal").val();
    


    let data = "ani-name="+anName+"&id-race="+idRace+"&id-Hab="+idHab+"&btn-enr-ani="+btnEnr;
 enrfichier(data,formData);


}
});


function enrfichier(dt,formdata){

   $.ajax({
url:'/backEnd/controllerGestionAnimaux.php',
type:'post',
data:formdata,
contentType:false,
processData:false,
success:function(data){
    if(data !=0){
console.log('success fileuploaded '+data);
recordAnimal(dt,data);
    }
    else{
        alert('erreur');
    }
}
});





   }
    


function recordAnimal(data,formdt){


data += "&form-data="+formdt;

    const xhttp =new XMLHttpRequest();
    xhttp.open('POST','/backEnd/controllerGestionAnimaux.php',true);
    
    xhttp.onreadystatechange =function(){
    
        if(xhttp.readyState == 4 || xhttp == 200){
            let reponse =this.responseText;
          affichFenetre(reponse);
        }
    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    
    }
    
    