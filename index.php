<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./assets/pokeball.png" type="image/x-icon">

    <script src="./scripts/index.js" defer></script>
    <title>PokeDatabase</title>
</head>
<body>
    <header>
        <img src="./assets/pokeball.png" alt="Pokébola">
        <h1>Pokélogin</h1>
        <img src="./assets/pokeball.png" alt="Pokébola">
    </header>
    <main>
        <div class="main-container">
            <form action="#" method="post">
                <div class="label-input">
                    <label for="user">Username</label>
                    <input type="text" name="user" required>
                </div>
                <div class="label-input">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" name="password" required>
                        <img src="./assets/visibility.svg" alt="" class="visible-icon">
                    </div>
                </div>
                <button type="submit">Entrar</button>
                <div class="secondary-buttons">
                    <a href="./newAccount.php"><button type="button">Criar Conta</button></a>
                    <a href="./forgotPassword.php"><button type="button">Esqueci minha senha</button></a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=pokedatabase", "root", "1234");
        // $query = $conn->prepare("select * FROM pokemon");
        // $query->execute();
 
        // for($i=0; $row = $query->fetch(); $i++){
        //   echo $i." - ".$row['nome']."<br/>";
        // }
    } catch (PDOException $e) {
        echo $e;
    }  

    // if($_POST['user'] = 'user') {
    //     header("location: user.php");
    //     die();
    // }

    if($_POST['user'] == 'admin') {
        header("location: admin.php");
        die();
    }

?>