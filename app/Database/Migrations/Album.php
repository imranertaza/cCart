<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Album extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'album_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'thumb' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
                'null'       => true,
                'default'    => null,
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 3,
            ],
            'createdDtm' => [
                'type'    => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'createdBy' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => null,
            ],
            'updatedBy' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => null,
            ],
            'updatedDtm DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('album_id', true);
        $this->forge->createTable('cc_album');
    }

    public function down()
    {
        $this->forge->dropTable('cc_album');
    }
}
