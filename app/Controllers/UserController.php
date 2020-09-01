<?php namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController {
    public function __construct() {
        helper('form');
    }

    public function index() {
        $data = [];
        $data['title'] = 'Login';
        //login
        if($this->request->getMethod() == 'post') {
            //validation rules here
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password is Invalid!..'
                ]
            ];
            //check validation
            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }
            else{     
                //successfull login           
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();
                $this->setUserSession($user);
                if($user['type'] == 'user') {
                    return redirect()->to('/');
                }
                return redirect()->to('/dashboard');
            }
        }
        echo view('templates/header.php', $data);
        echo view('pages/login.php');
        echo view('templates/footer.php');
    }

    public function register() {
        $data = [];
        $data['title'] = 'Register';
        if($this->request->getMethod() == 'post') {
            //validation rules
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[30]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'type' => 'required|min_length[4]|max_length[10]',
                'password' => 'required|min_length[8]|max_length[255]',
                'cpassword' => 'matches[password]',
            ];
            //we don't use custom messages for showing errors
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator; // list of errors
            }
            else{
                //store our database
                $model = new UserModel();
                $userInfo = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'type' => $this->request->getVar('type'),
                ];
                $model->save($userInfo);
                $session = session();
                $session->setFlashdata('success', 'Registration Successfull, Now you can Login.');
                return redirect()->to('/login');
            }
        }
        echo view('templates/header.php', $data);
        echo view('pages/register.php');
        echo view('templates/footer.php');
    }

    public function profile() {
        $data = [];
        $data['title'] = 'Profile';
        $model = new UserModel();
        if($this->request->getMethod() == 'post') {
            //validation rules
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[30]',                
            ];
            if($this->request->getVar('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['cpassword'] ='matches[password]';
            }
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator; // list of errors
            }
            else{
                //store our database
                $userInfo = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                ];
                if($this->request->getVar('password') != '')
                    $userInfo['password'] = $this->request->getVar('password');
                $model->save($userInfo);
                $user = $model->where('id', session()->get('id'))->first();
                $this->setUserSession($user);
                $session = session();
                $session->setFlashdata('success', 'Successfully Updated.');
                return redirect()->to('/profile');
            }
        }
        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header.php', $data);
        echo view('pages/profile.php');
        echo view('templates/footer.php');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

    private function setUserSession($user) {
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'type' => $user['type'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }
}