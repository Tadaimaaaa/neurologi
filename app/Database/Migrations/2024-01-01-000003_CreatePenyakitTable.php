<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyakitTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyakit' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_penyakit' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_penyakit');
        $this->forge->createTable('penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('penyakit');
    }
}
