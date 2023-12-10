<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddReservationMigration extends Migration
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
            'customerName' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'reservedDate' => [
                'type' => 'DATE',
                'null' => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
