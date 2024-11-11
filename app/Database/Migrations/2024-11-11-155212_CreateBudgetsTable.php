<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateBudgetsTable extends Migration
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
            'category_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'amount' => [
                'type' => 'decimal',
                'constraint' => '15,2'
            ],
            'period' => [
                'type' => 'ENUM',
                'constraint' => ['monthly', 'yearly']
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'category_id']);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('budgets', true);
    }

    public function down()
    {
        $this->forge->dropTable('budgets', true);
    }
}