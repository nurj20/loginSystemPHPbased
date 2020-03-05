<?php
require "header.php"
?>

<div class="centerAlign">
    <section>
        <h1>Sign Up</h1>
        <form action="includes/signup.inc.php" method="POST" > <br>
        
        <input type="text" name="name" id="" placeholder="User name" class="Cpadding"><br>
        <input type="text" name="email" id="" placeholder="Email" class="Cpadding"><br>
        <input type="password" name="pwd" id="" placeholder="Password"><br>
        <input type="password" name="pwd-repeat" id="" placeholder="Repeat Password"><br>
        <button type="submit" name="signup">Sign Up</button>

        </form>
        <?php
        if (isset($_GET['error']))
        {
            if ($_GET['error'] == "passwordCheckFailed")
            echo "</p>password mismatch</p>" ; 
        }
        ?>
    </section>
</div>
</body>
</html>