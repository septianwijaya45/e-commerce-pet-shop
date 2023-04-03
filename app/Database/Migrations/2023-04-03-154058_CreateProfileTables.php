<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfileTables extends Migration
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
			'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
			'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
			'no_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('profile');
    }

    public function down()
    {
        //
    }
}
