<?php
if(isset($_POST['email'])) {
   include( "conexao.php"); 
   $email = $_POST['email'];
   $senha = $_POST['senha'];
   $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1"; $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
   $usuario = $sql_exec->fetch_assoc();
  
   if(password_verify($senha, $usuario['senha'])) {
    if(!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    header("Location: painel.php");
    exit;
   } else {
    echo "Falha ao logar! Senha ou e-mail incorretos";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Estilo para o corpo da página */
body {
    font-family: Arial, sans-serif;
    background-color: #0000;
    text-align: center;
    margin: 0;
    padding: 0;
}
/* Estilo para o contêiner do formulário */
form {
    background-color: #ffffff;
    width: 300px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}
@media screen and (max-width: 767px) {
    form {
        /* Defina a largura como 90% em dispositivos móveis */
        
        width: 80%;
    }
}

/* Estilo para o cabeçalho do formulário */
h1 {
    font-size: 24px;
    margin-bottom: 30px;
}

/* Estilo para os rótulos e campos de entrada */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    padding: 10px 10px;
    width: 90%;
    margin-bottom: 1px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

/* Estilo para o botão de envio */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    margin-top: 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Admin Jao</h1>
        <p>
            <input type="text" name="email" placeholder="Usuário">
        </p>
        <p>
            <input type="password" name="senha" placeholder="Senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>