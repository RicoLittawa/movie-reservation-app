<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReferenceMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('references');
    }

    public function down()
    {
        $this->forge->dropTable('references');
    }
}
