<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3ab4c965c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../img/book.png">
    <title>Login</title>
</head>

<body>
    <div class="login-container">
        <a href="../index.html" style="text-decoration: none; color: black; ">
            <h2 class="title">Book Finder</h2>
        </a>
        <h2 class="login-title">Login</h2>
        <form id="formLogin">
            <div class="form-group">
                <input type="username" class="form-control" id="username" placeholder="Usuário">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <div class="text-center mt-3">
                <a href="#" style="text-decoration: none;">Esqueceu sua senha?</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script>
        document.getElementById("formLogin").addEventListener("submit", function(e) {
            e.preventDefault();

            const usuario = document.getElementById("username").value;
            const senha = document.getElementById("password").value;

            if (usuario === "adm" && senha === "123") {
                localStorage.setItem("usuarioLogado", usuario);
                window.location.href = "pag-clt.php";
            } else {
                alert("Usuário ou senha incorretos!");
            }

        });
    </script>
</body>

</html>