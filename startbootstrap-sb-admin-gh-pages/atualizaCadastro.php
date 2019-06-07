<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco_cad').value=("");
            document.getElementById('bairro_cad').value=("");
            document.getElementById('localidade_cad').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco_cad').value=(conteudo.logradouro);
            document.getElementById('bairro_cad').value=(conteudo.bairro);
            document.getElementById('localidade_cad').value=(conteudo.localidade);
            ;
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco_cad').value="...";
                document.getElementById('bairro_cad').value="...";
                document.getElementById('localidade_cad').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PROJETO - remedio rapido</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

            <a class="navbar-brand mr-1" href="index.html">Remedio Rapido</a>

            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Busque aqui seu remedio..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger">9+</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <span class="badge badge-danger">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="UsuariosCadastrados.php">Alterar Dados</a>


                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="fomularioLogin.php" data-toggle="" data-target="">Sair</a>
                    </div>
                </li>
            </ul>

        </nav>

        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Relacionados:</span><br><br><br>
                        <a href="paginaConsultaRemedio.php"><h6>Consulta Remedios</h6></a><br>
                        <a href="paginaInicial.php"><h6>Obter Remedios Gratuitamente</h6></a><br>
                        <a href="paginaRemediosDistribuidos.php"><h6>Remedios Distribuidos</h6></a><br>
                        <a href="paginaFarmaciasParceiras.php"><h6>Farmacias Paceiras</h6></a><br>
                        <a href="Pagina5.php"><h6>Postos de Saude</h6></a><br>
                        <a href="paginaSitesComMesmoConteudo.php"><h6>Sites com o mesmo conteudo</h6></a><br>


                        </li>

                        </ul>

                        <div id="content-wrapper">

                            <div class="container-fluid">

                                <!-- Breadcrumbs-->
                                <ol class="breadcrumb">
                                    <!--Pagina 1--> 
                                    
                                    <form method="post" action=attCadastro.php"> 
                    <h1>Atualizar Cadastro</h1> 

                    <p> 
                        <label for="nome_cad">Nome:</label>
                        <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="ex. João" />
                    </p>

                    <p> 
                        <label for="email_cad">E-mail:</label>
                        <input id="email_cad" name="email_cad" required="required" type="email" placeholder="ex. joao@gmail.com"/> 
                    </p>

                    <p> 
                        <label for="senha_cad">Senha:</label>
                        <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="ex. 1234"/>
                    </p>

                    <p>
                        <label for="cep_cad">Cep:</label>
                        <input name="cep_cad" type="text" id="cep_cad" value=""  maxlength="9" onblur="pesquisacep(this.value);" required="required" placeholder="ex. 73000000"/>
                    </P>
                    
                    <p>
                        <label for="endereco_cad">Endereço:</label>
                        <input name="endereco_cad" type="text" id="endereco_cad"  required="required" placeholder="ex. quandra 7 conj A" />
                    </p>        
                        
                    <p>
                        <label for="bairro_cad">Bairro:</label>
                        <input name="bairro_cad" type="text" id="bairro_cad" required="required" placeholder="ex. quandra 7 conj A casa 23"/>
                    </p>
                    
                    <p>
                        <label for="localidade_cad">localidade:</label>
                        <input name="localidade_cad" type="text" id="localidade_cad" required="required" placeholder="ex. Sobradinho" />
                    </p>
                    
                    <p> 
                        <input type="submit" value="Atualizar"/> 
                        
                    </p>

                    
                </form>
                        
                    </div>

              


                            <!-- Sticky Footer -->
                                <footer class="sticky-footer">
                                    <div class="container my-auto">
                                        <div class="copyright text-center my-auto">
                                            <span><b>Contato do administrador</b></span><br><br>
                                            <b>Telefone:</b> (61)9 9412-0659<br><br>
                                            <b>E-mail:</b> joao.prudencio0552@gmail.com
                                        </div>
                                    </div>
                                </footer>

                            </div>
                            <!-- /.content-wrapper -->

                        </div>
                        <!-- /#wrapper -->

                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>

                        <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="login.html">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap core JavaScript-->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Page level plugin JavaScript-->
                        <script src="vendor/chart.js/Chart.min.js"></script>
                        <script src="vendor/datatables/jquery.dataTables.js"></script>
                        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="js/sb-admin.min.js"></script>

                        <!-- Demo scripts for this page-->
                        <script src="js/demo/datatables-demo.js"></script>
                        <script src="js/demo/chart-area-demo.js"></script>

                        </body>

                        </html>
