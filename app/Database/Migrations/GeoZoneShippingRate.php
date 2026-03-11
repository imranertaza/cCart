<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class GeoZoneShippingRate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cc_geo_zone_shipping_rate_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'geo_zone_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'up_to_value' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'cost' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('cc_geo_zone_shipping_rate_id', true);
        $this->forge->createTable('cc_geo_zone_shipping_rate');
    }

    public function down()
    {
        $this->forge->dropTable('cc_geo_zone_shipping_rate');
    }
}
