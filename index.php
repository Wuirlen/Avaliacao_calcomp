<?php session_start(); ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>

        <!-- Bootstrap core CSS e JS-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.4.1.slimNovo.min.js"></script>
        <script src="js/bootstrapNovo.min.js"></script>

    </head>
    <body class="bg-light">
        <?php
        include './Navbar.php';
        include './Conexao.php';
        ?>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Avaliação</h1>
        </div>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">TABELA 1</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">DQCMODEL</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>CRUD completo.</li>
                        </ul>
                        <a href="#DQCMODEL" class="p-3" data-toggle="modal" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">CADASTRAR</button></a>
                        <a href="ListarDQCMODEL.php" class="p-3" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">LISTAR</button></a>
                        <a href="DQCMODEL_REPORT.php" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">REPORT</button></a>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">TABELA 2</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">DQC84</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>CRUD completo.</li>
                        </ul>
                        <a href="#DQC84" data-toggle="modal" class="p-3" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">CADASTRAR</button></a>
                        <a href="ListarDQC84.php" class="p-3" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">LISTAR</button></a>
                        <a href="DQC84_REPORT.php" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">REPORT</button></a>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">TABELA 3</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">DQC841</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>CRUD completo.</li>
                        </ul>
                        <a href="#DQC841" class="p-3" data-toggle="modal" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">CADASTRAR</button></a>
                        <a href="ListarDQC841.php" class="p-3" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">LISTAR</button></a>
                        <a href="DQC841_REPORT.php" style="text-decoration: none"><button type="button" class="btn btn-lg btn-block btn-outline-success">REPORT</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal DQCMODEL -->
        <div id="DQCMODEL" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <form method="post" class="form-horizontal" action="Salvar_Dados.php" role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container"><div align="center"><h2>DQCMODEL</h2></div></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">MODEL:</label>
                                <input type="text" class="form-control" name="model" placeholder="Digite aqui o novo model" required autocomplete="off"> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="border-radius: 32px;" data-dismiss="modal">Cancelar</button>
                                <button type="submit" style="border-radius: 32px;" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--Modal DQC84 -->
        <div id="DQC84" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <form method="post" class="form-horizontal" action="Salvar_Dados.php" role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container"><div align="center"><h2>DQC84</h2></div></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Model:</label>
                                <select id="framework" name="select_model" class="form-control" >
                                    <?php
                                    $sql = "select * from  dqcmodel;";
                                    $result = mysqli_query($conn, $sql);
                                    while ($dados = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $dados['ID']; ?>"> <?php echo $dados['MODEL']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">FAT PART NO:</label>
                                <input type="text" class="form-control" name="fat_part_no" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Total Location:</label>
                                <input type="text" class="form-control" name="total_location"  required autocomplete="off">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="border-radius: 32px;" data-dismiss="modal">Cancelar</button>
                                <button type="submit" style="border-radius: 32px;" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--Modal DQC841 -->
        <div id="DQC841" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <form method="post" class="form-horizontal" action="Salvar_Dados.php" role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container"><div align="center"><h2>DQC841</h2></div></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">FAT PART NO:</label>
                                <select id="framework" name="select_fat_part_no" class="form-control" >
                                    <?php
                                    $sql_dqc84 = "select * from  dqc84;";
                                    $resul = mysqli_query($conn, $sql_dqc84);
                                    while ($dados = mysqli_fetch_array($resul)) {
                                        ?>
                                        <option value="<?php echo $dados['ID']; ?>"> <?php echo $dados['FAT_PART_NO']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">PARTS NO:</label>
                                <input type="text" class="form-control" name="parts_no" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">UNT USG:</label>
                                <input type="text" class="form-control" name="unt_usg"  required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">DESCRIPTION:</label>
                                <input type="text" class="form-control" name="description"  required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">REF DESIGNATOR:</label>
                                <input type="text" class="form-control" name="ref_designator"  required autocomplete="off">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="border-radius: 32px;" data-dismiss="modal">Cancelar</button>
                                <button type="submit" style="border-radius: 32px;" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
