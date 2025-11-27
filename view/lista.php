<?php
include("../backend/conexao.php");

$puxa = "SELECT id_livro, titulo, quantidade, autor, editora, data_pub, situacao, observacao, genero, faixa, localizacao, sinopse, imagem FROM livros";
$resultado = mysqli_query($conexao, $puxa);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3ab4c965c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="../css/lista.css">
    <link rel="icon" href="../img/book.png">
    <title>Lista de Livros</title>
</head>

<body>
    <nav class="navbar navbar-expand border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand navbar-title" href="pag-clt.php">Book Finder</a>

            <div class="d-flex gap-3 align-items-center">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false" style="border: none;">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Clientes</a></li>
                        <li><a class="dropdown-item" href="emprestimo.php">Emprestimos e Devoluções</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="index.php">Sair</a></li> 
                    </ul>
                </div>
                <a href="../view/login.php" class="nav-link p-0">
                    <i class="fa fa-user-circle" style="font-size: 2rem; color: #333;"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="box" style="display: flex; gap: 1rem; margin: 2rem;">
        <!-- SIDEBAR DE FILTROS -->
        <div class="box-content"
            style="width: 15rem; background: transparent; border: 1px solid #ccc; border-radius: 8px; padding: 2rem;">
            <div class="sidebar-header">
                <h3>Filtros</h3>
            </div>
            <label><input type="checkbox" id="filtroDevolucao"> Devolvidos</label><br>
            <label><input type="checkbox" id="filtroEmprestados"> Emprestados</label><br>
            <label><input type="checkbox" id="filtroDisponiveis"> Disponíveis</label>
        </div>

        <!-- TABELA -->
        <div class="table-responsive w-100"
            style="border: 1px solid #ccc; border-radius: 1rem; margin-left: 5rem; margin-right: 5rem;">
            <table class="table text-center" id="tabelaLivros">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Título</th>
                        <th>Quantidade</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Data</th>
                        <th>Situação</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- As linhas serão inseridas aqui -->
                </tbody>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_livro'] . "</td>";
                        echo "<td>" . $row['titulo'] . "</td>";
                        echo "<td>" . $row['quantidade'] . "</td>";
                        echo "<td>" . $row['autor'] . "</td>";
                        echo "<td>" . $row['editora'] . "</td>";
                        $data_formatada = date("d/m/Y", strtotime($row['data_pub']));
                        echo "<td>" . $data_formatada . "</td>";
                        echo "<td>" . $row['situacao'] . "</td>";
                        if ($row['observacao'] == "") {
                            echo "<td>N/A</td>";
                        } else {
                            echo "<td>" . $row['observacao'] . "</td>";
                        }
                        echo "<td>
                                <button class='btn btn-sm btn-primary editarBtn' 
                                        data-bs-toggle='modal' 
                                        data-bs-target='#editarModal'
                                        data-id='" . $row['id_livro'] . "' id='123'>
                                Editar
                                </button>
                                <button class='btn btn-sm btn-danger excluirBtn'data-id='" . $row['id_livro'] . "'>Excluir</button>
                            </td>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal"
        style="margin-left: 2rem;">
        Novo Cadastro
    </button>

    <!-- MODAL -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastro de Livro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <form id="formCadastro" action="../backend/acoes.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="col-md-3">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" class="form-control" id="quantidade" name="qtd" required min="1">
                            </div>
                            <div class="col-md-3">
                                <label for="dataCadastro" class="form-label">Data de Cadastro</label>
                                <input type="date" class="form-control" id="dataCadastro" name="data" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" required>
                            </div>
                            <div class="col-md-6">
                                <label for="editora" class="form-label">Editora</label>
                                <input type="text" class="form-control" id="editora" name="editora">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Gênero</label>
                                <select class="form-select" id="genero" name="genero" required>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Mangá">Shonen</option>
                                    <option value="Fantasisa">Fantasia</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Situação</label>
                                <select class="form-select" id="situacao" name="situacao" required>
                                    <option value="Disponível">Disponível</option>
                                    <option value="Emprestado">Emprestado</option>
                                    <option value="Devolvido">Devolvido</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Faixa Etária</label>
                                <select class="form-select" id="faixa" name="faixa" required>
                                    <option value="Adulto">Adulto</option>
                                    <option value="Juvenil">Juvenil</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Localização</label>
                                <select class="form-select" id="local" name="local" required>
                                    <option value="SAventura"> Setor Aventura</option>
                                    <option value="SMangá">Setor Mangá</option>
                                    <option value="SFantasisa"> Setor Fantasia</option>
                                </select>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoes" rows="3" style="resize: none;"
                                name="observacoes"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sinopse" class="form-label">Sinópse</label>
                            <textarea class="form-control" id="sinopse" rows="3" style="resize: none;"
                                name="sinopse"></textarea>
                        </div>
                        <div class="md-3">
                            <input type="file" name="imagem" class="form-control" accept="image/*" required>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="formCadastro" name="savebook">Salvar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- modal de edição -->

    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Livro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <form id="formEditar" action="../backend/update.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="hidden" id="idEdit" name="id_livro">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="tituloEdit" name="titulo" required>
                            </div>
                            <div class="col-md-3">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" class="form-control" id="quantidadeEdit" name="quantidade" required
                                    min="1">
                            </div>
                            <div class="col-md-3">
                                <label for="dataCadastro" class="form-label">Data de Cadastro</label>
                                <input type="date" class="form-control" id="dataCadastroEdit" name="data" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="autorEdit" name="autor" required>
                            </div>
                            <div class="col-md-6">
                                <label for="editora" class="form-label">Editora</label>
                                <input type="text" class="form-control" id="editoraEdit" name="editora">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Gênero</label>
                                <select class="form-select" id="generoEdit" name="genero" required>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Mangá">Mangá</option>
                                    <option value="Fantasisa">Fantasia</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Situação</label>
                                <select class="form-select" id="situacaoEdit" name="situacao" required>
                                    <option value="Disponível">Disponível</option>
                                    <option value="Emprestado">Emprestado</option>
                                    <option value="Devolvido">Devolvido</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Faixa Etária</label>
                                <select class="form-select" id="faixaEdit" name="faixa" required>
                                    <option value="Adulto">Adulto</option>
                                    <option value="Juvenil">Juvenil</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="situacao" class="form-label">Localização</label>
                                <select class="form-select" id="localEdit" name="local" required>
                                    <option value="SAventura"> Setor Aventura</option>
                                    <option value="SMangá">Setor Mangá</option>
                                    <option value="SFantasisa"> Setor Fantasia</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoesEdit" rows="3" style="resize: none;"
                                name="observacoes"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sinopse" class="form-label">Sinópse</label>
                            <textarea class="form-control" id="sinopseEdit" rows="3" style="resize: none;"
                                name="sinopse"></textarea>
                        </div>
                        <div class="md-3">
                            <input type="file" name="imagem" class="form-control mb-3" accept="image/*">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="formEditar" name="editbook">Salvar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabela = document.getElementById('tabelaLivros'); // troque pelo id real da sua tabela
            if (!tabela) return;

            document.addEventListener("click", function (e) {
                const btn = e.target.closest(".editarBtn");
                if (!btn) return;

                const id = btn.getAttribute("data-id");

                // Preenche o ID no formulário
                document.getElementById("idEdit").value = id;

                // Agora buscamos os dados no banco
                fetch("../backend/listaLivros.php?id=" + id)
                    .then(r => r.json())
                    .then(dados => {

                        document.getElementById("tituloEdit").value = dados.titulo;
                        document.getElementById("quantidadeEdit").value = dados.quantidade;
                        document.getElementById("autorEdit").value = dados.autor;
                        document.getElementById("editoraEdit").value = dados.editora;
                        document.getElementById("dataCadastroEdit").value = dados.data_pub;

                        document.getElementById("generoEdit").value = dados.genero;
                        document.getElementById("situacaoEdit").value = dados.situacao;
                        document.getElementById("faixaEdit").value = dados.faixa;
                        document.getElementById("localEdit").value = dados.localizacao;

                        document.getElementById("observacoesEdit").value = dados.observacao;
                        document.getElementById("sinopseEdit").value = dados.sinopse;

                        // abre modal
                        const modal = new bootstrap.Modal(document.getElementById("editarModal"));
                        modal.show();
                    })
                    .catch(err => console.log("ERRO:", err));
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.excluirBtn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    if (confirm("Tem certeza que deseja excluir este livro?")) {
                        window.location.href = "../backend/delete.php?id=" + id;
                    }
                });
            });
        });
        
    </script>
</body>

</html>