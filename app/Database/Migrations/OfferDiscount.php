<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class OfferDiscount extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'offer_discount_id' => [
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
            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'shipping_method_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'geo_zone_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'discount_calculate_on' => [
                'type'       => 'ENUM',
                'constraint' => ['percentage', 'fixed'],
                'default'    => 'percentage',
            ],
            'discount_amount' => [
                'type'       => 'DOUBLE',
            ],

        ]);
        $this->forge->addKey('offer_discount_id', true);
        $this->forge->createTable('cc_offer_discount');
    }

    public function down()
    {
        $this->forge->dropTable('cc_offer_discount');
    }
}
