var icon = document.getElementById("icon");
var logo = document.querySelector(".navbar img")

icon.onclick = function(){
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme")) {
        logo.src = "images/logo-blanc.png";
    }
    else {
        logo.src = "images/logonoir.png";
    }
}