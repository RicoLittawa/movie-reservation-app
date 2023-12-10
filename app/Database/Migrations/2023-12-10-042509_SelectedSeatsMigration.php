<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SelectedSeatsMigration extends Migration
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
            'referenceNumber' => [
                'type' => 'INT',
                'null' => true,
            ],
            'seatNumber' => [
                'type' => 'TEXT',
                'null' => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('selectedseats');
    }

    public function down()
    {
        $this->forge->dropTable('selectedseats');
    }
}
