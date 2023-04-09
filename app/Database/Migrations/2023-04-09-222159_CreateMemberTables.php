<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMemberTables extends Migration
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
                'null'          => TRUE
            ],
			'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'          => TRUE
            ],
            'jenis_kelamin' => [
                'type'          => 'VARCHAR',
                'constraint'    => '32',
                'null'          => TRUE
            ],
			'no_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
                'null'          => TRUE
            ],
            'status_member' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'          => TRUE
            ],
            'status_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'          => TRUE
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
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('members');
    }

    public function down()
    {
        //
    }
}
