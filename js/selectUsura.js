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

function popolaUsura(usura){
	let xttp = new ajaxRequest();
	xttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            console.log(this.response);
    		    risposta = JSON.parse(this.response);
            statou = risposta.contenuto;
      	    usuraSelect = document.getElementById(usura);
      	    usuraSelect.innerHTML="";
      	    for(let i=0; i < statou.length; i++){
      	        let item = document.createElement('option');
      	        item.setAttribute("value", statou[i]);
      	        item.innerText=statou[i];
      	        usuraSelect.appendChild(item);
      	    }

    	}
    };
	xttp.open("GET","backend/getUsura.php?",true);
	xttp.send();
}
