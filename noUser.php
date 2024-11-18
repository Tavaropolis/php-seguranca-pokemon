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
    <link rel="stylesheet" href="./css/noUser.css">
    <title>Área sem usuário</title>
</head>
<body>
    <main>
        <form action="#" method="get">
            <input type="text" name="inputUser" id="" placeholder="Pesquise um pokémon">
            <button type="submit">Pesquisar</button>
        </form>
        <?php
            if(isset($_GET['inputUser'])) {
                echo "<p>Você pesquisou por '{$_GET['inputUser']}' </p>"; 

                try {
                    $query = $conn->prepare("SELECT * FROM pokemon WHERE nome = :input OR tipo1 = :input OR tipo2 = :input OR evolucao = :input OR geracao = :input;");
                    $query->bindParam(':input', $_GET['inputUser']);
                    $query->execute();
    
                    $pokemons = $query->fetchAll(PDO::FETCH_ASSOC); 
                } catch(Exception $e) {
                    echo $e;
                }
            }
        ?>
        <?php if($_GET['inputUser']): ?>
        <table>
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Tipo 1</th>
                <th>Tipo 2</th>
                <th>Evolução</th>
                <th>Geração</th>
            </thead>
            <tbody>
                <?php foreach ($pokemons as $pokemon): ?>
                <tr>
                    <td><?= $pokemon['id'] ?></td>
                    <td><?= $pokemon['nome'] ?></td>
                    <td><?= $pokemon['tipo1'] ?></td>
                    <td><?= $pokemon['tipo2'] ?></td>
                    <td><?= $pokemon['evolucao'] ?></td>
                    <td><?= $pokemon['geracao'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </main>
</body>
</html>