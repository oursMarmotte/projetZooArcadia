var deleteHabitat = document.getElementById('containeur');

deleteHabitat.addEventListener('mouseenter',function(event){

    
    let tabHabitat = document.getElementById('tbHabitat');
    /*variable activ permet d'identifier la page d'ou vient la requete*/
    if(activ===4){
       
    
tabHabitat.addEventListener('click',function(event){
    
    

    if(event.target.id){

        
       let nombre = parseInt(event.target.id);
        
    
     let idHabitat = identificationNumberHabitat(nombre);
    
     supprimerHabitat(idHabitat);
    
        
    }
    activ = 0;
    
});
}
  /*  event.preventDefault();*/
 



}
);



/*fonction d'identification de l'id de la liste*/
function identificationNumberHabitat( count){
    
    let identifiant='habitat-name'+count;
    let elem = document.getElementById(identifiant);
    return elem.innerHTML;
}


/*fonction de suppressionde services*/
function supprimerHabitat(habitatId){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backend/controllerGestionHabitat.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange =  function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){
       
 alert(this.responseText);

        
 

    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("supr-Habitat="+habitatId);

}




/*récupération des données depuis le formulaire ajoute un habitat*/
const formHabitat = document.getElementById('containeur');

formHabitat.addEventListener('click',function(event){
    
    if(event.target.id ==="ajout-habitat"&& activEnr===3){
        const habitatName =$("#habitat-name").val();
        const habitatDescription = $("#habitat-description").val();
        const buttonHabitat = $("#ajout-habitat").val();
        
        let data= "habitat-name="+habitatName+"&&habitat-description="+habitatDescription+"&&button-habitat="+buttonHabitat;
   

    recordHabitat(data);
    activEnr = 0;


    }


});


function recordHabitat(infoHabitat){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backend/controllerGestionHabitat.php',true);

    xhttp.onreadystatechange = function(){
    if(xhttp.readyState== 4 ||xhttp == 200){
    let reponse = this.responseText;
    affichFenetre(reponse);
    
    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(infoHabitat);

}



/*Traitement des actions depuis la page rechercher/modifier un habitat*/
var rechercheHabitat = document.getElementById('containeur');
var compteurHabi =0;

rechercheHabitat.addEventListener('change',function(event){



let button =document.createElement('button');
button.className="btn btn-primary";
button.id="envoie-habitat";
button.innerText="Envoyez";
let contenerForm = document.getElementById('form-habitat');
contenerForm.appendChild(button);


button.addEventListener('click',function(event){
    
    
    compteurHabi ++;
    

    
    
    
    
    if(event.target.id ==="envoie-habitat" && activMod==14){
        
        let habitatName= $("#habitat-recherche").val();
    
       envoiReponseServ(habitatName);
       
        
        
        if(compteurHabi >0){
            /*si bouton cliquer une fois et data transmises le bouton ainsi que le champ de saisie disparaissent*/
     contenerForm.remove(button);
     
        }
        
     }

});




});



/*fonction d'envoi de données*/

function envoiReponseServ(habitatName){

    const xhttp = new XMLHttpRequest();
    xhttp.open('POST','/backend/controllerGestionHabitat.php',true);
    xhttp.onreadystatechange = function(){
     
    
     if(xhttp.readyState== 4 || xhttp ==200){
     
     
         
            
            
    affichHabitatForm2(this.responseText);
     
   
     }
 
    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("habitatName="+habitatName);
}




/*reception données du serveur et affichage dans formulaire modification*/
function affichHabitatForm2(reponse){

    const formulaire = reponse ;
       if(reponse){
       
      var conteneurC = document.createElement('p');
       conteneurC.innerHTML="nom de l'habitat a modifier" ;
       
   var conteneurB = document.createElement('div');
   conteneurB.className="mb-3 card bg-secondary mx-auto ";
   conteneurB.innerHTML=formulaire;
       var conteneurDiv = document.createElement('div');
       conteneurDiv.className="mb-3 card bg-secondary  justify-content-center align-items-center ";
       conteneurDiv.id="form-saisie";
       var conteneurA = document.getElementById('recherche-habitat');
   
       conteneurA.append(conteneurDiv);
       conteneurDiv.appendChild(conteneurB);
       }else{
           alert("erreur serveur");
           
       }
       
   }
   

    /*gestion des appels et récupération des données depuis la page modification */

    var modif = document.getElementById('containeur');
   
    modif.addEventListener('click',function(event){
      /*  event.preventDefault();*/
    
    
    if(event.target.id =="modif-habitat"){
     alert("modi habitat");
        let habitatName= $("#habitat-name").val();
        let habitatDescription= $("#habitat-description").val();
        let habitatId =$("#habitat-id").val();
        let buttonName ="modifhabitat";
    
        let data= "habitat-name="+habitatName+"&&habitat-description="+habitatDescription+"&habitat-id="+habitatId+"&modification="+buttonName;
      
       
        updateHabitat(data);
    }
    });

    
    /*envoi données vers serveur pour Update*/
    
    function updateHabitat(data){
        
        
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST','/backend/controllerGestionHabitat.php',true);
    xhttp.onreadystatechange= function(){
    
        if(xhttp.readyState== 4 || xhttp == 200){
 
         let reponse = this.responseText;
            
 
            affichFenetre(reponse);
            
    
    
        }
        
    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhttp.send(data);
    }
 




   /*Formulaire de saisie commentaire vétérinaire/habitat*/

   const commentReport = document.getElementById('containeur');

   commentReport.addEventListener('mouseover',function(event){
   
      
   if(event.target.id ==="ajout-rapport-habitat" && activEnr === 6){
    alert(activEnr);
    alert(event.target.id);
       let champDetail = $("#comment_Detail").val();
       let habitatId = $("#habitat_id").val();
       let selectedUser = $("#Id_Employé").val();
       let btnAjoutComment = $("#Id_Animal").val();
   
   
       let data = "id-user="+selectedUser +"&champ-detail="+champDetail+"&habitat_id="+habitatId+"&btn-comment="+btnAjoutComment;
   
       recordCommentVeto(data);
   }
   });
   
   
   function recordCommentVeto(data){
   
   
   
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
   



   