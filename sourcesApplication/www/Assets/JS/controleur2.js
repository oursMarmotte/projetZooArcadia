const envoi = document.getElementById('envoi-data');
if(envoi){
envoi.addEventListener('click',envoyer);
}




/*fonctionenvoi de data   A VERIFIER !!*/


function envoyer(){
    
   const mail = $("#email").val();
   
   const xhttp = new XMLHttpRequest();
   xhttp.open('POST','/backend/routeurGestion.php',true);
   xhttp.onreadystatechange= function(){
    if(xhttp.readyState == 4 && xhttp.status== 200){
        document.getElementById('reponse').innerHTML=this.responseText;
    alert(this.responseText);
    }
}
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send("mail="+mail);

}



/*enregistrement d'employés page Ajouter Employé */
const record = document.getElementById('main');

record.addEventListener('click',function(event){



    
        if(event.target.id === 'ajout-employé'){
            
    
        const userName =$("#user-name").val();
        const userEmail = $("#user-email").val();
        const UserPassword= $("#user-password").val();
        const userRole = $("#id_Role").val();
        const button = $("#ajout-employé").val();
        
        let data= "ajoutPassword="+UserPassword+"&&ajoutEmail="+userEmail+"&&ajoutIdrole="+userRole+"&&ajoutUsername="+userName+"&&ajoutEmployé="+button;
    
    
    recordUser(data); 
    exit();
    
        }
    

});

/* fonction d'enregistrement d'employé*/


function recordUser(infoUser){
    
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backend/routeurGestion.php',true);

    xhttp.onreadystatechange = function(){
    if(xhttp.readyState== 4 ||xhttp == 200){
    
    
    document.getElementById('ajout-message').innerHTML='<p class="text-success">'+this.responseText+'</p>';
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
    xhttp.open('POST','/backend/routeurGestion.php',true)
    xhttp.send(email,username,password);

}



/*Traitement des actions depuis la page rechercher/modifier un employé */

var champNom = document.getElementById('containeur');


champNom.addEventListener('mouseenter',function(event){

   let champUsername = document.getElementById('recherche-username');
champUsername.addEventListener('click',function(event)
{
    event.stopPropagation();
    alert("champenfant");
    
    var click =0;
    let button =document.createElement('button');
    button.className="btn btn-primary";
    button.id="envoie";
    button.innerText="Envoyez";
    let contenerForm = document.getElementById('form-recherche');
    contenerForm.appendChild(button);
    
    button.addEventListener('click',function(event){
        click ++;
        event.stopPropagation();
        alert(event.target.id);
        if(event.target.id ==="envoie"){
            
            let userName= $("#recherche-username").val();
           
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST','/backend/routeurGestion.php',true);
            xhttp.onreadystatechange = function(){
             
            
             if(xhttp.readyState== 4 || xhttp ==200){
             
             
                 alert(click);
                      
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



});

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
  


/*gestion des appels depuis le bouton modif*/

var modif = document.querySelector('main');

modif.addEventListener('click',function(event){
  /*  event.preventDefault();*/
  
if(event.target.id==="modif-user"){
    event.preventDefault();
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
xhttp.open('POST','/backend/routeurGestion.php',true);
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


/* page acces liste employé et supression*/

var deleteUser = document.querySelector('#containeur');
deleteUser.addEventListener('click',function(event){
  /*  event.preventDefault();*/
 

if(event.target.id){
    let nombre = parseInt(event.target.id);
    let listeEmployé = document.querySelector('#tbEmployé');
    /*let numberligneTable = listeEmployé.lastElementChild.COMMENT_NODE;*/

       let nomUser = identification(nombre);
    supprimerUtilisateur(nomUser);
    
}

}
);

/*fonction d'identification de l'id de la liste*/
function identification( count){
    let identifiant='employé-name'+count;
    let elem = document.getElementById(identifiant);
    return elem.innerHTML;
}

/*fonction de suprression d'utilistateurs*/

function supprimerUtilisateur(userId){
    alert("fonction deleteUser");
    
    const xhttp = new XMLHttpRequest();
    
    xhttp.open('POST','/backend/routeurGestion.php',true);

    xhttp.onreadystatechange = function(){
    if(xhttp.readyState== 4 ||xhttp == 200){
        
        xhttp.onload = function(){
            document.getElementById('containeur').innerHTML= '/frontEnd/gestionEmployés/listeEmployés2.php';
        }

     
alert(this.responseText);
    }

    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("supr-utilisateur="+userId);

}





