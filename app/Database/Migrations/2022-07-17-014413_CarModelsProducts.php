<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CarModelsProducts extends Migration
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
            'car_model_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => false,
            ],
            'product_id' => [
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
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('car_model_id','car_models','id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id','products','id', 'CASCADE', 'CASCADE');

        
        $this->forge->createTable('car_models_products');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('car_models_products');
    }
}
