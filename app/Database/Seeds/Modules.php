<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Modules extends Seeder
{
    public function run()
    {
        $data = [
            [
                'module_id'   => 1,
                'module_name' => 'Top Search',
                'module_key'  => 'top_search',
                'status'      => 1,
            ],
            [
                'module_id'   => 2,
                'module_name' => 'Wishlist',
                'module_key'  => 'wishlist',
                'status'      => 1,
            ],
            [
                'module_id'   => 3,
                'module_name' => 'Compare',
                'module_key'  => 'compare',
                'status'      => 1,
            ],
            [
                'module_id'   => 4,
                'module_name' => 'Bulk Edit Products',
                'module_key'  => 'bulk_edit_products',
                'status'      => 1,
            ],
            [
                'module_id'   => 5,
                'module_name' => 'Contact With Whatsapp',
                'module_key'  => 'contact_with_whatsapp',
                'status'      => 1,
            ],
            [
                'module_id'   => 6,
                'module_name' => 'Coupon',
                'module_key'  => 'coupon',
                'status'      => 1,
            ],
            [
                'module_id'   => 7,
                'module_name' => 'Image Crop',
                'module_key'  => 'image_crop',
                'status'      => 1,
            ],
            [
                'module_id'   => 8,
                'module_name' => 'Review',
                'module_key'  => 'review',
                'status'      => 1,
            ],
            [
                'module_id'   => 9,
                'module_name' => 'Multi delete',
                'module_key'  => 'multi_delete',
                'status'      => 1,
            ],
            [
                'module_id'   => 10,
                'module_name' => 'Multi option',
                'module_key'  => 'multi_option',
                'status'      => 1,
            ],
            [
                'module_id'   => 11,
                'module_name' => 'Multi attribute',
                'module_key'  => 'multi_attribute',
                'status'      => 1,
            ],
            [
                'module_id'   => 12,
                'module_name' => 'Watermark Image attribute',
                'module_key'  => 'watermark',
                'status'      => 1,
            ],
            [
                'module_id'   => 13,
                'module_name' => 'Multi Category',
                'module_key'  => 'multi_category',
                'status'      => 1,
            ],
            [
                'module_id'   => 14,
                'module_name' => 'Album',
                'module_key'  => 'album',
                'status'      => 1,
            ],
            [
                'module_id'   => 15,
                'module_name' => 'Multi Status Update',
                'module_key'  => 'multi_status_update',
                'status'      => 1,
            ],
            [
                'module_id'   => 16,
                'module_name' => 'Points',
                'module_key'  => 'point',
                'status'      => 1,
            ],
            [
                'module_id'   => 17,
                'module_name' => 'Both Products',
                'module_key'  => 'both_products',
                'status'      => 1,
            ],
            [
                'module_id'   => 18,
                'module_name' => 'Product Guides',
                'module_key'  => 'product_guides',
                'status'      => 1,
            ],
            [
                'module_id'   => 19,
                'module_name' => 'Other Products',
                'module_key'  => 'other_products',
                'status'      => 1,
            ],
            [
                'module_id'   => 20,
                'module_name' => 'Blog',
                'module_key'  => 'blog',
                'status'      => 1,
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_modules')->insertBatch($data);
    }
}
