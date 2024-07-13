<!DOCTYPE html>
<html>
<head>
    <title>Login Multi User Level - POLTEK AGA</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'Nunito', sans-serif;
            overflow: hidden;
            color: #fff;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-in-out;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .kotak_login {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            color: #333;
            animation: fadeInUp 1s ease-in-out;
        }
        .tulisan_login {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
        }
        .form_login {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .tombol_login {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background-color: #4e73df;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .tombol_login:hover {
            background-color: #3b5cb8;
            transform: scale(1.05);
        }
        .alert {
            margin-bottom: 20px;
            color: #f44336;
            font-size: 16px;
            text-align: center;
        }
        .link {
            font-size: 16px;
            color: #4e73df;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .background-circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: move 10s infinite ease-in-out;
        }
        @keyframes move {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-20px) translateX(20px);
            }
        }
        .circle:nth-child(1) {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 10%;
        }
        .circle:nth-child(2) {
            width: 300px;
            height: 300px;
            top: 30%;
            right: 10%;
        }
        .circle:nth-child(3) {
            width: 150px;
            height: 150px;
            bottom: 10%;
            left: 50%;
        }
    </style>
</head>
<body>

    <h1>POLTEK AGA</h1>

    <?php 
    if(isset($_GET['pesan']) && $_GET['pesan']=="gagal"){
        echo "<div class='alert'>Username dan Password tidak sesuai!</div>";
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <form action="cek_login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <input type="submit" class="tombol_login" value="LOGIN">

          
        </form>
    </div>

    <div class="background-circles">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

</body>
</html>
