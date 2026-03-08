<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class FundRequest extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'fund_request_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'payment_method_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'amount' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'card_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'card_number' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'card_expiration' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'card_cvc' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Pending', 'Complete','Canceled'],
                'default'    => 'Pending',
            ],
            'createdDtm' => [
                'type'    => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('fund_request_id', true);
        $this->forge->createTable('cc_fund_request');
    }

    public function down()
    {
        $this->forge->dropTable('cc_fund_request');
    }
}
