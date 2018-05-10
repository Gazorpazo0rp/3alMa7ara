// nav bar mobile collapse button
function Showcollapsed(){
    var navBarUl= document.getElementById('Main-nav');
    if(navBarUl.className==="nav-bar"){
        navBarUl.className+=" collapsed";
    }
    else navBarUl.className= "nav-bar";
}
function showLoginForm(){
    $('#Login_form_div').animate({
        top:0
    },1000);
}
function closeLoginForm(){
    $('#Login_form_div').animate({
        top:-900
    },1000);
}
function showJoinUsForm(){
    $('#JoinUs_form_div').animate({
        top:0
    },1000);
}
function closeJoinUsForm(){
    $('#JoinUs_form_div').animate({
        top:-900
    },1000);
}