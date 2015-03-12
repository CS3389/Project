<?php

include 'User.php';

$user = new User($_POST["username"], $_POST["password"], $_POST["role"]);

$user->saveUser();