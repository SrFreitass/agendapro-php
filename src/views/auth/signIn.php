<?php

    if(isset($_GET["error"]) && $_GET["error"] === "email_or_password_incorrect") {
        echo "<script>alert('E-mail ou senha incorretos!')</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
        body {
            background-color: #f9fafb;
        }

        a {
            text-decoration: none;
            color: var(--bulma-body-color);
        }
    </style>
    <title>Entrar - AgendaPRO</title>
</head>
<body>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Entrar - AgendaPRO</title>
</head>
<body>
    <form class="min-h-screen flex flex-col items-start justify-center gap-4 max-w-[30rem] m-auto" action="../../routes/route.php?controller=signin" method="post">
        <div class="flex items-center justify-center !mx-auto gap-2"> 
            <i data-lucide="house" class="text-blue-500">
            </i>
            <h2 class="!text-2xl !font-semibold">AgendaPRO</h2>
        </div>

        <div class="text-center w-[90%] mb-4 mx-auto">
            <h1 class="!text-2xl !font-bold">Entrar na sua conta</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, illo.
            </p>
        </div>

        <div class="w-full">
            <label class="label">E-mail</label>
            <input class="input" type="email" name="email" placeholder="E-mail">
        </div>

        <div class="w-full">
            <label class="label">Senha</label>
            <input class="input" type="password" name="password" placeholder="Senha">
        </div>

        <button class="button w-full" type="submit">Entrar</button>
        <a href="./signup.php" class="!text-black">Ainda não tem uma conta? <u> Criar aqui </u></a>
    </form>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>