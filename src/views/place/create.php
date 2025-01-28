<?php

require_once __DIR__ . "/../../middlewares/LoggedMiddleware.php";
require_once __DIR__ . "/../../controllers/GetHouseController.php";

if(isset($_GET["success"])) {
    echo "<script>alert('Espaço criado com sucesso!')</script>";
}

$house = [];

if(isset($_GET["edit"]) && isset($_GET["id"])) {
    $house = (new GetHouseController())->handle();
    $house_id = $_GET["id"];
}   

$states = [
    "<option value='AC'>Acre</option>",
    "<option value='AL'>Alagoas</option>",
    "<option value='AP'>Amapá</option>",
    "<option value='AM'>Amazonas</option>",
    "<option value='BA'>Bahia</option>",
    "<option value='CE'>Ceará</option>",
    "<option value='DF'>Distrito Federal</option>",
    "<option value='ES'>Espírito Santo</option>",
    "<option value='GO'>Goiás</option>",
    "<option value='MA'>Maranhão</option>",
    "<option value='MT'>Mato Grosso</option>",
    "<option value='MS'>Mato Grosso do Sul</option>",
    "<option value='MG'>Minas Gerais</option>",
    "<option value='PA'>Pará</option>",
    "<option value='PB'>Paraíba</option>",
    "<option value='PR'>Paraná</option>",
    "<option value='PE'>Pernambuco</option>",
    "<option value='PI'>Piauí</option>",
    "<option value='RJ'>Rio de Janeiro</option>",
    "<option value='RN'>Rio Grande do Norte</option>",
    "<option value='RS'>Rio Grande do Sul</option>",
    "<option value='RO'>Rondônia</option>",
    "<option value='RR'>Roraima</option>",
    "<option value='SC'>Santa Catarina</option>",
    "<option value='SP'>São Paulo</option>",
    "<option value='SE'>Sergipe</option>",
    "<option value='TO'>Tocantins</option>",
];

if(isset($house['state'])) {
    foreach($states as $key => $state) {
        if(strpos($state, $house['state']) !== false) {
            $states[$key] = str_replace("option", "option selected=selected", $state);
        }
    }
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
    </style>
    <title>Document</title>
</head>
<body class="!py-10">
    <form <?= isset($_GET["edit"]) ? "" : "enctype='multipart/form-data'" ?> class="flex flex-col gap-4 max-w-[50rem] m-auto p-4 bg-white drop-shadow-lg rounded-xl p-5" action="../../routes/route.php?controller=<?= isset($_GET['edit']) ? 'update_house_by_id&id=' . $house_id : 'create_place' ?>" method="POST">
        <h2 class="!text-3xl !font-semibold">
            <?= isset($_GET["edit"]) ? "Editar espaço" : "Criar novo espaço" ?>
        </h2>
        <h3 class="!text-xl !font-medium">
            Informações Básicas
        </h3>

        <div class="flex flex-col">
            <label class="mb-2">Nome</label>
            <p class="control has-icons-left has-icons-right">
                <input class="input" type="text" name="name" required value="<?= isset($house['name']) ? $house['name'] : '' ?>"/>
                <span class="icon is-small is-left">
                    <i data-lucide="house"></i>
                </span>
            </p>
        </div>

        <div class="flex flex-col">
            <label class="mb-2">Descrição</label>
            <textarea class="textarea" name="description" id="" required value="<?= isset($house['description']) ? $house['description'] : '' ?>">
            </textarea>
        </div>

        <h3 class="!text-xl !font-medium">
            Localização
        </h3>

        <div class="flex items-center gap-6 max-sm:flex-col">

            <div class="flex flex-col flex-grow-1 max-sm:w-full">
                <label class="mb-2">Endereço</label>
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="address"  required value="<?= isset($house['address']) ? $house['address']  : '' ?>" />
                    <span class="icon is-small is-left">
                        <i data-lucide="map-pin"></i>
                    </span>
                </p>
            </div>

            <div class="flex flex-col max-sm:w-full">
                <label class="mb-2">Cidade</label>
                <input class="input" type="text" name="city" required value="<?= isset($house['city']) ? $house['city']  : '' ?>"/>
            </div>

            <div class="flex flex-col max-sm:w-full">
                <label class="mb-2">Estado</label>
                <div class="select max-sm:w-full">
                    <select class="max-sm:w-full" name="state" required>
                        <?php
                            isset($_GET["edit"]) ?
                            ""
                            : "
                            <option>
                                Selecione um estado
                            </option>
                         "
                        ?>
                        <?= join("", $states); ?>
                    </select>
                </div>
            </div>
            
        </div>

        <h3 class="!text-xl !font-medium">
            Detalhes do espaço
        </h3>

        <div class="flex items-center gap-6 max-sm:flex-col">

            <div class="flex flex-grow-1 flex-col gap-2 w-[54%] max-sm:w-full">
                <label for="">
                    Preço por noite
                </label>
                <p class="control has-icons-left has-icons-right">
                    <input class="input pr-2" type="number" name="price" required value="<?= isset($house['price']) ? $house['price'] : '' ?>"/>
                    <span class="icon is-small is-left">
                        <i data-lucide="dollar-sign"></i>
                    </span>
                </p>
            </div>

            <div class="flex flex-grow-1 flex-col gap-2 max-sm:w-full">
                <label for="">Número de quartos</label>
                <p class="control has-icons-left has-icons-right">
                    <input class="input pr-2" type="number" name="rooms" required value="<?= isset($house['rooms']) ? $house['rooms'] : '' ?>"/>
                    <span class="icon is-small is-left">
                        <i data-lucide="bed-double"></i>
                    </span>
                </p>
            </div>

            <div class="flex flex-grow-1 flex-col gap-2 max-sm:w-full">
                <label for="">Capacidade máxima</label>
                <p class="control has-icons-left has-icons-right">
                    <input class="input pr-2" type="number" name="capacity" required value="<?= isset($house['capacity']) ? $house['capacity'] : '' ?>"/>
                    <span class="icon is-small is-left">
                        <i data-lucide="users"></i>
                    </span>
                </p>
            </div>
        </div>

        <h3 class="!text-xl !font-semibold">
            Fotos do espaço
        </h3>

        <div class="border border-dashed border-gray-300 p-4 min-h-[200px] flex flex-col items-center justify-center relative">
            <i data-lucide="upload" class="text-4xl"></i>
            <label for="">
                Arraste e solte as imagens aqui
            </label>
            <small>
                PNG, JPG, GIF, SVG até 10MB
            </small>
            <input type="file" name="images" onchange="alert('Image upada com sucesso!')" class="absolute w-full h-full text-white" <?= isset($_GET["edit"]) ? "" : "required" ?>/>
        </div>

        <button class="button !bg-blue-600 !text-white py-3 w-full">
            <?= isset($_GET["edit"]) ? "Editar espaço" : "Criar espaço" ?>
        </button>
    </form>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>