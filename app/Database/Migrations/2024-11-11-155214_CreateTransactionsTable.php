<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
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
            'date' => [
                'type' => 'date',
                'null' => false
            ],
            'description' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'amount' => [
                'type' => 'decimal',
                'constraint' => '15,2'
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['pemasukan', 'pengeluaran']
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'category_id']);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('transactions', true);
    }

    public function down()
    {
        $this->forge->dropTable('transactions', true);
    }
}