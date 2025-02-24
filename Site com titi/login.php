<?php
// Conectar ao banco de dados
$mysqli = new mysqli('localhost', 'root', '', 'seu_banco_de_dados');

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verificar se os dados foram enviados
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevenir SQL Injection
    $username = $mysqli->real_escape_string($username);

    // Verificar o usuário no banco de dados
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar a senha usando password_verify
        if (password_verify($password, $user['password'])) {
            // Login bem-sucedido
            session_start();
            $_SESSION['username'] = $username;
            echo "Bem-vindo, " . $username;
            // Redirecionar para a página protegida
            header("Location: dashboard.php");
        } else {
            // Senha incorreta
            echo "Senha incorreta!";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado!";
    }
}

$mysqli->close();
?>
