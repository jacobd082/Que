function sat(e) {
    var d = document.getElementById("stat")
    if (e=="on") {
        d.innerHTML="<span style='color: green;'>&#9679;</span> Online"
    }
    if (e=="off") {
        d.innerHTML="<span style='color: red;'>&#9675;</span> Offline"
    }
    if (e=="think") {
        d.innerHTML="<span style='color: blue;'>&#9676;</span> Busy"
    }
    if (e=="error") {
        d.innerHTML="<span style='color: orange;'>&#9650;</span> Encountered Issue"
    }
}

function type(e) {
    if (e==true) {
        sat("think")
        document.getElementById("type").style.display="block"
    }
    if (e==false) {
        sat("on")
        document.getElementById("type").style.display="none"
    }
}