<div class="widget">
    <h2> Login/Register </h2>
    <div class="inner">
        <form action="login.php" method="post">
            <ul id="login">
                <li>
                    Username:<br>
                    <input type="username" name="username">
                </li>
                <li>
                    Password:<br>
                    <input type="password" name="password">
                </li>
                <li>

                    <input href="{{ route('loginn') }}" type="submit" value="Login">

                </li>
                <li>
                    <a href="register.php">Register</a>
                </li>
            </ul>
        </form>
    </div>


</div>