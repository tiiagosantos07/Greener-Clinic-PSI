<?php
session_start();
include 'db_connect.php'; // Conexão com a base de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $senha = $_POST['senha'];

    // Verificar se o utilizador existe
    $sql = "SELECT id, nome, senha FROM medicos WHERE gmail=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar se a senha armazenada está encriptada corretamente
        if (!password_verify($senha, $user['senha'])) {
            // Se a senha armazenada não for um hash (por exemplo, se for "12345"), rehash a senha corretamente
            if (strlen($user['senha']) < 60) { // Hash bcrypt tem sempre 60 caracteres
                $senha_encriptada = password_hash($user['senha'], PASSWORD_DEFAULT);
                $update_sql = "UPDATE medicos SET senha=? WHERE id=?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("si", $senha_encriptada, $user['id']);
                $update_stmt->execute();
            }
            echo "<script>alert('Senha incorreta!'); window.history.back();</script>";
            exit();
        }

        // Se a senha for válida, iniciar sessão
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];

        // Criar um cookie com o nome do utilizador que dura 7 dias
        setcookie("nome_utilizador", $user['nome'], time() + (7 * 24 * 60 * 60), "/");

        // Redirecionar para a página principal (site2.php)
        header("Location: site_medico.php");
        exit();
    } else {
        echo "<script>alert('Utilizador não encontrado!'); window.history.back();</script>";
    }
}
?>
