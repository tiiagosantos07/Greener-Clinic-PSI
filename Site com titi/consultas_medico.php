<?php
session_start();

// Conectar à base de dados
$conn = new mysqli("localhost", "root", "", "greener_clinic");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}




    // Buscar todas as consultas agendadas para o médico
    $stmt = $conn->prepare("SELECT c.data_consulta, c.hora_consulta, u.nome AS nome_cliente, c.especialidade 
                            FROM consultas c 
                            JOIN utilizadores u ON c.cliente_id = u.id
                            WHERE c.medico_id = ?");
    $stmt->bind_param("i", $medico_id);
    $stmt->execute();
    $result = $stmt->get_result();


// Fechar a conexão
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas - Greener Clinic</title>
    <link rel="stylesheet" href="styles/menu_nova_consulta.css">
</head>
<body>
    <div class="header">
        <img src="clinica.png" alt="Logotipo" class="logo">
        <div class="slogan">Greener Clinic<br>A clínica de todos</div>
        <div class="user-info">
            <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</span> 
            <a href="logout.php"><button class="logout-button">Logout</button></a>
        </div>
    </div>

    <div class="nav-bar">
        <a href="site_medico.php">Página Inicial</a>
        <a href="consultas_medico.php" class="active">Consultas Agendadas</a>
        <a href="especialidades.php">Especialidades</a>
    </div>

    <main class="content">
        <h2>Consultas Agendadas</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Especialidade</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se há resultados
                if (isset($result) && $result->num_rows > 0) {
                    // Exibir cada linha de resultado
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome_cliente']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['especialidade']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['data_consulta']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['hora_consulta']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhuma consulta agendada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    </main>

    <div class="footer">
        <span>Greener Clinic © 2025</span>
        <span>greenerclinic@gmail.com</span>
        <span>912345678</span>
    </div>
</body>
</html>