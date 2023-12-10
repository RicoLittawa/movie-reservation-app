<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MovieSeatsMigration extends Migration
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
            'seat_number' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'selected' => [
                'type' => 'TINYINT',
                'constraint' => 1,   // Length 1 to simulate boolean values (0 or 1)
                'null' => true,
                'default' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('movieseats');
    }

    public function down()
    {
        $this->forge->dropTable('movieseats');
    }
}
