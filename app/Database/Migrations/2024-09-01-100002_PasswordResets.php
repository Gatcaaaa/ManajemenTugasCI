<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PasswordResets extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'token'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at'  => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->createTable('password_resets');
    }

    public function down()
    {
        $this->forge->dropTable('password_resets');
    }
}