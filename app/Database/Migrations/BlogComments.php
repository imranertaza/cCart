<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BlogComments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'comment_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'comment_author' => [
                'type' => 'TINYTEXT',
            ],
            'comment_author_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'comment_author_IP' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'comment_date' => [
                'type' => 'DATETIME',
            ],
            'comment_content' => [
                'type' => 'TEXT',
            ],
            'comment_approved' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'comment_parent_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'customer_id' => [
                'type' => 'BIGINT',
            ],
        ]);
        $this->forge->addKey('comment_id', true);
        $this->forge->createTable('cc_blog_comments');
    }

    public function down()
    {
        $this->forge->dropTable('cc_blog_comments');
    }
}
