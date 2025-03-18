<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $especialidade = $_POST["especialidade"];
    $medico = $_POST["medico"];
    $data = $_POST["data"];
}
?>
<!DOCTYPE html>
<html lang='pt'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Consulta Agendada</title>
    <link rel="stylesheet" href="styles/menu_nova_consulta.css">
</head>
<body>
    <div class='container'>
        <h1>Consulta Agendada com Sucesso!</h1>
        <p>Especialidade: <strong><?php echo htmlspecialchars($especialidade); ?></strong></p>
        <p>Médico: <strong><?php echo htmlspecialchars($medico); ?></strong></p>
        <p>Data: <strong><?php echo htmlspecialchars($data); ?></strong></p>
        <button onclick="window.location.href='site2.php'">Voltar para a Página Inicial</button>
    </div>
</body>
</html>
