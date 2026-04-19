<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Blog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'blog_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'slug' => [
                'type' => 'TEXT',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'meta_title' => [
                'type' => 'TEXT',
            ],
            'meta_keyword' => [
                'type' => 'TEXT',
            ],
            'meta_description' => [
                'type' => 'TEXT',
            ],
            'cat_id' => [
                'type'       => 'INT',
                'constraint' => 3,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'alt_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'video_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'publish_date' => [
                'type' => 'DATETIME',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['0', '1'],
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
        $this->forge->addKey('blog_id', true);
        $this->forge->createTable('cc_blog');
    }

    public function down()
    {
        $this->forge->dropTable('cc_blog');
    }
}
