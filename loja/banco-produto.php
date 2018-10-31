<!-- Esse é o arquivo que acessa a tabela de produtos. -->
<?php require_once("conecta.php")?>
<?php
    function listaProdutos($conexao) {
        $produtos = array();
        $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
        
        while($produto_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setNome($produto_array["categoria_nome"]);

            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];

            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setId($produto_array["id"]);

            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function insereProduto($conexao, Produto $produto) {
        // criando a query
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";
        return mysqli_query($conexao, $query);
    }

    function alteraProduto($conexao, Produto $produto) {
        $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
            categoria_id= {$produto->getCategoria()->id}, usado = {$produto->getUsado()} where id = {$produto->getId()}";
        return mysqli_query($conexao, $query);
    }

    function buscaProduto($conexao, $id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($produto_buscado['categoria_id']);

        $produto = new Produto();
        $produto->setId($produto_buscado["id"]);
        $produto->setNome($produto_buscado['nome']);
        $produto->setPreco($produto_buscado['preco']);
        $produto->setDescricao($produto_buscado['descricao']);
        $produto->setCategoria($categoria);
        $produto->setUsado($produto_buscado['usado']);

        return $produto;
    }
    
    function removeProduto($conexao, $id) {
        $query = "DELETE FROM produtos WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
?>