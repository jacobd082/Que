<html>
  <head>
    <title>Que</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  </head>
  <body>
    <center>
      <br>
      <img src="https://que.jacobdrath.co/logo.png" width="80px">
      <br>
      <br>
<div style="background-color: white; border-radius: 10px; width: fit-content; padding: 15px;">
<h1>Please Verify</h1>
<p>In order to keep Que secure, we require new users to complete human verification.</p>
    <form action="verify.php" method="POST">
      <div class="g-recaptcha" data-sitekey="6LfB4ckfAAAAAJH3qOotGiFW1Munvvy_o9hC_8AU"></div>
      <br/>
      <input type="submit" value="Submit" id="sub_but">
    </form>
</div>

      <p style="color: white;">Que has responded to <b id="num"><img src="/load.gif" width="20px"></b> questions.</p>
      <script>
            var url = 'https://que.jacobdrath.co/log.txt';
var storedText;

fetch(url)
  .then(function(response) {
    response.text().then(function(text) {
      storedText = text;
      done();
    });
  });

function done() {
    document.getElementById("num").innerHTML=storedText
}

      </script>
      
      <a href="https://stats.uptimerobot.com/XXPxmf4P2w" style="color: gray;">Status</a>&nbsp;<a href="https://que.jacobdrath.co/pages/security.html" style="color: gray;">Security</a>&nbsp;<a href="https://que.jacobdrath.co/pages/providers.html" style="color: gray;">Our providers</a>
    &nbsp;<a href="https://que.jacobdrath.co/pages/policy.html" style="color: gray;">Privacy Policy</a>
    </center>
  </body>
  <style>
        body {
        background-color: rgb(17, 0, 31);
        color: black;
        font-family: 'Open Sans', sans-serif;
        }
        #sub_but {
          font-size: 14px;
          cursor: pointer;
          border: none;
          padding: 8px;
          border-radius: 10px;
          background: rgb(178,82,245);
          background: linear-gradient(90deg, rgba(178,82,245,1) 0%, rgba(112,62,222,1) 35%, rgba(0,212,255,1) 100%);
          }
  </style>
</html>
</center>
  </body>
  <style>
        body {
        background-color: rgb(17, 0, 31);
        color: black;
        font-family: 'Open Sans', sans-serif;
        }
        #sub_but {
          font-size: 14px;
          cursor: pointer;
          border: none;
          padding: 8px;
          border-radius: 10px;
          background: rgb(178,82,245);
          background: linear-gradient(90deg, rgba(178,82,245,1) 0%, rgba(112,62,222,1) 35%, rgba(0,212,255,1) 100%);
          }
  </style>
</html>
