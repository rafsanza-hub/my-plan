<?php

namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\BudgetModel;


class Budget extends BaseController{
    protected $budgetModel;
    public function __construct(){
        $this->budgetModel = new BudgetModel();
    }


    public function index()
    {


        $categoryModel = new CategoryModel();
        $data = [
            'categories' => $categoryModel->getCategories(),
            'budgets' => $this->budgetModel->getBudgetWithCategory(),
        ];
        return view('budgets/index', $data);
    }


    public function save(){

        $this->budgetModel->save([
            'user_id' => user_id(),
            'category_id' => $this->request->getpost('category_id'),
            'amount' => $this->request->getpost('amount'),
            'period' => $this->request->getpost('period'),
        ]);
        return redirect()->to('/budget');
    }

    public function edit($id){
        $data = [
            'budget' => $this->budgetModel->getBudgetWithCategory($id),
        ];
        return view('budgets/edit', $data);
    }

    public function update($id){
        $this->budgetModel->save([
            'id' => $id,
            'amount' => $this->request->getpost('amount'),
            'period' => $this->request->getpost('period'),
        ]);

        return redirect()->to('/budget');
    }
    
    public function delete($id){
        $this->budgetModel->where('user_id', user_id())->delete($id);
        return redirect()->to('/budget');
    }
}