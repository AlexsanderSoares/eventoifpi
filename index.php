<?php
	session_start();

	if(!isset($_SESSION['logado'])){
		header("location: login.php");
	}else
		$_SESSION['msg'] = "Login efetuado com sucesso!";

	if($_GET['logout']){
		unset($_SESSION['logado']);
		session_destroy();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Index</title>
</head>
<body>
<div class="dropdown">
<button class="mainmenubtn">Main menu</button>
    <div class="dropdown-child">

</div>
</div>
	<?php
		if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
		}
	?>

	<h2>Bem vindo, <?php echo $_SESSION['logado']->nome; ?></h2>
	<h3>Lgin: <?php echo $_SESSION['logado']->login; ?></h3>
	<h3>Senha: <?php echo $_SESSION['logado']->senha; ?></h3>
</body>
</html>
