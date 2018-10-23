<?php require_once("cabecalho.php")?>
<?php require_once("banco-produto.php");?>
<?php require_once("banco-categoria.php");?>
<?php require_once("logica-usuario.php");?>
<?php verificaUsuario();?>

<?php
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria_id = $_POST["categoria_id"];
    if(array_key_exists('usado', $_POST)) {
        $usado = "true";
    } else {
        $usado = "false";
    }

    // executando a query
    if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
        <p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
    <?php }else { 
        $msg = mysqli_error($conexao);
    ?>    
        <p class="text-danger">Produto <?= $nome; ?>, <?= $preco; ?> não foi adicionado: <?= $msg ?></p>
    <?php
    }

    // fechando a conexão MySQL
    mysqli_close($conexao);

    // e com isso o insert into é feito
?>
<?php include("rodape.php")?>