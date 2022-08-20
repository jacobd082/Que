<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go to link? | Que</title>
    <link rel="icon" href="logo.png">
</head>
<body style="font-family: sans-serif; background-color: rgb(17, 0, 31);">
<center>
    <br>
    <img src="https://que.jacobdrath.co/logo.png" width="80px">
    <br>
    <br>
    <div style="background-color: white; border-radius: 10px; width: fit-content; padding: 15px;">
    <h1>Go to outside URL?</h1>
    <p>
        Are you sure you want to go to <?php echo $_GET["url"] ?>
    </p>
    <a href="<?php echo $_GET["url"] ?>">Continue</a>
    </div>
</center>
</body>
</html>