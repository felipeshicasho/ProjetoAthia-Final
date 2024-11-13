<?php
session_start();
require "funcoesBD.php";

// DELETAR EMPRESA
if (isset($_GET['acao']) && $_GET['acao'] === 'deletar' && isset($_GET['id'])) {
    $id = $_GET['id'];
    deletarEmpresa($id);
    header('Location: ../client/view/removerEmpresa.php');
    exit();
} else if (isset($_GET['acao']) && $_GET['acao'] === 'deletarSetor' && isset($_GET['id'])) {
    $id = $_GET['id'];
    deletarSetor($id);
    header('Location: ../client/view/removerSetor.php');
    exit();
}
else if (isset($_GET['acao']) && $_GET['acao'] === 'deletarEmpresaSetor' && isset($_GET['empresa_id']) && isset($_GET['setor_id'])) {
    $empresa_id = $_GET['empresa_id'];
    $setor_id = $_GET['setor_id'];
    deletarEmpresaSetor($empresa_id, $setor_id);
    header('Location: ../client/view/removerEmpresaSetor.php');
    exit();
}

// ADICIONAR EMPRESA
if (
    !empty($_POST['inputRazaoSocial']) && !empty($_POST['inputNomeFantasia']) &&
    !empty($_POST['inputCnpj'])
) {
    $razao_social = $_POST['inputRazaoSocial'];
    $nome_fantasia = $_POST['inputNomeFantasia'];
    $cnpj = $_POST['inputCnpj'];


    inserirEmpresa($razao_social, $nome_fantasia, $cnpj);
    header('Location:../client/view/adicionarEmpresa.php');
    die();
}
// INSERIR SETOR
else if (!empty($_POST['inputDescricao'])) {
    $descricao = $_POST['inputDescricao'];
    inserirSetor($descricao);
    header('Location: ../client/view/visualizarSetor.php');
    die();
}

// MODIFICAR EMPRESA
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'modificar') {
    $id = $_POST['id'];


    $razao_social = $_POST['razao_social'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];

    modificarEmpresa($id, $razao_social, $nome_fantasia, $cnpj);
    header('Location: ../client/view/visualizarEmpresa.php');
    exit();
}
// MODIFICAR SETOR
else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'modificarSetor') {
    $id = $_POST['id'];


    $descricao = $_POST['descricao'];

    modificarSetor($id, $descricao);
    header('Location: ../client/view/visualizarSetor.php');
    exit();
}


//  EMPRESA ---- SETOR

// ADICIONAR EMPRESA
if (
    !empty($_POST['inputOptionEmpresa']) && !empty($_POST['inputOptionSetor'])
) {
    $empresa_id = $_POST['inputOptionEmpresa'];
    $setor_id = $_POST['inputOptionSetor'];

    inserirEmpresaSetor($empresa_id, $setor_id);
    header('Location: ../client/view/visualizarEmpresaSetor.php');
    die();
}
