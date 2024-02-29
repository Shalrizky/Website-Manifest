<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientJamaahSyaksiah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_client_jamaah_syaksiah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_client_syaksiah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_jamaah_syaksiah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_client_jamaah_syaksiah', true);
        $this->forge->addForeignKey('id_client_syaksiah', 'client_syaksiah', 'id_client_syaksiah', 'CASCADE'); // onDelete CASCADE
        $this->forge->addForeignKey('id_jamaah_syaksiah', 'jamaah_syaksiah', 'id_jamaah_syaksiah', 'CASCADE'); // onDelete CASCADE
        $this->forge->createTable('client_jamaah_syaksiah');
    }

    public function down()
    {
        $this->forge->dropTable('client_jamaah_syaksiah');
    }
}
