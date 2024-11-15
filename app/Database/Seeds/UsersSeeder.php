<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
       
        $data = [
            [
                'email' => 'rapsan@gmail.com',
                'username' => 'rafsan',
                'fullname' => null,
                'user_image' => 'default.png',
                'password_hash' => '$2y$10$FxQlLaewVyIBhPtFIEzqFuc/.iDPMmQVkzskfbvGKVSchGhVRias2',
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
                'activate_hash' => null,
                'status' => null,
                'status_message' => null,
                'active' => 1,
                'force_pass_reset' => 0,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'email' => 'superadmin@gmail.com',
                'username' => 'superadmin',
                'fullname' => null,
                'user_image' => 'default.png',
                'password_hash' => '$2y$10$FxQlLaewVyIBhPtFIEzqFuc/.iDPMmQVkzskfbvGKVSchGhVRias2',
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
                'activate_hash' => null,
                'status' => null,
                'status_message' => null,
                'active' => 0,
                'force_pass_reset' => 0,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ]
        ];

      
        $this->db->table('users')->insertBatch($data);
    }
}
