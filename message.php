<?php
    // var_dump($_GET);exit();
  $alert = (isset($_GET["alert"]))? $_GET["alert"]: "default";
  $id = (isset($_GET["id"]))? $_GET["id"]: "";
  $pwh = (isset($_GET["pwh"]))? $_GET["pwh"]: "";
  $email = (isset($_GET["email"]))? $_GET["email"]: "";

  switch($alert) {
      case "no-email" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" role="alert">
            U heeft geen emailadres ingevuld, probeer het opnieuw...
            </div>';
        header("Refresh: 3; ./index.php?content=register");
      break;
      case "emailexists" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" role="alert">
             Het door u ingevulde e-mailadres bestaat al, probeer het opnieuw met een ander e-mailadres...
             </div>';
        header("Refresh: 3; ./index.php?content=register");
      break;
      case "register=error" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" role="alert">
             Er is iets fout gegaan in het registratieproces... probeer het nogmaals of neen contact op met doaa@mail.com...
             </div>';
        header("Refresh: 3; ./index.php?content=register");
      break;
      case "register=success" :
        echo'<div class="alert alert-success mt-5 w-50 max-auto" role="alert">
              U bent succesvol geregisteerd.
             </div>';
        header("Refresh: 3; ./index.php?content=login");
      break;
      case "hacker-alert" :
        echo'<div class="alert alert-success mt-5 w-50 max-auto" role="alert">
              U heeft geen rechten op deze pagina
             </div>';
        header("Refresh: 3; ./index.php?content=home");
      break;
      case "password-empty" :
        echo'<div class="alert alert-warning mt-5 w-50 max-auto" role="alert">
              U heeft een van beide wachtwoorden niet ingevuld
             </div>';
        header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
      break;
      case "nomatch-password" :
        echo'<div class="alert alert-warning mt-5 w-50 max-auto" role="alert">
              uw ingevulde wachtwoord niet gelijk probeer nog een keer!
             </div>';
        header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
      break;
      case "no-id-pwh-match" :
        echo'<div class="alert alert-warning mt-5 w-50 max-auto" role="alert">
              u bent niet geregesteerd in de database, u wordt doorgestuurd naar de registratiepagina!
             </div>';
        header("Refresh: 3; ./index.php?content=register");
      break;
      case "update-success" :
        echo'<div class="alert alert-success mt-5 w-50 max-auto" role="alert">
              u bent succesvol geregesteerd!
             </div>';
        header("Refresh: 3; ./index.php?content=login");
      break;
      case "update-error" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" role="alert">
              Het regestratieproces is niet gelukt, kies een nieuwe wachtwoord!
             </div>';
          header("Refresh: 3; ./index.php?content=activate&id=$id&pwh=$pwh");
      break;
      case "already-active" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" role="alert">
              uw account is al actief, log in met uw zelfgekozen wachtwoord en emailadres.
             </div>';
          header("Refresh: 3; ./index.php?content=login");
      break;
      case "no-match-pwh" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" text-center role="alert">
              uw acctivatielinkgegevens zijn niet correct, registeer opnieuw.
             </div>';
          header("Refresh: 3; ./index.php?content=register");
      break;
      case "loginform-empty" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" text-center role="alert">
              uw heeft een van beide velden niet ingevuld.
             </div>';
          header("Refresh: 3; ./index.php?content=login");
      break;
      case "email-Unknown" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" text-center role="alert">
              Het door uw ingevulde email adress id bij ons niet bekend..
             </div>';
          header("Refresh: 3; ./index.php?content=login");
      break;
      case "not-activated" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto" text-center role="alert">
              uw account is nog niet geacctiveerd, check uw email <span class="badge badge-info p-2">' . $email . '</span> voor het klikken op activatielink ..
             </div>';
          header("Refresh: 3; ./index.php?content=login");
      break;
      case "no-pw-match" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto text-center"  role="alert">
              uw ingvulde wachtwoord voor het e-mail <span class="badge badge-info p-2">' . $email . '</span> is niet correct,probeer het opnieuw..
             </div>';
          header("Refresh: 3; ./index.php?content=login");
      break;
      case "log-out" :
        echo'<div class="alert alert-success mt-5 w-50 max-auto text-center"  role="alert">
              U bent uitgelegd..
             </div>';
          header("Refresh: 3; ./index.php?content=home");
      break;
      case "auth-error" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto text-center"  role="alert">
              U bent niet ingelogd..
             </div>';
          header("Refresh: 3; ./index.php?content=home");
      break;
      case "auth-error-user" :
        echo'<div class="alert alert-danger mt-5 w-50 max-auto text-center"  role="alert">
              U heeft geen richting in deze pagina..
             </div>';
          header("Refresh: 3; ./index.php?content=home");
      break;
      default:
        header("Location: ./index.php?content=home");
      break;

    }

?>