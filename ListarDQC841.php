<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>LISTAGEM</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="imagens/colortech.png">

        <script src="js/jquery-3.4.1.slimNovo.min.js"></script>
        <script src="js/bootstrapNovo.min.js"></script>

        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/loader.css">
        <script src="js/jquery-1.12.4.js"></script>

        <style>
            input {
                border: 1px solid #c4c4c4;
                border-radius: 5px;
                background-color: #fff;
                padding: 3px 5px;
                box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                width: 190px;
            }
        </style>
        <style>
            #number {
                text-align: center;
            }
            #example th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #example th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #28A745;
                color: white;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    "language": {
                        "url": "css/Portuguese.json"
                    }
                });
            });

        </script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <?php
        require './NavBar.php';
        include './Conexao.php';
        ?>
        <div class="container-fluid">
            <fieldset>
                <!-- Form Name -->
                <legend align="center"><br><h2>LISTAGEM DA TABELA DQC841</h2></legend>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                  <div class="d-flex justify-content-center">
                <div class="col-md-12 order-md-1">
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FAT PART NO</th>
                            <th>PARTS NO</th>
                            <th>UNT USG</th>
                            <th>DESCRIPTION</th>
                            <th>REF DESIGNATOR</th>
                            <th>UPDATE</th>
                            <th>CREATE</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>FAT PART NO</th>
                            <th>PARTS NO</th>
                            <th>UNT USG</th>
                            <th>DESCRIPTION</th>
                            <th>REF DESIGNATOR</th>
                            <th>UPDATE</th>
                            <th>CREATE</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "select * ,dqc841.ID as ID_DQC841,dqc841.UPDATE_DT as UPDATEDT from dqc841 inner join dqc84 on dqc841.FAT_PART_NO=dqc84.ID;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                                $codigo = $row['ID_DQC841'];
                                $fat_part_no = $row['FAT_PART_NO'];
                                $parts_no = $row['PARTS_NO'];
                                $unt_usg = $row['UNT_USG'];
                                $description = $row['DESCRIPTION'];
                                $ref_designator = $row['REF_DESIGNATOR'];
                                $update = $row['UPDATEDT'];
                                $create = $row['CREATE_DT'];
                                ?>
                                <tr>
                                    <td id="number">
                                        <?php echo $codigo; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $fat_part_no; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $parts_no; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $unt_usg; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $description; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $ref_designator; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo date('d/m/Y H:i:s',strtotime($update)); ?>
                                    </td>
                                    <td id="number">
                                        <?php echo date('d/m/Y H:i:s',strtotime($create)); ?>
                                    </td>

                                    <td id="number"><a href="#EXCLUIR<?php echo $codigo; ?>" data-toggle="modal"><button type="button"  style="border-radius: 32px;" class="btn btn-labeled btn-danger">EXCLUIR</button></a>
                                    <a href="#ALTERAR<?php echo $codigo; ?>" data-toggle="modal"><button type="button"  style="border-radius: 32px;" class="btn btn-labeled btn-primary">ALTERAR</button></a>
                                    </td>

                                    <!-- Modal EXCLUIR -->
                            <div class="modal fade" id="EXCLUIR<?php echo $codigo; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">EXCLUIR PARTS NO</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="Deletar_Dados.php" method="post">
                                            <div class="modal-body">Você deseja excluir PARTS NO <?php echo $parts_no; ?> ?</div>
                                            <input type="hidden" name="codigo_parts_no" value="<?php echo $codigo; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                                <button type="submit" class="btn btn-success">Sim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    
                    <!-- Modal ALTERAR -->
                            <div class="modal fade" id="ALTERAR<?php echo $codigo; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ALTERAR DADOS</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="UPDATE.php" method="post">
                                            <input type="hidden" name="codigo_parts_no" value="<?php echo $codigo; ?>">
                                            <label for="message-text" class="control-label">FAT PART NO:</label>
                                            <input type="text" disabled value="<?php echo $fat_part_no; ?>">
                                            <label for="message-text" class="control-label">PARTS NO:</label>
                                            <input type="text" name="new_parts_no" value="<?php echo $parts_no; ?>">
                                            <label for="message-text" class="control-label">UNT USG:</label>
                                            <input type="text" name="new_unt_usg" value="<?php echo $unt_usg; ?>">
                                            <label for="message-text" class="control-label">DESCRIPTION:</label>
                                            <input type="text" name="new_description" value="<?php echo $description; ?>">
                                            <label for="message-text" class="control-label">REF DESIGNATOR:</label>
                                            <input type="text" name="new_ref_designator" value="<?php echo $ref_designator; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                                <button type="submit" class="btn btn-success">Sim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>

                </table>
                 </div>
               </div>
                <br><hr class="mb-4">
            </fieldset>
        </div>
    </body>
</html>
