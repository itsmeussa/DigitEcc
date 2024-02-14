function showpass() {
    var y=document.getElementById("Fonction");
    var x=document.getElementById(y.value);
    var z=document.getElementById("all");
    if (x.style.display == "block" ) {
    x.style.display = "none";
    y.style.display="block";
    
    } else {
    x.style.display = "block";
    y.style.display="none";
    }
    z.style.display == "block";
    
    if (z.style.display == "block" ) {
    z.style.display = "none";
    
    } else {
    z.style.display = "block";

    }
    }
    function getfonction(){
    var x=document.getElementById("Fonction").value;
    var url="Pers/"+x+".html";

    //if (y.split("@")[1]==="centrale-casablanca.ma"){return window.location.replace(url)};
    }