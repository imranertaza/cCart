<?php

// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table              = 'cc_product_feedback';
    protected $primaryKey         = 'product_feedback_id';
    protected $returnType         = 'object';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['product_feedback_id', 'product_id', 'customer_id', 'feedback_star', 'feedback_text', 'status', 'createdBy', 'createdDtm', 'updatedBy', 'updatedDtm'];
    protected $useTimestamps      = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}
