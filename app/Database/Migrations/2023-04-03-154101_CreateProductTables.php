<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTables extends Migration
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
			'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
			'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
			'netto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
			'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
			'stok' => [
                'type'       => 'INTEGER',
                'constraint' => '11',
            ],
			'harga' => [
                'type'       => 'INTEGER',
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
        $this->forge->createTable('produks');
    }

    public function down()
    {
        //
    }
}
