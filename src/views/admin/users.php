<?php
    require_once __DIR__ . '/../../../src/controllers/GetUsersController.php';
    require_once __DIR__ . "/../../middlewares/AdminMiddleware.php";

    AdminMiddleware();

    $users = (new GetUsersController())->handle();
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
    <title>Usuários - Admin AgendaPRO</title>
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

            <li>
                <a href="../home" class="pl-2 py-2 flex items-center gap-2 !font-medium">
                    <i data-lucide="log-out"></i>
                    Sair
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

            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= isset($user['phone_number']) ? $user['phone_number'] : "(00) 00000-0000" ?></td>
                    <td>
                        <a href="../../routes/route.php?controller=delete_user_by_id&<?= "id=" . $user['id'] ?>">
                            <button>
                                <i data-lucide="trash-2 "></i>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
         
  
        </tbody>
        </table>
    </div>
</body>
</html>