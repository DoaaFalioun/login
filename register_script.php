<?php
  if(empty($_POST["email"])) {
      header("Location: ./index.php?content=message&alert=no-email");
  } else {
     include("./connect_db.php");
     include("./functions.php");

     $email = sanitize($_POST["email"]);

     $sql = "SELECT * FROM `register` WHERE `email` = '$email'";
  
     $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result)) {
       header("Location: ./index.php?content=message&alert=emailexists");
     } else {
       $array = mk_password_hash_from_microtime();
       
     
       $sql = "INSERT INTO `register` (`id`, 
                                       `email`, 
                                       `password`, 
                                       `userrole`,
                                       `activated`)
                 VALUES                (NULL,
                                        '$email',
                                        '{$array["password_hash"]}',
                                        'customer',
                                        0)";

       if (mysqli_query($conn, $sql)) {
         $id = mysqli_insert_id($conn);

         $to = $email;
         $subject = "Activatielink voor uw account van flowers.nl";
         
         
         $message = '<!doctype html>
           <html lang="en">
              <head>
               <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
               
                   <!-- Bootstrap CSS -->
                   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
               
                  <style>
                      body {
                           background-color: #D3D3D3;
                           font-size: 1.3em;
                           }
                  </style> 
      
                      <title>Hello, world!</title>
              </head>
                 <body>
                   <td>'. $array["date"] . ' - ' . $array["time"] .'</td>
                   <h2>Beste Gebruiker,</h2>
                   <p>U heeft zich onlangs gersgesteerd voor de site www.flowers.org</p>
                   <p>klik <a href="http://www.flowers.org/index.php?content=activate&id=' . $id . '&pwh='. $array['password_hash'] .'">hier</a> voor het activeren en wijzigen van het wachtwoord van uw account</p>
                   <p>Bedankt voor het registreren</p>
                   <p>Met vriendelijke groet,</p>
                   <p>D. Falioun</p>
                   <p>Folwers</p>
                       <!-- Optional JavaScript; choose one of the two! -->
              
                       <!-- Option 1: Bootstrap Bundle with Popper -->
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
               
                       <!-- Option 2: Separate Popper and Bootstrap JS -->
                       <!--
                       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
                       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
                                             -->
                 </body>
           </html>';
         
         $headers = "MIME-Version: 1.0\r\n";
         $headers .= "Content-type: text/html; charset=UTF-8\r\n";
         $headers .= "From: admin@flowers.nl\r\n";
         $headers .= "Cc: moderator@flowers.nl\r\n";
         $headers .= "Bcc: root@flowers.nl"; 

         mail($to, $subject, $message, $headers);
         
          header("Location: ./index.php?content=message&alert=register-success");
       } else {
          header("Location: ./index.php?content=message&alert=register-error");
       }
      }
  }
?>