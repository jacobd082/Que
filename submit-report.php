<html>
  <body>
    <?php
      curl $REPLIT_DB_URL -d 'issue='+$_POST['txt'];
    ?>
  </body>
</html>