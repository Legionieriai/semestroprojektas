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
                var password = document.getElementById('password').value;
                $.ajax({
                    url: 'login',
                    type: 'GET',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        if(data[0]== "{") {
                            var obj = JSON.parse(data);

                            if (obj.active == 1) {
                                //alert("prisijungei");
                                //str.link("index.php");
                                window.location.href = 'main';
                                //document.getElementById("demo").innerHTML = result;





                            }
                        }else {
                            //alert(data);
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
<body bgcolor="#E6E6FA">
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
        <h2> Lost & Found </h2>
        <div class="inner">
            <h3><div id="result" style="color:#DF0101"></div></h3>
            <form >
                <ul id="loginh">
                    <li>
                        Prisijungimo vardas:<br>
                        <input type="textbox" id="username">
                    </li>
                    <li>
                        Slaptažodis:<br>
                        <input type="password" id="password">
                    </li>
                    <li>


                        <!--<a href="{ ('loginn') }}">login</a> -->
                        <input type="button" id="log" value="Prisijungti" >


                        <!--<input href="" type="submit" value="Login"> <input href="loginn" type="submit" value="Login">-->

                    </li>
                    <li>
                        Neturite paskyros? Registruokitės: <br>
                        <a href="register">Registruotis</a>
                        <div id="result"></div>
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