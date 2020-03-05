<?php
require "header.php";
?>

<div class="centerAlign">
<section>
    <h1>Sign In</h1>

    <form action="includes/login.inc.php" method="POST">
   <input type="text" name="name" id="Uname" placeholder="User Name" class="Cpadding">
    <br>
    <input type="password" name="password" id="passwd" placeholder="Password..." class="Cpadding">
    <br>
    <button type="submit" name="login" class="Cpadding">Login</button>
    </form>

 </section>
    </div>
</body>
</html>