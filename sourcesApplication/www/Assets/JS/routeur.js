
/*variable activ initialisé a 0 état modifié pour chaque page affichant une liste*/
let activ =0;
/*variable activEnr initialisé a 0 état modifié pour chaque page avec formulaire d'enregistrement*/

let activEnr =0;
/*variable activMod initialisé a 0 état modifié pour chaque page avec formulaire de modification*/
let activMod=0;

let paginationComments = 0;
let paginationReports = 0;
let paginationAnimals =0;
let paginationAvis=0;

const route = ['/frontEnd/gestionEmployés/formulaireEmploye.php',
    '/frontEnd/gestionEmployés/listeEmployés2.php','/frontEnd/gestionEmployés/formulaireRechercheEmployé.php'];

    let menuEspaceréservé = document.getElementById('menu-espacereservé');
    menuEspaceréservé.addEventListener('click',(event)=>{
/*chemin page enregistrer un employé*/

    if((event.type ==='click')&& (event.target.id==='employé-enr')){
var chemin = route[0];
activ = 7;
activEnr=0;
activMod=0;
    navigation(chemin);
    document.getElementById('paginationBis').innerHTML= '<=====>';
    }

/*chemin page liste des employés*/

    if((event.type ==='click')&& (event.target.id==='employé-list')){
        activ=1;
        activEnr=0;
        activMod=0;
    var chemin = route[1];
    document.getElementById('paginationBis').innerHTML= "<====>";
    navigation(chemin);
    
                                                                                                                            
}

/*chemin page modifié un employé*/

    if((event.type ==='click')&& (event.target.id==='employé-modif')){
        activMod = 1;
        activ=0;
        activEnr=0;
        var chemin = route[2];
        document.getElementById('paginationBis').innerHTML= "<====>";
        navigation(chemin);
        
    }



/*-------------------------------------------GESTION---DES---ANIMAUX---------------------------------------------------*/ 

const routeAnimaux = ['/frontEnd/gestionAnimaux/formAjout.php' ,'/frontEnd/gestionAnimaux/formListSuppr.php','/frontEnd/gestionAnimaux/formRechercheModif.php','/frontEnd/gestionAnimaux/formListRapports.php','/frontEnd/gestionAnimaux/rapportsVeto.php'];


    /*chemin page enregistrer un animal*/

    
    if((event.type ==='click')&& (event.target.id==='animal-enr')){
        activ = 0;
        activMod=0;
var chemin = routeAnimaux[0];
activEnr = 1;
document.getElementById('paginationBis').innerHTML= "<====>";
    navigation(chemin);
    
    }



/*chemin page liste des animaux*/

    if((event.type ==='click')&& (event.target.id==='animal-list')){
    activ = 25;
    activEnr=0;
    activMod=0;
    var chemin = routeAnimaux[1];
   
    navigation(chemin);

    paginationReports =0;
    paginationComments =0;
    paginationAnimals =3;
    paginationAvis =0;

    let fichierPagination ='/frontEnd/gestionAnimaux/pagination2.php';
    pagination(fichierPagination);
    
                                                                                                                            
}

/*chemin page liste des Rapports de santé des animaux*/

if((event.type ==='click')&& (event.target.id==='rapport-santé-one')||(event.target.id==='rapport-santé-two')){
    activ = 10;
    activEnr=0;
    activMod=0;
    var chemin = routeAnimaux[3];
    navigation(chemin);

    paginationReports =1;
    paginationComments =0;
    paginationAnimals =0;
paginationAvis =0;
    let fichierPagination ='/frontEnd/gestionAnimaux/pagination1.php';
   
    
   pagination(fichierPagination);
 
                                                                                                                            
}
/*chemin formulaires de saisie Rapports de santé des animaux*/

if((event.type ==='click')&& (event.target.id==='rapport-form')){
    activMod=0;
    activ=0;

    var chemin = routeAnimaux[4];
    activEnr = 5;
    navigation(chemin);

   
                                                                                                                            
}




/*chemin page modifier un animal*/



    if((event.type ==='click')&& (event.target.id==='animal-modif')){
        var chemin = routeAnimaux[2];
        activEnr=0;
        activ=0;
        activMod =2;
        document.getElementById('paginationBis').innerHTML= "<====>";
        navigation(chemin);
        
    }


/*-------------------------------------------GESTION---DES--HABITATS---------------------------------------------------*/

const routeHabitat = ['/frontEnd/gestionHabitats/formAjout.php' ,'/frontEnd/gestionHabitats/formListSuppr.php','/frontEnd/gestionHabitats/formRechercheModif.php','/frontEnd/gestionHabitats/formListRapports.php','/frontEnd/gestionHabitats/formRapportsHabitat.php'];

  /*chemin page enregistrer un habitat*/

 
  if((event.type ==='click')&& (event.target.id==='habitat-enr')){
    activ=0;
    activMod=0;
        activEnr = 3;
  var chemin = routeHabitat[0];
  document.getElementById('paginationBis').innerHTML= "<====>";
      navigation(chemin);
      
      }
  


  /*chemin page liste des habitats*/

    if((event.type ==='click')&& (event.target.id==='habitat-list')){
        activMod=0;
        activEnr=0;
        activ =4;
    var chemin = routeHabitat[1];
    document.getElementById('paginationBis').innerHTML= "<====>";
    navigation(chemin);
    
    
                                                                                                                            
}


 /*chemin page commentaires vétérinaire/ habitats*/

 if((event.type ==='click')&& (event.target.id==='rapport-habitat')){
    activEnr=0;
    activMod=0;
    activ =5;
var chemin = routeHabitat[3];
navigation(chemin);
paginationComments =2;
paginationAvis =0;
paginationReports =0;
paginationAnimals =0;
                       
let fichierPagination ='/frontEnd/gestionHabitats/pagination.php';
   pagination(fichierPagination);
                                                                                                
}


/*chemin formulaire de saisie commentaires/rapport habitat */
if((event.type ==='click')&& (event.target.id==='form-habi')){
activ=0;
activMod=0;
    activEnr= 6;
    paginationComments =0;
paginationAvis =0;
paginationReports =0;
paginationAnimals =0;
var chemin = routeHabitat[4];
navigation(chemin);
document.getElementById('paginationBis').innerHTML= "<====>";

                                                                                                                        
}


/*chemin page modifier un habitat*/


    if((event.type ==='click')&& (event.target.id==='habitat-modif')){
        activEnr=0;
        activ=0;
        activMod = 14;
        var chemin = routeHabitat[2];
        document.getElementById('paginationBis').innerHTML= "<====>";
        navigation(chemin);
        
    }



/*-------------------------------------------GESTION---DES--SERVICES---------------------------------------------------*/

const routeServices = ['/frontEnd/gestionServices/formAjout.php' ,'/frontEnd/gestionServices/formListSuppr.php','/frontEnd/gestionServices/formRechercheModif.php'];

 /*chemin page enregistrer un service*/

   

 
     
     if((event.type ==='click')&& (event.target.id=== 'service-enr')){
    
    activ=0;
    activMod=0;
        activEnr =4;

     paginationComments = 0;
paginationReports = 0;
 paginationAnimals =0;
 paginationAvis =0;
 var chemin = routeServices[0];
 document.getElementById('paginationBis').innerHTML= "<====>";
     navigation(chemin);
     
     }
   

 /*chemin page modifier un service*/

    
    if((event.type ==='click')&& (event.target.id=== 'service-modif')){
        activ=0;
        activEnr=0;
        paginationReports = 0;
        paginationAnimals =0;
        paginationAvis =0;
    activMod =3;
        var chemin = routeServices[2];
        document.getElementById('paginationBis').innerHTML= "<====>";
        navigation(chemin);
        
    }



 /*chemin page liste des services*/
 
    if((event.type ==='click')&& (event.target.id==='service-list')){
        activMod=0;
        activEnr=0;
        paginationReports = 0;
 paginationAnimals =0;
 paginationAvis =0;
    activ=2;
    
     var chemin = routeServices[1];
     document.getElementById('paginationBis').innerHTML= "<====>";
     navigation(chemin);
    
                                     
    
 }

/*-------------------------------------------GESTION---RAPPORT-----EMPLOYES----------------------------------------------*/

const routeTaches = ['/frontEnd/gestionTachesEmployés/listAlimentation.php' ,'/frontEnd/gestionTachesEmployés/rapportsAlimentation.php' ,'/frontEnd/gestionTachesEmployés/listAvis.php' ];


/*chemin page liste rapport alimentation*/
 
if((event.type ==='click')&& (event.target.id==='rapport-alim-list' || event.target.id==='rapport-alim-bis')){
    activMod=0;
    activEnr=0;
activ=20;

 var chemin = routeTaches[0];
 document.getElementById('paginationBis').innerHTML= "<====>";
 navigation(chemin);
}

/*chemin formulaire de saisie alimentation*/
 
if((event.type ==='click')&& (event.target.id==='rapport-alim_form')){
    activMod=0;
    activEnr=21;
activ=0;

 var chemin = routeTaches[1];
 document.getElementById('paginationBis').innerHTML= "<====>";
 navigation(chemin);
}


/*chemin page liste avis visiteur et validation*/
 
if((event.type ==='click')&& (event.target.id==='avis-visiteurs')){
    activMod=0;
    activEnr=0;
activ=25;

paginationReports =0;
    paginationComments =0;
    paginationAnimals =0;
    paginationAvis =4;
    
let fichierPagination ='/frontEnd/gestionTachesEmployés/pagination3.php';
    pagination(fichierPagination);
    

 var chemin = routeTaches[2];
 
 navigation(chemin);
}

});




















/*------------------------------------------NAVIGATION---PAGINATION----------------------------------*/

 /*fonction de navigation */
function navigation(chemin){
     
   
    
     const xhttp = new XMLHttpRequest();
     xhttp.onload = function(){
         document.getElementById('containeur').innerHTML= this.responseText;
     }
 
     xhttp.open('GET',chemin);
     xhttp.send();
 
    }

/*fonction de paginnation*/
    function pagination(pathPage){
        const xhttp= new XMLHttpRequest();
        xhttp.onload =function(){
            document.getElementById('paginationBis').innerHTML=this.responseText;
        }
xhttp.open('GET',pathPage);
xhttp.send();

    }