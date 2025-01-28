<?php
    require __DIR__ . "/../../controllers/GetReservationsByUserIdController.php";
    require_once __DIR__ . "/../../middlewares/AdminMiddleware.php";

    $reservations = [];

    $reservations = (new GetReservationsByUserIdController())->handle();


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
    <title>Minhas reservas - AgendaPRO</title>
</head>
<body class="min-h-screen">
    <header class="w-full !flex items-center gap-4 p-5 !py-7 bg-white drop-shadow-lg sticky top-0 z-10">
        <div class="flex items-center gap-2 max-sm:m-auto"> 
            <i data-lucide="house" class="text-blue-500">
            </i>
            <h2 class="!text-2xl !font-semibold">AgendaPRO</h2>
        </div>
        <nav class="max-sm:hidden">
            <ul class="flex gap-6">
                <li>
                    <a href="/src/views/home">
                        Explorar casas
                    </a>
                </li>

                <li>
                    <a href="/src/views/reservations">
                        Minhas reservas
                    </a>
                </li>
            </ul>
        </nav>

    </header>
    <main class="p-10">
        <h1 class="!text-2xl !font-semibold !mb-8">Essas são suas reservas</h1>
        <table class="table is-bordered !w-full rounded-xl bg-white drop-shadow-lg">
        <tbody>
            
            <tr>
                <th class="!font-normal !text-sm !bg-gray-100">DATA</th>
                <th class="!font-normal !text-sm !bg-gray-100">CASA</th>
                <th class="!font-normal !text-sm !bg-gray-100">CHECK-IN</th>
                <th class="!font-normal !text-sm !bg-gray-100">CHECK-OUT</th>
                <th class="!font-normal !text-sm !bg-gray-100">AÇÕES</th>
            </tr>

            <?php foreach ($reservations as $reservation): ?>
                <?php $id = $reservation["id"] ?>

                <tr>
                    <td class="py-3"> <?= $reservation["created_at"] ?></td>
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
                        <a href="../routes/route.php?controller=delete_reservation_by_user&id=<?=$id?>">
                            <i data-lucide="trash-2" class="text-red-500"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </main>
</body>
</html>