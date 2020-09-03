<?php namespace App\Models;
use CodeIgniter\Model;
//users table model for manipulation
class AddItemModel extends Model {
    protected $table = 'item_mst';
    protected $allowedFields = ['itemname', 'itemprice', 'itemunit', 'itemimage', 'itemstatus', 'updated_at', 'userid', 'itemtype'];
}