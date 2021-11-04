/*
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
*/

window.onload=preparePage();

function preparePage()
{
	var click=document.getElementById("deleteUser"); //targeting button 
    click.onclick=function(){//if clicked
		confirm(); //load form with ajax
	}

}

function confirm()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("Confirm").innerHTML = this.responseText; //targeting div to displaying text file
    }
  };
  xhttp.open("GET", "Confirmation.txt", true); //getting text file to display form
  xhttp.send();
}