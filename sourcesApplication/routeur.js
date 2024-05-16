
import { allRoute } from "./allRoutes.js";
/** 
allRoute.forEach((element  )=>{
console.log(element.url);
});


*/

const route = (event)=>{
 event = event || window.event;
 event.preventDefault();
 window.history.pushState({}," ",event.target.href);
 handleLocation();
 
}

const routes ={

    404: "/page/page404.html",
    "/": "/page/home.html",
    "/Nos_services": "/page/about.html",
    "/Nos_animaux" : "/page/lorem.html",
    "/Nos_habitats": "/page/code.html",
    "/Nous_contacter":"/page/nousContacter.html",
    "/Connexion": "/page/connexion.html",
};

const handleLocation = async()=>{
    const path= window.location.pathname;
const route = routes[path] || routes[404];
   

    
    
    const html = await fetch(route).then((data)=>data.text());
    
    document.getElementById("main-page").innerHTML = html;
    
};

window.onpopstate = handleLocation;
window.route = route;

handleLocation();





