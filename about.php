<?php

require 'includes/dbh.inc.php';
require 'header.php';

if(isset($_SESSION['user']))
{
    if(time()-$_SESSION['last_login_timestamp'] > 60)
    header("Location: includes/signout.inc.php");
}
else
$_SESSION['last_login_timestamp']=time();
?>
<body>
<br>
<br>
<div class="centerAlign">
    <h1>coming soon....</h1>
</div>
</body>
</html>