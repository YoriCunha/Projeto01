<?php
require 'backend/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3ab4c965c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/book.png">
    
    <title>Book Finder</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand navbar-title" href="#"> Book Finder </a>

            <div class="d-flex gap-3 align-items-center">
                <a href="view/login.php" class="nav-link p-0">
                    <i class="fa fa-user-circle" style="font-size: 2rem; color: #333;"></i>
                </a>
            </div>
        </div>
    </nav>

    
    <!-- Dashboard -->
    <main class="container-dashboard">
        <div class="search-box">
            <input type="text" id="search-input" placeholder="Buscar">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>

        <div class="card-grid" id="card-grid">
            <!-- Cards serão inseridos aqui via JS -->
        </div>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2025 Book Finder. Todos os direitos reservados.
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/principal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>