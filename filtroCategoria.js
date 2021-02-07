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

function filtraCategoria(){
    let xttp = new ajaxRequest();
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        }
    }
}