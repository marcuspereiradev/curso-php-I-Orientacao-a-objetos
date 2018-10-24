<?php require_once("cabecalho.php")?>
<?php require_once("banco-produto.php");?>
<?php require_once("banco-categoria.php");?>
<?php require_once("logica-usuario.php");?>
<?php require_once("class/Produto.php");?>
<?php require_once("class/Categoria.php");?>
<?php verificaUsuario();?>

<?php

    $produto = new Produto();
    $produto->nome = $_POST["nome"];
    $produto->preco = $_POST["preco"];
    $produto->descricao = $_POST["descricao"];

    $categoria = new Categoria();
    $produto->id = $_POST["categoria_id"];
    $produto->categoria = $categoria;
    
    if(array_key_exists('usado', $_POST)) {
        $produto->usado = "true";
    } else {
        $produto->usado = "false";
    }

    if (insereProduto($conexao, $produto)) { ?>
        <p class="text-success">Produto <?= $produto->nome; ?>, <?= $produto->preco; ?> adicionado com sucesso!</p>
    <?php }else { 
        $msg = mysqli_error($conexao);
    ?>    
        <p class="text-danger">Produto <?= $produto->nome; ?>, <?= $produto->preco; ?> não foi adicionado: <?= $msg ?></p>
    <?php
    }

    // fechando a conexão MySQL
    mysqli_close($conexao);

?>
<?php include("rodape.php")?>