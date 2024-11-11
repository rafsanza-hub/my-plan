<?php

namespace App\Models;

use CodeIgniter\Model;

class GoalModel extends Model
{

    protected $table = 'goals';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'target_amount', 'current_amount', 'due_date'];
    

    public function getGoal( $goal_id = null )
    {
        if ($goal_id == null) {
            return $this->where('user_id', user_id())->findAll();
        } else {
            return $this->where('user_id', user_id())->where('id', $goal_id)->first();
        }
    }


    public function updateGoal($id, $current_amount){
        return $this->db->table('goals')
        ->set('current_amount', 'current_amount + ' . $current_amount, false)
        ->where('id', $id)->update();
    }
}
