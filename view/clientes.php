<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3ab4c965c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="img/book.png">

    <title>Book Finder</title>
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
                        <li><a class="dropdown-item" href="lista.php">Cadastro</a></li>
                        <li><a class="dropdown-item" href="emprestimo.php">Emprestimos e Devoluções</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="#">Sair</a></li>
                    </ul>
                </div>
                <a href="#" class="nav-link p-0">
                    <i class="fa fa-user-circle" style="font-size: 2rem; color: #333;"></i>
                </a>
            </div>
        </div>
    </nav>
    <div class="box" style="align-items: center; display: flex; gap: rem; margin: 2rem;">
        <div class="box-content" style="width: 15rem; background: transparent; padding: 1rem;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoClienteModal">
                Novo Cliente
            </button>
        </div>
        <div class="table-responsive w-100"
            style="border: 1px solid #ccc; border-radius: 1rem; margin-left: 5rem; margin-right: 5rem;">
            <table class="table text-center" id="tabelaClientes">
                <caption class="text-center" style="caption-side: top; font-size: 2rem; padding: 1rem;">Clientes
                </caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include '../backend/listarCliente.php'; ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="modal fade" id="novoClienteModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="clienteModalLabel">Cadastro de Clientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <form id="formCliente" action="../backend/salvarCliente.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" required>
                            </div>
                            <div class="col-md-9">
                                <label for="endereco" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" name="saveclient">Salvar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="clienteModalLabel">Cadastro de Clientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <form id="formCliente" action="../backend/updateCliente.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="hidden" id="idEdit" name="id_clientes">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nomeEdit" name="nome" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="emailEdit" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="text" class="form-control" id="telefoneEdit" name="telefone" required>
                            </div>
                            <div class="col-md-9">
                                <label for="endereco" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" id="enderecoEdit" name="endereco" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" name="editclient">Salvar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2025 Book Finder. Todos os direitos reservados.
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabela = document.getElementById('tabelaClientes'); // troque pelo id real da sua tabela
            if (!tabela) return;

            document.addEventListener("click", function (e) {
                const btn = e.target.closest(".editarBtn");
                if (!btn) return;

                const id = btn.getAttribute("data-id");

                // Preenche o ID no formulário
                document.getElementById("idEdit").value = id;

                // Agora buscamos os dados no banco
                fetch("../backend/clientLista.php?id=" + id)
                    .then(r => r.json())
                    .then(dados => {
                        
                        document.getElementById("nomeEdit").value = dados.nome;
                        document.getElementById("emailEdit").value = dados.email;
                        document.getElementById("telefoneEdit").value = dados.telefone;
                        document.getElementById("enderecoEdit").value = dados.endereco;

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
                    if (confirm("Tem certeza que deseja excluir este cliente?")) {
                        window.location.href = "../backend/deleteCliente.php?id_clientes=" + id;
                    }
                });
            });
        });
    </script>
</body>