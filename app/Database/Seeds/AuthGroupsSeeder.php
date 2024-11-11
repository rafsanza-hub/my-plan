<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'superadmin',
                'description' => 'Super Administrator'
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'description' => 'Administrator'
            ],
            [
                'id' => 3,
                'name' => 'user',
                'description' => 'User'
            ]
            
        ];

        // Insert batch data baru
        $this->db->table('auth_groups')->insertBatch($data);
    }
}