<?php namespace App\Controllers;
use App\Models\OrderDetailsModel;
use App\Models\AddItemModel;
class OrderController extends BaseController {
    public function index() {
        //access url parameter for item id
        $uri = service('uri');
        if($uri->getSegment(2) != '') {
            $orderid = $uri->getSegment(2); 
            $itemMst = new AddItemModel(); //item mst table          
            $itemDetails = $itemMst->where('id', $orderid)->first(); //fetch item details from item master table 
            if($itemDetails) {                
                $orderDetails = new OrderDetailsModel(); // order details table for insert or update orders
                $prevOrder = $orderDetails->where('userid', session()->get('id'))
                                          ->where('del_status', 0) //check delivery status
                                          ->where('itemname', $itemDetails['itemname'])
                                          ->first(); // fetch orderdetails if order is not delivered than update orders otherwise insert new one
                if($prevOrder) {
                    //update orders but not delivered 
                    $orderItem = [
                        'id' => $prevOrder['id'], //for update items not insert
                        'userid' => session()->get('id'),
                        'orderid' => $orderid,
                        'itemname' => $itemDetails['itemname'],
                        'itemimage' => $itemDetails['itemimage'],
                        'rid' => $itemDetails['userid'],
                        'price' => $itemDetails['itemprice'], // update price => prev price + new price
                        'item_qty' => $prevOrder['item_qty'] + 1, // similarly price 
                        'ord_status' => 1,  
                    ];
                }
                else {
                    //insert order
                    $orderItem = [
                        'userid' => session()->get('id'),
                        'orderid' => $orderid,
                        'itemname' => $itemDetails['itemname'],
                        'price' => $itemDetails['itemprice'],
                        'itemimage' => $itemDetails['itemimage'],
                        'rid' => $itemDetails['userid'],
                        'item_qty' => 1,
                        'ord_status' => 1, //del_status by default 0 so, it's no need 
                    ];
                }
                $orderDetails->save($orderItem);
                session()->setFlashdata('success', 'Order Placed');
                return redirect()->to('/');
            }
        }
    }

    //show order items
    public function show() {
        $orderDetails = new OrderDetailsModel(); // order details table for insert or update orders
        $data['items'] = $orderDetails->where('userid', session()->get('id'))
                                          ->where('ord_status', 1) //check order status
                                          ->findAll(); //fetch all        
        $data['title'] = 'Dashboard | Order';
        $data['message'] = 'ORDERS';
        echo view('templates/header.php', $data);
        echo view('components/messages.php', $data); // for messages
        echo view('components/showOrders.php'); //reuse this components
        echo view('templates/footer.php');        
    }
}