<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTables extends Migration
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
            'id_user' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => true
            ],
            'kode_order' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
			'tanggal_order' => [
                'type'       => 'DATETIME',
            ],
			'status_order' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
            ],
			'jumlah_order' => [
                'type'       => 'INTEGER',
                'constraint' => '11',
            ],
			'total_harga' => [
                'type'       => 'FLOAT',
                'constraint' => '11',
            ],
            'status'      => [
                'type'          => 'VARCHAR',
                'constraint'    => '32'
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
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        //
    }
}
