<?php
    require "pdoconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./assets/pokeball.png" type="image/x-icon"> 
    
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/newAccount.css">

    <script src="./scripts/newAccount.js" defer></script>
    <title>Criar conta</title>
</head>
<body>
    <header>
        <img src="./assets/pokeball.png" alt="Pokébola">
        <h1>Criar nova conta</h1>
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
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="label-input">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" name="password" required>
                    <img src="./assets/visibility.svg" alt="" class="visible-icon">
                </div>
            </div>
            <div class="label-input">
                <label for="password-confirm">Confirmar Password</label>
                <div class="password-container">
                    <input type="password" name="password-confirm" required>
                    <img src="./assets/visibility.svg" alt="" class="visible-icon">
                </div>
            </div>
            <div class="buttons-container">
                <button type="submit">Criar</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
    <?php 
            if(isset($_POST['user'], $_POST['email'], $_POST['password'], $_POST['password-confirm'])) {

                $encrypt = encryptPassword($_POST['password']);

                $salt = $encrypt[0];
                $password = $encrypt[1];
                $pepper = $encrypt[2];

                $checkUser = checkAvaibleUser($_POST['user']);
                if(count($checkUser)) {
                    echo "<p>Usuário já cadastrado</p>";
                    exit();
                }

                $checkEmail = checkAvaibleEmail($_POST['email']);
                if(count($checkEmail)) {
                    echo "<p>Email já cadastrado</p>";
                    exit();
                }

                if(strlen($_POST['password']) <= 4) {
                    echo "<p>Senha muito curta. Ela deve ter mais de 4 digítos</p>";
                    exit(); 
                }

                if($_POST['password'] != $_POST['password-confirm']) {
                    echo "<p>Senha e econfirmação de senha inválidos</p>";
                    exit();
                }
                
                $msg = insertNewUser($_POST['user'], $_POST['email'], $salt, $password, $pepper);
                echo $msg;
            } 
        ?>
   </main>
</body>
</html>

<?php
    function encryptPassword(string $password): array {
        $salt = bin2hex(random_bytes(16));
        $pepper = bin2hex(random_bytes(16));
        $password = $salt.$password.$pepper;
        $password = password_hash($password, PASSWORD_BCRYPT);

        return [$salt, $password, $pepper];
    }

    function checkAvaibleUser(string $user): array {
        global $conn;

        try {
            $checkUser = $conn->prepare("SELECT username FROM users WHERE username = :user LIMIT 1");
            $checkUser->bindParam(':user', $user);
            $checkUser->execute();
            $checkUser = $checkUser->fetchAll(PDO::FETCH_ASSOC); 

            return $checkUser ? $checkUser : [];
        } catch(Exception $e) {
            return $e;
        }
    }

    function checkAvaibleEmail(string $email): array {
        global $conn;

        try {
            $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = :email LIMIT 1");
            $checkEmail->bindParam(':email', $email);
            $checkEmail->execute();
            $checkEmail = $checkEmail->fetchAll(PDO::FETCH_ASSOC); 

            return $checkEmail ? $checkEmail : [];
        } catch(Exception $e) {
            return $e;
        }
    }

    function insertNewUser(string $user, string $email, string $salt, string $password, string $pepper): string {
        global $conn;

        try {
            $insertUser =  $conn->prepare("INSERT INTO users(username, email, salt, userPassword, pepper, roleId) VALUES (:user, :email, :salt, :password, :pepper, 2)");
            $insertUser->bindParam(':user', $user);
            $insertUser->bindParam(':email', $email);
            $insertUser->bindParam(':salt', $salt);
            $insertUser->bindParam(':password', $password);
            $insertUser->bindParam(':pepper', $pepper);

            $insertUser->execute();

            return "<p>Usuário cadastrado com sucesso</p>";
        } catch(Exception $e) {
            return "<p>Erro ao cadastrar usuário</p>";
        }
    }
?>