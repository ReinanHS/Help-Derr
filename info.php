<?php
require_once('connection.php');

$con = $db->prepare('SELECT * FROM `usuario` WHERE `name` = :name && `email` = :email');
$con->bindValue(':name', $_GET['Name'], PDO::PARAM_STR);
$con->bindValue(':email', $_GET['Email'], PDO::PARAM_STR);
$con->execute();

$myInfo = $con->fetch(PDO::FETCH_ASSOC);

?>
<?php if($con->rowCount() == 0): ?>

<script type="text/javascript">
	alert("Não foi possível encontrar um usuário com as informações fornecidas.");
	window.location.href = "http://localhost/Help-Derr/";
</script>

<?php else: ?>

<?php 

$max = $db->prepare('SELECT * FROM `usuario` WHERE `punctuation` > :punctuation  ORDER BY `usuario`.`punctuation` DESC');
$max->bindValue(':punctuation', $myInfo['punctuation'], PDO::PARAM_INT);
$max->execute();

$need = $db->prepare('SELECT `punctuation` FROM `usuario` WHERE `punctuation` > :punctuation ORDER BY `usuario`.`punctuation` ASC LIMIT 1 ');
$need->bindValue(':punctuation', $myInfo['punctuation'], PDO::PARAM_INT);
$need->execute();

$need = ($need->fetch(PDO::FETCH_ASSOC)['punctuation'])+1;

$min = $db->prepare('SELECT * FROM `usuario` WHERE `punctuation` < :punctuation  ORDER BY `usuario`.`punctuation` DESC');
$min->bindValue(':punctuation', $myInfo['punctuation'], PDO::PARAM_INT);
$min->execute();

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
		<br><h1>Olá tudo bem <?php echo $myInfo['name']; ?>, suas informações</h1><hr>
		<div class="alert alert-warning" role="alert">
		Você está acima de <?php echo $min->rowCount(); ?> pessoas segundo sua pontuação.
		sua colocação atual é <?php echo ($max->rowCount())+1; ?>. você necessita de <?php echo $need; ?> pontos para passar o próximo colocado.  
		</div>
		<table class="table table-hover">
		  <thead>
		  	<tr>
		  		<td>ID</td>
		  		<td>Name</td>
		  		<td>Email</td>
		  		<td>Punctuation</td>
		  	</tr>
		  </thead>
		  <tbody>
		  	<?php foreach($max->fetchAll(PDO::FETCH_ASSOC) as $value): ?>
			<tr class="success">
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['punctuation']; ?></td>
			</tr>
			<?php endforeach; ?>
		  	<tr class="warning">
		  		<td><?php echo $myInfo['id']; ?></td>
		  		<td><?php echo $myInfo['name']; ?></td>
		  		<td><?php echo $myInfo['email']; ?></td>
		  		<td><?php echo $myInfo['punctuation']; ?></td>
		  	</tr>
		  	<?php foreach($min->fetchAll(PDO::FETCH_ASSOC) as $value): ?>
			<tr class="danger">
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['punctuation']; ?></td>
			</tr>
			<?php endforeach; ?>
		  </tbody>
		</table>
	</center>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

<?php endif;?>