<!-- Esse é o arquivo que acessa a tabela de produtos. -->
<?php require_once("conecta.php")?>
<?php
    function listaProdutos($conexao) {
        $produtos = array();
        $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
        
        while($produto = mysqli_fetch_assoc($resultado)) {
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
        // criando a query
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
        return mysqli_query($conexao, $query);
    }

    function buscaProduto($conexao, $id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', 
            categoria_id= {$categoria_id}, usado = {$usado} where id = {$id}";
        return mysqli_query($conexao, $query);
    }
    
    function removeProduto($conexao, $id) {
        $query = "DELETE FROM produtos WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
?>