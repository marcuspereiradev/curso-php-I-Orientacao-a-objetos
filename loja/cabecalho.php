
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("mostra-alerta.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/loja.css">
</head>
<body>

    <div class="navbar navbar-dark bg-dark navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Minha loja</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="produto-lista.php">Produtos</a></li>
                    <li><a href="produto-formulario.php">Adiciona produto</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="principal">
        <?php  mostraAlerta("success"); ?>
        <?php mostraAlerta("danger"); ?>