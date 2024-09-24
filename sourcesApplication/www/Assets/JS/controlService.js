
/*requete et fonctions de suppression de service*/




var deleteService = document.getElementById('containeur');

deleteService.addEventListener('mouseenter',function(event){

    let tabservice = document.getElementById('tbServices');
    /*variable activ permet d'identifier la page d'ou vient la requete*/
    if(activ===2){
        
    
tabservice.addEventListener('click',function(event){
    
alert("successetat var 3 "+activ);

    if(event.target.id){
        let nombre = parseInt(event.target.id);
        
    
     let idservice = identificationNumberService(nombre);
    
     supprimerService(idservice);
     
        
    }

    activ =0;
});
}
  /*  event.preventDefault();*/
 



}
);



/*fonction d'identification de l'id de la liste*/
function identificationNumberService( count){
    let identifiant='zoo-services'+count;
    let elem = document.getElementById(identifiant);
    return elem.innerHTML;
}


/*fonction de suppressionde services*/
function supprimerService(serviceId){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backEnd/controllerGestionServices.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange =  function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){
       
 alert(this.responseText);

        
 

    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("supr-service="+serviceId);

}


/*Traitement des actions de modification depuis la page rechercher/modifier un Service*/
var rechercheService = document.getElementById('containeur');
let compteurService =0;

rechercheService.addEventListener('change',function(event){



let button =document.createElement('button');
button.className="btn btn-primary";
button.id="envoie-service";
button.innerText="Envoyez";
let contenerForm = document.getElementById('form-service');
contenerForm.appendChild(button);


button.addEventListener('click',function(event){
    event.stopPropagation();
    
    compteurService ++;
    

    
    
    if(event.target.id ==="envoie-service"&& activMod ===3){
        
        let serviceName= $("#service-nom").val();
       
       envoiReponseService(serviceName);
       
        
        alert(compteurService);
        if(compteurService >0){
            /*si bouton clicquer une fois et data transmises le bouton ainsi que le champ de saisie disparaissent*/
     contenerForm.remove(button);
     
        }
        activMod=0;
     }

});




});



/*fonction d'envoi de données*/

function envoiReponseService(serviceName){

    const xhttp = new XMLHttpRequest();
    xhttp.open('POST','/backEnd/controllerGestionServices.php',true);
    xhttp.onreadystatechange = function(){
     
    
     if(xhttp.readyState== 4 || xhttp ==200){
     
     
         
        
            
    affichFormService(this.responseText);
     
   
     }
 
    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("service-name="+serviceName);
}




/*reception données du serveur et affichage dans formulaire modification*/
function affichFormService(reponse){

    const formulaire = reponse ;
      if(reponse){
    
      var conteneurC = document.createElement('p');
       conteneurC.innerHTML="nom du service a modifier" ;
       
   var conteneurB = document.createElement('div');
   conteneurB.className="mb-3 card bg-success mx-auto ";
   conteneurB.innerHTML=formulaire;
       var conteneurDiv = document.createElement('div');
       conteneurDiv.className="mb-3 card bg-success  justify-content-center align-items-center ";
       conteneurDiv.id="service-saisie";
       var conteneurA = document.getElementById('recherche-service');
   
       conteneurA.append(conteneurDiv);
       conteneurDiv.appendChild(conteneurB);
       }else{
           alert("erreur serveur");
           
       }
       
   }
   
   /*fonction d'enregistrement de service */
   const ajoutService= document.getElementById('containeur');

   ajoutService.addEventListener('click',function(event){



    if(event.target.id ==="ajout-service" && activEnr === 4){
  
    
    
        let serviceName = $("#service-name").val();
        let serviceDescription = $("#service-description").val();
        let userId = $("#Id_Employé").val();
        let btnEnr = $("#ajout-service").val();
        
    
    
        let data = "name-service="+serviceName+"&service-description="+serviceDescription+"&user-id="+userId+"&btn-service="+btnEnr;
    recordService(data);
    
    }
    });



    function recordService(dt){
const xhttp =new XMLHttpRequest();
xhttp.open('POST','/backEnd/controllerGestionServices.php',true);
xhttp.onreadystatechange =function(){

    if(xhttp.readyState == 4 || xhttp==200){
        alert(this.responseText);
        affichFenetre(this.responseText);
    }
}
xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xhttp.send(dt);
    }