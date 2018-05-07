<?php
	session_start();

	if(!isset($_SESSION['logado'])){
		header("location: login.php");
	}else
		$_SESSION['msg'] = "Login efetuado com sucesso!";

	if($_GET['logout']){
		unset($_SESSION['logado']);
		session_destroy();
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="css/estilo.css">
    <title>Index</title>
</head>
<body>

</div>
	
	<div class="menu">
		<h1>
		<?php
		if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
		}
	?>
		</h1>
	
		<h2>Bem vindo, <?php echo $_SESSION['logado']->nome; ?></h2>
		<h3>Login: <?php echo $_SESSION['logado']->login; ?></h3>
		<h3>Senha: <?php echo $_SESSION['logado']->senha; ?></h3>
		<a class="sair" type="button" href="?logout=true">Sair</a>
	</div>
	
</body>
</html>
