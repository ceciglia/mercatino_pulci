function ajaxRequest(){
    let request=false;
    try{
        request = new XMLHttpRequest()
    }catch(e1){
	    try{
            request = new ActiveXObject("Msxml2.XMLHTTP")}catch(e2){
		        try{
                    request = new ActiveXObject("Microsoft.XMLHTTP")
		        }
                catch(e3){request = false
            }
        }
    }
    return request
}

function popolaCategorie(categoria){
	let xttp = new ajaxRequest();
	xttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            console.log(this.response);
    		risposta = JSON.parse(this.response);
            categ = risposta.contenuto;
    	    categoriaSelect = document.getElementById(categoria);
    	    categoriaSelect.innerHTML="";
    	    for(let i=0; i < categ.length; i++){
    	        let item = document.createElement('option');
    	        item.setAttribute("value", categ[i]);
    	        item.innerText=categ[i];
    	        categoriaSelect.appendChild(item);
    	    }

    	}
    };
	xttp.open("GET","backend/getCategorie.php?",true);
	xttp.send();
}

function popolaSottocategorie(categoria,sottocat){
	categoriaSelect = document.getElementById(categoria);
	categoriaSelezionata = categoriaSelect.options[categoriaSelect.selectedIndex].value;
    if (categoriaSelezionata!=''){
  	    let xttp = new ajaxRequest();
  	    xttp.onreadystatechange  = function(){
            console.log(this.response);
            if (this.readyState == 4 && this.status == 200){
                console.log(this.response);
    		    risposta = JSON.parse(this.response);
                sottocategorie = risposta.contenuto;
		        sottocatSelect = document.getElementById(sottocat);
		        sottocatSelect.innerHTML="";
		        for(let i=0; i < sottocategorie.length; i++){
		           let item = document.createElement('option');
		           item.setAttribute("value", sottocategorie[i]);
		           item.innerText=sottocategorie[i];
		           sottocatSelect.appendChild(item);
		        }

    	    }
        };
    	xttp.open("GET","backend/getSottocategorie.php?categoria="+categoriaSelezionata,true);
    	xttp.send();
	}
}
