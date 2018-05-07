<?php
    session_start();

    require_once "Conexao.php";

    $pdo = Conexao::getDB();

    if(isset($_POST['btnLogin'])){
        try{
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            $efetuarLogin = $pdo->prepare("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
            $efetuarLogin->execute();

            $dados = $efetuarLogin->fetch(PDO::FETCH_OBJ);

            if($efetuarLogin->rowCount() == 1){
                header("location: index.php");
                $_SESSION['logado'] = $dados;
            }
            else
                $_SESSION['msg'] = "Usuário ou senha inválidos!";
        }catch(PDOException $e){
            $_SESSION['msg'] = "Erro ao tentar efetuar login.";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            
            <fieldset>
            <form method="post">
                <?php
                    if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                    }
                ?>
                <div class="form-group">
                    <img class="logoifpi" src="logoifpi.png" alt="">
                </div>
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input class="form-control" name="login" type="text" min="1" id="usuario" maxlength="50" placeholder="&#9787;Usuário" required autofocus>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input class="form-control" name="senha" type="password" id="senha" min="1" maxlength="10" placeholder="&#9763;Senha" required autofocus>
                </div>
                <div class=" form-group">
                    <button class="btn btn-success" name="btnLogin" type="submit">Login</button>
                </div>
            </form>
            </fieldset>
        </div>
    </div>
</body>
</html>