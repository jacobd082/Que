function after(b, a) {
  return a.substring(a.indexOf(b) + 1);
}

function getResponse(msg) {
  //fetch("print.php?txt="+msg)
  msg = msg.replace("?", "")
  msg = msg.replace("!", "")
  msg = msg.replace(".", "")
  msg = msg.toLowerCase();
  if (msg.split(" ").includes("hi") || msg.split(" ").includes("hello")) {
    if (msg.split(" ").length < 4) {
      return [
        "Hello there! I'm Que!",
        "I'm an AI assistant made to help you!",
        "Try asking me:<br>What\'s the weather?",
        "Or: What is a pineapple?",
        "Or: Define Apple."
      ];
    } else {
      return getResponse(after(" ", msg));
    }
  } else if (msg.split(" ").includes("weather")) {
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      };
    function success(pos) {
        var crd = pos.coords;
        fetch('https://api.openweathermap.org/data/2.5/weather?units=imperial&lat='+crd.latitude+'&lon='+crd.longitude+'&appid=b4b150ac011d2c689bb0960425153055')
            .then(function(response) {
            response.json().then(jsonData => {
                console.log(jsonData);
                handWX({
                    loc : jsonData.name,
                    icon : jsonData.weather[0].icon,
                    cond : jsonData.weather[0].main,
                    temp : Math.floor(jsonData.main.temp)
                })
            });
            })
            .catch(function(error) {
            alert(error)
            });
    }
    function error(err) {
        alert("ERROR: There was an error getting your location, please make sure that you have it on in settings and try agin.")
        setTimeout(() => {
            sat("error")
        }, 200)
    }
    navigator.geolocation.getCurrentPosition(success, error, options);
    return [
        "Please give me access to your location so I can provide your weather."
    ]
  } 
  else if (msg.split(" ").includes("bye") && msg.split(" ").length < 3) {
    setTimeout(() => {
        sat("off")
        newMsg("<center>This chat has been marked as complete, and is no longer online. To reactivate it, send a message or click <a href=\"javascript:send('REACTIVATE')\">here</a>.</center>")
        document.body.scrollIntoView(0)
    }, 500)
    return [
        "Bye!"
    ]
  } 
  else if (msg == "reactivate") {
    return [
        "Hello!"
    ]
  }
  else if ((msg == "help") || (msg.split(" ").includes("help") && msg.split(" ").length < 4)) {
    return [
        "What can I help you with?",
        "If you want to know what I can do, Ask me."
    ]
  }
  else if (msg.startsWith("what is") || msg.startsWith("who is") || msg.replace("'", "").startsWith("whats")) {
    if (msg.split(" ").includes("a")) {
        url = msg.split(" ")[3]
    } else {
        url = after(" ",after("s", msg))
    }
    console.log(url)
    document.body.scrollIntoView(0)
    fetch('https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&origin=*&redirects=1&titles='+url)
            .then(function(response) {
            response.json().then(jsonData => {
                console.log(jsonData)
                var data = jsonData.query.pages
                var result = []
                for(var i in data)
                    result.push([i, data [i]]);
                //console.log(JSON.stringify(result))
                //console.log(JSON.stringify(result[0]))
                //console.log(JSON.stringify(result[0][1]))
                if ((result[0][1].extract)==undefined) {
                    handle("Sorry! Looks like I don't know anything about that!", "")
                } else {
                    handle(((result[0][1].extract)).replace(url.charAt(0).toUpperCase() + url.slice(1)+" may also refer to:", ""), url)
                }
            });
            })
            .catch(function(error) {
            alert(error)
            });
    return [
        "Here is what I found:"
    ]
  }
  else if (msg.split(" ").includes("you") && msg.split(" ").includes("do")) {
    return [
        "Hi there! I'm Que, your virtual assistant!",
        "To name a few things I can do:",
        "I can tell you the weather!",
        "I can have a basic conversation!",
        "I can do research for you!",
        "If at any point you want to end the conversation, say \"Bye\"."
    ]
  }
  else if ((msg.split(" ").includes("you") && msg.includes("oing")) || (msg == "whats up") || (msg == "what's up") || msg=="how are you" || msg=="syscheck") {
    return [
        "I'm doing fine!",
        "Thanks for asking!",
        "<img src='logo.png' width='50px'><b>All systems online</b>  &nbsp; <a href=\"javascript:send('SYSCHECK')\">Check again</a>&nbsp;<a href=\"https://stats.uptimerobot.com/XXPxmf4P2w\" style=\"color: gray;\">Status</a>"
    ]
  }
  else if (msg == "##error") {
    setTimeout(() => {
        sat("error")
    }, 200)
    return []
  }
  else if (msg=="##forgetme") {
    window.location.href="https://que.jacobdrath.co/human/reset.html"
  }
  else if (msg=="thanks" || msg=="thank you" || msg=="thx") {
    newMsg("<center>How is your experience with Que? <a href=\"javascript:alert('Thanks for your feedback!')\">Good</a> <a href=\"javascript:alert('Thanks for your feedback!')\">Bad</a></center>", "alert")
    return [
      "Your welcome!"
    ]
  }
  else if (msg.startsWith("define")) {
    var word = after(" ", msg)
    var defs = ""
    fetch('https://api.dictionaryapi.dev/api/v2/entries/en/'+word)
    .then(function(response) {
      if (!response.ok) {
          newMsg("I couldn't find that.", "in") 
          document.body.scrollIntoView(0)
      }
    response.json().then(jsonData => {
        console.log(jsonData)
        jsonData = jsonData[0]
        if (!(jsonData.meanings==undefined)) {
          jsonData.meanings.forEach(item => {
            defs += "<p class='in'><i>"+item.partOfSpeech+":</i>&nbsp;&nbsp;&nbsp;"+item.definitions[0].definition+"</p>"
          })
          newMsg("<b>"+jsonData.word+"</b>&nbsp;<span>"+jsonData.phonetic+"</span>"+defs, "in")
          document.body.scrollIntoView(0)
        } else {
          newMsg("I couldn't find a definition for that.")
          document.body.scrollIntoView(0)
        }
        document.body.scrollIntoView(0)
    });
    })
    .catch(function(error) {
    alert(error)
    });
    return []
  }
  else if (msg == "que") {
    return [
      "Thant's me!",
      "Can I help you with anything?"
    ]
  }
  else if (msg == "ok" || msg == "okay") {
    newMsg("<center>How is your experience with Que? <a href=\"javascript:alert('Thanks for your feedback!')\">Good</a> <a href=\"javascript:alert('Thanks for your feedback!')\">Bad</a></center>", "alert")
    return [
      "Happy to help!"
    ]
  }
  else if (msg.split(" ").includes("you") && msg.split(" ").includes("who")) {
    return [
      "Hi! I'm Que!",
      "If you need any help, just ask!"
    ]
  }
  else if (msg.split(" ").includes("not") && (msg.split(" ").includes("wanted") || msg.split(" ").includes("needed") || msg.split(" ").includes("asked"))) {
    requestFeedback()
    return []
  }
  else if (msg.split(" ")[0]=="google") {
    return [
      "Sorry! As of now, I cannot Google things for you.",
      "You can run your own google search&nbsp;<a href=\"https://google.com/search?q="+after(" ", msg)+"\" target='_blank'>here</a>."
    ]
  }
  else if (msg.startsWith("how many answers") || msg.startsWith("how many questions")) {
    fetch('https://que.jacobdrath.co/log.txt')
    .then(function(response) {
      response.text().then(function(text) {
        newMsg(text, "in")
      });
    })
    return ["One moment..."]
  }
  else if (msg=="") {
    return []
  }
  else {
    if (msg.split(" ").length==1) {
      getResponse("define "+msg)
      return []
    } else {
      return [
        "Sorry, I'm not sure what you are asking me.",
        "Try to use simple words and to not be to specific.",
        "Remember, I'm only in the Beta stages, and cannot do very much.",
      ];
    }
  }
}

function requestFeedback() {
  newMsg("Is something wrong? Let us know <a href='report.php'>here</a>.")
  document.body.scrollIntoView(0)
}

function handWX(w) {
        newMsg("I found your location to be "+w.loc, "in")
        newMsg("Here is your weather:", "in")
        newMsg("<img src='https://openweathermap.org/img/wn/"+w.icon+"@2x.png'>", "in")
        newMsg("The current condition is "+w.cond +". The current temperature is "+ w.temp + " fahrenheit.", "in")
        newMsg("<center>Was there an issue with your weather? <a href=\"javascript:alert('Thanks for your feedback!')\">Nope!</a> <a href=\"javascript:alert('Thanks for your feedback!')\">Yes</a></center>", "alert")
        document.body.scrollIntoView(0)
}

function handle(txt, title) {
    newMsg(txt, "in")
    newMsg("<center>Source: <a href=\"https://en.wikipedia.org/wiki/"+title+"\" target='_blank'>Wikipedia</a></center>", "alert")
    document.body.scrollIntoView(0)
}