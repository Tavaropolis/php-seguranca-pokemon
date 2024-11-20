<?php
    require "pdoconn.php";

    session_start();

    if(isset($_SESSION['role1Log'])) {
        header("location: admin.php");
        die();
    }

    if(isset(($_SESSION['role2Log']))) {
        header("location: user.php");
        die();
    }
?>
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
                    <a href="./noUser.php"><button type="button">Entrar sem conta</button></a>
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST["user"], $_POST["password"])) {
                $checkUser = searchUser($_POST['user']);
    
                if(count($checkUser)) {
                    $salt = $checkUser["salt"];
                    $password = $checkUser["userPassword"];
                    $pepper = $checkUser["pepper"];
                    
                    if(validatePassword($_POST["password"], $salt, $password, $pepper)) {
                        session_start();
                        $username = $checkUser["username"];
                        $roleId = $checkUser["roleId"];
                        
                        if($username == 'admin' && $roleId == '1') {
                            $_SESSION['role1Log'] = true;
                            header("location: admin.php");
                            die();
                        } else {
                            $_SESSION['role2Log'] = true;
                            header("location: user.php");
                            die();
                        }
                    } else {
                        echo "<p>Usuário ou senha inválidos</p>";
                    }
                } else {
                    echo "<p>Usuário ou senha inválidos</p>";
                }
            }
        ?>
    </main>
</body>
</html>

<?php
    function searchUser(string $user): array{
        global $conn;
        
        try {
            $checkUser = $conn->prepare("SELECT * FROM users WHERE username = :user LIMIT 1");
            $checkUser->bindParam(':user', $user, PDO::PARAM_STR);
            $checkUser->execute();
            $checkUser = $checkUser->fetch(PDO::FETCH_ASSOC);

            return $checkUser;
        } catch (Exception $e) {
           echo $e;
        }
    }

    function validatePassword(string $userInput, string $salt, string $password, string $pepper): string {
        $userInput = hash('sha256', $salt.$userInput.$pepper);
        
        return $userInput == $password? true : false;
    }
?>