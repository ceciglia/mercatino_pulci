function myRichiesta(id, idbtn) {
	var checkBox = document.getElementById(id);
	var text = document.getElementById(idbtn);
	if (checkBox.checked == true){
		text.disabled = false;
	} else {
		text.disabled = true;
	}
}

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

function visualizzaDiv(id1="", id2="") {
	if(id1 !== ""){
		let x = document.getElementById(id1);
		if (window.getComputedStyle(x).display === "none") {
			x.style.display = "block";
		}else{
			x.style.display = "none";
		}
	}
	if(id2 !== ""){
		let y = document.getElementById(id2);
		if(window.getComputedStyle(y).display === "block"){
			y.style.display = "none";
		}
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


