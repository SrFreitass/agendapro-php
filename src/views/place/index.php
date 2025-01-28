<?php
    require_once __DIR__ . "/../../middlewares/LoggedMiddleware.php";
    require_once __DIR__ . "/../../infra/models/HouseModel.php";

    loggedMiddleware();

    // if(!isset($_GET["id"])) {
    //     return header("Location: ../views/404.php");
    // }

    $houseModel = new HouseModel();
    
    $house = $houseModel->findById($_GET["id"]);

    // if(!$house) {
    //     header("Location: ../views/404.php");
    // }

    $mainImage = explode(",", $house["images_url"])[0];
?>

<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style/global.css">
    <script src="../../../public/scripts/global.js" defer></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <title><?= $house["name"] ?> - AgendaPRO</title>>
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
    <main class="!mt-10 h-[50rem] w-[75rem] bg-white m-auto drop-shadow-lg rounded-xl flex gap-16 max-xl:w-[70%] max-xl:h-[35rem] max-lg:w-[90%] max-sm:h-[40rem]">
        <div class="w-1/2 h-full max-xl:hidden">
            <img src="<?= "http://localhost:3000/public" . $mainImage ?>" alt="Main image" class="w-full min-h-full object-cover rounded-l-xl">
            <div class="absolute bg-gradient-to-t from-black/60 to-transparent z-10 h-full"></div>
            <h2 class="relative bottom-20 left-4 text-white !text-3xl !font-semibold">
                <?= $house["name"] ?>
            </h2>
            <h3 class="relative bottom-20 left-4 text-white !text-lg !font-medium flex items-center gap-2">
                 <i data-lucide="map-pin"></i>
                 <?= $house["city"] ?>, <?= $house["state"] ?>
            </h3>
            <h3 class="relative bottom-44 left-4 text-xl text-white !font-semibold">
                R$ <?= $house["price"] ?> / noite    
            </h3>
        </div>

        <div class="mt-16 w-1/2 pr-16 max-xl:m-auto max-xl:w-full max-xl:px-8">
            <h2 class="!text-3xl !font-semibold">Faça sua reserva</h2>
            <form class="mt-4" action="../routes/route.php?controller=create_reservation" method="POST">
                <input type="hidden" name="house_id" value="<?= $house["id"] ?>">

                <div class="flex gap-4 max-sm:flex-col">
                    <div class="flex flex-col flex-grow-1">
                        <label class="mb-2">Check-in</label>
                        <input type="date" class="input" name="check_in" required>
                    </div>
                    <div class="flex flex-col flex-grow-1">
                        <label class="mb-2">Check-out</label>
                        <input type="date" class="input" name="check_out" required>
                    </div>
                </div>

                    
                <div class="flex flex-grow-1 flex-col gap-2 mt-4">
                    <label for="">Número de hospedes</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input pr-2" type="number" name="guests" placeholder='<?= "Máx." . $house["capacity"] ?>' required/>
                        <span class="icon is-small is-left">
                            <i data-lucide="users"></i>
                        </span>
                    </p>
                </div>
                
                <div class="flex flex-grow-1 flex-col gap-2 mt-4">
                    <label>Mensagem</label>
                    <textarea class="textarea" name="message" id="" placeholder="Mensagem">
                    </textarea>
                </div>

                <p class="mt-4">
                    Total a pagar: R$ <span id="total">0</span> | <span id="nights">0</span> noites | R$ <?= $house["price"] ?> por noite
                </p>

                <button class="button !bg-blue-500 !text-white mt-4 w-full" type="submit">Confirmar reservar</button>
            </form>
        </div>
    </main>
    <script>
        const checkIn = document.querySelector("input[type='date']");
        const checkOut = document.querySelectorAll("input[type='date']")[1];

        checkOut.addEventListener("change", () => {
            const nighs = new Date(new Date(checkOut.value) - new Date(checkIn.value)).getDate();

            document.querySelector("#total").innerText = nighs * <?= $house["price"] ?>;

            document.querySelector("#nights").innerText = nighs;
        });
    </script>
</body>
</html>