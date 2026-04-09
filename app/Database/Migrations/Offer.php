<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Offer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'offer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'key' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'LONGTEXT',
            ],
            'banner' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'alt_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'slug' => [
                'type' => 'TEXT',
            ],
            'offer_type' => [
                'type'       => 'ENUM',
                'constraint' => ['distinct', 'indistinct'],
                'default'    => 'distinct',
            ],
            'offer_on' => [
                'type'       => 'ENUM',
                'constraint' => ['product', 'amount'],
                'default'    => 'amount',
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'on_amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'discount_on' => [
                'type'       => 'ENUM',
                'constraint' => ['product', 'product_amount', 'shipping_amount'],
                'default'    => 'product',
            ],
            'start_date' => [
                'type' => 'DATETIME',
            ],
            'expire_date' => [
                'type' => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('offer_id', true);
        $this->forge->createTable('cc_offer');
    }

    public function down()
    {
        $this->forge->dropTable('cc_offer');
    }
}
