<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CouponShipping extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'coupon_shipping_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'coupon_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'shipping_method_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('coupon_shipping_id', true);
        $this->forge->createTable('cc_coupon_shipping');
    }

    public function down()
    {
        $this->forge->dropTable('cc_coupon_shipping');
    }
}
