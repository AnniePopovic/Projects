<?php
session_start();
unset($_SESSION["loggedIn"]);
unset($_SESSION["useremail"]);
header("Location:index.php");
