<?php namespace App\Controllers;
use App\Models\AddItemModel;
class HomeController extends BaseController {
    public function index() {
        $data = [];
        $data['title'] = 'Home';
        $model = new AddItemModel();
        $data['items'] = $model->where('itemstatus', 1)->findAll();
        echo view('templates/header.php', $data);
        echo view('components/alert.php');
        echo view('components/carousel.php');
        echo view('components/items.php');
        echo view('templates/footer.php');
    }
}