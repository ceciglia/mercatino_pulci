// function stelle(){
// 	var x = document.getElementById("serieta").src;

// 	if (x == 'images/stellagrigia.gif'){
// 		x = 'images/stellagialla';
// 	}else{
// 		x = 'images/stellagrigia.gif';
// 	}


function opensottomenu(evt, comando) {
	var i, content, links;
	content = document.getElementsByClassName("col-sm-9 padding-right");
	for (i = 0; i < content.length; i++) {
		content[i].style.display = "none";
	}
	links = document.getElementsByClassName("panel"); //-body ul li a
	for (i = 0; i < links.length; i++) {
		links[i].className = links[i].className.replace(" active", "");
	}
	document.getElementById(comando).style.display = "block";
	evt.currentTarget.className += " active";
}
document.getElementById("profilo_click").click();


// gestione stelle
// Get the modal
var modal = document.getElementById("myModal");
												  
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
												  
//Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
												  
// When the user clicks the button, open the modal 
btn.onclick = function() {
	modal.style.display = "block";
}
												  
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
}
												  
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}




//btn conferma
function btnConferma(id) {
	// Get the modal
	var popup = document.getElementById(id);

	if (window.getComputedStyle(popup).display === "none") {
		popup.style.display = "block";
	}
	// When the user clicks anywhere outside of the modal, close it
	// window.onclick = function(event) {
	// 	if (event.target == modal) {
	// 		modal.style.display = "none";
	// 	}
	// }
}

function thisFileUpload() {
	document.getElementById("file").click();
}

function nuovousatoris(id) {
	let x = document.getElementById(id);
	
	if (window.getComputedStyle(x).display === "none") {
	  x.style.display = "block";
	}else{
	  x.style.display = "none";
	}
}

function autoScrollRefresh(id){
	let elmnt = document.getElementById(id);
	elmnt.scrollIntoView();
}

function fullHeart(idCuore){
	cuore=document.getElementById(idCuore);
	cuore.innerHTML =  "<i class=\"fa fa-heart\" aria-hidden=\"true\"></i> Osservato";
}