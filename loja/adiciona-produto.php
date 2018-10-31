<?php require_once("cabecalho.php")?>
<?php require_once("banco-produto.php");?>
<?php require_once("banco-categoria.php");?>
<?php require_once("logica-usuario.php");?>
<?php require_once("class/Produto.php");?>
<?php require_once("class/Categoria.php");?>
<?php verificaUsuario();?>

<?php
    $categoria = new Categoria();
    $produto->setId($_POST["categoria_id"]);

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

    if(array_key_exists('usado', $_POST)) {
        $usado = "true";
    } else {
        $usado = "false";
    }

    if (insereProduto($conexao, $produto)) { ?>
        <p class="text-success">Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!</p>
    <?php }else { 
        $msg = mysqli_error($conexao);
    ?>    
        <p class="text-danger">Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> não foi adicionado: <?= $msg ?></p>
    <?php
    }

    // fechando a conexão MySQL
    mysqli_close($conexao);

?>
<?php include("rodape.php")?>