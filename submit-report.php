<html>
  <!-- curl $REPLIT_DB_URL/q -->
  <body>
    <?php

//The url you wish to send the POST request to
$url = 'https://kv.replit.com/v0/eyJhbGciOiJIUzUxMiIsImlzcyI6ImNvbm1hbiIsImtpZCI6InByb2Q6MSIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJjb25tYW4iLCJleHAiOjE2NjExMTI0OTAsImlhdCI6MTY2MTAwMDg5MCwiZGF0YWJhc2VfaWQiOiI0YzY1ZmUxYS03YzRkLTQyNDktYmJkNC0wYjJkZTE1NjVjODgiLCJ1c2VyIjoiSmFjb2JEZXZlbG9wZXIiLCJzbHVnIjoiUXVlIn0.A7OL2KEV5s5VArDaKQWVk2UYij1h9uxBbseoJTUWPbk2kJawGQbe8isULzG1Bfo-B7DkcbMM5w0xRwjtn-qQWA';

//The data you want to send via POST
$fields = [
    'q'      => $_POST['txt']
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
echo '<center><img src="https://que.jacobdrath.co/logo.png" width="80px"><br><h1>Response submitted.</h1><p>Thank you for your feedback.</p></center>';
/*
      // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://kv.replit.com/v0/eyJhbGciOiJIUzUxMiIsImlzcyI6ImNvbm1hbiIsImtpZCI6InByb2Q6MSIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJjb25tYW4iLCJleHAiOjE2NjExMTI0OTAsImlhdCI6MTY2MTAwMDg5MCwiZGF0YWJhc2VfaWQiOiI0YzY1ZmUxYS03YzRkLTQyNDktYmJkNC0wYjJkZTE1NjVjODgiLCJ1c2VyIjoiSmFjb2JEZXZlbG9wZXIiLCJzbHVnIjoiUXVlIn0.A7OL2KEV5s5VArDaKQWVk2UYij1h9uxBbseoJTUWPbk2kJawGQbe8isULzG1Bfo-B7DkcbMM5w0xRwjtn-qQWA?q={$_POST['txt']}"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);  
    */
    ?>
  </body>
</html>