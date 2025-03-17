<?php
session_start();
if (!isset($_SESSION['nome'])) {
    echo "<script>alert('Por favor, faça login para aceder.'); window.location.href = 'login_cliente.html';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Consulta - Greener Clinic</title>
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
        <a href="#" class="active">Nova Consulta</a>
        <a href="especialidades.php">Especialidades</a>
    </div>
    
    <main class="content">
        <form action="marcacao.php" method="POST">
            <label for="medico">Médico:</label>
            <select id="medico" name="medico">
                <option value="">Selecione um médico</option>
                <option value="Dr. Tikiti Anjinho">Dr. Tikiti Anjinho</option>
                <option value="Dr. Jonh Bagoniz">Dr. Jonh Bagoniz</option>
                <option value="Dra. Anabela Pereira">Dra. Anabela Pereira</option>
            </select>
            
            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="especialidade" onchange="atualizarConsultas()">
                <option value="">Selecione uma especialidade</option>
                <option value="Cardiologia">Cardiologia</option>
                <option value="Ortopedia">Ortopedia</option>
                <option value="Dermatologia">Dermatologia</option>
            </select>
            
            <label for="consulta">Consulta:</label>
            <select id="consulta" name="consulta">
                <option value="">Selecione uma especialidade primeiro</option>
            </select>
            
            <label for="unidade">Unidade de saúde:</label>
            <select id="unidade" name="unidade" disabled>
                <option value="Greener Clinic">Greener Clinic</option>
            </select>
            
            <button type="submit">Marcar Consulta</button>
            <button type="button" onclick="limparSelecoes()">Limpar as seleções</button>
        </form>
    </main>
    
    <div class="footer">
        <span>Greener Clinic © 2025</span>
        <span>greenerclinic@gmail.com</span>
        <span>912345678</span>
    </div>

    <script>
        function atualizarConsultas() {
            const consultas = {
                "Cardiologia": ["Consulta de Cardiologia", "Consulta de Cardiologia | Pediátrica"],
                "Ortopedia": [
                    "Consulta Ortopedia | Mão", "Consulta Ortopedia | Coluna", "Consulta Ortopedia | Braço/Ombro", 
                    "Consulta Ortopedia | Anca", "Consulta Ortopedia | Pediátrica", "Consulta Ortopedia | Joelho", 
                    "Consulta Ortopedia | Tornozelo/Pé"
                ],
                "Dermatologia": ["Consulta de Dermatologia", "Consulta de Dermatologia | Dermatoses Genitais Masculinas"]
            };
            
            const especialidadeSelecionada = document.getElementById("especialidade").value;
            const consultaSelect = document.getElementById("consulta");
            
            consultaSelect.innerHTML = "<option value=''>Selecione uma consulta</option>";
            
            if (especialidadeSelecionada && consultas[especialidadeSelecionada]) {
                consultas[especialidadeSelecionada].forEach(consulta => {
                    let option = document.createElement("option");
                    option.value = consulta;
                    option.textContent = consulta;
                    consultaSelect.appendChild(option);
                });
            }
        }
        
        function limparSelecoes() {
            document.getElementById("medico").value = "";
            document.getElementById("especialidade").value = "";
            document.getElementById("consulta").innerHTML = "<option value=''>Selecione uma especialidade primeiro</option>";
        }
    </script>
</body>
</html>
