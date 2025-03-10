<?php
session_start();
include 'db_connect.php'; // Conexão com a base de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $senha = $_POST['senha'];

    // Verificar se o utilizador existe
    $sql = "SELECT * FROM utilizadores WHERE gmail=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar a senha encriptada
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];

            // Criar um cookie com o nome do utilizador que dura 7 dias
            setcookie("nome_utilizador", $user['nome'], time() + (7 * 24 * 60 * 60), "/");

            // Redirecionar para a página principal (site.php)
            header("Location: menu_nova_consulta.php");
            exit();
        } else {
            echo "<script>alert('Senha incorreta!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Utilizador não encontrado!'); window.history.back();</script>";
    }
}
?>
