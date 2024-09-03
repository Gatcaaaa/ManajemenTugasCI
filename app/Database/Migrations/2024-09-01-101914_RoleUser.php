<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'role_id'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at'  => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE'); 
        $this->forge->createTable('role_user');
    }

    public function down()
    {
        $this->forge->dropTable('role_user');
    }
}