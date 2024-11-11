<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{


    protected $table = 'transactions';

    protected $allowedFields = ['user_id', 'amount', 'status', 'category_id', 'date', 'description', 'type'];

    protected $useTimestamps = false;

    public function getTransactionbyUser($userId)
    {

        return $this->where('user_id', $userId)->findAll();
    }

    public function getTransactionWithCategory()
    {
        return $this->select('transactions.*, categories.name as category_name')
            ->join('categories', 'categories.id = transactions.category_id', 'left')
            ->where('transactions.user_id', user_id())->findAll();
    }


    public function getTransactionsByFilters($categoryId = null, $startDate = null, $endDate = null)
    {
        $builder = $this->builder();

        if ($categoryId) {
            $builder->where('category_id', $categoryId);
        }
        
        if ($startDate) {
            $builder->where('date >=', $startDate);
        }

        if ($endDate) {
            $builder->where('date <=', $endDate);
        }

        return $builder->get()->getResultArray();
    }
}
