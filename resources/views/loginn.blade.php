<?php
 include 'C:\Users\Tomas\Desktop\Tutorials\Laravel5\resources\views\init.blade.php';
if(empty($_POST)===false){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)===true || empty($password)=== true)
        {
            $errors[] = 'You need to enter a username and password';
        } elseif (user_exists($username)===false)
        {
            $errors[] = 'We can not find  that username. Have you registered?' ;
        }elseif (user_active($username)===false)
        {
            $errors[] = 'You haven\'t activated your account.' ;
        }else {
        $login = login($username, $password);if($login === false)
            {
                $errors[] = 'That username/password cobination is correct';
            } else {
            $_SESSION['user_id'] = $login;
            header('Location: index.blade.php');
            exp();
        }
    }
    print_r($errors);
    }
?>