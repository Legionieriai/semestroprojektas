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
            background-image: url("http://artrebels.com/sites/default/files/things4.jpg");
            font-family: Arial;
            font-size: 0.8em;
        }

        #conteiner, footer{
            background: #fff;
            width: 950px;
            margin: 0 auto;
            padding: 10px 2px 5px 20px;
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
        .h2 {
            font-family: Copperplate, Copperplate Gothic Light, fantasy;
            font-size: 24px;
            font-style: normal;
            font-variant: normal;
            font-weight: 700;
            line-height: 5px;

        }
    </style>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script>



        $(document).ready(function() {
            $('#log').click(function() {

                var username = document.getElementById('username').value;
                var password1 = document.getElementById('password1').value;
                var password2 = document.getElementById('password2').value;
                var email = document.getElementById('email').value;
                $.ajax({
                    url: 'checkname',
                    type: 'GET',
                    data: {
                        username: username,
                        password1: password1,
                        password2: password2,
                        email: email,
                    },
                    success: function(data) {
                        setTimeout(function(){
                            //do what you need here
                        }, 2000);
                        if(data == "taip") {
                            window.location.href = 'signin';
                        }else {
                            $('#result').html(data)
                        }


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
    <h2 class="h2">Lost & Found : Rasti - Pamesti daiktai</h2>
    <nav>
        <u1>
            <li><a href=""><font color="white"><h3>< Gryžti</h3></font></a></li>
        </u1>
    </nav>
    <div class="clear"></div>
</header>
<div id="conteiner">




        <div class="widget">
            <h1> Registracija </h1>
            <div class="inner">
                <h3><div id="result" style="color:#DF0101"></div></h3>
                <form >
                    <ul id="loginh">
                        <li>
                            Prisijungimo vardas:<br>
                            <input type="textbox" id="username">
                        </li>
                        <li>
                            El-paštas:<br>
                            <input type="textbox" id="email">
                        </li>
                        <li>
                            Slaptažodis:<br>
                            <input type="password" id="password1">
                        </li>
                        <li>
                            Pakartoti slaptažodį:<br>
                            <input type="password" id="password2">
                        </li>
                        <li>


                            <!--<a href="{ ('loginn') }}">login</a> -->
                            <input type="button" id="log" value="Registruotis" >


                            <!--<input href="" type="submit" value="Login"> <input href="loginn" type="submit" value="Login">-->

                        </li>
                    </ul>
                </form>
            </div>


        </div>

</div>
<footer style="color:black; font-weight: bold; padding:15px 11px 12px 11px;">
    &copy; Lost & Found 2016 All rights reserved.
</footer>
</body>
</html>