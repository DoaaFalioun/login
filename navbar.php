<?php
$active = (isset($_GET["content"])) ? $_GET["content"] : "";
?>
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">flowers</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <?php
         if (isset($_SESSION["id"]))  {
            switch ($_SESSION["userrole"]) {
              case 'admin':
                echo '<li class="nav-item">
                        <a class="nav-link '; if ( $active == "home"  ) { echo "active";} ; echo '" aria-current="page" href="./index.php?content=a-home">Home</a>
                      </li>';
              break;
              case 'root':
                echo '<li class="nav-item">
                        <a class="nav-link '; if ( $active == "home"  ) { echo "active";} ; echo '" aria-current="page" href="./index.php?content=r-home">Home</a>
                      </li>';
              break;
              case 'customer':
                echo '<li class="nav-item">
                        <a class="nav-link '; if ( $active == "home"  ) { echo "active";} ; echo '" aria-current="page" href="./index.php?content=c-home">Home</a>
                      </li>';
              break;
              case 'moderator':
                echo '<li class="nav-item">
                        <a class="nav-link '; if ( $active == "home"  ) { echo "active";} ; echo '" aria-current="page" href="./index.php?content=m-home">Home</a>
                      </li>';
              break;
              default:
                echo '<li class="nav-item">
                        <a class="nav-link '; if ( $active == "home"  ) { echo "active";} ; echo '" aria-current="page" href="./index.php?content=home">Home</a>
                      </li>';
              break;
            }
         } else {
           echo '<li class="nav-item">
                   <a class="nav-link '; if ( $active == "home"  ) { echo "active";} ; echo '" aria-current="page" href="./index.php?content=home">Home</a>
                 </li>';
         }
        ?>
        <li class="nav-item <?php if ( $active == "my-design" ) { echo "active";} ?>" >
          <a class="nav-link" href="./index.php?content=my-design">Occasions</a>
        </li>
        <li class="nav-item <?php if ( $active == "pricing" ) { echo "active";} ?>">
          <a class="nav-link" href="./index.php?content=pricing">Pricing</a>
        </div>
        </li>
       </ul>
        
    <ul class="navbar-nav ml-auto">
      <?php
        if (isset($_SESSION["id"])) {
          switch($_SESSION["userrole"])  {
            case 'admin':
              echo '<li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle ';
              echo (in_array($active, ["a-users", "a-reset_password"])) ? "active" : "";
              echo '" href="#" id="navbarDropdownMenulinkright" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        admin workbench
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenulinkright">
                        <a class="dropdown-item '; echo ($active == "a-users") ? "active" : ""; echo '" href="./index.php?content=a-users">users</a>
                        <a class="dropdown-item '; echo ($active == "a-reset_password") ? "active" : ""; echo '" href="./index.php?content=a-reset_password">reset password</a>
                      </div>
                    </li>';
              echo '<li class="nav-item '; echo ($active == "oop/class_example") ? "active" : ""; echo'">
                      <a class="nav-link" href="./index.php?content=oop/class_example">example</a>
                    </li>';
              echo '<li class="nav-item '; echo ($active == "oop/class_instances") ? "active" : ""; echo'">
                    <a class="nav-link" href="./index.php?content=oop/class_instances">instances</a>
                  </li>';
            break;
            case 'root':
              echo '<li class="nav-item '; echo ($active == "rootpage") ? "active" : ""; echo'">
                      <a class="nav-link" href="./index.php?content=rootpage">rootpage</a>
                    </li>';
            break;
            case 'moderator':
           
            break;
            case 'customer':
              echo '<li class="nav-item '; echo ($active == "bmi/test") ? "active" : ""; echo'">
                    <a class="nav-link" href="./index.php?content=bmi/test">BMI Calculater</a>
                  </li>';
            break;
            default:
            break;
          }
           echo '<li class="nav-item '.($active == 'logout'? 'active' : '').'">';
           echo '<a class="nav-link" href="./index.php?content=logout">logout</a>';
           echo '</li>';
       } else {
           echo '<li class="nav-item '.($active == 'register'? 'active' : '').'">';
           echo '<a class="nav-link" href="./index.php?content=register">Sign-up</a>';
           echo '</li>';
           echo '<li class="nav-item '.($active == 'login'? 'active' : '').'">';
           echo '<a class="nav-link" href="./index.php?content=login">Sign-in</a>';
           echo '</li>';
       }
     ?>   
    </ul>
  </div>
</nav>