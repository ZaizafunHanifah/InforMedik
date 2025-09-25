<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHasilKuesionerTable extends Migration
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
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'depresi_score' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'depresi_level' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'kecemasan_score' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'kecemasan_level' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'stres_score' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'stres_level' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hasil_kuesioner');
    }

    public function down()
    {
        $this->forge->dropTable('hasil_kuesioner');
    }
}