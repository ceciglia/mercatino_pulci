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

function popolaRegioni(reg){
	let xttp = new ajaxRequest();
	xttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
    		risposta = JSON.parse(this.response);
            regione = risposta.contenuto;
    	    regioneSelect = document.getElementById(reg);
    	    regioneSelect.innerHTML="";
    	    let optionR = document.createElement('option');
			optionR.setAttribute("value", "Seleziona una regione: ");
			optionR.innerText="Seleziona una regione: ";
			regioneSelect.appendChild(optionR);
    	    for(let i=0; i < regione.length; i++){
    	        let item = document.createElement('option');
    	        item.setAttribute("value", regione[i]);
    	        item.innerText=regione[i];
    	        regioneSelect.appendChild(item);
    	    }

    	}
    };
	xttp.open("GET","backend/getRegioni.php?",true);
	xttp.send();
}

function popolaProvince(reg,prov){
	regioneSelect = document.getElementById(reg);
	regioneSelezionata = regioneSelect.options[regioneSelect.selectedIndex].value;
    if (regioneSelezionata!='Nessuna'){
  	    let xttp = new ajaxRequest();
  	    xttp.onreadystatechange  = function(){
            if (this.readyState == 4 && this.status == 200){
    		    risposta = JSON.parse(this.response);
                province = risposta.contenuto;
		        provinceSelect = document.getElementById(prov);
		        provinceSelect.innerHTML="";
				let optionP = document.createElement('option');
				optionP.setAttribute("value", "Seleziona una provincia: ");
				optionP.innerText="Seleziona una provincia: ";
				provinceSelect.appendChild(optionP);
		        for(let i=0; i < province.length; i++){
		           let item = document.createElement('option');
		           item.setAttribute("value", province[i]);
		           item.innerText=province[i];
		           provinceSelect.appendChild(item);
		        }

    	    }
        };
    	xttp.open("GET","backend/getProvince.php?regione="+regioneSelezionata,true);
    	xttp.send();
	}
}

function popolaComuni(prov,com){
	provinciaSelect = document.getElementById(prov);
	provinciaSelezionata = provinciaSelect.options[provinciaSelect.selectedIndex].value;
    if (provinciaSelezionata!='Nessuna'){
  	    let xttp = new ajaxRequest();
  	    xttp.onreadystatechange  = function(){
            if (this.readyState == 4 && this.status == 200){
    		    risposta = JSON.parse(this.response);
                comune = risposta.contenuto;
		        comuneSelect = document.getElementById(com);
		        comuneSelect.innerHTML="";
				let optionC = document.createElement('option');
				optionC.setAttribute("value", "Seleziona un comune: ");
				optionC.innerText="Seleziona una comune: ";
				comuneSelect.appendChild(optionC);
		        for(let i=0; i < comune.length; i++){
		           let item = document.createElement('option');
		           item.setAttribute("value", comune[i]);
		           item.innerText=comune[i];
		           comuneSelect.appendChild(item);
		        }
    	    }
        };
    	xttp.open("GET","backend/getComuni.php?provincia="+provinciaSelezionata,true);
    	xttp.send();
	}
}
