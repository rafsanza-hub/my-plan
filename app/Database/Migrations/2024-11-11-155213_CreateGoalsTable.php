<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateGoalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'target_amount' => [
                'type' => 'decimal',
                'constraint' => '15,2'
            ],
            'current_amount' => [
                'type' => 'decimal',
                'constraint' => '15,2',
                'default' => 0.00
            ],
            'due_date' => [
                'type' => 'date',
                'null' => true
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('goals', true);
    }

    public function down()
    {
        $this->forge->dropTable('goals', true);
    }
}