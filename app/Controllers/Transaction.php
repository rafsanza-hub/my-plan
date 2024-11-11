<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\CategoryModel;
use App\Models\BudgetModel;

class Transaction extends BaseController
{
    protected $transactionModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {


        $data = [
            'transactions' => $this->transactionModel->getTransactionWithCategory(),
            'categories' => $this->categoryModel->getCategories()
        ];

        return view('transaction/index', $data);
    }

    public function save()
    {
        $type = $this->request->getPost('type');
        $amount = $this->request->getPost('amount');
        $category_id = $this->request->getPost('category_id');
        $amount = ($type == 'pengeluaran') ? -$amount  : $amount;



        $this->transactionModel->save([
            'user_id' => user_id(),
            'category_id' => $category_id,
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
            'amount' => $this->request->getPost('amount'),
            'type' => $this->request->getPost('type')
        ]);

        $budgetModel = new BudgetModel();
        $budgetModel->updateBudget($category_id, $amount);


        return redirect()->to('/transaction');
    }

    public function delete($id)
    {
        $this->transactionModel->where('user_id', user_id())->delete($id);
        return redirect()->to('/transaction');
    }


    public function edit($id)
    {
        $transaction = $this->transactionModel->where('user_id', user_id())->where('id', $id)->first();

        if (!$transaction) {
            return redirect()->to('/transaction');
        }
        $data = [
            'transaction' => $transaction,
            'categories' => $this->categoryModel->getCategories()
        ];
        return view('transaction/edit', $data);
    }

    public function update($id)
    {
        $type = $this->request->getPost('type');
        $category_id = $this->request->getPost('category_id');
        $amount = $this->request->getPost('amount');
        $amount = ($type == 'pengeluaran') ? -$amount : $amount;

        $this->transactionModel->save([
            'id' => $id,
            'user_id' => user_id(),
            'category_id' => $category_id,
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
            'amount' => $this->request->getPost('amount'),
            'type' => $type
        ]);

        $budgetModel = new BudgetModel();
        $budgetModel->updateBudget($category_id, $amount);


        session()->setFlashdata('message', 'Transaksi berhasil diupdate');
        return redirect()->to('/transaction');
    }
}
