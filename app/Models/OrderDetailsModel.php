<?php namespace App\Models;
use CodeIgniter\Model;
//users table model for manipulation
class OrderDetailsModel extends Model {
    protected $table = 'orderdetails';
    protected $allowedFields = ['userid', 'orderid', 'itemname', 'price', 'item_qty', 'ord_status', 'del_status', 'itemimage'];
}