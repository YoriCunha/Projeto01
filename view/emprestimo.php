<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3ab4c965c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="../css/emprestimo.css">
    <link rel="icon" href="../img/book.png">
    <title>Book Finder</title>
</head>

<body>
    <nav class="navbar navbar-expand border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand navbar-title" href="pag-clt.php">Book Finder</a>

            <div class="d-flex gap-3 align-items-center">
                <div class="dropdown">
                    <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false" style="border: none;">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Clientes</a></li>
                        <li><a class="dropdown-item" href="lista.php">Cadasto</a></li>
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

    <div class="container mt-5" style="width: 50rem; border: 2px solid #ccc; border-radius: 8px; padding: 2rem;">

        <form id="formCadastro" style="width: 100%; font-family: 'Lexend Deca', sans-serif;">
            <header style="text-align: center; font-size: 1.5rem;">Dados do Livro</header>
            <hr>
            <div class="row mb-3">
                <div class="col">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="number" class="form-control" id="codigo" name="id" required style="width: 100%;"
                        placeholder="Informe o código">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" style="width: 100%;">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" class="form-control" id="autor">
                </div>
                <div class="col-md-6">
                    <label for="editora" class="form-label">Editora</label>
                    <input type="text" class="form-control" id="editora">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="situacao" class="form-label">Situação</label>
                    <select class="form-select" id="situacao" required>
                        <option value="Disponivel">Disponível</option>
                        <option value="Emprestado">Emprestado</option>
                        <option value="Devolvido">Devolvido</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="dataCadastro" class="form-label">Data</label>
                    <input type="date" class="form-control" id="dataCadastro" required>
                </div>
            </div>
            <br>
            <hr>
            <header style="text-align: center; margin-bottom: 1rem; font-size: 1.5rem;">Dados do Leitor</header>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cadastroLeitor" class="form-label">Cadastro do Leitor</label>
                    <input type="text" class="form-control" id="cadastroLeitor" required>
                </div>
            </div>

            <footer style="margin-top: 2rem; font-size: 1.5rem;">
                <button class="btn btn-danger" type="reset"
                    style="color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 4px; margin-right: 1rem;">
                    Limpar
                </button>

                <button class="btn btn-success" type="submit"
                    style="color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 4px;">
                    Confirmar
                </button>
            </footer>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        document.getElementById("codigo").addEventListener("blur", buscarLivro);
        
        function buscarLivro() {
            const id = document.getElementById("codigo").value.trim();
            if (!id) return;

            fetch("../backend/buscarLivro.php?id=" + id)
                .then(response => response.json())
                .then(dados => {
                   
                    if (dados.error) {
                        alert("Livro não encontrado!");
                        
                        document.getElementById("titulo").value = "";
                        document.getElementById("autor").value = "";
                        document.getElementById("editora").value = "";
                        document.getElementById("situacao").value = "Devolvido";
                        return;
                    }

           
                    document.getElementById("titulo").value = dados.titulo;
                    document.getElementById("autor").value = dados.autor;
                    document.getElementById("editora").value = dados.editora;


                })
                .catch(err => console.error("Erro ao buscar livro:", err));
        }
        document.getElementById("formCadastro").addEventListener("submit", function (e) {
            e.preventDefault(); // impede recarregar a página

            const dados = {
                id: document.getElementById("codigo").value.trim(),
                situacao: document.getElementById("situacao").value
            };

            if (!dados.id) {
                alert("Informe o código do livro antes de atualizar a situação.");
                return;
            }

            fetch("../backend/atualizarSituacao.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(dados)
            })
                .then(res => res.json())
                .then(resposta => {
                    if (resposta.success) {
                        alert("Situação do livro atualizada com sucesso!");
                    } else {
                        alert("Erro ao atualizar: " + resposta.error);
                    }
                })
                .catch(err => console.error(err));
        });
    </script>
</body>

</html>