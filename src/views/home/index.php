<?php
    require_once __DIR__ . "/../../controllers/GetHousesController.php";
    require_once __DIR__ . "/../../controllers/GetHousesWithFilterController.php";

    $houses = (new GetHousesController())->handle();

    if(
        isset($_GET["name"]) &&
        isset($_GET["price"]) &&
        isset($_GET["capacity"])
    ) {
        $houses = (new GetHousesWithFilterController)->handle();
    }

    if(!$houses) {
        $houses = [];
    }
?>


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
    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
        body {
            background-color: #f9fafb;
        }

        a {
            text-decoration: none;
            color: var(--bulma-body-color);
        }
    </style>
    <title>Document</title>
</head>
<body class="min-h-screen">
    <div class="max-w-[75rem] m-auto p-4">
        <form class="flex items-center gap-4 p-5 bg-white drop-shadow-lg rounded-xl" method="get">
            <input type="text" class="input !max-w-[30rem]" name="name" placeholder="Pesquisar pelo nomes">
            
            <div class="select">
                <select name="price" onchange="this.form.submit()">
                    <option value="">
                        Todos os preços
                    </option>  
                    <option value="100">
                        Até R$ 100
                    </option>
                    <option value="200">
                        Até R$ 200
                    </option>
                    <option value="300">
                        Até R$ 300
                    </option>
                    <option value="500">
                        Até R$ 500
                    </option>      
                    <option value="100000">
                        Até R$ 500+
                    </option>
                </select>
            </div>

            <div class="select">
                <select name="capacity" onchange="this.form.submit()">
                    <option value="">
                        Todos os tamanhos
                    </option>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php echo $i; ?>+ hóspedes
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </form>

        <div class="flex flex-wrap justify-center gap-4 p-4">


            <?php

                foreach($houses as $house) {
                    $image_url = explode(",", $house["images_url"])[0];
                    $id = $house["id"];
                        
                    echo /*html*/"
                        <a href='./place?id=$id' class='relative'>
                            <div class='bg-white w-[25rem] h-[23rem] drop-shadow-lg rounded-xl pb-5 m-auto'>
                                <img src='http://localhost:3000/public$image_url' alt='Main image' class='w-full min-h-[14rem] max-h-[14rem] object-cover rounded-t-xl'>
                                <div class='p-4 flex flex-col gap-4'>
                                    <h2 class='!text-lg !font-semibold'>{$house['name']}</h2>
                                    <h3 class='!text-sm flex items-center gap-2'>
                                        <i data-lucide='map-pin'></i>
                                        {$house['city']}, {$house['state']}
                                    </h3>

                                    <div class='flex justify-between'>
                                        <h3 class='!text-sm flex items-center gap-2'>
                                            <i data-lucide='bed-double'></i>
                                            {$house['rooms']} quartos
                                        </h3>

                                        <h3 class='!text-sm flex items-center gap-2'>
                                            <i data-lucide='users'></i>
                                            Até {$house['capacity']} hóspedes
                                        </h3>
                                    </div>
                                </div>

                                <div class='absolute top-4 right-2 bg-white p-2 px-4 rounded-full'>
                                    <h3 class='!text-sm !font-semibold'>
                                        R$ {$house['price']} / noite
                                    </h3>
                                </div>
                            </div>
                        <a/>
                    ";
                }
                
            ?>

        </div>
    </div>            
    <script>
        lucide.createIcons();
    </script>
</body>
</html>