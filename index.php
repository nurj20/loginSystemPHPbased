<?php
require "header.php";

if (isset($_SESSION['user'])){
    if (time() - $_SESSION['last_login_timestamp'] > 60)
    {
        header("Location: includes/signout.inc.php");
    }
    else{
        echo "<p>You are logged in!</p>";
        $_SESSION['last_login_timestamp'] = time();
        }
}
else{
    echo "<div class='centerAlign'><h1>You are logged Out!!</h1></di>";
}

?>
<br>
<div style="width:50%;border:2px solid red;margin:auto;">
    <p>This project only contains logic for signingup, logging in, auto (after one minute of inactivity) as well as manual logout.<br>
    All the success as well as error messages will be appended to the URL.
</p>
</div>
</body>
</html>