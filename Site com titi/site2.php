<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greener Clinic</title>
    <link rel="stylesheet" href="styles/site2.css">
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
        <a href="site.php" class="active">Página Inicial</a>
        <a href="menu_nova_consulta.php">Nova Consulta</a>
        <a href="especialidades.php">Especialidades</a>
    </div>

    <div class="content">
        <div class="about">
            <p><strong>Greener Clinic – A Clínica de Todos</strong></p>
            <p>A Greener Clinic é mais do que uma clínica tradicional; somos um espaço inovador dedicado à saúde e ao bem-estar, com um compromisso especial com a sustentabilidade. Acreditamos que a medicina pode evoluir de forma mais consciente e responsável, garantindo não apenas a saúde dos nossos pacientes, mas também a do meio ambiente.</p>
            <p>Com uma equipa de profissionais altamente qualificados e um ambiente acolhedor, oferecemos uma ampla gama de serviços médicos e terapêuticos. Desde consultas especializadas a tratamentos de última geração, garantimos um atendimento personalizado e humanizado, sempre com o foco na qualidade de vida.</p>
            <p>Além disso, adotamos práticas ecológicas em todas as nossas operações, desde a utilização de materiais sustentáveis até a implementação de processos que reduzem o desperdício e a pegada ecológica. A Greener Clinic é a clínica de todos, para todos, porque acreditamos que saúde e sustentabilidade caminham juntas.</p>
            <p>Venha conhecer-nos e faça parte desta mudança!</p>
        </div>
        <img src="greenerclinic.png" alt="Greener Clinic" class="clinic-image">
    </div>

    <div class="footer">
        <span>Greener Clinic © 2025</span>
        <span>greenerclinic@gmail.com</span>
        <span>912345678</span>
    </div>
</body>
</html>
