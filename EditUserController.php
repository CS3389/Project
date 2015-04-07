<h1><img src="images/taylorUbanner.jpg" alt="Taylor University"></h1>
<?php

include 'User.php';

$theUser = new User;
//$theUser = new User($_POST["username"], $_POST["password"]
  //      , $_POST["role"]);

$theUser->UpdateUser($_GET['edit_id'], $_POST["username"], $_POST["password"]
        , $_POST["role"]);


?>