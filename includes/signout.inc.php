<?php
include '../helpers/helpers.php';
include 'dbh.inc.php';
session_start();
session_unset();
session_destroy();
$pdo = null;
redirect('LoggedOut');
?>