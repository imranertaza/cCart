<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class MWalletCreateCcCustomerLedgerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ledg_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
                'Default'        => null,
            ],
            'fund_request_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
                'Default'        => null,
            ],
            'payment_method_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
                'Default'        => null,
            ],
            'particulars' => [
                'type' => 'text',
            ],
            'trangaction_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Dr.', 'Cr.'],
                'default'    => 'Cr.',
            ],
            'amount' => [
                'type'     => 'double',
                'unsigned' => true,
            ],
            'rest_balance' => [
                'type' => 'double',
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

        $this->forge->addKey('ledg_id', true);
        $this->forge->createTable('cc_customer_ledger');
    }

    public function down()
    {
        $this->forge->dropTable('cc_customer_ledger');
    }
}
