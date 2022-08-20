<html>
  <body>
    <?php
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
    ?>
  </body>
</html>