<?php

namespace App\Controllers;
use App\Libraries\Hash;
use GoogleAuthenticator\GoogleAuthenticator;

class LastActivityController extends BaseController
{

   

    public function __construct() {
        $this->usersModel = new \App\Models\UsersModel();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userRole = session()->get('userRole');
        $this->userInfo = $this->usersModel->find($this->loggedUserID);
        helper(['url', 'form']);
        helper('Form_helper');
    }



    public function index()
    {
        $userModel = new \App\Models\GetUsersModel();
  
        $data = [
            'pageTitle' => 'Настройки',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo,
            'code' => $qrCodeUrl
        ];
      
        return view('dashboard/settings', $data);
    }


}