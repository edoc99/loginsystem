<?php

//starting to end it
session_start();
//deletes all values inside session variables
session_unset();
session_destroy();
header("Location: ../index.php");