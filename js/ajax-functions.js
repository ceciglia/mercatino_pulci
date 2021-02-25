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

//
// function aggiungiOsservati(idAn){
//     let xttp = new ajaxRequest();
//     xttp.onreadystatechange = function(){
//         if (this.readyState == 4 && this.status == 200){
//
//         }
//     };
//     xmlhttp.open("POST", "aggiungiOsservati.php?idAn=" + idAn, true);
//     xmlhttp.send();
// }

function aggiungiOsservati(idAn){
    $.ajax({
            type: 'GET',
            url: 'backend/aggiungiOsservati-exe.php',
            data: {
                id: idAn
            }
            // success: function (data) {
            //         alert("Maracaibo")
            // $("#result").html(response);
            // },
            // error: function (data) {
            //         alert("OHNO")
            // $("#result").html("Error");
            // }
    });
}

function verifyScadenza(idAn){
    let xttp = new ajaxRequest();
    xttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            risposta = JSON.parse(this.response);

        }
    };
    xmlhttp.open("GET", "verifyScadenza-exe.php?idAn=" + idAn, true);
    xmlhttp.send();

}
