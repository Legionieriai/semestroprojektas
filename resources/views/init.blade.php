<?php
    session_start();
    error_reporting(0);
    require 'connect';
    require 'general';
    require 'users';
    $errors = array();

error_reporting(0);
require 'C:\Users\Tomas\Desktop\Tutorials\Laravel5\resources\views\connect.blade.php';
require 'C:\Users\Tomas\Desktop\Tutorials\Laravel5\resources\views\general.blade.php';
require 'C:\Users\Tomas\Desktop\Tutorials\Laravel5\resources\views\users.blade.php';
if(logged_in() === true)
{
$session_user_id = $_SESSION['user_id'];
$user_data = user_data($session_user_id{'user_id'}, 'first_name', 'last_name', 'email');
if(user_active($user_data['username']) === false)
{
session_destroy();
header('Location: C:\Users\Tomas\Desktop\Tutorials\Laravel5\resources\views\users.blade.php');
exit();
}
}
$errors = array();
?>
