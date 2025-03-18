<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $morada = !empty($_POST['morada']) ? $_POST['morada'] : NULL;
    $gmail = $_POST['gmail'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Encripta a senha

    // Verificar se o email já existe
    $checkEmail = "SELECT * FROM utilizadores WHERE gmail='$gmail'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Este email já está registado.";
    } else {
        $sql = "INSERT INTO utilizadores (nome, data_nascimento, morada, gmail, telefone, senha) 
                VALUES ('$nome', '$data_nascimento', ?, '$gmail', '$telefone', '$senha')";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $morada);
        
        if ($stmt->execute()) {
            echo "Registo efetuado com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}
?>
