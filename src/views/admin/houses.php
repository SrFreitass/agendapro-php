<?php
    require_once __DIR__ . '/../../../src/controllers/GetHousesController.php';
    require_once __DIR__ . "/../../middlewares/AdminMiddleware.php";

    AdminMiddleware();

    $houses = (new GetHousesController())->handle();
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
    <title><?= isset($_GET["edit"]) ? "Editar" : "Criar" ?> casa - AgendaPRO</title>
    <script>
        if(window.innerWidth < 1140) {
            alert('Tela muito pequena para visualizar o dashboard. Redirecionando para a página de início.');
            location.href = '/src/views/home';
        }
    </script>
    <title>Casas - Admin AgendaPRO</title>
</head>
<body class="min-h-screen flex">
<aside class="bg-white drop-shadow-lg rounded-xl w-[20rem] p-10 min-h-screen">
        <h2 class="flex gap-2 !text-xl !font-semibold !mb-8 !mt-4">
            <img src="https://i.imgur.com/7dgXY1l.png" width="32" height="32"/>
            Administrador
        </h2>
        <ul class="flex flex-col gap-6">
            <li >
                <a href="./index.php" class="pl-2 py-2 flex items-center gap-2 !font-medium">
                    <i data-lucide="chart-column"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="./reservations.php" class="pl-2 py-2 flex items-center gap-2 !font-medium">
                    <i data-lucide="calendar"></i>
                    Reservas
                </a>
            </li>
            <li>
                <a href="./houses.php" class="pl-2 py-2 flex items-center gap-2 !font-medium bg-blue-500/20 !text-blue-500 !rounded-xl">
                    <i data-lucide="house"></i>
                    Casas
                </a>
            </li>
            <li>
                <a href="./users.php" class="pl-2 py-2 flex items-center gap-2 !font-medium">
                    <i data-lucide="users"></i>
                    Usuários
                </a>
            </li>

            <li>
                <a href="../home" class="pl-2 py-2 flex items-center gap-2 !font-medium">
                    <i data-lucide="log-out"></i>
                    Sair
                </a>
            </li>
        </ul>
    </aside>
    <main class="p-10 w-[80%]">
        <div class="flex justify-between">
            <h1 class="!text-2xl !font-semibold !mb-8">Gerenciar Casas</h1>

            <a href="../place/create.php">
                <button class="flex items-center gap-2 !bg-blue-500 !text-white !font-semibold !rounded-xl !py-2 px-5">
                    <i data-lucide="plus"></i>
                    Nova casa
                </button>
            </a>
        </div>
        <div class="flex flex-wrap gap-4">
            <?php

                foreach($houses as $house) {
                    $image_url = explode(",", $house['images_url'])[0];
                    $id = $house['id'];

                    echo /*html*/ "
                        <div class='!bg-white w-[25rem] h-full drop-shadow-lg rounded-xl'>
                        <img src='http://localhost:3000/public$image_url' alt='Main image' class='w-full min-h-[14rem] max-h-[14rem] object-cover rounded-t-xl'>
                            <div class='h-full p-4 flex flex-col justify-between gap-4'>
                                <div class='flex flex-col gap-4'>
                                    <h2 class='!text-lg !font-semibold'>{$house['name']}</h2>
                                    <h3 class='!text-sm flex items-center gap-2'>
                                        {$house['city']}, {$house['state']}
                                    </h3>
                                    
                                    <h3 class='!text-sm !font-semibold !text-blue-500'>
                                        R$ {$house['price']} / noite
                                    </h3>
                                </div>

                                <div class='flex justify-between gap-2'>
                                    <a href='../place/create.php?edit&id=$id' class='!text-sm !font-semibold !bg-blue-500/20 w-1/2 py-2 rounded-xl flex justify-center'>
                                        <i data-lucide='square-pen'></i>
                                    </a>
                                    <a href='../../routes/route.php?controller=delete_house_by_id&id=$id' class='!text-sm !font-semibold !bg-red-500/20 w-1/2 py-2 rounded-xl !text-red-500 flex justify-center'>
                                        <i data-lucide='trash-2'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    ";
                }

            ?>
            <div class=''>
            </div>
        </div>
        </div>

    </main>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>