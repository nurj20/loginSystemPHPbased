<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login System</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <header>
        <nav>
            
            <ul>
                <li><a href="">
                <img src="img/apple.png" alt="Apple Image Is Supposed To Appear Here">
            </a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About US</a></li>
                <li><a href="contact.php">Contact</a></li> 
                <?php 
                    if (isset($_SESSION['user'])){
                        echo '<li><a href="includes/signout.inc.php" style="float:right">LogOut</a></li> ';
                    }
                    else{
                        echo '<li><a href="signin.php" style="float:right">LogIn</a></li>
                         <li><a href="signup.php" style="float:right">SignUp</a></li>'; 
                      
                    }
                ?>
            </ul>
            
        </nav>
    </header>