<?php
session_start();
if (!isset($_SESSION['nome'])) {
    echo "<script>alert('Por favor, faça login para aceder.'); window.location.href = 'login_cliente.html';</script>";
    exit();
}

// Função para gerar a data e hora atuais no formato adequado
function obterDataHoraFuturo() {
    // Data atual
    $dataAtual = new DateTime();
    // Define o formato da data (YYYY-MM-DD) e hora (HH:MM)
    $dataFormatada = $dataAtual->format('Y-m-d');
    $horaFormatada = $dataAtual->format('H:i');

    return ['data' => $dataFormatada, 'hora' => $horaFormatada];
}

// Chama a função para obter data e hora futura
$dataHoraFuturo = obterDataHoraFuturo();
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
            <input type="date" id="data" name="data" required min="<?php echo $dataHoraFuturo['data']; ?>">

            <label for="hora">Hora da Consulta:</label>
            <input type="time" id="hora" name="hora" required min="<?php echo $dataHoraFuturo['hora']; ?>">

            <input type="hidden" name="medico" value="<?php echo $_GET['medico']; ?>">
            <input type="hidden" name="especialidade" value="<?php echo $_GET['especialidade']; ?>">
            <input type="hidden" name="consulta" value="<?php echo $_GET['consulta']; ?>">

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
