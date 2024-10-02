<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/php1/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Public/css/style.css">
</head>
<body>
    <div class="container-login">
        <div class="main-login">
            <h1 class="form-heading">Login</h1>
            <form action="auth/handleLogin" method="post">
                <div class="form-group">
                    <label for="">email</label> <br>
                    <input type="text" name="email" class="form-input" placeholder="email đăng nhập">
                </div>
                <div class="form-group">
                    <label for="">Password</label> <br>
                    <input type="password" name="password" class="form-input" placeholder="Mật khẩu"> <br>
                    <a href="">Forgot password?</a>
                </div>
                <input type="submit" value="Đăng nhập" class="form-submit">
                <p>Or Sign Up Using</p>
                <div class="or-sign">
                    <a href="">
                        <img width="30px" height="30px" src="img/Facebook_Logo_(2019).png" alt="">
                    </a>
                    <a href="">
                        <img width="30px" height="30px" src="img/twitter-6359396_960_720.png" alt="">
                    </a>
                    <a href="">
                        <img width="30px" height="30px" src="img/7465f30319191e2729668875e7a557f2.png" alt="">
                    </a>
                </div>
            </form>
            <a id="return" href="index.html">
                Quay về trang chủ
            </a>
        </div>
    </div>
</body>
</html>