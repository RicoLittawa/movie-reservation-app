<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['referenceNumber', 'customerName', 'reservedDate'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'customerName' => 'required|max_length[30]|alpha_numeric_space|min_length[3]',
        'reservedDate' => 'required|valid_date'
    ];
    protected $validationMessages   = [
        'customerName' =>
        [
            'required' => 'Fullname is required',
            'min_length' => 'Fullname must be at least 3 characters in length',
            'max_length' => 'Fullname must be at least 30 characters in length',
            'alpha_numeric_space' => 'Fullname may only contain alphanumeric and space characters'
        ],
        'reservedDate' => [
            'required'=>'Date is required',
            'valid_date'=>'Date should be on a valid format'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
