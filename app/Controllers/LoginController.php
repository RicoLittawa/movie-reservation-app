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
        $username = (string) $this->request->getPost('username');
        $userpassword = (string) $this->request->getPost('userpassword');

        $mdlUser = new UserAccountModel();
        $user = ['username' => $username, 'password' => $userpassword];
        $errors = [
            'password' => 'Password does not match',
            'username' => 'User does not exist'
        ];
        if ($this->request->is('post')) {

            $validateUser = $mdlUser->validate($user);
            if (!$validateUser) {
                $errors = $mdlUser->errors();
                if (!empty($errors)) {
                    return redirect()->to('/login')->with('errors', $errors)->withInput();
                }
            }

            $userData = $mdlUser->where('username', $username)->first();
            if ($userData !== null) {
                if ($username !== $userData['username']) {
                    return redirect()->to('/login')->with('errors', $errors)->withInput();
                } else {
                    if (password_verify($userpassword, $userData['password'])) {
                        $session = session();
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
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}
