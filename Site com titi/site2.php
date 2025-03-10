<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greener Clinic</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #4d4373;
        }
        .logo {
            height: 85px;
        }
        .slogan {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        .nav-bar {
            background-color: #3c345a;
            display: flex;
            justify-content: center;
            padding: 10px 0;
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
            align-items: center;
            padding: 15px;
            flex-grow: 1;
        }
        .about {
            width: 50%;
            font-size: 18px;
            color: #333;
        }
        .clinic-image {
            width: 50%;
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
            margin-top: auto;
            width: 100%;
        }
        .user-info {
            display: flex;
            align-items: center;
            color: white;
        }
        .user-info span {
            font-size: 16px;
            font-weight: bold;
            margin-right: 10px;
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
        <a href="site.php" class="active">Página Inicial</a>
        <a href="menu_nova_consulta.php">Nova Consulta</a>
        <a href="#">Especialidades</a>
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
