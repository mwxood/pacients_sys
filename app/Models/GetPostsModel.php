<?php

namespace App\Models;

use CodeIgniter\Model;

class GetPostsModel extends Model
{
    protected $table = 'posts';

    public function getUser($post = false)
    {
        if ($post === false) {
            return $this->findAll();
        }

        return $this->where(['title' => $post])->first();
    }

}