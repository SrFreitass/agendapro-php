<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style/global.css">
    <script src="../../../public/scripts/global.js" defer></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <title><?= isset($_GET["edit"]) ? "Editar" : "Criar" ?> casa - AgendaPRO</title>
    <title>Entrar - AgendaPRO</title>
</head>
<body>
</head>
    <title>Criar uma conta - AgendaPRO</title>
</head>
<body class="min-h-screen flex items-center">
    <form class="flex flex-col items-start justify-center gap-4 w-[32rem] m-auto bg-white !px-10 !py-16 rounded-xl drop-shadow-lg max-sm:w-[90%] max-sm:!px-6" action="../../routes/route.php?controller=signup" method="post">
        <div class="flex items-center justify-center !mx-auto mb-4 gap-2"> 
            <i data-lucide="house" class="text-blue-500">
            </i>
            <h2 class="!text-2xl !font-semibold">AgendaPRO</h2>
        </div>


        <div class="text-center w-[90%] mb-4 mx-auto">
            <h1 class="!text-2xl !font-semibold">Criar uma conta</h1>
            <p>
                Crie uma conta para ter acesso a todas as funcionalidades do AgendaPRO.
            </p>
        </div>

        <div class="w-full">
            <label class="label">Nome</label>
            <input class="input" type="text" name="name" placeholder="Nome">
        </div>

        <div class="w-full">
            <label class="label">E-mail</label>
            <input class="input" type="email" name="email" placeholder="E-mail">
        </div>

        <div class="w-full">
            <label class="label">Senha</label>
            <input class="input" type="password" name="password" placeholder="Senha">
        </div>

        <button class="button w-full !bg-blue-500 !text-white" type="submit">Criar conta</button>
        <a href="./signin.php" class="!text-black">Já tem uma conta? <u> Faça login </u></a>
    </form>
</body>
</html>