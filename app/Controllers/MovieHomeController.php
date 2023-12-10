<?php

namespace App\Controllers;

use App\Models\MovieSeatsModel;
use App\Models\ReferenceModel;
// defined('BASEPATH') OR exit('No direct script access allowed');

class MovieHomeController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $mdlSeats = new MovieSeatsModel();
        $data['seats'] = $mdlSeats->findAll();
        return view('movie-home', $data);
    }
    public function display()
    {
        $mdlSeats = new MovieSeatsModel();
        $referenceNumber = new ReferenceModel();
        $data['seats'] = $mdlSeats->findAll();
        $data['referenceNumber'] = $referenceNumber->findColumn('id');
        return view('create/add-reservation', $data);
    }
    public function save()
    {
        $customerName = $this->request->getPost('customerName');
        $referenceNumber = $this->request->getPost('referenceNumber');
        $reservedDate = $this->request->getPost('reservedDate');
        $seatlist = $this->request->getPost('seatlist');


        $customerData = [
            'customerName' => $customerName,
            'referenceNumber' => $referenceNumber,
            'seatNumber' => $seatlist,
            'reservedDate' => $reservedDate
        ];
        if ($this->request->is('post')) {
            $rules = [
                'customerName' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Full name is required',
                    ],
                ],
                'referenceNumber' => 'required',
                'seatNumber' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please select a seat number',
                    ],
                ],
                'reservedDate' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Date is required',
                    ],
                ]
            ];
            if (!$this->validateData($customerData, $rules)) {
                return redirect()->back()->withInput();
            } else {
                dd("save");
            }
        }


        return view('create/add-reservation');
    }
}
