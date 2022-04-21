<?php

namespace App\Controllers;
use App\Libraries\Hash;
use GoogleAuthenticator\GoogleAuthenticator;

class SettingsController extends BaseController
{
    public function __construct() {
        $this->usersModel = new \App\Models\UsersModel();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userRole = session()->get('userRole');
        $this->userInfo = $this->usersModel->find($this->loggedUserID);
    }


    public function index()
    {
        $userModel = new \App\Models\GetUsersModel();
        $ga = new GoogleAuthenticator();
        $secret = 'XVQ2UIGO75XRUKJO';
         $qrCodeUrl = $ga->getQRCodeGoogleUrl('test.zdraven.eu', $secret);

 
  
        $data = [
            'pageTitle' => 'Настройки',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo,
            'code' => $qrCodeUrl
        ];
      
        return view('dashboard/settings', $data);
    }

   


}