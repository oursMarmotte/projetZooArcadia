const envoi = document.getElementById('envoi-data');
if(envoi){
envoi.addEventListener('click',envoyer);
}




/*fonctionenvoi de data*/


function envoyer(){
    
   const mail = $("#email").val();
   
   const xhttp = new XMLHttpRequest();
   xhttp.open('POST','/backEnd/routeurGestion.php',true);
   xhttp.onreadystatechange= function(){
    if(xhttp.readyState == 4 && xhttp.status== 200){
        document.getElementById('reponse').innerHTML=this.responseText;
    alert(this.responseText);
    }
}
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send("mail="+mail);

}

/*récupération des données depuis le formulaire */
const record = document.getElementById('containeur');

record.addEventListener('click',function(event){
    if(event.target.id ==="ajout-employé"){
        const userName =$("#user-name").val();
        const userEmail = $("#user-email").val();
        const UserPassword= $("#user-password").val();
        const userRole = $("#id_Role").val();
        const button = $("#ajout-employé").val();
        
        let data= "ajoutPassword="+UserPassword+"&&ajoutEmail="+userEmail+"&&ajoutIdrole="+userRole+"&&ajoutUsername="+userName+"&&ajoutEmployé="+button;
    
    
    recordUser(data);

    }

});


function recordUser(infoUser){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backEnd/routeurGestion.php',true);

    xhttp.onreadystatechange = function(){
    if(xhttp.readyState== 4 ||xhttp == 200){
    
    affichFenetre(this.responseText);
    
    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(infoUser);

}








function sendData()  {

    const xhttp = new XMLHttpRequest();
    const email =document.getElementById('mail').nodeValue();
    const username= document.getElementById('username').nodeValue();
    const password = document.getElementById('password').nodeValue();
    xhttp.onload = function(){
        document.getElementById('container').innerHTML =this.responseText;
    }
    xhttp.open('POST','/backEnd/routeurGestion.php',true)
    xhttp.send(email,username,password);

}



/*Traitement des actions depuis la page rechercher/modifier un employé */
var champNom = document.getElementById('containeur');
var click =0;

champNom.addEventListener('change',function(event){

  
let button =document.createElement('button');
button.className="btn btn-primary";
button.id="envoie-user";
button.innerText="Envoyez";
let contenerForm = document.getElementById('form-recherche');
contenerForm.appendChild(button);

button.addEventListener('click',function(event){
    click ++;
    
   
    if(event.target.id ==="envoie-user"){
        
        let userName= $("#recherche-username").val();
       
        const xhttp = new XMLHttpRequest();
        xhttp.open('POST','/backEnd/routeurGestion.php',true);
        xhttp.onreadystatechange = function(){
         
        
         if(xhttp.readyState== 4 || xhttp ==200){
         
         
            
                  
        ajoutElement(this.responseText);
         
       
         }
     
        }
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("userName="+userName);
        if(click >0){
            /*si bouton clicquer une fois et data transmises le bouton ainsi que le champ de saisie disparaissent*/
     contenerForm.remove(button);
        }
     }

});





/*reception données du serveur et affichage dans formulaire modification*/
function ajoutElement(reponse){

 const formulaire = reponse ;
    if(reponse){
    
   var conteneurC = document.createElement('p');
    conteneurC.innerHTML="nom de l'employé a modifier" ;
    
var conteneurB = document.createElement('div');
conteneurB.className="mb-3 card bg-secondary mx-auto ";
conteneurB.innerHTML=formulaire;
    var conteneurDiv = document.createElement('div');
    conteneurDiv.className="mb-3 card bg-secondary  justify-content-center align-items-center ";
    conteneurDiv.id="form-saisie";
    var conteneurA = document.getElementById('recherche-employé');

    conteneurA.append(conteneurDiv);
    conteneurDiv.appendChild(conteneurB);
    }else{
        alert("cet employé n'existe pas");
        /*contentReponse.innerHTML='CET employé n existe pas';*/
    }
    
}

/*
var resultat = false; */
  
}

);

/*gestion des appels depuis le bouton modif*/

var modif = document.getElementById('containeur');

modif.addEventListener('click',function(event){
  /*  event.preventDefault();*/
  
if(event.target.id==="modif-user"){
    
    update(event);
}
});

/*envoi données vers serveur pour Update*/

function update(ev){
    
    let userName= $("#user-name").val();
    let email = $("#user-mail").val();
    let idRole=$("#id_Role").val();
    let buttonName=$("#modif-user").val();
    let employeName =$("#staff-name").val();

    let data= "buttonName="+buttonName+"&&email="+email+"&&idRole="+idRole+"&&staffName="+userName+"&&employeName="+employeName;
const xhttp = new XMLHttpRequest();
xhttp.open('POST','/backEnd/routeurGestion.php',true);
xhttp.onreadystatechange= function(){

    if(xhttp.readyState== 4 || xhttp == 200){
        alert(this.responseText);
        let displayResponse = document.createElement('p');
        displayResponse.innerHTML= this.responseText;
        let contenerForm = document.getElementById('recherche-employé');
        contenerForm.appendChild(displayResponse);


    }
    
}
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.send(data);
}


/* fonctions de suppression employé*/

let deleteUser = document.getElementById('containeur');

deleteUser.addEventListener('click',function(event){
    

    if(activ===1){

        
    
      
        
        if(event.target.id){
            let nombre = parseInt(event.target.id);
        

        
        
        
               let nomUser = identificationUser(nombre);
               

            supprimerUtilisateur(nomUser);
            
        }



    
}
  
 



}
);



/*fonction d'identification de l'id de la liste*/
function identificationUser( count){
    let identifiant='employé-name'+count;
    let elem = document.getElementById(identifiant);
    return elem.innerHTML;
}

/*fonction de suppression de services*/
function supprimerUtilisateur(userId){
    
    let displayReponse = document.getElementById("affichage-reponse");
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backEnd/routeurGestion.php',true);
/**definition fonctionnement asynchrone async */
    xhttp.onreadystatechange = async function(){
       

    if(xhttp.readyState== 4 ||xhttp == 200){
       
  displayReponse.innerHTML ="Veuillez patienter....";

       await traitementChargement(chargementElements,3000);
        
        
       
        await traitementChargement(reponseServer,3000);

        
 

    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("supr-utilisateur="+userId);

}

/*affichage message utilisateur supprimé apres rechargement de la page*/
function reponseServer(){
  
    displayResponse=  document.getElementById("affichage-reponse");
    displayResponse.innerHTML= 'Utilisateur supprimé';
}

/*définition de la fonction asynchrone devant  rappeler les fonctions callback chargementElements et reponseServer */
function traitementChargement(fonction,millisecondes){
    return new Promise((resolve)=>{
        setTimeout(()=>{
            fonction(),
            resolve()
        },millisecondes)
    });
}
/*rechargment de la page Accès liste employé/suppression */
function chargementElements(){
  
    
    let fenetre = document.getElementById('containeur');
        let script = document.createElement("script");
        script.type="text/javascript";
        /*rechargement de la page */
        fenetre.append(script);
        script.innerHTML='navigation("/frontEnd/gestionEmployés/listeEmployés2.php");';
        
}



