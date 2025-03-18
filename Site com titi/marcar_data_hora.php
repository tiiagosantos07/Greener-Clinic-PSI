<?php
session_start();
if (!isset($_SESSION['nome'])) {
    echo "<script>alert('Por favor, faça login para aceder.'); window.location.href = 'login_cliente.html';</script>";
    exit();
}

// Guardar os dados enviados no formulário anterior na sessão
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['medico'] = $_POST['medico'];
    $_SESSION['especialidade'] = $_POST['especialidade'];
    $_SESSION['consulta'] = $_POST['consulta'];
    $_SESSION['unidade'] = $_POST['unidade'];
}

// Verifica se os dados foram armazenados corretamente
if (!isset($_SESSION['medico']) || !isset($_SESSION['especialidade']) || !isset($_SESSION['consulta'])) {
    echo "<script>alert('Erro ao carregar os dados.'); window.location.href = 'menu_nova_consulta.php';</script>";
    exit();
}

// Obter data e hora mínimas para marcação
$dataAtual = new DateTime();
$dataMinima = $dataAtual->format('Y-m-d');
$horaMinima = $dataAtual->format('H:i');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Data e Hora - Greener Clinic</title>
    <link rel="stylesheet" href="styles/menu_nova_consulta.css">
</head>
<body>
    <div class="header">
        <img src="clinica.png" alt="Logotipo" class="logo">
        <div class="slogan">Greener Clinic<br>A clínica de todos</div>
        <div class="user-info">
            <span>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</span> 
            <a href="logout.php"><button class="logout-button">Logout</button></a>
        </div>
    </div>

    <div class="nav-bar">
        <a href="site2.php">Página Inicial</a>
        <a href="nova_consulta.php" class="active">Nova Consulta</a>
        <a href="especialidades.php">Especialidades</a>
    </div>

    <main class="content">
        <form action="confirmar_marcacao.php" method="POST">
            <label for="data">Data da Consulta:</label>
            <input type="date" id="data" name="data" required min="<?php echo $dataMinima; ?>">

            <label for="hora">Hora da Consulta:</label>
            <input type="time" id="hora" name="hora" required min="<?php echo $horaMinima; ?>">

            <button type="submit">Confirmar Marcação</button>
        </form>
    </main>

    <div class="footer">
        <span>Greener Clinic © 2025</span>
        <span>greenerclinic@gmail.com</span>
        <span>912345678</span>
    </div>
</body>
</html>
