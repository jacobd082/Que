<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Que</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="logo.png">
    <link rel="apple-touch-icon" href="logo.png">
</head>
<body>
    <div id="main" class="center">
        <div style="align-items: left; align-content: left;">
            <h1 style="margin: 0;">Que</h1>
            <p id="stat"><span style="color: green;">&#9679;</span> Online</p>
        </div>
        <div style="width: 100%; background-color: rgb(123, 123, 123); height: 3px; border-radius: 700px;"></div>
        <div id="chat">
            <p class="in"><img src="logo.png" width="100px"></p>
            <p class="in">Welcome to Que!</p>
            <p class="in">Just a reminder that Que is still in beta, and some things may need fixing.</p>
            <p class="in">If you need any help, Just ask!</p>
        </div>
        <br><br><br><br>
        <div id="bttm"></div>
        <div id="footer" style="max-width: 400px; padding-bottom: 15px; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <div id="type" style="display: none;">
                <p class="in">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                </p>
                <!--<p style="color: rgb(178, 0, 178);"><b>Thinking...</b></p>-->
            </div>
            <input id="txt" placeholder="Type Here" style="width: 300px;
            padding: 8px;
            border: none;
            color: white;
            background-color: rgba(221, 221, 221, 0.2);
            border-radius: 70px;">
            <button style="
            padding: 8px;
            border: none;
            border-radius: 70px;
            color: white;
            background: rgb(178,82,245);
            background: linear-gradient(90deg, rgba(178,82,245,1) 0%, rgba(112,62,222,1) 35%, rgba(0,212,255,1) 100%);
            "
            onclick="send(document.getElementById('txt').value)"
            >Send</button>
        </div>
    </div>

    <script src="status.js"></script>
    <script src="response.js"></script>
    <script src="chat.js"></script>
    <?php
if ($_GET['q']=="") {
  
} else {
  echo "<script>send(" . $_GET['q'] . ")</script>";
}
    ?>
</body>
<style>
    #main {
        max-width: 400px;
    }
    body {
        background-color: rgb(17, 0, 31);
        color: white;
        font-family: 'Open Sans', sans-serif;
    }
    @media only screen and (min-width: 500px) {
        .center {
        margin: auto;
        width: 50%;
    }
    }
    .in {
        display: flex;
        align-items: left;
        align-content: left;
        padding: 8px;
        background-color: rgba(221, 221, 221, 0.2);
        width: fit-content;
        border-radius: 10px;
        border-bottom-left-radius: 0px;
    }
    .dot {
        height: 15px;
        width: 15px;
        margin-left: 3px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        }
    .out {
        display: flex;
        align-items: right;
        align-content: right;
        align-self: right;
        margin-left: auto; 
        margin-right: 0;
        padding: 8px;
        width: fit-content;
        border-radius: 10px;
        border-bottom-right-radius: 0px;
        background: rgb(178,82,245);
        background: linear-gradient(90deg, rgba(178,82,245,1) 0%, rgba(112,62,222,1) 35%, rgba(0,212,255,1) 100%);
    }
    .alert {
        background-color: gray;
        border-radius: 10px;
    }
    #footer {
        position: fixed;
        bottom: 0;
    }
    .sticky {
    position: fixed;
    top: 0;
    width: fit-content;
    padding: 10px;
    }

    #stat {
        backdrop-filter: blur(10px); 
        -webkit-backdrop-filter: blur(10px);
        border-radius: 50px;
    }

    /* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
    .sticky + .content {
    padding-top: 102px;
    }
</style>
</html>