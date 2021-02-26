
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
