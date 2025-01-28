<?php
    require __DIR__ . "/../../controllers/GetReservationsController.php";
    require_once __DIR__ . "/../../middlewares/AdminMiddleware.php";

    AdminMiddleware();

    $reservations = (new GetReservationsController())->handle();

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
    <title>Reservas - Admin AgendaPRO</title>
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
                <a href="./reservations.php" class="pl-2 py-2 flex items-center gap-2 !font-medium bg-blue-500/20 !text-blue-500 !rounded-xl">
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
    <div class="p-10 w-[80%]">
        <h1 class="!text-2xl !font-semibold !mb-8">Gerenciar reservas</h1>
        <table class="table is-bordered !w-full rounded-xl bg-white drop-shadow-lg">
        <tbody>
            
            <tr>
                <th class="!font-normal !text-sm !bg-gray-100">USUÁRIO</th>
                <th class="!font-normal !text-sm !bg-gray-100">CASA</th>
                <th class="!font-normal !text-sm !bg-gray-100">CHECK-IN</th>
                <th class="!font-normal !text-sm !bg-gray-100">CHECK-OUT</th>
                <th class="!font-normal !text-sm !bg-gray-100">AÇÕES</th>
            </tr>

            <?php foreach ($reservations as $reservation): ?>
                <?php $id = $reservation["id"] ?>

                <tr>
                    <td class="py-3">
                        <?= $reservation["user_name"] ?>
                    </td>
                    <td class="py-3">
                        <?= $reservation["house_name"] ?>
                    </td>
                    <td class="py-3">
                        <?= $reservation["check_in"] ?>
                    </td>
                    <td class="py-3">
                        <?= $reservation["check_out"] ?>
                    </td>
                    <td>
                        <a href="../../routes/route.php?controller=delete_reservation_by_id&id=<?=$id?>">
                            <i data-lucide="trash-2" class="text-red-500"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>