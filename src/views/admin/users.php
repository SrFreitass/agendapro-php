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
                <a href="./houses.php" class="pl-2 py-2 flex items-center gap-2 !font-medium">
                    <i data-lucide="house"></i>
                    Casas
                </a>
            </li>
            <li>
                <a href="./users.php" class="pl-2 py-2 flex items-center gap-2 !font-medium bg-blue-500/20 !text-blue-500 !rounded-xl">
                    <i data-lucide="users"></i>
                    Usuários
                </a>
            </li>
        </ul>
    </aside>
    <div class="p-10 w-[80%]">
        <h1 class="!text-2xl !font-semibold !mb-8">Gerenciar usuários</h1>
        <table class="table is-bordered !w-full rounded-xl bg-white drop-shadow-lg">
        <tbody>
            
            <tr>
                <th class="!font-normal !text-sm !bg-gray-100">NOME</th>
                <th class="!font-normal !text-sm !bg-gray-100">E-MAIL</th>
                <th class="!font-normal !text-sm !bg-gray-100">TELEFONE</th>
                <th class="!font-normal !text-sm !bg-gray-100">AÇÕES</th>
            </tr>

            <tr>
                <td class="py-3">
                    João da Silva
                </td>
                <td class="py-3">
                   joao@example.com
                </td>
                <td class="py-3">
                   (11) 99999-9999
                </td>

                <td>
                    <a>
                        <i data-lucide="trash-2" class="text-red-500"></i>
                    </a>
                </td>
            </tr>

            <tr>
                <td class="py-3">
                    João da Silva
                </td>
                <td class="py-3">
                   joao@example.com
                </td>
                <td class="py-3">
                   (11) 99999-9999
                </td>
    
                <td class="py-3">
                    <a>
                        <i data-lucide="trash-2" class="text-red-500"></i>
                    </a>
                </td>
            </tr>
         
  
        </tbody>
        </table>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>