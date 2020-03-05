<?php
require '../helpers/helpers.php';

if (!isset($_POST['signup']))
    redirect('AccessDenied');

require 'dbh.inc.php';

$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwdRepeat = $_POST['pwd-repeat'];

if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat) )
    header("Location: ../signup.php?error=emptyFiled");
   
else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    header("Location: ../signup.php?status=error&invalidEmail&username=".$name);
    
else if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]*$/", $name))

    header("Location: ../signup.php?error=invalidUsername&email=".$email);
   
else if ($pwd !== $pwdRepeat)
    header("Location: ../signup.php?error=passwordCheckFailed&username=".$name.'&email='.$email);

else{
    $sql = 'select id from users where name= :name;';
    $stmt= $pdo->prepare($sql);
    $stmt->execute(['name' => $name]);
    if ($stmt->rowCount()>0){
       header("Location: ../signup.php?error=nameAlreadyTaken&email=".$email);
    }
    else{
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        try{
        $sql = 'insert into users (name, email, pwd) values (:name, :email, :pwd);';
       $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'pwd' => $hashed_pwd]);
        }
        catch(PDOEXCEPTION $e){
            redirect($e->getMessage());
        }
        $pdo = null;
        redirect('registrationSuccessful');
    }
}
?>