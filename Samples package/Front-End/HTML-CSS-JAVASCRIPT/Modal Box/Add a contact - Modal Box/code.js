function addModalFun() {
    if(document.getElementById("add-contact").style.display == "none") {
        document.documentElement.style.visibility = "hidden";
        document.documentElement.style.background = "#ccc";
        document.getElementById("add-contact").style.visibility = "visible";
        document.getElementById("add-contact").style.display = "block";
    } else {
        document.getElementById("add-contact").style.display = "none";
        document.documentElement.style.visibility = "visible";
        document.getElementById("add-contact").style.visibility = "hidden";
        document.documentElement.style.background = "#fff";
    }
}