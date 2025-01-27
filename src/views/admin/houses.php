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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
        body {
            background-color: #f9fafb;
        }

        a {
            color: var(--bulma-body-color);
        }
    </style>
    <title></title>
    <title>Document</title>
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
        </ul>
    </aside>
    <main class="p-10 w-[80%]">
        <div class="flex justify-between">
            <h1 class="!text-2xl !font-semibold !mb-8">Gerenciar Casas</h1>

            <a href="">
                <button class="flex items-center gap-2 !bg-blue-500 !text-white !font-semibold !rounded-xl !py-2 px-5">
                    <i data-lucide="plus"></i>
                    Nova casa
                </button>
            </a>
        </div>
        <div class="flex flex-wrap gap-4">
            <div class='!bg-white w-[25rem] h-full drop-shadow-lg rounded-xl'>
                <img src='https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&q=80' alt='Main image' class='w-full h-[15rem] object-cover rounded-t-xl'>
                <div class='h-full p-4 flex flex-col justify-between gap-4'>
                    <div class="flex flex-col gap-4">
                        <h2 class='!text-lg !font-semibold'>{$house['name']}</h2>
                        <h3 class='!text-sm flex items-center gap-2'>
                            {$house['city']}, {$house['state']}
                        </h3>
                        
                        <h3 class='!text-sm !font-semibold !text-blue-500'>
                            R$ {$house['price']} / noite
                        </h3>
                    </div>

                    <div class="flex justify-between gap-2">
                        <a href='http://localhost:3000/admin/houses/edit?id={$house['id']}' class='!text-sm !font-semibold !bg-blue-500/20 w-1/2 py-2 rounded-xl flex justify-center'>
                            <i data-lucide="square-pen"></i>
                        </a>
                        <a href='http://localhost:3000/admin/houses/delete?id={$house['id']}' class='!text-sm !font-semibold !bg-red-500/20 w-1/2 py-2 rounded-xl !text-red-500 flex justify-center'>
                            <i data-lucide="trash-2"></i>
                        </a>
                    </div>
                </div>
            </div>

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