<?php

namespace App\Models;

use CodeIgniter\Model;

class GetUsersModel extends Model
{
    protected $table = 'users';

    public function getUser($user = false)
    {
        if ($user === false) {
            return $this->findAll();
        }

        return $this->where(['name' => $user])->first();
    }

}