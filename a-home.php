<?php
 include("./functions.php");
 is_authorized(["admin", "root", "moderator"]);
?>


<?php
 // session_unset();
 // var_dump($_SESSION);

  echo "Mijn gebruiker is: " . $_SESSION["userrole"];
  echo "<hr>";
  echo "Mijn id is: " . $_SESSION["id"];
?>