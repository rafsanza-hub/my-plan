<?php

namespace App\Controllers;

use App\Models\GoalModel;

class Goal extends BaseController{
    protected $goalModel;


    public function __construct(){
        $this->goalModel = new GoalModel();
    }

    public function index(){

        $data = [
            'goals' => $this->goalModel->getGoal()
        ];
        return view('goals/index', $data);
    }

    public function create(){

        return view('goals/create');
    }

    public function save(){
        $this->goalModel->save([
            'user_id' => user_id(),
            'name' => $this->request->getPost('name'),
            'target_amount' => $this->request->getPost('target_amount'),
            'due_date' => $this->request->getPost('due_date')
        ]);

        return redirect()->to('goal');
    }

    public function updateAmount(){
        
        $id = $this->request->getPost('goal_id');
        $current_amount = $this->request->getPost('current_amount');
        $this->goalModel->updateGoal($id, $current_amount);

        return redirect()->to('/goal');
    }

    public function edit($id){
        $data = [
            'goal' => $this->goalModel->getGoal( $id)
        ];

        return view('goals/edit', $data);
    }


    public function update($id){
        $this->goalModel->save([
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'target_amount' => $this->request->getPost('target_amount'),
            'due_date' => $this->request->getPost('due_date')
        ]);
        return redirect()->to('/goal');
    }

    public function delete($id){
        $this->goalModel->where('user_id', user_id())->delete($id);

        return redirect()->to('/goal');
    }
}