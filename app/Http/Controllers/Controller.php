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


            $sql = "SELECT * FROM `locations`";

            if (mysqli_query($con, $sql)) {


                $res = mysqli_query($con, $sql);

                $things = array();
                while ($row = mysqli_fetch_array($res)) {
                    $thing = array(
                        "type"        => $row['type'],
                        "address"         => $row['address'],
                        "xcoord"         => $row['xcoord'],
                        "ycoord"         => $row['ycoord'],
                        "comment"          => $row['comment'],
                        "telephone"          => $row['telephone'],
                        "email"          => $row['email'],
                        "picture"       => $row['picture']
                    );
                    $things[] = $thing;
                }

                echo json_encode($things);



                //echo 'success';
            }

            $con->close();


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
            $psw = "SELECT `password` FROM users WHERE `password` = '$password'";


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
                    echo ('Prašome įvesti prisijungimo vardą ir slaptažodį');
                //} elseif (($username) == false) {
                //    $errors[] = 'You haven\'t activated your account.';
                } elseif (strcasecmp($val[2], $username) != 0) {
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







}


