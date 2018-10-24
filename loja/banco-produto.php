<!-- Esse é o arquivo que acessa a tabela de produtos. -->
<?php require_once("conecta.php")?>
<?php
    function listaProdutos($conexao) {
        $produtos = array();
        $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
        
        while($produto_array = mysqli_fetch_assoc($resultado)) {
            $produto = new Produto();
            
            $produto->nome = $produto_array['nome'];
            $produto->preco = $produto_array['preco'];
            $produto->descricao = $produto_array['descricao'];
            $produto->categoria_id = $produto_array['categoria_id'];
            $produto->usado = $produto_array['usado'];

            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function insereProduto($conexao, Produto $produto) {
        // criando a query
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria_id}, {$produto->usado})";
        return mysqli_query($conexao, $query);
    }

    function buscaProduto($conexao, $id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function alteraProduto($conexao, Produto $produto) {
        $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', 
            categoria_id= {$produto->categoria_id}, usado = {$produto->usado} where id = {$produto->id}";
        return mysqli_query($conexao, $query);
    }
    
    function removeProduto($conexao, $id) {
        $query = "DELETE FROM produtos WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
?>