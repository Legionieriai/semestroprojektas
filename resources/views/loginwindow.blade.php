<!doctype html>
<html>

<head>
    <title>LostAndFound</title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" tipe=text/css">
    <style>
        ul{
            padding: 0;
            margin: 0 0 20px 0;
            list-style: none;
        }

        h1, h2 {
            padding: 0;
            margin: 0 0 20px 0;
            font-weight: normal;
        }
        p{
            padding: 0;
            margin: 0 0 20px 0;
        }

        a:link, a:visited{
            text-decoration: underline;
            color: #000;
        }

        a:hover{
            text-decoration: none;
        }

        ul li {
            padding: 5px 0;
        }

        ul li input[type="text"], ul li input[tipe="password"]{
            width: 200px;
        }

        h1{
            font-size: 1.8em;
        }

        h1{
            font-size: 1.4em;
        }

        .logo{
            font: 2em Arial;
            margin: 0 0 10px 0;
            padding: 0;
            width: 200px;
            color: #fff;
        }

        body{
            background: lightslategrey;
            font-family: Arial;
            font-size: 0.8em;
        }

        #conteiner, footer{
            background: #fff;
            width: 920px;
            margin: 0 auto;
            padding: 20px;
        }

        header{
            width: 940px;
            padding: 10px;
            margin: 0 auto 10px auto;
        }

        #conteiner{
            min-height: 500px;
            border-radius: 5px 5px 0 0;
        }

        footer{
            border-radius: 0 0 5px 5px;
        }

        .widget{
            margin-bottom: 20px;
        }

        .widget h2{
            margin: 0 0 10px 0;
            padding: 5px;
            font-weight: normal;
            border-bottom: 1px solid #ddd;
        }

        .widget.inner{
            margin: 0 10px;
        }

        nav{
            float: left;
        }

        nav ul{
            margin: 0;
        }

        nav ul li{
            display: inline;
            margin-right: 10px;
        }

        nav ul li a{
            text-decoration: none;
        }

        nav ul li.current{
            font-weight: bold;
        }

        nav ul li a.last{
            border-right: 0;
        }

        aside{
            width: 260px;
            float:right;
            border: 1px dashed #aaa;
            padding-left:15px;
        }

        #login li.link{
            margin-top: 5px;
        }

        footer{
            border-top: 1px dashed #ddd;
            color: #999;
        }

        .clear{
            clear: both;
        }
    </style>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#log').click(function() {

                var username = document.getElementById('username').value;
                var password = document.getElementById('password').value;
                $.ajax({
                    url: 'login',
                    type: 'GET',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        if
                        alert(data);
                    },
                    error: function() {
                        alert('error:_database');
                    }

                });
            });
        });
    </script>


</head>
<body>
<header>
    <h1 class="logo">Lost And Found</h1>
    <nav>
        <u1>
            <li><a href="index.php">Home</a></li>
        </u1>
    </nav>
    <div class="clear"></div>
</header>
<div id="conteiner">
    <aside>



    <div class="widget">
        <h2> Login/Register </h2>
        <div class="inner">
            <form >
                <ul id="loginh">
                    <li>
                        Username:<br>
                        <input type="textbox" id="username">
                    </li>
                    <li>
                        Password:<br>
                        <input type="textbox" id="password">
                    </li>
                    <li>


                        <!--<a href="{ ('loginn') }}">login</a> -->
                        <input type="button" id="log" value="login" >


                        <!--<input href="" type="submit" value="Login"> <input href="loginn" type="submit" value="Login">-->

                    </li>
                    <li>
                        <a href="register.php">Register</a>
                        <div id="result"></div>
                    </li>
                </ul>
            </form>
        </div>


    </div>
    </aside>
    <h1>Register</h1>
    <p> Registration page </p>
</div>
<footer>
    &copy; phpacademy.org 2011 All rights reserved.
</footer>
</body>
</html>