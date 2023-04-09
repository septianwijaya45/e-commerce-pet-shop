<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderDetailTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_order' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_produk' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => true
            ],
			'total_produk' => [
                'type'       => 'INTEGER',
                'constraint' => '11',
            ],
			'total_harga' => [
                'type'       => 'FLOAT',
                'constraint' => '11',
            ],
            'createdAt' => [
				'type'		 => 'DATETIME',
				'null'		 => TRUE
			],
			'updatedAt' => [
				'type'		 => 'DATETIME',
				'null'		 => TRUE
			]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_produk', 'produks', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_details');
    }

    public function down()
    {
        //
    }
}
