<?php
function user_exists($username)
    {
        $username = sanitize($username);
        $query = mysqli_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username'");
        return (mysqli_result(mysqli_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username'"), 0)==1) ? true : false;

        $username = sanitize($username);
        $query = mysqli_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username'");
        return (mysqli_result(mysqli_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username' AND 'active' = 1"), 0)==1) ? true : false;

        function user_id_from_username($username){
            $username = sanitize($username);
            return mysqli_result(mysqli_query("SELECT 'user_id' FROM 'users' WHERE 'username' = '$username'"), 0,  'user_id');
        }

        function login ($username, $password)
            {
                $user_id = user_id_from_username($username);
                $username = sanitize($username);
                $password = md5($password);
                return (mysqli_result(mysql_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username' AND 'password' = '$password'"), 0)==1) ? $user_id : false;
            }
    }

?>