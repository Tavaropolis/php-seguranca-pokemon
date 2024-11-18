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
                <input type="text" name="user">
            </div>
            <div class="label-input">
                <label for="email">Email</label>
                <input type="email" name="email">

            </div>
            <div class="label-input">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" name="password">
                    <img src="./assets/visibility.svg" alt="" class="visible-icon">
                </div>
            </div>
            <div class="label-input">
                <label for="password-confirm">Confirmar Password</label>
                <div class="password-container">
                    <input type="password" name="password-confirm">
                    <img src="./assets/visibility.svg" alt="" class="visible-icon">
                </div>
            </div>
            <div class="buttons-container">
                <button type="submit">Criar</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
   </main>
</body>
</html>