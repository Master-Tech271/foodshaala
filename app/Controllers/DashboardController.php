<?php namespace App\Controllers;
use App\Models\AddItemModel;
class DashboardController extends BaseController {
    public function __construct() {
        helper('form');
        helper('file');
    }

    public function index() {
        $data = [];
        $data['title'] = 'Dashboard';
        echo view('templates/header.php', $data);
        echo view('pages/dashboard.php');
        echo view('templates/footer.php');
    }

    public function addItem() {
      //  var_dump(session()->get('type'));
        //double checking
        if(session()->get('type') == 'restaurant')  {
            if($this->request->getMethod() == 'post') {
                $rules = [
                    'itemname' => 'required|min_length[3]|max_length[255]',
                    'itemunit' => 'required|min_length[2]|max_length[50]',
                    'itemprice' => 'required|min_length[1]|max_length[10]',
                    'itemstatus' => 'required|min_length[1]|max_length[1]',
                  //  'itemimage' => 'required',
                ];
                if(!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                    $data['title'] = 'Dashboard';
                    echo view('templates/header.php', $data);
                    echo view('pages/dashboard.php');
                    echo view('templates/footer.php');
                }
                else{
                    //store our database
                    $file = $this->request->getFile('itemimage');
                    if (!$file->isValid())
                         throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
                    if($img = $this->request->getFile('itemimage'))   {
                        if ($img->isValid() && ! $img->hasMoved())
                        {
                            $newName =  $this->request->getVar('itemname') . '_' . $img->getRandomName();
                            $img->move('./assets/itemimages', $newName);
                            $items = [
                                'itemname' => $this->request->getVar('itemname'),
                                'itemunit' => $this->request->getVar('itemunit'),
                                'itemprice' => $this->request->getVar('itemprice'),
                                'itemstatus' => $this->request->getVar('itemstatus'),
                                'itemimage' => $newName,
                            ];
                            $model = new AddItemModel();
                            $model->save($items);
                            $session = session();
                            $session->setFlashdata('success', 'Items Added Successfully!');
                            return redirect()->to('/dashboard');
                        }
                    }
                    
                }
            }
        }
        else
        return redirect()->to('/');
    }
}