<?php

namespace App\Controllers;

class DashboardController extends BaseController
{

    public $usersModel;
    public $loggedUserID;
    public $userInfo;

    public function __construct() {
        $this->usersModel = new \App\Models\UsersModel();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userInfo = $this->usersModel->find($this->loggedUserID);
        helper(['url', 'form']);
    }

    public function index()
    {
        $userModel = new \App\Models\GetUsersModel();
  
        $data = [
            'pageTitle' => 'Начало',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo
        ];
      
        return view('dashboard/home', $data);
    }


    public function profile()
    {
        $userModel = new \App\Models\GetUsersModel();
        $data = [
            'pageTitle' => 'Профил',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo
        ];
        return view('dashboard/profile', $data);
    }


    public function users()
    {
        $userModel = new \App\Models\GetUsersModel();
        $pager = \Config\Services::pager();

        $data = [
            'pageTitle' => 'Потребители',
            'userInfo' =>  $this->userInfo,
            'users' => $userModel->paginate(4, 'group1'),
            'pager' => $userModel->pager,
        ];
        return view('dashboard/users', $data);
    }



}