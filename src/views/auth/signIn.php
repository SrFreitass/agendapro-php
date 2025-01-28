<?php

    if(isset($_GET["error"]) && $_GET["error"] === "email_or_password_incorrect") {
        echo "<script>alert('E-mail ou senha incorretos!')</script>";
    }

?>

<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style/global.css">
    <script src="../../../public/scripts/global.js" defer></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
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
<body class="min-h-screen flex items-center">
    <form class="flex flex-col items-start justify-center gap-4 w-[32rem] m-auto bg-white !px-10 !py-16 rounded-xl drop-shadow-lg max-sm:w-[90%] max-sm:!px-6" action="../../routes/route.php?controller=signin" method="post">
        <div class="flex items-center justify-center !mx-auto gap-2 mb-4"> 
            <i data-lucide="house" class="text-blue-500">
            </i>
            <h2 class="!text-2xl !font-semibold">AgendaPRO</h2>
        </div>

        <div class="text-center w-[90%] mb-4 mx-auto">
            <h1 class="!text-2xl !font-semibold">Entrar na sua conta</h1>
            <p>
                Bem-vindo de volta! Faça login para continuar.
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

        <button class="button w-full !bg-blue-500 !text-white" type="submit">Entrar</button>
        <a href="./signup.php" class="!text-black">Ainda não tem uma conta? <u> Criar aqui </u></a>
    </form>
</body>
</html>