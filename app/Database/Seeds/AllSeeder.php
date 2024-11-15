<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('AuthGroupsSeeder');
        $this->call('AuthGroupsUsersSeeder');

    }
}
