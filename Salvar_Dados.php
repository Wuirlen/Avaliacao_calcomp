<?php
session_start();
include './Conexao.php';

$confirmacao = FALSE;

//Salvar dados na tabela DQCMODEL no BD
if (isset($_REQUEST['model'])) {
    // DQCMODEL
    $model = $_REQUEST['model'];
    $sql = "INSERT INTO DQCMODEL VALUES (null,'$model');";
    $conn->query($sql);
    $confirmacao = TRUE;
}

//Salvar dados na tabela DQC84 no BD
if (isset($_REQUEST['select_model'])) {
    // DQC84

    $select_model = $_REQUEST['select_model'];
    $fat_part_no = $_REQUEST['fat_part_no'];
    $total_location = $_REQUEST['total_location'];
    $sql = "INSERT INTO DQC84 VALUES (null,'$select_model','$fat_part_no','$total_location',now(),now());";
    $conn->query($sql);
    $confirmacao = TRUE;
}

//Salvar dados na tabela DQC841 no BD
if (isset($_REQUEST['select_fat_part_no'])) {
    // DQC841
$select_fat_part_no = $_REQUEST['select_fat_part_no'];
$parts_no = $_REQUEST['parts_no'];
$unt_usg = $_REQUEST['unt_usg'];
$description = $_REQUEST['description'];
$ref_designator = $_REQUEST['ref_designator'];

    $sql = "INSERT INTO DQC841 VALUES (null,'$select_fat_part_no','$parts_no','$unt_usg','$description','$ref_designator',now(),now());";
    $conn->query($sql);
    $confirmacao = TRUE;
}

if ($confirmacao == TRUE) {
        
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-center">Dados Cadastrados com sucesso !</h4>
                            </div>';
	header("Location: index.php");
        
    } else {
    
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading text-center">Erro ao Cadastrar Dados !</h4>
                            </div>';
        header("Location: index.php");
    }