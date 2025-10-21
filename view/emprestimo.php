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
    <nav class="navbar navbar-expand border-bottom"
        style="padding: 0.5rem 1rem; background-color: #fff; box-shadow: 0 5px 4px rgba(0,0,0,.25);">
        <div class="w-100 d-flex align-items-center justify-content-center position-relative">

            <a class="navbar-brand navbar-title mx-auto position-relative" href="pag-clt.php">Book Finder</a>

            <div class="botao position-absolute" style="right: 0;">
                <a href="../view/lista.php" class="nav-link p-0 text-center">Cadastro</a>
            </div>

            <div class="position-absolute" style="right: 0;">
                <a href="../view/login.html" class="nav-link p-0">
                    <i class="fa fa-user-circle" style="font-size: 2rem; color: #333;"></i>
                </a>
            </div>
        </div>
    </nav>
</body>

<div class="container mt-5" style="width: 50rem; border: 2px solid #ccc; border-radius: 8px; padding: 2rem;">

    <form id="formCadastro" style="width: 100%; font-family: 'Lexend Deca', sans-serif;">
        <header style="text-align: center; font-size: 1.5rem;">Dados do Livro</header>
        <hr>
        <div class="row mb-3">
            <div class="col">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" required style="width: 100%;">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" required style="width: 100%;">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" required>
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
                    <option value="Emprestado">Emprestado</option>
                    <option value="Devolvido">Devolvido</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="dataCadastro" class="form-label">Data</label>
                <input type="date" class="form-control" id="dataCadastro" required
                    pattern="^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$">
            </div>
        </div>
        <br>
        <hr>
        <header style="text-align: center; margin-bottom: 1rem; font-size: 1.5rem;">Dados do Leitor</header>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="autor" class="form-label">Cadrastro do Leitor</label>
                <input type="text" class="form-control" id="autor" required>
            </div>
        </div>
        <footer style=" margin-top: 2rem; font-size: 1.5rem;">
            <button class="btn btn-danger" type="reset"
                style="color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 4px; margin-right: 1rem;">
                Limpar
            </button>
            <button class="btn btn-success" type="submit"
                style="color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 4px;">
                Confirmar
        </footer>
    </form>
</div>

</html>