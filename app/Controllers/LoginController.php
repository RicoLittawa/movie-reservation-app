<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserAccountModel;


class LoginController extends BaseController

{
    protected $helpers = ['form'];

    public function index()
    {
        return  view('login/login-page');
    }
    public function submit()
    {
        $mdlUser = new UserAccountModel();
        $session = session(); //Initialize session
        //User data from input fields
        $username = (string) $this->request->getPost('username');
        $userpassword = (string) $this->request->getPost('userpassword');
        $user = ['username' => $username, 'password' => $userpassword];

        //Custom errors
        $errors = [
            'warning' => 'Password or Email does not match',
        ];

        if ($this->request->is('post')) {
            //Validate input fields
            $validateUser = $mdlUser->validate($user);
            if (!$validateUser) {
                $errors = $mdlUser->errors();
                if (!empty($errors)) {
                    return redirect()->to('/login')->with('errors', $errors)->withInput();
                }
            }
            //Check if username match to the username from database
            $userData = $mdlUser->where('username', $username)->first();
            if ($userData !== null) {
                if ($username !== $userData['username']) {
                    return redirect()->to('/login')->with('errors', $errors)->withInput();
                } else {
                    //If password match it will set isLoggedIn to true
                    if (password_verify($userpassword, $userData['password'])) {
                        $session->set('isLoggedIn', true);
                        $session->set('username', $userData['username']); // You can store other user data in the session as needed
                        return redirect()->to('/');
                    } else {
                        return redirect()->to('/login')->with('errors', $errors)->withInput();
                    }
                }
            } else {
                return redirect()->to('/login')->with('errors', $errors)->withInput();
            }
        }
    }
    public function logout()
    {
        //Logout to the application
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
