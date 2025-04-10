<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class MFundRequestionCreateCcFundRequestTable extends Migration
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
            ],
            'payment_method_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'amount' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'card_name' => [
                'type'           => 'varchar',
                'constraint'     => 255,
                'null'           => true,
                'Default'        => null,
            ],
            'card_number' => [
                'type'           => 'int',
                'constraint'     => 11,
                'null'           => true,
                'Default'        => null,
            ],
            'card_expiration' => [
                'type'           => 'varchar',
                'constraint'     => 255,
                'null'           => true,
                'Default'        => null,
            ],
            'card_cvc' => [
                'type'           => 'varchar',
                'constraint'     => 255,
                'null'           => true,
                'Default'        => null,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Pending', 'Complete', 'Canceled'],
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

        $this->forge->addKey('fund_request_id', true);
        $this->forge->createTable('cc_fund_request');
    }

    public function down()
    {
        $this->forge->dropTable('cc_fund_request');
    }
}
