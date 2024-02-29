<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JamaahSyaksiah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jamaah_syaksiah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_jamaah_syaksiah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis_kelamin' => [
                'type' => 'CHAR',
                'constraint' => 3,
            ],
            'no_passpor' => [
                'type' => 'CHAR',
                'constraint' => 8,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'expired_passpor' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'created_at' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'vfs' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_visa' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_passpor' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'request' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'id_mustanad' => [
                'type' => 'CHAR',
                'constraint' => 10,
            ],
            'mustanad' => [
                'type' => 'CHAR',
                'constraint' => 10,
            ],
            'no_enjaz' => [
                'type' => 'CHAR',
                'constraint' => 10,
            ],
            'no_visa' => [
                'type' => 'CHAR',
                'constraint' => 10,
            ],
            

        ]);

        $this->forge->addKey('id_jamaah_syaksiah', true);
        $this->forge->createTable('jamaah_syaksiah');
    }

    public function down()
    {
        $this->forge->dropTable('jamaah_syaksiah');
    }
}
