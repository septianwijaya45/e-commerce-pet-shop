<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfilTokoTables extends Migration
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
            'nama_toko' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'foto_toko' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
			'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'latitute'    => [
                'type'          => 'DOUBLE',
                'constraint'    => '32',
                'null'          => TRUE
            ],
            'longitude'    => [
                'type'          => 'DOUBLE',
                'constraint'    => '32',
                'null'          => TRUE
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
        $this->forge->createTable('profiltokos');
    }

    public function down()
    {
        //
    }
}
