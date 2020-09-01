<?php namespace App\Controllers;

class HomeController extends BaseController {
    public function index() {
        $data = [];
        $data['title'] = 'Home';
        echo view('templates/header.php', $data);
        echo view('templates/footer.php');
    }
}