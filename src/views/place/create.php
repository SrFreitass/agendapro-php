<?php

require_once __DIR__ . "/../../middlewares/LoggedMiddleware.php";

loggedMiddleware();
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
    <title>Document</title>
</head>
<body>
    <form class="flex flex-col items-center gap-4">
        <input class="input" accept="image/*" type="file" name="image" id="image"/>

        <input class="input" type="text" name="name" id="name"/>

        <input class="input" type="text" name="address" id="address"/>

        <input class="input" type="text" name="city" id="city"/>

        <input class="input" type="text" name="state" id="state"/>
        
        <textarea type="text" name="description" id="description" />

        <button type="submit">Criar</button>
    </form>
</body>
</html>