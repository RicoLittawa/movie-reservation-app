<?php

namespace App\Controllers;

use App\Models\MovieSeatsModel;
use App\Models\ReferenceModel;
use App\Models\CustomersModel;
use App\Models\SelectedSeatsModel;

class MovieHomeController extends BaseController
{

    protected $helpers = ['form'];
    protected $mdlSeats, $mdlReference, $mdlCustomer, $mdlSelectedSeats, $data;


    public function __construct()
    {
        $this->mdlSeats = new MovieSeatsModel();
        $this->mdlReference = new ReferenceModel();
        $this->mdlCustomer = new CustomersModel();
        $this->mdlSelectedSeats = new SelectedSeatsModel();
        $this->data = [];
    }
    //Display seats for home page
    public function index()
    {
        $this->findData();
        return view('movie-home', $this->data);
    }
    //Display seats for add reservation page
    public function display()
    {
        $referenceNumber = $this->mdlReference->select('id')->first();
        $this->findData();
        $this->data['referenceNumber'] = $referenceNumber['id'];
        return view('create/add-reservation', $this->data);
    }

    //Find data for seats
    private function findData()
    {
        return $this->data['seats'] = $this->mdlSeats->findAll();
    }
    //Save Reservation
    public function save()
    {
        //Data from input fields
        $customerName = $this->request->getPost('customerName');
        $customerEmail = $this->request->getPost('customerEmail');
        $customerAddress = $this->request->getPost('customerAddress');
        $customerContact = $this->request->getPost('customerContact');
        $referenceNumber = $this->request->getPost('referenceNumber');
        $reservedDate = $this->request->getPost('reservedDate');
        $seatlist = (array) $this->request->getPost('seatlist');


        //Data array
        $dataToSave = [
            'customer' => [
                'customerName' => $customerName,
                'customerEmail' => $customerEmail,
                'customerAddress' => $customerAddress,
                'customerContact' => $customerContact,
                'referenceNumber' => $referenceNumber,
                'reservedDate' => $reservedDate
            ],
            'selectedSeat' => [
                'referenceNumber' => $referenceNumber,
                'seatNumber' => $seatlist,
            ]

        ];

        if ($this->request->is('post')) {
            //Validate input fields
            $validateCustomer = $this->mdlCustomer->validateAdd($dataToSave['customer'], $referenceNumber);
            $validateSeat = $this->mdlSelectedSeats->validate($dataToSave['selectedSeat']);
            if (!$validateCustomer || $validateSeat) {
                $errors = [];
                if (!$validateCustomer) {
                    $errors = array_merge($errors, $this->mdlCustomer->errors());
                }
                if (!$validateSeat) {
                    $errors = array_merge($errors, $this->mdlSelectedSeats->errors());
                }
                if (!empty($errors)) {
                    return redirect()->to('/create')->with('errors', $errors)->withInput();
                }
            }

            //Make an array to store seats to the selected seats table each row
            $selectedSeatsArr = [];
            foreach ($dataToSave['selectedSeat']['seatNumber'] as $seat) {
                $selectedSeatsArr[] = [
                    'referenceNumber' => $dataToSave['selectedSeat']['referenceNumber'],
                    'seatNumber' => $seat,
                ];
            }
            //If success + 1 to the value of reference number
            $newRef = $referenceNumber + 1;

            //Query processes
            $this->mdlCustomer->insert($dataToSave['customer']);
            $this->mdlSelectedSeats->insertBatch($selectedSeatsArr);
            $this->mdlReference->whereIn('id', [$referenceNumber])->set(['id' => $newRef])->update();
            $this->mdlSeats->whereIn('seat_number', $seatlist)->set(['selected' => true])->update();
            return redirect()->to('/')->with('success', 'Successfully created a reservation');
        }
    }
}
