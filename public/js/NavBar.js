// nav bar mobile collapse button
function Showcollapsed(){
    var navBarUl= document.getElementById('Main-nav');
    if(navBarUl.className==="nav-bar"){
        navBarUl.className+=" collapsed";
    }
    else navBarUl.className= "nav-bar";
}