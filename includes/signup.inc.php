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

    redirect("error&emptyFiled&username=".$name.'&email='.$email);
   
else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    redirect("error=invalidEmail&username=".$name);

else if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]*$/", $name))
    redirect("error=invalidUsername&email=".$email);
   
else if ($pwd !== $pwdRepeat)
    redirect("error=passwordCheckFailed&username=".$name.'&email='.$email);

else{
    $sql = 'select id from users where name= :name;';
    $stmt= $pdo->prepare($sql);
    $stmt->execute(['name' => $name]);
    if ($stmt->rowCount()>0){
        $message="nameAlreadyTaken&username&email=".$email;
        redirect($message);
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