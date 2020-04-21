<?php
session_start();
include './Conexao.php';

// DQCMODEL
$codigo_model = $_REQUEST['codigo_model'];

// DQC84
$codigo_fat_part_no = $_REQUEST['codigo_fat_part_no'];

// DQC841
$codigo_parts_no = $_REQUEST['codigo_parts_no'];


//Deletar dados na tabela DQCMODEL no BD
if (isset($codigo_model)) {
    $sql = "DELETE FROM DQCMODEL WHERE ID='$codigo_model';";
    $conn->query($sql);
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading text-center">Dados deletados com sucesso !</h4>
                        </div>';
    header("Location: ListarDQCMODEL.php");
}

//Deletar dados na tabela DQC84 no BD
if (isset($codigo_fat_part_no)) {
    $sql = "DELETE FROM DQC84 WHERE ID='$codigo_fat_part_no';";
    $conn->query($sql);
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading text-center">Dados deletados com sucesso !</h4>
                        </div>';
    header("Location: ListarDQC84.php");
}

//Deletar dados na tabela DQC841 no BD
if (isset($codigo_parts_no)) {
    $sql = "DELETE FROM DQC841 WHERE dqc841.ID='$codigo_parts_no';";
    $conn->query($sql);
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading text-center">Dados deletados com sucesso !</h4>
                        </div>';
    header("Location: ListarDQC841.php");
}