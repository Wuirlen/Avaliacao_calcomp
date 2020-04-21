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
        <link rel="stylesheet" href="css2/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css2/loader.css">
        <script src="js2/jquery-1.12.4.js"></script>

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
                        "url": "css2/Portuguese.json"
                    }
                });
            });

        </script>
        <link rel="stylesheet" href="css2/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css2/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css2/responsive.bootstrap.min.css">
        <script src="js2/bootstrap.min.js"></script>
        <script src="js2/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <?php
        require './NavBar.php';
        include './Conexao.php';
        ?>
        <div class="container-fluid">
            <fieldset>
                <!-- Form Name -->
                <legend align="center"><br><h2>Lista de campos que devem ser exibidos de acordo com o item 2 da Avalição</h2></legend>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form method="POST" action="gerar_planilha_especifica.php">
                <div class="pull-right">		
                    <a href="REPORT_TABELAS.php"><button type='button' class='btn btn-sm btn-danger'>Gerar Excel</button></a>
		    
		</div>
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>MODEL</th>
                            <th>FAT PART NO</th>
                            <th>TOTAL LOCATION</th>
                            <th>PARTS NO</th>
                            <th>UNT USG</th>
                            <th>DESCRIPTION</th>
                            <th>REF DESIGNATOR</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>MODEL</th>
                            <th>FAT PART NO</th>
                            <th>TOTAL LOCATION</th>
                            <th>PARTS NO</th>
                            <th>UNT USG</th>
                            <th>DESCRIPTION</th>
                            <th>REF DESIGNATOR</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "select dqc841.FAT_PART_NO as ID1, dqcmodel.MODEL,dqc84.FAT_PART_NO,dqc84.TOTAL_LOCATION,dqc841.PARTS_NO,dqc841.UNT_USG,dqc841.DESCRIPTION,dqc841.REF_DESIGNATOR from dqc841 inner join dqc84 on dqc841.FAT_PART_NO=dqc84.ID inner join dqcmodel on dqc84.MODEL=dqcmodel.ID;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                                $ID = $row['ID1'];
                                $MODEL = $row['MODEL'];
                                $FAT_PART_NO = $row['FAT_PART_NO'];
                                $TOTAL_LOCATION = $row['TOTAL_LOCATION'];
                                $PARTS_NO = $row['PARTS_NO'];
                                $UNT_USG = $row['UNT_USG'];
                                $DESCRIPTION = $row['DESCRIPTION'];
                                $REF_DESIGNATOR = $row['REF_DESIGNATOR'];
                                
                                ?>
                                <tr>
                                    <td id="number">
                                        <?php echo $MODEL; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $FAT_PART_NO; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $TOTAL_LOCATION; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $PARTS_NO; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $UNT_USG; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $DESCRIPTION; ?>
                                    </td>
                                    <td id="number">
                                        <?php echo $REF_DESIGNATOR; ?>
                                    </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>

                </table>
                    </form>
                <br><hr class="mb-4">
            </fieldset>
        </div>
    </body>
</html>
