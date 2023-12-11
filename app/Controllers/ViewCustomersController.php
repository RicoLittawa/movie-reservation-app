<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;
use App\Models\SelectedSeatsModel;

class ViewCustomersController extends BaseController
{
    protected $mdlCustomer, $mdlselectedSeat, $data;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->mdlCustomer = new CustomersModel();
        $this->mdlselectedSeat = new SelectedSeatsModel();
        $this->data = [];
    }
    public function index()
    {
        $this->data['customers'] = $this->mdlCustomer->findAll();
        return view('customers/list-customers', $this->data);
    }
    public function update($referenceNumber = null)
    {
        $this->data['seats'] = $this->mdlselectedSeat->where('referenceNumber', $referenceNumber)->findAll();
        $this->data['customer']= $this->mdlCustomer->where('referenceNumber',$referenceNumber)->findAll();
        return view('update/update-reservation', $this->data);
    }
}
