<?php

if (empty($_SESSION['id']) || !isset($_SESSION['id'])) {
    header("Location: ".BASE_URL."home/login");
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisADV</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
    
    <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/all.css">
</head>

<body>
    <div class="menu">
        <div class="logo">
            LOGO DO CLIENTE
        </div>
        <nav>
            <ul>
                <a href="<?php echo BASE_URL; ?>"><li>Inicio</li></a>
                <li>
                    Clientes
                    <div class="drop">
                        <a href="<?php echo BASE_URL; ?>clientes/cadastrarCliente">Cadastrar Cliente</a> <br>
                        <a href="<?php echo BASE_URL; ?>clientes/gerenciarCliente">Gerenciar Clientes</a>
                    </div>
                </li>

                <li>
                    Processos
                    <div class="drop">
                        <a href="<?php echo BASE_URL; ?>clientes/gerenciarCliente">Cadastrar Processo</a> <br>
                        <a href="<?php echo BASE_URL; ?>processos/gerenciarProcessos">Gerenciar Processos</a>
                    </div>
                </li>
                <!--<li>
                    Declarações
                    <div class="drop">
                        <p>INSS</p>
                        <a href="<?php echo BASE_URL; ?>documentos/autoDeclaracao">Auto Declaração</a> <br>
                        <a href="<?php echo BASE_URL; ?>documentos/requerimento">Requerimento</a> <br>
                        <a href="<?php echo BASE_URL; ?>documentos/procuracaoInss">Procuração</a>
                        <p>Justiça</p>
                        <a href="<?php echo BASE_URL; ?>documentos/contrato">Contrato</a> <br>
                        <a href="<?php echo BASE_URL; ?>documentos/procuracaoJustica">Procuração</a> <br>
                        <a href="<?php echo BASE_URL; ?>documentos/declaracaoResidencia">Declaração de Residência</a>
                    </div>
                </li>-->
                <a href="<?php echo BASE_URL; ?>home/sair">
                    <li>
                        Sair
                    </li>
                </a>
            </ul>
        </nav>

    </div>
    <script src="<?php echo BASE_URL; ?>assets/js/scriptClientes.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/scriptProcessos.js"></script>
    <?php $this->loadViewTemplate($viewName, $viewData); ?>