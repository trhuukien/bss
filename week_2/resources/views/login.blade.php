<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>

</head>

<body>
    <!-- Form Login -->
    <div class="form-login">
        <form class="box" method="POST">
            @csrf
            <div class="content-box">
                <h3 style="color: #747272">SOIOT SYSTEM</h3>
                <center>
                    <span class="txt1" style="color: red; font-family: Arial, Helvetica, sans-serif;">
                        @if(session('msg'))
                        <p>{{session('msg')}}</p>
                        @endif
                    </span>
                </center>
                <input class="input-active" type="text" name="username" id="username" placeholder="user name" required>
                <input class="input-active" type="password" name="password" id="password" placeholder="password" required>

                <div>
                    <button name="btn-submit" type="submit" class="btn">LOGIN</button>
                    <a href="#" style="text-decoration: none;">Sign-up</a>
                </div>
            </div>
        </form>
    </div>
    <!-- End Form Login -->
</body>


</html>