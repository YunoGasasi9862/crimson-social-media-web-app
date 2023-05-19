<?php

session_destroy();
setcookie("PHPSESSID", "", 1, "/"); //delete the cookie

header("Location: ../index.php")

?>