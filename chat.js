if (!(localStorage.ver=="1")) {
  if (!(window.location.href.includes("?q="))) {
      window.location.href="https://que.jacobdrath.co/human/"
  }
}


function send(msg) {
  sessionStorage.setItem("lastMsg", msg)
  fetch("print.php")
    document.getElementById("txt").value=""
    newMsg(msg, "out")
    if (navigator.onLine) {
      type(true)
      document.body.scrollIntoView(0)
      if ((msg.split(" ").length==1) && (msg.includes("*") || msg.includes("+") || msg.includes("-") || msg.includes("/"))) {
        re = getResponse(msg)
        re.forEach(text => {
            newMsg(text, "in")
        })
        type(false)
        document.body.scrollIntoView(0)
      } else {
        setTimeout(() => {
          re = getResponse(msg)
          re.forEach(text => {
              newMsg(text, "in")
          })
          type(false)
          document.body.scrollIntoView(0)
      }, 2000);
      }
    } else {
      newMsg("Looks like you are offline. Try again when you are online.", "in")
      document.body.scrollIntoView(0)
      sat("error")
    }
}



function newMsg(txt, cssclass, news = false) {
    if (txt.includes("https://")) {
      if (!(news)) {
        if (!txt.includes("img")) {
          txt = txt.replace("https://", "link.php?url=https://")
        }
      }
    }
    document.getElementById("chat").innerHTML += "<p class="+cssclass+">"+txt+"</p>"
}


// Get the input field
var input = document.getElementById("txt");

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keyup", function(event) {
  // If the user presses the "Enter" key on the keyboard
  //console.log(event)
  if (event.key === "Enter") {
    // Cancel the default action, if needed
    event.preventDefault();
    send(document.getElementById('txt').value)
  }
  if (event.key=="ArrowUp") {
    input.value=sessionStorage.getItem("lastMsg")
  }
  if (event.key=="ArrowDown") {
    sessionStorage.setItem("lastMsg", input.value)
    input.value=""
  }
  if (input.value.length>199) {
    input.style.background="red"
  } else {
    input.style.background="rgba(221, 221, 221, 0.2)"
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