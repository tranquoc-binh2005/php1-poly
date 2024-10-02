<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/php1/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
    <link rel="stylesheet" href="./Public/css/style.css">
</head>
<body>
    <div class="container-login">
        <div class="main-login">
            <h1 class="form-heading">Đăng ký</h1>
            <form action="auth/handleRegister" method="post">
                <div class="form-group">
                    <label for="">Họ và tên: </label> <br>
                    <input type="text" name="name" class="form-input" placeholder="Họ và tên" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label> <br>
                    <input type="email" name="email" class="form-input" placeholder="Ví dụ abc@gmail.com" required> <br>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label> <br>
                    <input type="password" name="password" class="form-input" placeholder="Nhập mật khẩu" required> <br>
                </div>
                <div class="form-group">
                    <label for="">Xác nhận mật khẩu</label> <br>
                    <input type="password" name="confirm" class="form-input" placeholder="Xác nhận mật khẩu" required> <br>
                </div>
                <input type="submit" name="btnRegister" value="Đăng ký" class="form-submit">
            </form>
            <a id="return" href="index.html">
                Quay về trang chủ
            </a>
        </div>
    </div>
</body>
</html>