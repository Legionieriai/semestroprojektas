<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    public function receiveReverseGeocodeInformation(AuthorizesRequests $request)
    {

        $userID = $request['userID'];
        $userName = $request['userName'];
        return view('test', [
            'userID' => $userID,
            'userName' => $userName
        ]);
        echo "hello";
    }

    public function insertData()
    {
        if (isset($_GET['address'])) {
            //echo $_GET['address'];

            $typ = $_GET['type'];
            $addr = $_GET['address'];
            $xco = $_GET['xcoord'];
            $yco = $_GET['ycoord'];
            $comm = $_GET['comment'];
            $emai = $_GET['email'];
            $num = $_GET['telephone'];
            $pic = $_GET['picture'];

            define('HOST', 'localhost');
            define('USERNAME', 'root');
            define('PASSWORD', 'psw');
            define('DB', 'lostandfound');

            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

            //mysqli_query("SET NAMES 'utf8'");
            $sql = "INSERT INTO locations (type ,address, xcoord, ycoord, comment, email, telephone, picture)
                    VALUES ('$typ', '$addr', '$xco','$yco','$comm','$emai','$num','$pic')";

            if (mysqli_query($con, $sql)) {
                echo 'success';
            }

            $con->close();


        } else {
            echo "Error: not_found";
        }


    }



    public function getData()
    {



            define('HOST', 'localhost');
            define('USERNAME', 'root');
            define('PASSWORD', 'psw');
            define('DB', 'lostandfound');

            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

            if(mysqli_connect(HOST, USERNAME, PASSWORD, DB)) {

                $sql = "SELECT * FROM `locations`";

                //if (mysqli_query($con, $sql)) {


                    $res = mysqli_query($con, $sql);

                    $things = array();
                    while ($row = mysqli_fetch_array($res)) {
                        $thing = array(
                            "type" => $row['type'],
                            "address" => $row['address'],
                            "xcoord" => $row['xcoord'],
                            "ycoord" => $row['ycoord'],
                            "comment" => $row['comment'],
                            "telephone" => $row['telephone'],
                            "email" => $row['email'],
                            "picture" => $row['picture']
                        );
                        $things[] = $thing;
                    }

                    echo json_encode($things);


                    //echo 'success';
                }

                $con->close();

            //} else echo ("error: database_connection");
    }

    public function showloginn()
    {
        return view('loginn');
    }



    public function login()
    {

        if(isset($_GET['username'])) {
            //if (empty($_GET['username']) == false) {

            $username = $_GET['username'];
            $password = $_GET['password'];

            define('HOST', 'localhost');
            define('USERNAME', 'root');
            define('PASSWORD', 'psw');
            define('DB', 'lostandfound');

            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

            //mysqli_query("SET NAMES 'utf8'");
            //echo $usr;
            $usr = "SELECT * FROM users WHERE `username` = '$username' and `password` = '$password'";
            //$psw = "SELECT `password` FROM users WHERE `password` = '$password'";


            if (mysqli_query($con, $usr)) {


                $res = mysqli_query($con, $usr);
                $row = mysqli_fetch_array($res);

                    $thing = array(
                        "user_id" => $row['user_id'],
                        "username" => $row['username'],
                        "password" => $row['password'],
                        "first_name" => $row['first_name'],
                        "last_name" => $row['last_name'],
                        "email" => $row['email'],
                        "active" => $row['active']
                    );
                $i=0;
                foreach($thing as $x => $x_value) {
                    $val[$i]= $x_value;
                   $i=$i+1;
                }
                //if (strcasecmp($val[2], $username) != 0)




                if (empty($username) == true || empty($password) == true) {
                    echo ('Įveskite prisijungimo vardą ir slaptažodį');
                //} elseif (($username) == false) {
                //    $errors[] = 'You haven\'t activated your account.';
                } elseif (strcasecmp($val[1], $username) != 0) {
                        echo('Neteisingas prisijungimo vardas arba slaptažodis');

                    }

                else {
                    echo json_encode($thing);
                    }

                //$key = 'username';
                //$value = $things[$key];
                //print $value;
                //echo (printf ("%s \n", $thing[0]));
                //echo ($val[2]);
            }

        }



                $con->close();
    }


    public function getname()
    {


        if(isset($_GET['username'])) {
            //if (empty($_GET['username']) == false) {

            $username = $_GET['username'];
            $password1 = $_GET['password1'];
            $password2 = $_GET['password2'];
            $email = $_GET['email'];

            define('HOST', 'localhost');
            define('USERNAME', 'root');
            define('PASSWORD', 'psw');
            define('DB', 'lostandfound');

            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

            //mysqli_query("SET NAMES 'utf8'");
            //echo $usr;
            $usr = "SELECT * FROM users WHERE `username` = '$username' ";


            if (mysqli_query($con, $usr)) {


                $res = mysqli_query($con, $usr);
                $row = mysqli_fetch_array($res);

                $thing = array(
                    "user_id" => $row['user_id'],
                    "username" => $row['username'],
                    "password" => $row['password'],
                    "first_name" => $row['first_name'],
                    "last_name" => $row['last_name'],
                    "email" => $row['email'],
                    "active" => $row['active']
                );
                $i=0;
                foreach($thing as $x => $x_value) {
                    $val[$i]= $x_value;
                    $i=$i+1;
                }
                //if (strcasecmp($val[2], $username) != 0)



                if (!preg_match('/^[a-zA-Z0-9]{5,}$/',$username)) {
                    echo("Naudotojo vardą turi sudaryt tik raidės ir skaičiai");
                } elseif (empty($username) == true || empty($password1) == true || empty($email) == true || empty($password2) == true) {
                    echo ('Įveskite visus duomenis');
                    //} elseif (($username) == false) {
                    //    $errors[] = 'You haven\'t activated your account.';
                } elseif (strcasecmp($val[2], $username) == 0) {
                    echo('Prisijungimo vardas užimtas');

                }
                elseif ($password1 != $password2) {
                    echo('Nesutampa slaptažodžiai');

                }
                elseif (strlen($password1) <= '8') {
                    echo("Slaptažodis turi būti sudarytas bent iš 8 simbolių");
                }

                elseif (strcasecmp($val[2], $username) == 0) {
                    echo('Prisijungimo vardas užimtas');

                }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo("Neteisingas el-pašto adresas");
                }

                else {


                    $sql = "INSERT INTO users (username, password, first_name, last_name, email, active)
                    VALUES ('$username', '$password1', '','','$email','1')";

                    if (mysqli_query($con, $sql)) {
                        echo ("taip");
                    } else echo("dberr");

                }


            }

        }



        $con->close();
    }




}


