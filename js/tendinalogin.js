//tendina login

    function openNav() {
        var x = document.getElementById('myNav');
        if (x.style.height === "80%") {
            x.style.height = "0%";
        } else {
            x.style.height = "80%";
        }
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }


    // function invalidInput(){  se vuoi usarla SISTEMALA
    //     var element = document.getElementsByClassName("loginInput");
    //     // var email = document.getElementsByName('email');
    //     // var psw = document.getElementsByName('psw');
    //     // email.classList.add("has-error");
    //     // psw.classList.add("has-error");
    //     element.classList.add("has-error");
    // }

   
    
