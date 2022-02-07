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

    public function pacients()
    {

        $pacientModel = new \App\Models\GetPacientsModel();
        $pager = \Config\Services::pager();

        $userModel = new \App\Models\GetUsersModel();
        $request = service('request');
        $searchData = $request->getGet();
        $search = "";

        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if($search == '') {
            $pacientData = $pacientModel->paginate(4, 'group1');
        } else {
            $pacientData = $pacientModel->select('*')
                ->orLike('pacient_name', $search)
                ->orLike('egn', $search)
                ->paginate(5);
        }

        $data = [
            'pageTitle' => 'Пациенти',
            'userInfo' =>  $this->userInfo,
            'users' => $userModel->getUser(),
            'pacients' => $pacientData,
            'pager' => $pacientModel->pager,
            'search' => $search
        ];
        return view('dashboard/pacients', $data);
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

    public function create_pacient()
    {
        $userModel = new \App\Models\GetUsersModel();

        $data = [
            'pageTitle' => 'Регистрация на пациент',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo
        ];
        return view('dashboard/create_pacient', $data);
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

    public function edit_pacient($id = 0) {
        $userModel = new \App\Models\GetUsersModel();
        $posts = new \App\Models\GetPostsModel();
        $post = $posts->find($id);

        $data = [
            'pageTitle' => 'Начало',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo,
            'post' => $post
        ];

        return view('dashboard/edit_pacient', $data);
    }

}