<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialidades - Greener Clinic</title>
    <link rel="stylesheet" href="styles/especialidades.css">
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const novaConsultaLink = document.querySelector(".nav-bar a[href='menu_nova_consulta.php']");

            if (novaConsultaLink) {
                novaConsultaLink.addEventListener("click", function(event) {
                    if (!<?php echo isset($_SESSION['nome']) ? 'true' : 'false'; ?>) {
                        event.preventDefault();
                        window.location.href = "login_cliente2.html";
                    }
                });
            }
        });
    </script>
</head>
<body>
    
    <div class="header">
        <img src="clinica.png" alt="Logotipo" class="logo">
        <div class="slogan">Greener Clinic<br>A clínica de todos</div>
        <div class="user-info" id="userInfo">
            <?php if (isset($_SESSION['nome'])): ?>
                <span> Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>! </span> 
        
                <a href="logout.php" class="logout-button">Logout</a>



            <?php else: ?>
                <div class="dropdown">
                    <button class="login-button">Login</button>
                    <div class="dropdown-content">
                        <a href="login_cliente.html">Login Cliente</a>
                        <a href="login_medico.html">Login Médico</a>
                        <a href="login_farmacia.html">Login Farmácia</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="nav-bar">
        <a href="site.php">Página Inicial</a>
        <a href="menu_nova_consulta.php">Nova Consulta</a>
        <a href="especialidades.html" class="active">Especialidades</a>
    </div>

    <div class="content">
        <div class="specialty">
            <h2>Cardiologia</h2>
            <p>Cardiologia é a especialidade médica que se ocupa do diagnóstico e tratamento das doenças que acometem o coração, bem como os outros componentes do sistema circulatório. O médico especialista nessa área é o nosso cardiologista 
            <br><br><strong>Dr. Tikiti Anjinho</strong>.</p>
        </div>
        <div class="specialty">
            <h2>Ortopedia</h2>
            <p>A ortopedia é a especialidade médica responsável pelo diagnóstico, tratamento e prevenção de doenças e lesões que afetam o sistema musculoesquelético, incluindo ossos, músculos, ligamentos e articulações. O médico especialista nessa área é o nosso ortopedista
            <br><br><strong>Dr. John Bagoniz</strong>.</p>
        </div>
        <div class="specialty">
            <h2>Dermatologia</h2>
            <p>Dermatologia é a especialidade médica que se ocupa do diagnóstico e tratamento clínico-cirúrgico das enfermidades relacionadas à pele e aos anexos cutâneos. Dentro da dermatologia, existe a dermatovenerologia, especialidade que tem importante atuação no contexto das infecções sexualmente transmissíveis. O médico especialista nessa área é a nossa dermatologista 
            <br><br><strong>Dra. Anabela Pereira</strong>.</p>
        </div>
    </div>

    <div class="footer">
        <span>Greener Clinic © 2025</span>
        <span>greenerclinic@gmail.com</span>
        <span>912345678</span>
    </div>

</body>
</html>
