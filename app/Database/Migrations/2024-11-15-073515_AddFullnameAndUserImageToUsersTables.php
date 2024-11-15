<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFullnameAndUserImageToUsersTables extends Migration
{
    public function up()
    {
        // Alter Users Table to add fullname and user_image
        $this->forge->addColumn('users', [
            'fullname'         => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'user_image'       => ['type' => 'varchar', 'constraint' => 100, 'default' => 'default.png'],
        ]);
    }

    public function down()
    {
        // Drop the columns if rolled back
        $this->forge->dropColumn('users', ['fullname', 'user_image']);
    }
}