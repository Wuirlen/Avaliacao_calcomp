<?php
session_start();
include './Conexao.php';

//Alterar dados na tabela DQCMODEL no BD
if (isset($_REQUEST['codigo_model'])) {
    // DQCMODEL
    $codigo = $_REQUEST['codigo_model'];
    $model = $_REQUEST['new_model'];
    $sql = "UPDATE DQCMODEL SET MODEL='$model' WHERE ID='$codigo';";
    $conn->query($sql);
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-center">Dados Alterados com sucesso !</h4>
                            </div>';
 	 header("Location: ListarDQCMODEL.php");
}

//Alterar dados na tabela DQC84 no BD
if (isset($_REQUEST['codigo_fat_part_no'])) {
    // DQC84
    $codigo = $_REQUEST['codigo_fat_part_no'];
    $fat_part_no = $_REQUEST['new_fat_part_no'];
    $total_location = $_REQUEST['new_total_location'];
    $sql = "UPDATE DQC84 SET FAT_PART_NO='$fat_part_no', TOTAL_LOCATION='$total_location', UPDATE_DT=NOW() WHERE dqc84.ID='$codigo';";
    $conn->query($sql);
     $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-center">Dados Alterados com sucesso !</h4>
                            </div>';
	 header("Location: ListarDQC84.php");
}

//Alterar dados na tabela DQC841 no BD
if (isset($_REQUEST['codigo_parts_no'])) {
    // DQC841
$codigo = $_REQUEST['codigo_parts_no'];
$parts_no = $_REQUEST['new_parts_no'];
$unt_usg = $_REQUEST['new_unt_usg'];
$description = $_REQUEST['new_description'];
$ref_designator = $_REQUEST['new_ref_designator'];

    $sql = "UPDATE DQC841 SET PARTS_NO='$parts_no', UNT_USG='$unt_usg', DESCRIPTION='$description', REF_DESIGNATOR='$ref_designator', UPDATE_DT=NOW() WHERE dqc841.ID='$codigo';";
    $conn->query($sql);
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-center">Dados Alterados com sucesso !</h4>
                            </div>';
	header("Location: ListarDQC841.php");
}