/*
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
*/

window.onload=preparePage();

function preparePage()
{
	var click=document.getElementById("changeName"); //targeting button
    click.onclick=function(){ //if clicked
		loadDoc(); //load form with ajax
	}

}

function loadDoc()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("Change").innerHTML = this.responseText; //targeting div to load text file
    }
  };
  xhttp.open("GET", "Change.txt", true); //getting text file to display form
  xhttp.send();
}