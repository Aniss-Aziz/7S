var icon = document.getElementById("icon");
var logo = document.querySelector(".navbar img")
var logo_footer = document.querySelector(".my-footer img" )

icon.onclick = function(){
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme")) {
        logo.src = "images/logo-blanc.png";
        logo_footer.src = "images/logo-blanc.png";
        icon.style.filter = "invert(1)"
    }
    else {
        logo.src = "images/logonoir.png";
        logo_footer.src = "images/logo-noir.png";
        icon.style.filter = "contrast(0.3)";
    }
}