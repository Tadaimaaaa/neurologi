<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePegawaiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pegawai' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'dokter', 'perawat'],
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Aktif', 'Tidak Aktif'],
                'default'    => 'Aktif',
            ],
        ]);

        $this->forge->addPrimaryKey('id_pegawai');
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
