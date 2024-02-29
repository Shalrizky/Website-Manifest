<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientSyaksiah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_client_syaksiah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_client_syaksiah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],

        ]);

        $this->forge->addKey('id_client_syaksiah', true);
        $this->forge->createTable('client_syaksiah');
    }

    public function down()
    {
        $this->forge->dropTable('client_syaksiah');
    }
}
