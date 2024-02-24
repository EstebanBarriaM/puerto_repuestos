<?php
namespace App\Entities;

use CodeIgniter\Entity;

    class UsersEntities extends Entity
    {

        protected $dates = ['created_at', 'updated_at'];

        protected function setPassword(string $password)
        {
            $this->attributes['password'] = password_hash($password,PASSWORD_DEFAULT);
        }

        public function generateName()
        {

            $this->attributes['full_name'] = $this->name . " " . $this->surname;
            
        }

    }
