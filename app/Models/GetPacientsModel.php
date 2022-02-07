<?php

namespace App\Models;

use CodeIgniter\Model;

class GetPacientsModel extends Model
{
    protected $table = 'pacients';

    public function getPacient($pacient = false)
    {
        if ($pacient === false) {
            return $this->findAll();
        }

        return $this->where(['pacient_name' => $pacient])->first();
    }

}