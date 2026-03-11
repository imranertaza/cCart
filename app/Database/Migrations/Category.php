<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cat_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'parent_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'category_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
            'meta_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'meta_description' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'meta_keyword' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'icon_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'alt_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'header_menu' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'],
                'default'    => '1',
            ],
            'side_menu' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'],
                'default'    => '1',
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'],
                'default'    => '1',
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
        $this->forge->addKey('cat_id', true);
        $this->forge->createTable('cc_category');
    }

    public function down()
    {
        $this->forge->dropTable('cc_category');
    }
}
