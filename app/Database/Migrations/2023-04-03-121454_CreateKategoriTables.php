<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriTables extends Migration
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
            'nama'  => [
                'type'      => 'VARCHAR',
                'constraint'    => 255
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
        $this->forge->createTable('kategories');
    }

    public function down()
    {
        //
    }
}
