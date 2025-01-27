<?php

require_once __DIR__ . "/../infra/models/HouseModel.php";
require_once __DIR__ . "/../middlewares/LoggedMiddleware.php";


class CreatePlaceController {
    private $houseModel;

    public function __construct() {
        $this->houseModel = new HouseModel();
    }

    public function handle() {
        // loggedMiddleware();

        if(
            !isset($_POST["name"]) ||
            !isset($_POST["description"]) ||
            !isset($_POST["address"]) ||
            !isset($_POST["city"]) ||
            !isset($_POST["state"]) ||
            !isset($_POST["price"]) ||
            !isset($_POST["rooms"]) ||
            !isset($_POST["capacity"]) 
        ) {
            return header("Location: ../views/place/create.php?error=missing_fields");
        }

        $images = [];

        
        if(!is_array($_FILES["images"]["error"])) {
            if($_FILES["images"]["error"] != 0) {
                return header("Location: ../views/place/create.php?error=upload_error");
            }

            $tmp_name = $_FILES["images"]["tmp_name"];
            $name = uniqid() . "-" . $_FILES["images"]["name"];    

            $path = __DIR__ . "/../../public/images/uploads/" . $name;

            move_uploaded_file($tmp_name, $path);

            array_push($images, "/images/uploads/" . $name);
        }

        if(is_array($_FILES["images"]["error"])) {
            foreach ($_FILES["images"]["error"] as $key => $error) {
                if($error != 0) {
                    return header("Location: ../views/place/create.php?error=upload_error");
                }
    
                $tmp_name = $_FILES["images"]["tmp_name"][$key];
    
                $name = uniqid() . "-" . $_FILES["images"]["name"][$key];
    
                $path = __DIR__ . "/../../public/images/uploads/" . $name;
    
                move_uploaded_file($tmp_name, $path);
    
                array_push($images, "/images/uploads/" . $name);
            }; 
        }

        $this->houseModel->create(
            $_POST["name"],
            $_POST["description"],
            $_POST["address"],
            $_POST["city"],
            $_POST["state"],
            $_POST["price"],
            $_POST["rooms"],
            $_POST["capacity"],
            join(",", $images)
        );

        return header("Location: ../views/place/create.php?success=true");
    }
}