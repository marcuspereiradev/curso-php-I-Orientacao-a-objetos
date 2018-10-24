<?php require_once("cabecalho.php")?>
<?php require_once("banco-categoria.php");?>
<?php require_once("logica-usuario.php");?>
<?php require_once("class/Produto.php");?>
<?php require_once("class/Categoria.php");?>
<?php $categorias = listaCategorias($conexao);?>
<?php verificaUsuario();?>

    <h1>Formulário de cadastro</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
            
            <?php 
                $categoria = new Categoria();
                $categoria->id = 1;
                
                $produto = new Produto();
                $produto->categoria = $categoria;

                $usado = "";
                include("produto-formulario-base.php");
            ?>

            <tr>
                <td><input class="btn-primary" type="submit" value="Cadastrar"></td>
            </tr>
        </table>
    </form>
<?php include("rodape.php")?>