<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCAPTCHA</title>
</head>
<body>
<?php
//The url you wish to send the POST request to
$url = 'https://www.google.com/recaptcha/api/siteverify';

//The data you want to send via POST
$fields = [
    'response'      => $_POST['g-recaptcha-response'],
    'secret' => '6LfB4ckfAAAAANmItrzwta9-6SODkowTsoqGpPSo'
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;
$manage = json_decode($result)
if ($manage.success) {
    echo 'Success!';
};
?>
</body>
</html>