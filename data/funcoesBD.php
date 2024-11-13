<?php

function conectarBD(){

    $conexao = mysqli_connect("localhost","root","","empresa");

    return($conexao);
}

function inserirEmpresa($razao_social, $nome_fantasia, $cnpj){
    $conexao = conectarBD();
    $consulta = "INSERT INTO empresa (razao_social, nome_fantasia, cnpj)
                 VALUES ('$razao_social', '$nome_fantasia', '$cnpj')";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
}

function retornarEmpresa(){
    $conexao = conectarBD();
    $consulta = "SELECT * FROM empresa";
    $listaEmpresa = mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
    return $listaEmpresa;
}


// Função para deletar uma empresa pelo ID
function deletarEmpresa($id){
    $conexao = conectarBD();
    $consulta = "DELETE FROM empresa WHERE id = '$id'";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
}

// Função para modificar os Dados
function modificarEmpresa($id, $razao_social, $nome_fantasia, $cnpj) {
    $conexao = conectarBD();
    $consulta = "UPDATE empresa SET razao_social = '$razao_social', 
                nome_fantasia = '$nome_fantasia', 
                cnpj = '$cnpj' WHERE id = '$id'";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);

}

function retornarEmpresaPorId($id) {
    $conexao = conectarBD();
    $query = "SELECT * FROM empresa WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $query);

    // Retorna o resultado da consulta
    return $resultado;
}


// SETOR


function inserirSetor($descricao) {
    $conexao = conectarBD();
    $consulta = "INSERT INTO setor (descricao) VALUES ('$descricao')";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
}


function retornarSetor(){
    $conexao = conectarBD();
    $consulta = "SELECT * FROM setor";
    $listaSetor = mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
    return $listaSetor;
}

function deletarSetor($id){
    $conexao = conectarBD();
    $consulta = "DELETE FROM setor WHERE id = '$id'";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
}

function modificarSetor($id, $descricao) {
    $conexao = conectarBD();
    $consulta = "UPDATE setor SET descricao = '$descricao' WHERE id = '$id'";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);

}

function retornarSetorPorId($id) {
    $conexao = conectarBD();
    $query = "SELECT * FROM setor WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $query);

    // Retorna o resultado da consulta
    return $resultado;
}


// EMPRESA-SETOR

function inserirEmpresaSetor($empresa_id, $setor_id) {
    $conexao = conectarBD();

    $consulta_empresa = "SELECT id FROM empresa WHERE id = '$empresa_id'";
    $resultado_empresa = mysqli_query($conexao, $consulta_empresa);

    $consulta_setor = "SELECT id FROM setor WHERE id = '$setor_id'";
    $resultado_setor = mysqli_query($conexao, $consulta_setor);

    if (mysqli_num_rows($resultado_empresa) > 0 && mysqli_num_rows($resultado_setor) > 0) {
        $consulta = "INSERT INTO empresa_setor (empresa_id, setor_id) VALUES ('$empresa_id', '$setor_id')";
        mysqli_query($conexao, $consulta);
    } else {
        echo "Erro: A empresa ou o setor não existe.";
    }

    mysqli_close($conexao);
}

function retornarEmpresaSetor() {
    $conexao = conectarBD();

    // Consulta com JOIN para trazer o nome da empresa e a descrição do setor junto com os IDs
    $consulta = "
        SELECT empresa_setor.empresa_id, empresa.razao_social, empresa_setor.setor_id, setor.descricao 
        FROM empresa_setor
        JOIN empresa ON empresa_setor.empresa_id = empresa.id
        JOIN setor ON empresa_setor.setor_id = setor.id
    ";

    $resultado = mysqli_query($conexao, $consulta);
    return $resultado;
}

function deletarEmpresaSetor($empresa_id, $setor_id) {
    $conexao = conectarBD();
    $consulta = "DELETE FROM empresa_setor WHERE empresa_id = '$empresa_id' AND setor_id = '$setor_id'";
    mysqli_query($conexao, $consulta);
    mysqli_close($conexao);
}


?>