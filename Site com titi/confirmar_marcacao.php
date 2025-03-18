<?php
session_start();
if (!isset($_SESSION['nome'])) {
    echo "<script>alert('Por favor, faça login para aceder.'); window.location.href = 'login_cliente.html';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["data"] = $_POST["data"];
    $_SESSION["hora"] = $_POST["hora"];

    // Dados do cliente e consulta
    $nome_cliente = $_SESSION['nome'];
    $medico = $_SESSION['medico'];  // Nome do médico
    $especialidade = $_SESSION['especialidade'];
    $consulta = $_SESSION['consulta'];
    $data = $_SESSION['data'];
    $hora = $_SESSION['hora'];

    // Conectar à base de dados
    $conn = new mysqli("localhost", "root", "", "greener_clinic");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Buscar o ID do cliente com base no nome
    $stmt = $conn->prepare("SELECT id FROM utilizadores WHERE nome = ?");
    $stmt->bind_param("s", $nome_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>alert('Erro: Usuário não encontrado!'); window.location.href = 'nova_consulta.php';</script>";
        exit();
    }

    $row = $result->fetch_assoc();
    $cliente_id = $row['id'];

    // Verificar se o médico existe na tabela 'medicos'
    $stmt = $conn->prepare("SELECT id FROM medicos WHERE nome = ?");
    $stmt->bind_param("s", $medico);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>alert('Erro: Médico não encontrado!'); window.location.href = 'menu_nova_consulta.php';</script>";
        exit();
    }

    // Caso o médico exista, obtenha o id
    $row = $result->fetch_assoc();
    $medico_id = $row['id'];

    // Depuração: Verificando se o ID do médico está correto
    echo "<p>Nome do Médico: " . htmlspecialchars($medico) . "</p>";
    echo "<p>ID do Médico: " . $medico_id . "</p>";  // Depuração para verificar o ID do médico

    // Inserir consulta na base de dados com o cliente_id correto
    $stmt = $conn->prepare("INSERT INTO consultas (cliente_id, medico_id, especialidade, data_consulta, hora_consulta) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $cliente_id, $medico_id, $especialidade, $data, $hora);

    if ($stmt->execute()) {
        echo "<h1>Consulta agendada com sucesso!</h1>";
    } else {
        echo "<h1>Erro ao agendar a consulta.</h1>";
        echo "<p>Detalhes do erro: " . $stmt->error . "</p>"; // Exibir o erro caso ocorra.
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<link rel="stylesheet" href="styles/menu_nova_consulta.css">

<p>Especialidade: <strong><?php echo htmlspecialchars($especialidade); ?></strong></p>
<p>Médico: <strong><?php echo htmlspecialchars($medico); ?></strong></p>
<p>Data: <strong><?php echo htmlspecialchars($data); ?></strong></p>
<p>Hora: <strong><?php echo htmlspecialchars($hora); ?></strong></p>

<button onclick="window.location.href='site2.php'">Voltar para a Página Inicial</button>
