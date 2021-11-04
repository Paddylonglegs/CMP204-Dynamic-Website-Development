/*
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
*/

//Hide and show image information//

$(document).ready(function(){$("#imagehistory").hide();$("#theboys").hover(function(){$("#imagehistory").show();});$("#imagehistory").mouseleave(function(){$("#imagehistory").hide();});});

$(document).ready(function(){$("#imagehistory").hide();$(".homeimg").hover(function(){$("#imagehistory").show();});$("#imagehistory").mouseleave(function(){$("#imagehistory").hide();});});

//COOKIE CONSENT PLUGIN//
$(document).ready(function(){
    $("section").ihavecookies({
        title: "Cookies & Privacy",
        message: "This website uses cookies 🍪 to ensure you get the best experience on our website.",
        link: "index.php",
        delay:200,
        expires: 1
      })});

    
      

   