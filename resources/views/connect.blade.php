<?php
//$connect_error = 'Sorry, we\'re experiencing connection problems';
//mysql_connect('127.0.0.1','root','');
//mysql_select_db('lostandfound') or die($connect_error);
//?>

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname="lostandfound";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
