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
                <input type="email" valuen="{{ Session::get('email') }}" name="email" class="iemail"
                required title="Silahkan masukkan email">
                <i class="fa-solid fa-user"></i>
            </div>

            <br>
            
            <label for="password" class="password">Password</label><br>
            <div class="input-container">
                <input type="password" name="password" class="ipassword"
                required oninvalid="this.setCustomValidity('Password belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nomor telepon">
                <i class="fa-solid fa-lock"></i>
            </div>

            <br>
            
            <button class="masuk" name="submit" type="submit" class="btn btn-primary">Masuk</button>
            
        </form>
    </div>

    <!-- alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
    <script>
        swal("Gagal","{{ Session::get('success') }}", 'error',{
            button:true,
            button:"OK",
            timer:2500,
        });
    </script>
    @endif
    
</body>
</html>