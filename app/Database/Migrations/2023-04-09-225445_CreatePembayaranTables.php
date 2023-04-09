<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaranTables extends Migration
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
            'id_member' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => true
            ],
            'kode_order' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'tgl_pembayaran' => [
				'type'		 => 'DATETIME',
				'null'		 => TRUE
			],
			'total_pembayaran' => [
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
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_member', 'member', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayarans');
    }

    public function down()
    {
        //
    }
}
