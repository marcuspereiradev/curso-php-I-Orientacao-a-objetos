<?php 
require_once("class/Produto.php");

$livro = new Produto();
$livro -> nome = "Livro maneiro";
var_dump($livro);
?>