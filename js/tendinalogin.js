//tendina login

    function openNav() {
        var x = document.getElementById("myNav");
        if (x.style.height === "0%") {
            x.style.height = "80%";
        } else {
            x.style.height = "0%";
        }
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }

