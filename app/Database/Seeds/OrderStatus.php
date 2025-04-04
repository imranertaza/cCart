<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderStatus extends Seeder
{
    public function run()
    {
        $data = [
            [
                'order_status_id' => 2,
                'name'            => 'Processing',
            ],
            [
                'order_status_id' => 3,
                'name'            => 'Shipped',
            ],
            [
                'order_status_id' => 7,
                'name'            => 'Canceled',
            ],
            [
                'order_status_id' => 5,
                'name'            => 'Complete',
            ],
            [
                'order_status_id' => 8,
                'name'            => 'Denied',
            ],
            [
                'order_status_id' => 9,
                'name'            => 'Canceled Reversal',
            ],
            [
                'order_status_id' => 10,
                'name'            => 'Failed',
            ],
            [
                'order_status_id' => 11,
                'name'            => 'Refunded',
            ],
            [
                'order_status_id' => 12,
                'name'            => 'Reversed',
            ],
            [
                'order_status_id' => 13,
                'name'            => 'Chargeback',
            ],
            [
                'order_status_id' => 1,
                'name'            => 'Pending',
            ],
            [
                'order_status_id' => 16,
                'name'            => 'Voided',
            ],
            [
                'order_status_id' => 15,
                'name'            => 'Processed',
            ],
            [
                'order_status_id' => 14,
                'name'            => 'Expired',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_order_status')->insertBatch($data);
    }
}
