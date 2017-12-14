<?php

/*
A utilização do PDO fornece uma camada de abstração em relação a conexão com o banco 
de dados visto que o PDO efetua a conexão com diversos bancos de dados da mesma maneira, 
modificando apenas a sua string de conexão.

A classe PDO em sua instancia pede como parâmetro primeiro o banco que será utilizado, 
O caminho do banco de dados e o nome da base de dados. Após devemos inserir o login e 
a senha do banco de dados.
*/

try{
	$db = new PDO('mysql:host=localhost;dbname=dados','root', '');
	# Retorna o banco de dados
	return $db;
}catch(PDOException $info){
	# Retorna o erro
	print ($info->getMessage());
	die();
}
?>