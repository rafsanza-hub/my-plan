<?php

namespace App\Models;

use CodeIgniter\Model;

class BudgetModel extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'category_id', 'amount', 'period'];


    public function getBudgetByUser($user_id)
    {   
        return $this->where('user_id', $user_id)->findAll();
    }   

    public function getBudgetWithCategory($id = null){
        if($id != null){
            return $this->select('budgets.*, categories.name as category_name, categories.id as category_id')
            ->join('categories', 'categories.id = budgets.category_id')
            ->where('budgets.id', $id)->where('user_id', user_id())->first();
        }
        return $this->select('budgets.*, categories.name as category_name, categories.id as category_id')
        ->join('categories', 'categories.id = budgets.category_id')
        ->where('budgets.user_id', user_id())->findAll();
    }
    



    public function updateBudget($categoryId, $amount){
        $this->db->table('budgets')
        ->set('amount', 'amount + ' . $amount, false)->where('category_id', $categoryId)->update();
    }
}
