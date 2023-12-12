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
    protected $allowedFields    = ['referenceNumber', 'customerName', 'customerEmail', 'customerAddress', 'customerContact', 'reservedDate'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRulesForAdd = [
        'customerName' => 'required|max_length[30]|alpha_numeric_space|min_length[3]',
        'customerEmail' => 'required|valid_email|is_unique[customers.customerEmail]',
        'customerAddress' => 'required|max_length[30]|min_length[3]',
        'customerContact' => 'required|exact_length[11]|numeric',
        'reservedDate' => 'required|valid_date'
    ];
    protected $validationRulesForUpdate = [
        'customerName' => 'required|max_length[30]|alpha_numeric_space|min_length[3]',
        'customerEmail' => 'required|valid_email|is_unique[customers.customerEmail,ref,{ref}]',
        'customerAddress' => 'required|max_length[30]|min_length[3]',
        'customerContact' => 'required|exact_length[11]|numeric',
    ];
    public function validateUpdate($data, $ref)
    {
        $rules = $this->validationRulesForUpdate;
        $currentEmail = $this->select('customerEmail')->where('referenceNumber', $ref)->get()->getRow()->customerEmail;
        if ($data['customerEmail'] === $currentEmail) {
            unset($rules['customerEmail']);
        } else {
            $rules['customerEmail'] = "required|valid_email|is_unique[customers.customerEmail]";
        }
        $this->validation->setRules($rules, $this->validationMessages);
        return $this->validation->run($data);
    }
    public function validateAdd($data)
    {
        $this->validation->setRules($this->validationRulesForAdd, $this->validationMessages);
        return $this->validation->run($data);
    }
    protected $validationMessages   = [
        'customerName' =>
        [
            'required' => 'Fullname is required',
            'min_length' => 'Fullname must be at least 3 characters in length',
            'max_length' => 'Fullname must be at least 30 characters in length',
            'alpha_numeric_space' => 'Fullname may only contain alphanumeric and space characters'
        ],
        'customerEmail' =>
        [
            'required' => 'Email is required',
            'valid_email' => 'Email address must be in a valid format',
            'is_unique' => 'Email is already taken'
        ],
        'customerAddress' =>
        [
            'required' => 'Address is required',
            'max_length' => 'Address must be at least 50 characters in length',
            'min_length' => 'Address must be at least 3 characters in length',
        ],
        'customerContact' =>
        [
            'required' => 'Contact is required',
            'exact_length' => 'Contact must be at least 11 digits',
            'numeric' => 'Contact must contain numeric characters'

        ],
        'reservedDate' =>
        [
            'required' => 'Date is required',
            'valid_date' => 'Date should be on a valid format'
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
