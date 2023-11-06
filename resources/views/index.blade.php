<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <title>Document</title>
</head>

<body>
    <img src="images/snputih.jpg" alt="">
    
    <div class="tabel">
        <h1>Login</h1>
        <form action="login" method="POST">
            @csrf

            <label for="email" class="email">Email</label><br>
            <div class="input-container">
                <input type="email" valuen="{{ Session::get('email') }}" name="email" class="iemail">
                <i class="fa-solid fa-user"></i>
            </div>

            <br>
            
            <label for="password" class="password">Password</label><br>
            <div class="input-container">
                <input type="password" name="password" class="ipassword">
                <i class="fa-solid fa-lock"></i>
            </div>

            <br>
            
            <button class="masuk" name="submit" type="submit" class="btn btn-primary">Masuk</button>
            
        </form>
    </div>
    
</body>
</html>