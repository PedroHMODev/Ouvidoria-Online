<?php
$conexao = mysqli_connect("localhost", "root", "", "");
if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    echo 'Banquinho criado<br>';
    $conexao = mysqli_connect("localhost", "root", "", "banquinho");
} else {
    echo "banquinho quebrou<br>";
}

mysqli_select_db($conexao, "banquinho");

mysqli_query($conexao, 
    "CREATE TABLE IF NOT EXISTS dados (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255),
        reclamation VARCHAR(255),
        PRIMARY KEY (id)
    )"
);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reclamation = $_POST["reclamation"];

    $dento = "INSERT INTO dados(nome, email, remedio) 
                VALUES ('$name', '$email', '$reclamation',)";

    if (mysqli_query($conexao, $dento)) {
        echo "Deu Certo!";
    } else {
        echo "Falhou :(" . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>



































<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria Online | mame Aqui!</title>
    <link rel="stylesheet" href="../statics/style.css">
    <script src="../templts/script.js" defer></script>
</head>
<body>
    <div class="header" id="header">
        <button onclick="toggleSidebar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
        </button>
        <div class="header-title">Ouvidoria Online</div>
        <div id="navigation_header" class="navigation_header">
            <button onclick="toggleSidebar()" class="btn_icon_header">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
            <a href="#" class="active">Home</a>
            <a href="#">Login</a>
            <a href="#">Sobre nós</a>
            <a href="#">Contato</a>
        </div>
        <div class="logo_header">
            <img src="" class="img_logo_header" alt="Logo">
        </div>
    </div>
    <div tabindex="0" onclick="closeSidebar()" class="content" id="content">
        <h1>Página da Ouvidoria</h1>
    </div>
</body>
</html>
