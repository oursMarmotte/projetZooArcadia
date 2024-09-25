

  
let paginationBis = document.getElementById('paginationBis');
paginationBis.addEventListener('click',function(event){

  
    if(event.target.id && paginationReports ===1){
        alert("mavaleur de pagination rapport animalier"+paginationReports);
        let nombre = parseInt(event.target.id);
        
    
     let offset = identificationNumberPage(nombre);
    
     
    navResult(offset);
        
    }else if(event.target.id && paginationComments ===2){
        alert("mavaleur de pagination rapport habitats"+paginationReports);
        let nombre = parseInt(event.target.id);
        
    
     let pageNb = idNbPageComments(nombre);
    
     
    navComments(pageNb);
        
    }else if(event.target.id && paginationAnimals === 3)
        {
            alert("mavaleur de pagination rapport Animal"+paginationAnimals);
            let nombre = parseInt(event.target.id);
        let pageNb =    idNbPageComments(nombre);
        navAnimal(pageNb);

    }else if(event.target.id && paginationAvis ===4){

        alert("mavaleur de pagination rapport Avis"+paginationAnimals);
        let nombre = parseInt(event.target.id);
    let pageNb =    idNbPageComments(nombre);
    navAvis(pageNb);
    }






});

/*fonction de pagination rapports animalier */

function identificationNumberPage(nombre){
    let page = nombre;

    alert('valeur nombre'+nombre);
let identifiantPage ="offset-"+nombre; 
alert("id"+identifiantPage);
let valOffset = document.getElementById(identifiantPage).getAttribute('value');

return page;

}


function navResult(valOffset){
    alert('navRsult'+valOffset);
const xhttp = new XMLHttpRequest();
xhttp.open('POST','/frontEnd/gestionAnimaux/formListRapports.php',true);
xhttp.onreadystatechange = function(){
    if(xhttp.readyState == 4 || xhttp ==200){
  document.getElementById('containeur').innerHTML = this.responseText;
    }


}

xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send("val-offset="+valOffset);

}



 /*fonction de pagination  onglet rapport états des habitats*/

  
 
 
 function idNbPageComments(nombre){
     let page = nombre;
 
     alert('valeur nombre'+nombre);
 let identifiantPage ="offset-"+nombre; 
 alert("id"+identifiantPage);
 
 
 return page;
 
 }
 
 
 function navComments(nbPage){
     alert('navRsult'+nbPage);
 const xhttp = new XMLHttpRequest();
 xhttp.open('POST','/frontEnd/gestionHabitats/formListRapports.php',true);
 xhttp.onreadystatechange = function(){
     if(xhttp.readyState == 4 || xhttp ==200){
   document.getElementById('containeur').innerHTML = this.responseText;
   
     }
 
 
 }
 
 xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 xhttp.send("pagination-habitat="+nbPage);
 }

 function navAnimal(nbPage){
    alert('navAnimal'+nbPage);
const xhttp = new XMLHttpRequest();
xhttp.open('POST','/frontEnd/gestionAnimaux/formListSuppr.php',true);
xhttp.onreadystatechange = function(){
    if(xhttp.readyState == 4 || xhttp ==200){
  document.getElementById('containeur').innerHTML = this.responseText;
  
    }


}

xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send("pagination-animal="+nbPage);
}


function navAvis(nbPage){
    alert('navAvis'+nbPage);
const xhttp = new XMLHttpRequest();
xhttp.open('POST','/frontEnd/gestionTachesEmployés/listAvis.php',true);
xhttp.onreadystatechange = function(){
    if(xhttp.readyState == 4 || xhttp ==200){
  document.getElementById('containeur').innerHTML = this.responseText;
  
    }


}

xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send("pagination-avis="+nbPage);
}