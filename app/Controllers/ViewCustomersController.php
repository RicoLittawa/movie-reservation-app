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
        $this->data['customer'] = $this->mdlCustomer->where('referenceNumber', $referenceNumber)->findAll();

        $customerName = $this->request->getPost('customerName');
        $customerEmail = $this->request->getPost('customerEmail');
        $customerAddress = $this->request->getPost('customerAddress');
        $customerContact = $this->request->getPost('customerContact');


        if ($this->request->is('post')) {
            $updateDate = [
                'customerName' => $customerName,
                'customerEmail' => $customerEmail,
                'customerAddress' => $customerAddress,
                'customerContact' => $customerContact,
                'referenceNumber' => $referenceNumber

            ];
            $validateCustomer = $this->mdlCustomer->validateUpdate($updateDate, $referenceNumber);
            if (!$validateCustomer) {
                // Get validation errors
                $errors = $this->mdlCustomer->validation->getErrors();
                if (!empty($errors)) {
                    return redirect()->to(base_url(route_to('update_reservation', $referenceNumber)))->with('errors', $errors)->withInput();
                }
            }

            $this->mdlCustomer->whereIn('referenceNumber', [$referenceNumber])->set(
                ['customerName' => $customerName, 'customerEmail' => $customerEmail, 'customerAddress' => $customerAddress, 'customerContact' => $customerContact]
            )->update();
            return redirect()->to('/')->with('success', 'Successfully updated a reservation');
        }
        return view('update/update-reservation', $this->data);
    }
}
