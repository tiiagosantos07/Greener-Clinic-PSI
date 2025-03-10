<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site com Login</title>
    <style>
        /* Todo o estilo já está mantido */
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
        .login-button {
            background-color: #72d681;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            position: relative;
        }
        .login-button:hover {
            background-color: #5bbd69;
        }

        /* Menu suspenso */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #72d681;
            min-width: 160px;
            z-index: 1;
            border-radius: 5px;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-weight: bold;
        }
        .dropdown-content a:hover {
            background-color: #5bbd69;
        }
        .dropdown:hover .dropdown-content {
            display: block;
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
        /* Destacar a página ativa */
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
            border-radius: 0;
            margin-top: auto;
            width: 100%;
        }

        /* Estilo para a janela modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 40%;
        }
        .modal-header {
            font-size: 22px;
            font-weight: bold;
            color: #4d4373;
            text-align: center;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .login-button-modal {
            width: 100%;
            padding: 12px;
            background-color: #72d681;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }
        .login-button-modal:hover {
            background-color: #5bbd69;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilo do ícone de usuário */
        .user-info {
            display: flex;
            align-items: center;
            color: white;
        }
        .user-info img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .user-info span {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
    <script>
	document.addEventListener("DOMContentLoaded", function() {
    const novaConsultaLink = document.querySelector(".nav-bar a[href='menu_nova_consulta.php']");
    const username = localStorage.getItem('username'); // Verifica se há um usuário logado

    if (novaConsultaLink) {
        novaConsultaLink.addEventListener("click", function(event) {
            if (!username) {
                event.preventDefault(); // Impede a navegação
                openLoginWindow(); // Abre a modal de login
            }
        });
	}
	});
    // Função para verificar se o usuário está logado e atualizar a interface
    window.onload = function() {
        const username = localStorage.getItem('username'); // Recupera o nome de utilizador do localStorage
        const userInfoDiv = document.getElementById('userInfo');
        
        if (username) {
            // Se o nome de utilizador estiver salvo no localStorage, exibe uma saudação
            const userInfoHtml = `
                <div class="user-info">
                    <span>Olá, ${username}</span>
                </div>
            `;
            userInfoDiv.innerHTML = userInfoHtml;
        } else {
            // Se não houver login, exibe o botão de login
            const loginButtonHtml = `
                <button class="login-button" onclick="openLoginWindow()">Login</button>
            `;
            userInfoDiv.innerHTML = loginButtonHtml;
        }
    };

    function openLoginWindow() {
        // Exibe a modal com opções para escolher o tipo de login
        var modal = document.getElementById("loginModal");
        modal.style.display = "block";
    }

    function closeLoginWindow() {
        var modal = document.getElementById("loginModal");
        modal.style.display = "none";
    }

    function selectLoginType(type) {
        window.location.href = "login_cliente2.html";

        // Fecha a modal após redirecionar
        closeLoginWindow();
    }

    window.onclick = function(event) {
        var modal = document.getElementById("loginModal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
    </script>
</head>
<body>
    <div class="header">
        <img src="clinica.png" alt="Logotipo" class="logo">
        <div class="slogan">Greener Clinic<br>A clínica de todos</div>
        <!-- Ícone e nome do usuário ou botão de login -->
        <div id="userInfo" class="user-info">
            <!-- O conteúdo aqui será atualizado após o login -->
			 <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>	
			
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

    <!-- Janela Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginWindow()">&times;</span>
            <div class="modal-header" id="modalHeader">Escolha o tipo de login</div>

            <!-- Opções de login -->
            <button class="login-button-modal" onclick="selectLoginType('cliente')">Login Cliente</button>
            <button class="login-button-modal" onclick="selectLoginType('medico')">Login Médico</button>
            <button class="login-button-modal" onclick="selectLoginType('farmacia')">Login Farmácia</button>
        </div>
    </div>
</body>
</html>