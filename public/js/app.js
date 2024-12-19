// var icon = document.getElementById("icon");
// var logo = document.querySelector(".navbar img")
// var logo_footer = document.querySelector(".my-footer img" )
// var partner_1 = document.querySelector(".partenariat-1")
// var partner_2 = document.querySelector(".partenariat-2")
// icon.onclick = function(){
//     document.body.classList.toggle("dark-theme");
//     if (document.body.classList.contains("dark-theme")) {
//         logo.src = "/images/logo-blanc.png";
//         logo_footer.src = "/images/logo-blanc.png";
//         icon.style.filter = "invert(1)";
//         partner_1.style.filter = "invert(1)";
//         partner_2.style.filter = "invert(1)"
//
//     }
//     else {
//         logo.src = "/images/logonoir.png";
//         logo_footer.src = "/images/logo-noir.png";
//         icon.style.filter = "contrast(0.3)";
//         partner_1.style.filter = "";
//         partner_2.style.filter = ""
//     }
// }
//
document.addEventListener("DOMContentLoaded", function () {
    var icon = document.getElementById("icon");
    var logo = document.querySelector(".navbar img");
    var logo_footer = document.querySelector(".my-footer img");
    var partner_1 = document.querySelector(".partenariat-1");
    var partner_2 = document.querySelector(".partenariat-2");

    function applyTheme(mode) {
        if (mode === "dark") {
            document.body.classList.add("dark-theme");

            if (logo) logo.src = "/images/logo-blanc.png";
            if (logo_footer) logo_footer.src = "/images/logo-blanc.png";
            if (icon) icon.style.filter = "invert(1)";
            if (partner_1) partner_1.style.filter = "invert(1)";
            if (partner_2) partner_2.style.filter = "invert(1)";
        } else {
            document.body.classList.remove("dark-theme");

            if (logo) logo.src = "/images/logonoir.png";
            if (logo_footer) logo_footer.src = "/images/logo-noir.png";
            if (icon) icon.style.filter = "contrast(0.3)";
            if (partner_1) partner_1.style.filter = "";
            if (partner_2) partner_2.style.filter = "";
        }
    }

    var savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        applyTheme(savedTheme);
    } else {
        localStorage.setItem("theme", "light");
    }

    if (icon) {
        icon.onclick = function () {
            var currentTheme = document.body.classList.contains("dark-theme") ? "dark" : "light";
            var newTheme = currentTheme === "dark" ? "light" : "dark";

            applyTheme(newTheme);
            localStorage.setItem("theme", newTheme);
        };
    }
});


