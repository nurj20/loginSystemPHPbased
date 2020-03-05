<?php
 include '../helpers/helpers.php';

if(!isset($_POST['login']))
    {
        header("Location: ../signin.php?error=AccessDenied");
        exit();
    }

  if (empty($_POST['name']) || empty($_POST['password']))
       {
        // redirect('EmptyFileds');
        header("Location: ../signin.php?error=EmptyFields");
        exit();
       }
        require 'dbh.inc.php';
        $name = $_POST['name'];
        $pwd = $_POST['password'];
        $sql  = 'Select * from users where name = :name;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
        if ($stmt->rowCount()===1)
            {
                $data = $stmt->fetch();
                if ($data->name === $name && password_verify($pwd, $data->pwd))
                    {
                        session_start();
                        $_SESSION['user']  = $data->name;
                        $_SESSION['last_login_timestamp'] = time();
                        header('Location: ../index.php?status=LoggedIn&user='.$data->name);
                        exit();
                    }
                    else  header('Location: ../signin.php?error=invalidusernameorpassword');
                            exit();
            }    
            else header('Location: ../signin.php?errorInvalidCredencials');
                exit();
                    
               

