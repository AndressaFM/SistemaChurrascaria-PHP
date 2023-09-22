<?php
    $hostname = "localhost";
    $bancodedados = "atividade_pratica";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli ($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli -> connect_errno) {
        echo "Falha ao conectar: (". $mysqli -> connect_errno.")" .$mysqli -> connect_error;
    } else {
        echo "Conectado com sucesso!";
    }
    //pessoas
    $homens = $_POST['homens'];
    $mulheres = $_POST['mulheres'];
    $criancas = $_POST['criancas'];
    $consumo = $_POST['consumo'];
    $pessoas = $homens + $mulheres + $criancas;

    //carne
    $carne1 =$_POST['carne_sem_osso'];
    $quantidade_carne1 = $_POST['quantidade_carne_sem_osso'];
    $carne2 = $_POST['carne_com_osso'];
    $quantidade_carne2 = $_POST['quantidade_carne_com_osso'];
    $galeto_frango = $_POST['galeto_frango'];
    $quantidade_galeto_frango = $_POST['quantidade_galeto_frango'];
    $suino_ovino = $_POST['suino_ovino'];
    $quantidade_suino_ovino = $_POST['quantidade_suino_ovino'];
    $coracao_frango = $_POST['coracao_frango'];
    $quantidade_coracao_frango = $_POST['quantidade_coracao_frango'];
    $linguica_salsichao = $_POST['linguica_salsichao'];
    $quantidade_linguica_salsichao = $_POST['quantidade_linguica_salsichao'];

    //acompanhamentos 
    $arroz = $_POST ['arroz'];
    $quantidade_arroz = $_POST ['quantidade_arroz'];
    $maionese = $_POST ['maionese'];
    $quantidade_maionese = $_POST ['quantidade_maionese'];
    $abacaxi = $_POST ['abacaxi'];
    $quantidade_abacaxi = $_POST ['quantidade_abacaxi'];
    $pao = $_POST ['pao'];
    $quantidade_pao = $_POST ['quantidade_pao'];
    $tomate = $_POST ['tomate'];
    $quantidade_tomate = $_POST ['quantidade_tomate'];
    $alface = $_POST ['alface'];
    $quantidade_alface = $_POST ['quantidade_alface'];

    //bebidas
    $cerveja = $_POST ['cerveja'];
    $quantidade_cerveja = $_POST ['quantidade_cerveja'];
    $refrigerante = $_POST ['refrigerante'];
    $quantidade_refrigerante = $_POST ['quantidade_refrigerante'];

    $sql = "INSERT INTO lista_churrasco_pagina (pessoas, consumo, carne_sem_osso, quantidade_carne_sem_osso, carne_com_osso, quantidade_carne_com_osso, galeto_frango, quantidade_galeto_frango, suino_ovino, quantidade_suino_ovino, coracao_frango, quantidade_coracao_frango, linguica_salsichao, quantidade_linguica_salsichao, arroz, quantidade_arroz, maionese, quantidade_maionese, abacaxi, quantidade_abacaxi, pao, quantidade_pao, tomate, quantidade_tomate, alface, quantidade_alface, cerveja, quantidade_cerveja, refrigerante, quantidade_regrigerante) VALUES ('$pessoas', '$consumo', '$carne1', '$quantidade_carne1', '$carne2', '$quantidade_carne2', '$galeto_frango', '$quantidade_galeto_frango', '$suino_ovino', '$quantidade_suino_ovino', '$coracao_frango', '$quantidade_coracao_frango', '$linguica_salsichao', '$quantidade_linguica_salsichao', '$arroz', '$quantidade_arroz', '$maionese', '$quantidade_maionese', '$abacaxi', '$quantidade_abacaxi', '$pao', '$quantidade_pao', '$tomate', '$quantidade_tomate', '$alface', '$quantidade_alface', '$cerveja', '$quantidade_cerveja', '$refrigerante', '$quantidade_refrigerante' )";

    if ($mysqli->query($sql)) { // Insere os dados se tudo estiver correto
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $mysqli->error;
    } 


    $sql = "SELECT * FROM lista_churrasco_pagina";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            foreach ($row as $coluna => $valor) {
                echo "$coluna: $valor<br>";
            }
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
?>