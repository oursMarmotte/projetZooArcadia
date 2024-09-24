

record.addEventListener('click',function(event){


if(event.target.id==="ajout-rapport-alimentation"){
let idAnimal= $("#Id_Animal").val();
let idEmployé = $("#Id_Employé").val();
let labelAlimentation = $("#alimentation-Detail").val();
let qté = $("#alimentation-qté").val();
let btn = $("#ajout-rapport-alimentation").val();
data = "id-ani-alim="+idAnimal+"&id-emp-alim="+idEmployé+"&label-alim="+labelAlimentation+"&alim-quantité="+qté+"&btn-alim="+btn;

recordAlimReport(data);
}


if(activ == 25){
    alert("liste avis utilisateur"+event.target.id);

    
let number = parseInt(event.target.id);

let data = "id-avis="+number;


let champ2= "compteur-"+number;

updateStatus(data,champ2);
}


});


function updateStatus(nb,chp){

    let champstatus = document.getElementById(chp);
    let statuschamp = champstatus.innerHTML;
    
    alert(statuschamp);
    nb += "&valeur="+statuschamp;
    const xhttp =new XMLHttpRequest();
    xhttp.open('POST','/backEnd/controllerGestionTravail.php',true);
    
    xhttp.onreadystatechange =function(){
    
        if(xhttp.readyState == 4 || xhttp == 200){
            let reponse =this.responseText;
          affichFenetre(reponse);
        }
    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(nb);
    


}

function recordAlimReport(dt){

    const xhttp =new XMLHttpRequest();
    xhttp.open('POST','/backEnd/controllerGestionTravail.php',true);
    
    xhttp.onreadystatechange =function(){
    
        if(xhttp.readyState == 4 || xhttp == 200){
            let reponse =this.responseText;
          affichFenetre(reponse);
        }
    }
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(dt);
    

}


