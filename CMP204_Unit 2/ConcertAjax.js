/*
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
*/

window.onload=preparePage();

function preparePage()
{
	var click=document.getElementById("show"); //targeting button
    click.onclick=function(){//if button clicked
		loadDoc(); //get file with ajax
	}

}

function loadDoc()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("concert").innerHTML = this.responseText; //targeting div to show text file
    }
  };
  xhttp.open("GET", "Concert.txt", true); //Getting text file to display iframe
  xhttp.send();
}