<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'body', 'img'];

    public function getBlogs($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}
