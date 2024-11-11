<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model{

    protected $table = 'categories';

    protected $allowedFields = ['name', 'user_id'];

    public function getCategories(){
        return $this->where('user_id', user_id())->findAll();
    }
}