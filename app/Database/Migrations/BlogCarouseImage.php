<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class BlogCarouseImage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'blog_crassula_image_id' => [
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
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'alt_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

        ]);
        $this->forge->addKey('blog_crassula_image_id', true);
        $this->forge->createTable('cc_blog_carousel_image');
    }

    public function down()
    {
        $this->forge->dropTable('cc_blog_carousel_image');
    }
}
