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
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            background-color: #f0f0f5;
			color: white;
			font-weight: bold;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #4d4373;
            width: 100%;
        }
        .logo {
            height: 85px;
        }
        .slogan {
            font-size: 25px;
            font-weight: bold;
            text-align: center; /* Garante que o texto do slogan fique centralizado */
            color: white;
            flex-grow: 1; /* Faz com que o slogan ocupe o restante do espaço disponível */
        }
        
        .login-button:hover {
            background-color: #5bbd69;
        }
        .nav-bar {
            background-color: #3c345a;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            width: 100%;
        }
        .nav-bar a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            transition: 0.3s;
        }
        .nav-bar a:hover {
            background-color: #5a4e88;
            border-radius: 5px;
        }
        .nav-bar a.active {
            background-color: #72d681;
            color: white;
            border-radius: 5px;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            width: 100%;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        select, input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #72d681;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .reset-button {
            background-color: #d9534f;
            margin-top: 5px;
        }
        .footer {
            background-color: #4d4373;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 15px;
            font-weight: bold;
            color: white;
            border-radius: 0;
            margin-top: auto;
            width: 100%;
        }
		.logout-button {
            background-color: #72d681;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        .logout-button:hover {
            background-color: #cc0000;
        }
    </style>
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
        <a href="#">Especialidades</a>
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
