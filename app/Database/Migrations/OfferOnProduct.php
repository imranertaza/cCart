<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class OfferOnProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'offer_on_product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'offer_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'product_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'prod_cat_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'brand_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('offer_on_product_id', true);
        $this->forge->createTable('cc_offer_on_product');
    }

    public function down()
    {
        $this->forge->dropTable('cc_offer_on_product');
    }
}
