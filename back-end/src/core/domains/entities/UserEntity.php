<?php

namespace Src\Core\Domains\Entities;

use DateTime;

class UserEntity {
    public string $id;
    public string $name;
    public string $email;
    public string $password;
    public string $phone_number;
    public string $role_id;
    public int $created_at;
    public int $updated_at;

    private DateTime $current_date;

    public function __construct(string $name, string $email, string $password, string $phone_number) {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->role_id = "678bc776b5bcd";

        $this->current_date = new DateTime();

        $this->created_at = $this->current_date->getTimestamp();
        $this->updated_at = $this->current_date->getTimestamp();
    }
}