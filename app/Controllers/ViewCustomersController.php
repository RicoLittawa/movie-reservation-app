<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;
use App\Models\SelectedSeatsModel;
use App\Models\MovieSeatsModel;

class ViewCustomersController extends BaseController
{
    protected $mdlCustomer, $mdlselectedSeat, $mdlSeat, $data;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->mdlCustomer = new CustomersModel();
        $this->mdlselectedSeat = new SelectedSeatsModel();
        $this->mdlSeat = new MovieSeatsModel();
        $this->data = [];
    }
    //Display data for the table of customers
    public function index()
    {
        $this->data['customers'] = $this->mdlCustomer->findAll();
        return view('customers/list-customers', $this->data);
    }
    public function update($referenceNumber)
    {
        //Use to display data from seats and customer table
        $this->data['seats'] = $this->mdlselectedSeat->where('referenceNumber', $referenceNumber)->findAll();
        $this->data['customer'] = $this->mdlCustomer->where('referenceNumber', $referenceNumber)->findAll();

        //Data from input fields
        $customerName = $this->request->getPost('customerName');
        $customerEmail = $this->request->getPost('customerEmail');
        $customerAddress = $this->request->getPost('customerAddress');
        $customerContact = $this->request->getPost('customerContact');
        $updateDate = [
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerAddress' => $customerAddress,
            'customerContact' => $customerContact,
            'referenceNumber' => $referenceNumber
        ];

        if ($this->request->is('post')) {
            $validateCustomer = $this->mdlCustomer->validateUpdate($updateDate, $referenceNumber);
            if (!$validateCustomer) {
                // Get validation errors
                $errors = $this->mdlCustomer->validation->getErrors();
                if (!empty($errors)) {
                    return redirect()->to(base_url(route_to('update_reservation', $referenceNumber)))->with('errors', $errors)->withInput();
                }
            }

            //If reference number matched then it will update the customer table
            $this->mdlCustomer->whereIn('referenceNumber', [$referenceNumber])->set(
                ['customerName' => $customerName, 'customerEmail' => $customerEmail, 'customerAddress' => $customerAddress, 'customerContact' => $customerContact]
            )->update();
            return redirect()->to('/view')->with('success', 'Successfully updated a reservation');
        }
        return view('update/update-reservation', $this->data); //Display seats and customer information
    }
    //Delete Confirmation
    public function confirmDelete($referenceNumber)
    {
        //This will fetch data of customer
        $this->data['customer'] = $this->mdlCustomer->where('referenceNumber', [$referenceNumber])->findAll();
        return view('delete/delete-reservation', $this->data); // It will display a confirmation page
    }
    //Confirm delete
    public function delete($referenceNumber)
    {
        $selectedSeat = $this->mdlselectedSeat->where('referenceNumber', [$referenceNumber])->findColumn('seatNumber'); //Find the selected seat of the customer
        //Match the selected seat to the movie seats
        //If matched it will set the selected value again to false
        $updateMovieSeat = $this->mdlSeat->whereIn('seat_number', $selectedSeat)->set(['selected' => false])->update();
        //If it is updated then it will finally delete the data in selected seat and customer table
        if ($updateMovieSeat) {
            $this->mdlCustomer->where('referenceNumber', $referenceNumber)->delete();
            $this->mdlselectedSeat->where('referenceNumber', [$referenceNumber])->delete();
            return redirect()->to('/view')->with('success', 'Successfully deleted a reservation');
        }
    }
}
