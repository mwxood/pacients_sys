<?php

namespace App\Controllers;
use App\Libraries\Hash;
use GoogleAuthenticator\GoogleAuthenticator;

class Auth extends BaseController
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

        return view('auth/login');
    }

    public function register() {

        return view('auth/register');
    }


    public function save() {

        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Вашето име е задължително!'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Вашият имейл е задължителен!',
                    'valid_email' => 'Моля, въведете валиден имейл',
                    'is_unique' => 'Имейлът вече съществува'
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Вашата парола е задължителна!',
                    'min_length' => 'Паролата трявба да съдържа минимум 5 символа',
                    'max_length' => 'Паролата не трявба да съдържа повече от 12 символа'

                ]
            ],

            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Подтвърждение на паролата е задължително!',
                    'min_length' => 'Паролата трявба да съдържа минимум 5 символа',
                    'max_length' => 'Паролата не трявба да съдържа повече от 12 символа',
                    'matches' => 'Паролата не съвпада!'
                ]
            ],
        ]);

        if(!$validation) {
            return view('auth/register', ['validation'=> $this->validator]);
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
                // return redirect()->to('register')->with('fail', 'Something went wrong');
            } else {
                // return redirect()->to('auth/register')->with('success', 'You are now registered');
                $last_id = $usersModel->insertID();
                session()->set('loggetUser', $last_id);
                return redirect()->to('/dashboard/users');
            }
        }
    }


    public function check() {
        $ga = new GoogleAuthenticator();
        $secret = 'XVQ2UIGO75XRUKJO';
        $code = $this->request->getPost('code');


        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Моля, въведете вашият имейл!',
                    'valid_email' => 'Моля, въведете валиден имейл',
                    'is_not_unique' => 'Потребител с този имейл не съществува'
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Моля, въведете вашата парола',
                    'min_length' => 'Паролата трявба да съдържа минимум 5 символа',
                    'max_length' => 'Паролата не трявба да съдържа повече от 12 символа'

                ]
            ],

            'code' => [
                'rules' => 'required|min_length[6]|max_length[6]',
                'errors' => [
                    'required' => 'Моля, въведете вашият код!',
                    'min_length' => 'Кодът трявба да съдържа минимум 6 символа',
                    'max_length' => 'Кодът не трявба да съдържа повече от 6 символа'
                ]
            ]

        ]);


        if(!$validation) {
            return view('/auth/login', ['validation'=> $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if(!$check_password) {
                session()->setFlashdata('fail', 'Паролата е неправилна');
                return redirect()->to('/auth')->withinput();
            } else {

                try {
                    $checkResult = $ga->verifyCode($secret, $code , 2);
                    if(true === $checkResult) {
                        $user_id = $user_info['id'];
                        $user_role = $user_info['role'];
                        session()->set('loggedUser', $user_id);
                        session()->set('userRole', $user_role);
                        return redirect()->to('/');
                    } else {
                        session()->setFlashdata('fail', 'Неправилен код');
                        return redirect()->to('/auth')->withinput();
                    }
                } catch(\Exception $exception ) {}

                return redirect()->to('/auth/check');
            }

        }
    }


    public function edit_user($id = 0) {
        $users = new \App\Models\UsersModel();
        $user = $users->find($id);
        $data = [
            'pageTitle' => ucfirst($user['name']),
            'user' => $user,
            'userInfo' =>  $this->userInfo
        ];
        return view('auth/edit_user', $data);
    }


    public function update_user($id = 0) {
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Вашето име е задължително!'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Вашият имейл е задължителен!',
                    'valid_email' => 'Моля, въведете валиден имейл'
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Вашата парола е задължителна!',
                    'min_length' => 'Паролата трявба да съдържа минимум 5 символа',
                    'max_length' => 'Паролата не трявба да съдържа повече от 12 символа'

                ]
            ],

            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Подтвърждение на паролата е задължително!',
                    'min_length' => 'Паролата трявба да съдържа минимум 5 символа',
                    'max_length' => 'Паролата не трявба да съдържа повече от 12 символа',
                    'matches' => 'Паролата не съвпада!'
                ]
            ],
        ]);

        if(!$validation) {
            return view('auth/edit_user', ['validation'=> $this->validator]);
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');

            $values = [
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'password' => Hash::make($password)
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->update($id, $values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('/dashboard/users');
            }
        }

    }

    public function delete_user ($id =0) {
        $usersModel = new \App\Models\UsersModel();

        if($usersModel->find($id)) {
            $usersModel->delete($id);
            session()->setFlashdata('success', 'Потребителят е изтрит успешно!');
        } else {
            session()->setFlashdata('fail', 'Потребителят не е изтрит!');
        }


        return redirect()->to('/dashboard/users');
    }


    function logout() {
        if(session()->has('loggedUser')) {
            session()->remove('loggedUser');
            session()->remove('userRole');
            return redirect()->to('/auth?access=out')->with('fail', 'Вие сте излезнали!');
        }
    }

}