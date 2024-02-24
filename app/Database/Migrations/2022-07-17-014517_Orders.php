<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
            ],
            'total' => [
                'type'       => 'INT',
                'constraint' => 12,
                'null'       => false,
            ],
            'payment_media' => [
                'type'       => 'ENUM("Debit","Credit")',
                'null'       => false,
            ],
            'state' => [
                'type'       => 'ENUM("Pending","Approved","Rejected")',
                'default' => "Pending",
                'null'       => false,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('user_id','users','id', 'CASCADE', 'CASCADE');


        
        $this->forge->createTable('orders');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
