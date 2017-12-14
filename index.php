<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- Codificação caracteres da página -->
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SEO Geral -->
  	<title>Help-Derr</title>
  	<meta name="description" content="Aproveite vídeos e música que você ama, envie conteúdo original e compartilhe-o com amigos">
  	<link rel="canonical" href="http://localhost/Help-Derr/">
  	<meta name="author" content="ReinanHS">
	<meta name="robots" content="index">
	<!-- Style -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

	<center>
		<br><h1>Informe o nome do usuário</h1><hr>
		<form class="form-inline" method="get" action="info.php">
			<div class="form-group">
				<label for="exampleInputName2">Name</label>
				<input type="text" class="form-control" id="Name" name="Name" placeholder="Reinan Gabriel" required="">
			</div>
			<div class="form-group">
		    	<label for="exampleInputEmail2">Email</label>
		    	<input type="email" class="form-control" id="Email" name="Email" placeholder="reinangabriel@example.com" required="">
		  	</div>
			<button type="submit" class="btn btn-success">Pesquisar</button>
		</form>
	</center>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>