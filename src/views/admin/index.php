<?php
    require_once __DIR__ . "/../../controllers/GetMetricsController.php";
    require_once __DIR__ . "/../../middlewares/AdminMiddleware.php";

    AdminMiddleware();

    $metrics = (new GetMetricsController())->handle();

    $months = $metrics['reservations_months'];
                
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Dashboard - AgendaPRO</title>
    <script>
        if(window.innerWidth < 1140) {
            alert('Tela muito pequena para visualizar o dashboard. Redirecionando para a página de início.');
            location.href = '/src/views/home';
        }
    </script>
    <title></title>
</head>
<body class="min-h-screen flex">
    <aside class="bg-white drop-shadow-lg rounded-xl w-[20rem] p-10 min-h-screen">
        <h2 class="flex gap-2 !text-xl !font-semibold !mb-8 !mt-4">
            <img src="https://i.imgur.com/7dgXY1l.png" width="32" height="32"/>
            Administrador
        </h2>
        <ul class="flex flex-col gap-6">
            <li >
                <a href="./index.php" class="pl-2 py-2 flex items-center gap-2 !font-medium bg-blue-500/20 !text-blue-500 !rounded-xl">
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
    <div class="p-10 w-full  max-w-[1300px]">
        <h1 class="!text-3xl !font-semibold !mb-8">Dashboard</h1>

        <div class="grid grid-cols-3 !gap-16">
            <div>
                <div class="max-w-64 bg-white drop-shadow-lg rounded-xl p-5 flex justify-between gap-4">
                    <div>
                        <p>Total de reservas</p>
                        <h3 class="!text-2xl !font-bold">
                            <?= $metrics["reservations_count"] ?>
                        </h3>
                    </div>

                    <i data-lucide="calendar"></i>
                </div>
            </div>

            <div>
                <div class="max-w-64 bg-white drop-shadow-lg rounded-xl p-5 flex justify-between gap-4">
                    <div>
                        <p>Casas cadastradas</p>
                        <h3 class="!text-2xl !font-bold">
                            <?= $metrics["houses_count"] ?>
                        </h3>
                    </div>

                    <i data-lucide="house"></i>
                </div>
            </div>

            <div>
                <div class="max-w-64 bg-white drop-shadow-lg rounded-xl p-5 flex justify-between gap-4">
                    <div>
                        <p>Reservas esses mês</p>
                        <h3 class="!text-2xl !font-bold">
                            <?= $metrics["reservations_monthly"]["total"] ?>
                        </h3>
                    </div>

                    <i data-lucide="users"></i>
                </div>
            </div>

            <div>
                <div class="max-w-64 bg-white drop-shadow-lg rounded-xl p-5 flex justify-between gap-4">
                    <div>
                        <p>Usuários Ativos</p>
                        <h3 class="!text-2xl !font-bold">
                            <?= $metrics["users_count"] ?>
                        </h3>
                    </div>

                    <i data-lucide="users"></i>
                </div>
            </div>
        </div>

        <div class="p-5 bg-white drop-shadow-lg rounded-xl mt-8">
            <h2 class="!text-lg !font-medium">Reservas mensais</h2>
            <div style="width: 100%; margin: auto;">
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');

        const data = {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Reservas mensais',
                data: [
                    <?php
                        foreach($months as $month) {
                            $total = $month['total'];

                            echo $total . ",";
                        }
                    ?>
                ],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Meses'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Valor'
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    </script>
        
    </div>
</body>
</html>