function send(msg) {
    document.getElementById("txt").value=""
    newMsg(msg, "out")
    type(true)
    document.body.scrollIntoView(0)
    setTimeout(() => {
        re = getResponse(msg)
        re.forEach(text => {
            newMsg(text, "in")
        })
        type(false)
        document.body.scrollIntoView(0)
    }, 2000);
}



function newMsg(txt, cssclass) {
    if (txt.includes("https://")) {
      txt = txt.replace("https://", "link.php?url=https://")
    }
    document.getElementById("chat").innerHTML += "<p class="+cssclass+">"+txt+"</p>"
}


// Get the input field
var input = document.getElementById("txt");

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function(event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    // Cancel the default action, if needed
    event.preventDefault();
    send(document.getElementById('txt').value)
  }
});


// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("stat");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}