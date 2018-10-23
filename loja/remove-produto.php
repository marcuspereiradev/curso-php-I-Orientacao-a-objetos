<?php require_once("cabecalho.php");?>
<?php require_once("banco-produto.php");?>
<?php require_once("logica-usuario.php");?>

<?php
    $id = $_POST['id'];
    removeProduto($conexao, $id);
    $_SESSION["success"] = "Produto removido com sucesso!";
    header("Location: produto-lista.php");
    die();
?>

<?php include("rodape.php");?>