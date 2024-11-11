<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db;
    protected $builder;
    
    public function __construct() {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function userList()
    {
        // $users = new \Myth\Auth\Models\UserModel;
        // 'users' => $users->findAll()

        $this->builder->select('users.id, username, user_image, email, active, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id ');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id ');
        $query = $this->builder->get();

        $data['title'] = 'User List';
        $data['users'] = $query->getResult();
        return view('admin/user_list', $data);
    }
    public function detail($id = 0)
    {
        // $users = new \Myth\Auth\Models\UserModel;
        // 'users' => $users->findAll()

        $this->builder->select('users.id, username, user_image, email, active, name, fullname');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id ');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id ');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['title'] = 'User List';
        $data['user'] = $query->getRow();
        return view('admin/detail', $data);
    }
}
